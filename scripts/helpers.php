<?php


function clean($data = array())
{
    foreach ($data as $key => $val) {
        $data[$key] = trim($val);
        $data[$key] = stripslashes($val);
        $data[$key] = htmlspecialchars($val);
    }
    return $data;
}

function upload($file, $allowed = ['png', 'jpg', 'jpeg', 'gif'])
{
    $a = explode('.', $file['name']) ?: '';
    $ext = end($a);
    if (array_search($ext, $allowed) === false) {
        return false;
    }
    $dest = uniqid().'.'.$ext;

    if (move_uploaded_file($file['tmp_name'], '../storage/'.$dest)) {
        return $dest;
    }
    return false;
}
