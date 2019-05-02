<?php

require_once 'session.php';

function check($type = null)
{
    if (is_null($type)) {
        return isset($_SESSION['user']);
    } elseif (isset($_SESSION['user'])) {
        return $_SESSION['user']->name == $type;
    }
    return false;
}
