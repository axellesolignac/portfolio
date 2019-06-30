<?php
    $param = parse_ini_file('db.ini');
    try {
        $pdo = new pdo($param['url'], $param['user'], $param['pass']);
    }catch(Exception $e) {
        echo $e->getMessage();
    }
?>