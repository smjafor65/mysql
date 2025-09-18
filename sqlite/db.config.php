<?php

try {

    $db = new PDO("sqlite:db.sqlite", "", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
} catch (PDOException $ex) {
    echo $ex->getMessage();
}

// $db->query("create table patients(
// id integer primary key autoincrement,
// name text not null, 
// age integer,
// mobile text
// );
// ");

// $db->query("insert into patients values
// (null, 'Sadik',28,'017xxxxx'),
// (null, 'Kayem',50,'018xxxxx'),
// (null, 'Abid',52,'019xxxxx'),
// (null, 'Nazmul',35,'014xxxxx');
// ");

// $statement = $db->query("select * from patients");

// print_r($statement->fetchAll());
