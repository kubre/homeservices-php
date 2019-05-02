<?php

include_once "scripts/checklogin.php";
include_once "scripts/helpers.php";
include_once "scripts/DB.php";

if (!check("admin")) {
    header('Location: logout.php');
    exit();
}
if (isset($_GET['id'])) {
    $input = clean($_GET);
    
    $isRemoved = DB::query("DELETE FROM bookings WHERE id=?", [$input['id']]);

    if ($isRemoved) {
        header('Location: admin.php?msg=success');
        exit();
    } else {
        header('Location: admin.php?msg=failed');
        exit();
    }
}
