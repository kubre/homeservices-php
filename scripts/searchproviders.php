<?php

require_once 'helpers.php';
require_once 'DB.php';

if (isset($_POST['city']) && isset($_POST['profession'])) {
    $input = clean($_POST);
    
    $city = $input['city'];
    $profession = $input['profession'];

    $sql = "SELECT * FROM `providers` WHERE city=? AND profession=?";
    $stmt = DB::query($sql, [
        $city, $profession
    ]);

    $providers = $stmt->fetchAll(PDO::FETCH_OBJ);

    if (count($providers) > 0) {
        echo json_encode($providers);
    } else {
        echo '{"failed": true }';
    }
}
