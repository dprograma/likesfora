<?php

class UploadPost{

public function uploadVideo($target_dir, $id1) {

$allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma");
$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

if ((($_FILES["file"]["type"] == "video/mp4")
|| ($_FILES["file"]["type"] == "audio/mp3")
|| ($_FILES["file"]["type"] == "audio/wma")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg"))

&& ($_FILES["file"]["size"] < 500000000)
&& in_array($extension, $allowedExts))

  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("material/videos/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
// EVEN THOUGH THIS IS IN SAME ELSE CONDITION THE MOVE IS NOT DONE
      move_uploaded_file($_FILES["file"]["tmp_name"], "material/videos/".$_FILES["file"]["name"]);
      echo "Stored in: " . "material/videos/" . $_FILES["file"]["name"];

//HERE IS WHERE I RETURN $PATH CORRECTLY TO SAVE IT INTO DATABASE
      $path = "material/videos/" . $_FILES["file"]["name"];
      return $path;
      }
    }
  }
else
  {
  echo "Invalid file";
  }
}
}