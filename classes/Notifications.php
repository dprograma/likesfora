<?php
class Notifications{
    private $id;
    public function notify($friendsid,$type,$title,$body,$added,$updated){
        include "../directory.php";
        include "{$directory}config/config.php";
        $userId = $_SESSION['userid'];
        $sql = $mysqli->query("SELECT firstname, lastname FROM user WHERE `userId` = '$friendsid'");
        $row = $sql->fetch_assoc();
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $body = $firstname . " " . $lastname . " " . $body;
        $mysqli->query("INSERT INTO notifications (userid, friendsid, notificationtype, title, body, datecreated, dateupdated) VALUES('$userId','$friendsid', '$type', '$title', '$body', '$added', '$updated')");
        $this->id = $mysqli->insert_id;
    }
    public function delete($friendsid){
        include "../directory.php";
        include "{$directory}config/config.php";
        $insertid = $this->id;
        $mysqli->query("DELETE FROM notifications WHERE `id` = '$insertid' AND `friendsid` = '$friendsid'");
    }
}
