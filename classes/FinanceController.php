<?php

class FinanceController {

    private $db;
    
    private $url = "/pso3td/hw5";
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function run($command) {
        
        switch($command) {
            case "newTrans":
                $this->newTrans();
                break;
            case "transaction_history":
                $this->transaction_history();
                break;
            case "logout":
                $this->destroySession();
                break;
            case "login":
            default:
                $this->login();
                break;
        }
            
    }
    
    private function destroySession() {          
        session_destroy();

        session_start();
        header("Location:{$this->url}/login");
        return;
    }
    
    
    public function login() {
        // our login code from index.php last time!
        $error_msg = "";
        if (isset($_POST["email"])) { /// validate the email coming in
            $data = $this->db->query("select * from hw5user where email = ?;", "s", $_POST["email"]);
            if ($data === false) {
                $error_msg = "Error checking for user";
            } else if (!empty($data)) { 
                // user was found!
                // validate the user's password
                if (password_verify($_POST["password"], $data[0]["password"])) {
                    $_SESSION["username"] = $data[0]["username"];
                    $_SESSION["email"] = $data[0]["email"];
                    header("Location: {$this->url}/transaction_history");
                    return;
                } else {
                    $error_msg = "Invalid Password";
                }
            } else {
                $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $insert = $this->db->query("insert into hw5user (username, email, password) values (?, ?, ?);", "sss", $_POST["name"], $_POST["email"], $hash);
                if ($insert === false) {
                    $error_msg = "Error creating new user";
                } 
                
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["email"] = $_POST["email"];
                header("Location: {$this->url}/transaction_history");
                return;
            }

        }

        include "templates/login.php";
    }

    public function transaction_history() {
        if (!isset($_SESSION["email"])) {
            header("Location: {$this->url}/login/");
            return;
        }
        $data = $this->db->query("select * from hw5user where email = ?;", "s", $_SESSION["email"]);
        $uid = "";
        if ($data === false) {
            $error_msg = "Error checking for user";
        } else if (!empty($data)) {
            $uid = $data[0]["uid"];
        }

        $data2 = $this->db->query("select * from transaction where uid = ? order by date_transaction desc;", "i", $uid);
        if ($data2 === false) {
            $error_msg = "Error checking for user";
        }

        $user = [
            "name" => $_SESSION["username"],
            "email" => $_SESSION["email"],
            "uid" => $uid,
            "data2" => $data2
        ];

        include "templates/transaction.php";
    }

    public function newTrans() {
        if (!isset($_SESSION["email"])) {
            header("Location: {$this->url}/login/");
            return;
        } else {
            if (isset($_POST["name"])) {
                $data = $this->db->query("select * from hw5user where email = ?;", "s", $_SESSION["email"]);
                $uid = "";
                if ($data === false) {
                    $error_msg = "Error checking for user";
                } else if (!empty($data)) {
                    $uid = $data[0]["uid"];
                }
                $data2 = $this->db->query("insert into transaction (uid, name, date_transaction, amount, transaction_type) values (?, ?, ?, ?, ?);", "issis", $uid, $_POST["name"], $_POST["date"], $_POST["amount"], $_POST["type"]);
                if ($data === false) {
                    $error_msg = "Form failed to submit";
                }
                header("Location: {$this->url}/transaction_history/");
            }
        }
        include "templates/newTrans.php";
    }
}