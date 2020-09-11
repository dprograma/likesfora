<?php

class Upload
{

    public function uploadfile($table, $fieldname, $target_dir, $redirect, $id)
    {
        include "../config/config.php";
        $target_file = $target_dir . basename($_FILES['profileimage']['name']);
        $successmsg = "";
        $errormsg = "";
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $imageName = $target_dir . $id . "." . $imageFileType;
        $imagefile = $id . "." . $imageFileType;

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["profileimage"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["profileimage"]["size"] > 1000000) {
            $errormsg = "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $errormsg =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $errormsg .= " Your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["profileimage"]["tmp_name"], $imageName)) {
                $email = $_SESSION['email'];
                $stmt = $mysqli->query("UPDATE " . $table . " SET `" . $fieldname . "` = '$imagefile' WHERE `email` = '$email'");
                if ($stmt) {
                    $sql = $mysqli->query("SELECT * FROM " . $table . " WHERE `email` = '$email' ");
                    $row = $sql->fetch_assoc();
                    $_SESSION['profileimage'] = $row['profileimage'];
                    $_SESSION['coverimage'] = $row['coverimage'];
                }
                $successmsg = "The file " . basename($_FILES["profileimage"]["name"]) . " has been uploaded.";
            } else {
                $errormsg = "Sorry, there was an error uploading your file.";
            }
        }
        echo json_encode(['successmsg' => $successmsg, 'errormsg' => $errormsg], JSON_PRETTY_PRINT);
    }
}
