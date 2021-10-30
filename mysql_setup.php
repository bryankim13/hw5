<?php

    /* Setup */
    include('database_connection.php');
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $db = new mysqli($dbserver, $dbuser, $dbpass, $dbdatabase);

    /* Setting up user table */
    $db->query("create table hw5user (
        uid int not null auto_increment,
        username text not null,
        email text not null,
        password text not null,
        primary key (uid));");

    /* Setting up question table */
    $db->query("create table transaction (
        tid int not null auto_increment,
        name text not null,
        date_transaction date not null,
        amount int not null,
        transaction_type varchar(255) not null,
        primary key (tid));");

    $db->query("create table history (
        tid int not null,
        uid int not null);");