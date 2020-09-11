<?php include "__humanreadabledateandtime.php"; ?>
<div class="row" style="margin: auto;">
  <?php
  $sql =  "SELECT * FROM user u INNER JOIN friends f ON u.userId = f.friendsid AND f.userid = ? INNER JOIN post p ON f.friendsid = p.userid OR p.userid = ?";
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param('ii', $userid, $userid);
  $stmt->execute();
  $result = $stmt->get_result();
  $rst = [];
  while ($pic = $result->fetch_assoc()) {
    $rst[] = $pic['postid'];
  }
  $list = [];
  foreach ($rst as $r) {
    $list[] = "'$r'";
  }
  $list =  implode(',', $list);
  $list = "(" . $list . ")";
  $select = "SELECT * FROM postimage WHERE `postid` IN $list";
  $statement = $mysqli->query($select);

  $query =  "SELECT * FROM user u INNER JOIN friends f ON u.userId = f.friendsid AND f.userid = ? INNER JOIN post p ON f.friendsid = p.userid OR p.userid = ?";
  $stms = $mysqli->prepare($query);
  $stms->bind_param('ii', $userid, $userid);
  $stms->execute();
  $res = $stms->get_result();
  while ($row = $res->fetch_assoc()) {
  ?>
    <div class="card p-3 mb-4 customshadow">
      <p class="friendboard font-weight-bold card-text">
        <img src="../assets/images/profile/<?php !empty($row['profileimage']) ? $dp = $row['profileimage'] : $dp = "avater.png";
                                            echo $dp; ?>" alt="profile name" class="postimg mr-3" style="border-radius: 50%;">
        <?php echo $row['firstname'] . " " . $row['lastname']; ?>
      </p>
      <span class="hourspace pl-3"><?php echo humanreadable($row['dateupdated']); ?></span>

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

      <p class="card-text"><?php echo $row['body'] ?></p>
      <div class="card p-3">
        <table class="table">
          <?php
          $i = 0;
          while ($photo = $statement->fetch_assoc()) {
            if ($i % 3 == 0) {
              echo "<tr>";
            }
            echo "<embed src='../assets/images/post/{$photo['media']}' autostart='false' class='' style='width: 100%'>";

            if ($i % 3 == 2) {
              echo "</tr>";
            }
            $i++;
          }
          ?>
        </table>
      </div>
      <div class="card-body row p-2 mr-3 ml-3 otherstyle">
        <div class="mr-auto likesstyle">
          <img src="../assets/images/likes2.png" alt="👍" class="likesimg"><img src="../assets/images/smile.png" alt="😊" class="likesimg">20K
        </div>
        <div class="ml-auto likesstyle">
          <span class="mr-2">4.2K Comments</span><span>412 Shares</span></p>
        </div>
      </div>
      <hr />
      <div class="card-body row p-2 mr-3 ml-3 otherstyle">
        <div class="mr-auto text-black-50"><i class="fas fa-thumbs-up mr-2"></i>Like</div>
        <div class="mx-0 text-black-50"><i class="fas fa-comment mr-2"></i>Comment</div>
        <div class="ml-auto text-black-50"><i class="fas fa-share mr-2"></i>Share</div>
      </div>
      <div class="row card-body">
        <div class="col-md-1">
          <img src="../assets/images/profile/<?php echo $profileimage; ?>" alt="profile image" class="postimg mr-3" style="border-radius: 50%;">
        </div>
        <div class="col-md-11 pt-1">
          <form action="">
            <input type="text" name="" id="" class="form-control" placeholder="Write a quick comment.">
          </form>
        </div>
      </div>
    </div>
  <?php } ?>
</div>