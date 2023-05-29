<?php
    $server = 'db';
    $username = 'root';
    $password = 'csym019';

    $schema = 'course';

    $pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,
                [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);