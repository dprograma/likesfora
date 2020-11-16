<?php
class Likes
{
    public function showlikes($userid)
    {
        include "../directory.php";
        include "../config/config.php";

        $totallikes = "";
        $post = $mysqli->query("SELECT SUM(post_like_unlike) as postlikes FROM likes WHERE `userid` = '$userid'");
        $postlikes = $post->fetch_array()['postlikes'];

        $comment = $mysqli->query("SELECT SUM(like_unlike) as commentlikes FROM likes WHERE `userid` = '$userid'");
        $commentlikes = $comment->fetch_array()['commentlikes'];

        $totallikes = $postlikes + $commentlikes;

        return $totallikes;
    }
}
