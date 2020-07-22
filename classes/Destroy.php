<?php

class Destroy
{
    public $url;
    public $table;
    public function delete($url, $table)
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        //start a session
        session_start();

        //create a database connection
        $mysqli = new mysqli('localhost', 'root', '', 'handyman_8791');
        //obtain the current session id and compare with that in the database
        $sessionid = session_id();

        $sql = "SELECT * FROM " . $table . " WHERE `sessionid` = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $sessionid);
        $stmt->execute();
        $stmt->store_result();
        //if session id matches then delete the affected row
        if ($stmt->num_rows() > 0) {
            $sqs = "DELETE FROM " . $table . " WHERE `sessionid` = ?";
            $stms = $mysqli->prepare($sqs);
            $stms->bind_param('s', $sessionid);
            $stms->execute();
            //if row deletion is successful, output a message in a session
            $stmt->store_result();
            if ($stms->affected_rows > 0) {
                $_SESSION['deleted'] = "Account successfully deleted!";
                header("location:$url");
            } else {
                echo "error deleting record.";
            }
        } else {
            echo "No such session id";
        }
    }

    public function signout($table, $url)
    {
        //connect to mysqli database
        include "../config/config.php";
    
        //remove logged in value from database
        $log = 0;
        $sql = $mysqli->prepare("UPDATE " . $table . " SET `loggedin` = ? WHERE `email` = ?");
        $sql->bind_param('is', $log, $email);
        $sql->execute();
        //unset current session
        session_unset();
        session_destroy();

        header("location:$url");
    }
}