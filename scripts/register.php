<?php

require_once 'session.php';
require_once 'DB.php';
require_once 'helpers.php';

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

    $isProviderCreated = DB::query("INSERT INTO providers values(DEFAULT, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [
            $name,$contact,$descr,$adder1,$adder2,$city,$password,$file1, $profession
        ]);

    if ($isProviderCreated) {
        header('Location: ../register.php?msg=success');
        exit();
    } else {
        unlink('../storage/'.$file1);
        header('Location: ../register.php?msg=failed');
        exit();
    }
}
