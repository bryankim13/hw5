<?php
// Bryan Kim bjk3yf, Paul Ok pso3td
// Sources: Class lecture and slides, W3School
// NOTE: Balance will only display properly after inputting a second transaction, not after first
// Links : https://cs4640.cs.virginia.edu/pso3td/hw5
           https://cs4640.cs.virginia.edu/bjk3yf/hw5
spl_autoload_register(function($classname) {
    include "classes/$classname.php";
});


// Join session or start one
session_start();

// Parse the URL
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$path = str_replace("/pso3td/hw5/", "", $path);
$parts = explode("/", $path);


// If the user's email is not set in the session, then it's not
// a valid session (they didn't get here from the login page),
// so we should send them over to log in first before doing
// anything else!
if (!isset($_SESSION["email"])) {
    // they need to see the login
    $parts = ["login"];
}

// Instantiate the controller and run
$finance = new FinanceController();
$finance->run($parts[0]);