<?php
include_once "session.php";
include_once "checklogin.php";
include_once "DB.php";
include_once "helpers.php";

if (!check()) {
    header('Location: logout.php');
    exit();
}

if (isset($_POST['register'])) {
    $input = clean($_POST);

    $name = $input['name'];
    $contact = $input['contact'];
    $descr = $input['descr'];
    $adder1 = $input['adder1'];
    $adder2 = $input['adder2'];
    $city = $input['city'];
    $password = $input['password'];
    $profession = $input['profession'];

    $photo = $_FILES['photo'];

    $file1 = upload($photo);

    if ($file1 === false) {
        header('Location', '../register.php?msg=file');
        exit();
    }

    $isProviderCreated = DB::query(
        "UPDATE providers SET name=?, contact=?, adder1=?, adder2=?, city=?, photo=?, descr=?, password=?, profession=? WHERE id=?",
        [$name,$contact,$adder1,$adder2,$city,$file1, $descr, $password, $profession,$_SESSION['user']->id]
    );

    if ($isProviderCreated) {
        unlink($_SESSION['user']->photo);
        header('Location: ../logout.php');
        exit();
    } else {
        unlink('../storage/'.$file1);
        echo "";
        header('Location: ../logout.php');
        exit();
    }
}
