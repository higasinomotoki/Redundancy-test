<?php
    define('HOSTNAME', 'mysql_master');
    define('DATABASE', 'test');
    define('USERNAME', 'root');
    define('PASSWORD', 'master');

    try {
        $db  = new PDO('mysql:host=' . HOSTNAME . ';dbname=' . DATABASE, USERNAME, PASSWORD);
        echo "OK\n";
    } catch (PDOException $e) {
        echo "NG\n";
        echo $e->getMessage()."\n";
    }
