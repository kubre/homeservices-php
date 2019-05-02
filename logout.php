<?php

include_once "scripts/session.php";

if (isset($_SESSION['user'])) {
    $_SESSION['user'] = null;
    session_unset();
    session_destroy();
}

header('Location: login.php');
exit();
