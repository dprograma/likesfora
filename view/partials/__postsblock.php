<?php
require '../vendor/autoload.php';
include "__humanreadabledateandtime.php";
?>
<div class="row" style="margin: auto;">
  <?php
  function addS($obj)
  {
    if (($obj > 1) || ($obj == "0")) {
      return "s";
    }
  }
  $sql = "SELECT * FROM post WHERE `userid` = '$userid' OR `userid` IN (SELECT `friendsid` FROM friends WHERE `userid` = '$userid') ORDER BY `datecreated` DESC";
  $stmt = $mysqli->query($sql);
  $post = [];
  while ($row = $stmt->fetch_assoc()) {
    $post[] = $row;
  }
  foreach ($post as $key => $post) {
    $postid = $post['postid'];
    $postuserid = $post['userid'];
    $postbody = $post['body'];
    $postdate = $post['dateupdated'];

    $selectid = "SELECT * FROM user WHERE `userId` = '$postuserid'";
    $stms = $mysqli->query($selectid);
    $user = $stms->fetch_assoc();
    $uid = $user['userId'];
    $fname = $user['firstname'];
    $lname = $user['lastname'];
    $pimage = $user['profileimage'];
    $cimage = $user['coverimage'];

    $selectimg = "SELECT `postid`,`media` FROM postimage WHERE `postid` = '$postid'";
    $stmi = $mysqli->query($selectimg);
  ?>
    <div class="card p-3 mb-4 customshadow postcard" id="<?php echo $uid; ?>">
      <p class="friendboard font-weight-bold card-text">
        <img src="../assets/images/profile/<?php !empty($pimage) ? $dp = $pimage : $dp = "avater.png";
                                            echo $dp; ?>" alt="profile name" class="postimg mr-3" style="border-radius: 50%;">
        <?php echo $fname . " " . $lname; ?>
      </p>
      <span class="hourspace pl-3"><?php echo humanreadable($postdate); ?></span>

      <ul class="nav nav-tabs-custom imgpos">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#" role="tab" aria-haspopup="true" aria-expanded="false" data-flip='false'><img src="../assets/images/caretdown2.png" alt="see more" class="dwcaret"></a>
          <div class="dropdown-menu customshadow dropdown-menu-right ddown">
            <a class="dropdown-item" href="#"><i class="fas fa-bookmark mr-2"></i>Save Your Post<p class="pl-4"><small>Add this to your saved items.</small></p></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><i class="fas fa-bell mr-2"></i>Turn On Notification For This Post.<p class="pl-4"></p></a>
            <a class="dropdown-item" href="#"><i class="fas fa-code mr-2"></i>Embed<p class="pl-4"></p></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><i class="fas fa-times-circle mr-2"></i>Hide Your Post<p class="pl-4"><small>See less of this type of post.</small></p></a>
            <a class="dropdown-item" href="#"><i class="fas fa-clock mr-2"></i>Snooze Profile Name for 15 Days<p class="pl-4"><small>Temporarily Stop Seeing This Post.</small></p></a>
            <a class="dropdown-item" href="#"><i class="fas fa-times mr-2"></i>Unfollow Profile name<p class="pl-4"><small>Stop Seeing This Post But Remain Friends.</small></p></a>
            <a class="dropdown-item" href="#"><i class="fas fa-minus-square mr-2"></i>Report This Post<p class="pl-4"><small>I Have My Concerns About This Post.</small></p></a>
          </div>
        </li>
      </ul>

      <p class="card-text"><?php echo strlen($postbody) > 100 ? substr($postbody, 0, 100) . "<form action='viewpost.php' method='post'><input type='hidden' name='postid' value='$postid'><button type='submit' name='action' class='bg-white pr-2 pl-2' style='font-size:0.85rem;color:grey;'> ...Read more</button></form>" : $postbody; ?></p>
      <div class="card p-3">
        <table class="table" style="table-layout:fixed;">
          <?php
          $i = 0;
          while ($photo = $stmi->fetch_assoc()) {
            $media = "../assets/images/post/" . $photo['media'];
            $image = "../assets/images/post/" . $photo['media'];

            if ($i % 3 == 0) {
              echo "<tr>";
            }

            // $mimetype = mime_content_type($media);
            // $filetype = explode('/', $mimetype)[0];
            // if ($filetype == 'video') {
            //   $postimageid = "../assets/images/post/" . $photo['postid'];
            //   $image = $postimageid . ".jpg";
            //   $ffmpeg = FFMpeg\FFMpeg::create();
            //   $video = $ffmpeg->open($media);
            //   $video
            //     ->filters()
            //     ->resize(new FFMpeg\Coordinate\Dimension(320, 240))
            //     ->synchronize();
            //   $video
            //     ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(10))
            //     ->save($image);
            //}
            echo "<td style='border:none;table-layout:fixed;'><img src='$image' style='width: 100%;height: 100%;'></td>";

            if ($i % 3 == 2) {
              echo "</tr>";
            }
            $i++;
          }
          ?>
        </table>
      </div>
      <div class="card-body row p-2 mr-3 ml-3 otherstyle">
        <?php
        $posttotallikes = "";
        $likeQuery = "SELECT SUM(post_like_unlike) AS postLikesCount FROM likes WHERE `postid`='$postid'";
        $resultLikeQuery = $mysqli->query($likeQuery);
        $fetchLikes = $resultLikeQuery->fetch_array();
        if (isset($fetchLikes['postLikesCount'])) {
          $posttotallikes = $fetchLikes['postLikesCount'];
        }
        ?>
        <div class="row mr-auto likesstyle">
          <?php
          if ($posttotallikes > 0) {
          ?>
            <img src="../assets/images/likes2.png" alt="👍" class="likesimg" id="div<?php echo $postid; ?>" style="margin-right:0px;"><span id="likes<?php echo $postid; ?>" style="margin-left:0px;"><?php echo $posttotallikes . " Like" . addS($posttotallikes); ?></span>
          <?php
          }else{
            ?>
            <img src="../assets/images/likes2.png" alt="👍" class="likesimg d-none" id="div<?php echo $postid; ?>"><span id="likes<?php echo $postid; ?>"><?php echo ""; ?></span>
          <?php
          }
          ?>
        </div>
        <div class="ml-auto likesstyle">
          <?php
          $comment = $mysqli->query("SELECT COUNT(*) AS noofcomments FROM comment WHERE `postid` = '$postid'");
          $noofcomments = $comment->fetch_assoc()['noofcomments'];
          ?>
          <span class="mr-2"><?php echo $noofcomments = !empty($noofcomments) ? $noofcomments : "0"; ?> comment<?php echo $s = addS($noofcomments); ?></span><span>412 Shares</span></p>
        </div>
      </div>
      <hr />
      <div class="card-body row p-2 mr-3 ml-3 otherstyle">
        <div class="mr-auto text-black-50 likebutton" onclick="displaylikes(this);">
          <form>
            <input type="hidden" name="sid" value="<?php echo $postuserid; ?>">
            <input type="hidden" name="pid" value="<?php echo $postid; ?>">
            <?php if($posttotallikes > 0){$style="style='color:#157efb;'";}else{$style="style='color:#7f7f7f;'";} ?><i class="fas fa-thumbs-up mr-2" id="fas<?php echo $postid; ?>" <?php echo $style; ?>></i>Like
          </form>
        </div>
        <div class="mx-0 text-black-50 commentplus" style="cursor: pointer;">
          <form action="viewpost.php" method="post"><input type="hidden" name="postid" value="<?php echo $postid; ?>"><button type="submit" name="action" style="background: transparent;"><i class="fas fa-comment mr-2 text-black-50"></i>Comment</button></form>
        </div>
        <div class="ml-auto text-black-50"><i class="fas fa-share mr-2"></i>Share</div>
      </div>
      <div class="row card-body">
        <div class="col-md-1">
          <img src="../assets/images/profile/<?php echo $profileimage; ?>" alt="profile image" class="postimg mr-3" style="border-radius: 50%;">
        </div>
        <div class="col-md-11 pt-1">
          <form action="viewpost.php" method="post">
            <!-- <input type="hidden" name="postid" class="postid" value="<?php echo $postid; ?>">
          <input type="hidden" name="loggedinuserid" class="loggedinuserid" value="<?php echo $userid; ?>">
          <input type="hidden" name="commentid" class="commentid" value="<?php echo $userid; ?>"> -->
            <!-- <input type="text" name="comment" class="form-control comment" placeholder="Write a quick comment." data-emojiable="true"> -->
            <!-- <button type="submit" class="pr-2 pl-2 pt-1 pb-1 btn btn-block" style="font-size:0.75rem; box-shadow: none;"><i class="fas fa-upload pr-1 commenticon"></i>Submit Comment</button> -->
            <input type="hidden" name="senderid" class="senderid" value="<?php echo $uid; ?>">
            <input type="hidden" name="postid" value="<?php echo $postid; ?>">
            <button type="submit" name="action" id="action" value="View Post" class="rounded-pill btn-block pt-2 pb-2 pl-3 text-left <?php echo $postid; ?>">Write a quick comment...</button>
          </form>
          <!-- <div class="commentmessage"></div> -->
          <!-- <div class="commentdisplay" id="<?php echo "post" . $postid; ?>">
          
        </div> -->
        </div>
      </div>
    </div>
  <?php } ?>
</div>