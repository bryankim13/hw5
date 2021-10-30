<?php

    /* Setup */
    include('database_connection.php');
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $db = new mysqli($dbserver, $dbuser, $dbpass, $dbdatabase);

    /* Setting up user table */
    $db->query("drop table if exists hw5user");
    $db->query("create table hw5user (
        uid int not null auto_increment,
        username text not null,
        email text not null,
        password text not null,
        primary key (uid));");

    /* Setting up question table */
    $db->query("drop table if exists transaction");
    $db->query("create table transaction (
        tid int not null auto_increment,
        uid int not null,
        name text not null,
        date_transaction date not null,
        amount float not null default 0,
        transaction_type varchar(255) not null,
        primary key (tid));");
