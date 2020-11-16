<?php
include "partials/__header.php";
include "partials/__humanreadabledateandtime.php";
if ($loggedin == 1 || $registered == 1) {
?>
  <!DOCTYPE html>
  <html lang="en">
  <?php
  $title = "View Post";
  include "partials/__head.php"
  ?>

  <body>
    <?php include "partials/__nav2.php";
    $margin = "mt-5"; ?>
    <div class="container-fluid containermobile mt-5 ">
      <div class="row">
        <div class="col-md-8 col-12 mt-5" style="top:25px;">
          <?php
          if (isset($_POST['postid']) || isset($_POST['senderid'])) {
            $cmtpostid = filter_input(INPUT_POST, 'postid', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pstuserid = filter_input(INPUT_POST, 'senderid', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
          } elseif (isset($_SESSION['cmtpostid']) || isset($_SESSION['pstuserid'])) {
            $cmtpostid = $_SESSION['cmtpostid'];
            $pstuserid = $_SESSION['pstuserid'];
          } else {
            $cmtpostid = "";
            $pstuserid = "";
          }

          // $data = [
          //   'postid' => $cmtpostid,
          //   'userid' => $pstuserid
          // ];

          // $string = http_build_query($data);
          // $curl = curl_init();
          // $url = "http://localhost/likesfora/controllers/getpostlikeunlike.php";
          // curl_setopt($curl, CURLOPT_URL, $url);
          // curl_setopt($curl, CURLOPT_POST, true);
          // curl_setopt($curl, CURLOPT_POSTFIELDS, $string);
          // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
          // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
          // curl_exec($curl);

          // $ch = curl_init();
          // $base = "http://localhost/likesfora/controllers/fetchcommentcontroller.php";
          // curl_setopt($ch, CURLOPT_URL, $base);
          // curl_setopt($ch, CURLOPT_POST, true);
          // curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
          // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
          // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          // curl_exec($ch);

          $sql = "SELECT * FROM post p JOIN postimage i ON p.postid = i.postid AND p.postid = '$cmtpostid' JOIN user u ON u.userId = p.userid";
          $stmt = $mysqli->query($sql);
          $row = $stmt->fetch_assoc();
          if (!isset($_SESSION['cmtpostid']) || !isset($_SESSION['pstuserid'])) {
            $_SESSION['cmtpostid'] = $cmtpostid;
            $_SESSION['pstuserid'] = $pstuserid;
          }
          ?>
          <div class="card p-3 mb-4 customshadow postcard" id="<?php echo $row['userId']; ?>">
            <p class="friendboard font-weight-bold card-text">
              <img src="../assets/images/profile/<?php !empty($row['profileimage']) ? $dp = $row['profileimage'] : $dp = "avater.png";
                                                  echo $dp; ?>" alt="profile name" class="postimg mr-3" style="border-radius: 50%;">
              <?php echo $row['firstname'] . " " . $row['lastname']; ?>
            </p>
            <span class="hourspace pl-3"><?php echo humanreadable($row['datecreated']); ?></span>
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
            <p class="card-text"><?php echo $row['body']; ?></p>
            <div class="card p-3">
              <table class="table" style="table-layout:fixed;">
                <tr>
                  <td style='border:none;table-layout:fixed;'><img src="../assets/images/post/<?php echo $row['media']; ?>" style='width: 100%;height: 100%;'></td>
                </tr>
              </table>
            </div>
            <div class="card-body row p-2 mr-3 ml-3 otherstyle">
              <div class="mr-auto likesstyle">
                <img src="../assets/images/likes2.png" alt="👍" class="likesimg d-none" id="div<?php echo $cmtpostid; ?>"><span id="likes<?php echo $cmtpostid; ?>"></span>
              </div>
              <div class="ml-auto likesstyle">
                <?php
                $comment = $mysqli->query("SELECT COUNT(*) AS noofcomments FROM comment WHERE `postid` = '$cmtpostid'");
                $noofcomments = $comment->fetch_assoc()['noofcomments'];

                function addS($obj)
                {
                  if (($obj > 1) || ($obj == "0")) {
                    return "s";
                  }
                }
                ?>
                <span class="mr-2"><?php echo $noofcomments = !empty($noofcomments) ? $noofcomments : "0"; ?> comment<?php echo $s = addS($noofcomments); ?></span><span>412 Shares</span></p>
              </div>
            </div>
            <hr />
            <div class="card-body row p-2 mr-3 ml-3 otherstyle">
              <div class="mr-auto text-black-50 likebutton" onclick="displaylikes(this);">
                <form><input type="hidden" name="sid" value="<?php echo $userid; ?>">
                  <input type="hidden" name="pid" value="<?php echo $cmtpostid; ?>"><i class="fas fa-thumbs-up mr-2"></i>Like</form>
              </div>
              <div class="mx-0 text-black-50 commentplus" style="cursor: pointer;"><i class="fas fa-comment mr-2"></i>Comment</div>
              <div class="ml-auto text-black-50"><i class="fas fa-share mr-2"></i>Share</div>
            </div>
            <div class="row card-body">
              <div class="col-md-1">
                <img src="../assets/images/profile/<?php echo $profileimage; ?>" alt="profile image" class="postimg mr-3" style="border-radius: 50%;">
              </div>
              <div class="col-md-11 pt-1">
                <form id="commentform">
                  <input type="hidden" name="senderid" class="senderid" value="<?php echo $userid; ?>">
                  <input type="hidden" name="commentid" id="commentid" value="">
                  <input type="hidden" name="postid" value="<?php echo $cmtpostid; ?>">
                  <input type="text" name="comment" id="comment" class="form-control comment" placeholder="Write a quick comment." required data-emojiable="true">
                  <button type="submit" class="pr-2 pl-2 pt-1 pb-1 btn btn-block" style="font-size:0.75rem; box-shadow: none;"><i class="fas fa-upload pr-1 commenticon"></i>Submit Comment</button>
                </form>
                <div id="commentdisplay">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-12 mt-5" style="top:25px;">
          <?php
          include "partials/__storyblock.php";
          include "partials/__friendblock.php";
          ?>
        </div>
      </div>
    </div>
    <?php include "partials/__popup.php"; ?>
    <?php include "partials/__script.php"; ?>
    <script>
      var totalLikes = 0;
      var totalUnlikes = 0;

      function postReply(commentId) {
        $('#commentid').val(commentId);
        $(".comment").focus();
      }

      $("#commentform").on("submit", function(e) {
        e.preventDefault();
        $("#commentmessage").css('display', 'none');
        var str = $(this).serialize();
        $.ajax({
          url: "../controllers/addcommentcontroller.php",
          data: str,
          type: 'post',
          success: function(response) {
            var result = eval('(' + response + ')');
            if (response) {
              $(".comment").empty();
              $("#commentid").val("");
              listComment();
            } else {
              alert("Failed to add comments!");
              return false;
            }
          }
        });
      });

      $(document).ready(function() {
        listComment();
      });

      function listComment() {
        $.ajax({
          url: "../controllers/fetchcommentcontroller.php",
          type: "post",
          datatype: "JSON",
          success: function(data) {
            var data = JSON.parse(data)
            var comments = "";
            var replies = "";
            var item = "";
            var parent = -1;
            var results = new Array();

            var list = $("<ul style='list-style:none;'>");
            var item = $("<li>").html(comments);
            for (var i = 0;
              (i < data.length); i++) {
              var commentId = data[i]['commentid'];
              parent = data[i]['parentcommentid'];
              var obj = getLikesUnlikes(commentId);

              if (parent == "0") {

                if (data[i]['like_unlike'] >= 1) {
                  like_icon = "<img src='../assets/images/post/like.png'  id='unlike_" + data[i]['commentid'] + "' class='like-unlike'  onClick='likeOrDislike(" + data[i]['commentid'] + "," + data[i]['senderid'] + ",-1)' />";
                  like_icon += "<img style='display:none;' src='../assets/images/post/unlike.png' id='like_" + data[i]['commentid'] + "' class='like-unlike' onClick='likeOrDislike(" + data[i]['commentid'] + "," + data[i]['senderid'] + ",1)' />";
                } else {
                  like_icon = "<img style='display:none;' src='../assets/images/post/like.png'  id='unlike_" + data[i]['commentid'] + "' class='like-unlike'  onClick='likeOrDislike(" + data[i]['commentid'] + "," + data[i]['senderid'] + ",-1)' />";
                  like_icon += "<img src='../assets/images/post/unlike.png' id='like_" + data[i]['commentid'] + "' class='like-unlike' onClick='likeOrDislike(" + data[i]['commentid'] + "," + data[i]['senderid'] + ",1)' />";
                }

                comments = "<div class='card mt-2 mb-2' style='font-size:0.75rem;'>" +
                  "<div class='card-header'>from <b>" + data[i]['comment_sender_name'] + "</b> at <i>" + humanreadable(data[i]['datecreated']) + "</i></div>" +
                  "<div class='card-body'>" + data[i]['comment'] + "</div>" +
                  "<div class='card-footer' align='right'>" + "<div class='post-action' align='left'>" + like_icon + "&nbsp;" + "<span id='likes_" + commentId + "'> " + totalLikes + " likes </span></div>" + "<button class='rounded-pill p-2' onClick='postReply(" + commentId + ")' style='cursor:pointer;'>Reply</button></div></div>";

                var item = $("<li>").html(comments);
                list.append(item);
                var reply_list = $("<ul style='list-style:none;'>");
                item.append(reply_list);
                listReplies(commentId, data, reply_list);
              }
            }
            $("#commentdisplay").html(list);
          }
        });
      }

      function listReplies(commentId, data, list) {
        for (var i = 0;
          (i < data.length); i++) {
          var obj = getLikesUnlikes(data[i].commentid);
          if (commentId == data[i].parentcommentid) {

            if (data[i]['like_unlike'] >= 1) {
              like_icon = "<img src='../assets/images/post/like.png'  id='unlike_" + data[i]['commentid'] + "' class='like-unlike'  onClick='likeOrDislike(" + data[i]['commentid'] + "," + data[i]['senderid'] + ",-1)' />";
              like_icon += "<img style='display:none;' src='../assets/images/post/unlike.png' id='like_" + data[i]['commentid'] + "' class='like-unlike' onClick='likeOrDislike(" + data[i]['commentid'] + "," + data[i]['senderid'] + ",1)' />";
            } else {
              like_icon = "<img style='display:none;' src='../assets/images/post/like.png'  id='unlike_" + data[i]['commentid'] + "' class='like-unlike'  onClick='likeOrDislike(" + data[i]['commentid'] + "," + data[i]['senderid'] + ",-1)' />";
              like_icon += "<img src='../assets/images/post/unlike.png' id='like_" + data[i]['commentid'] + "' class='like-unlike' onClick='likeOrDislike(" + data[i]['commentid'] + "," + data[i]['senderid'] + ",1)' />";
            }

            var comments = "<div class='card mt-2 mb-2' style='font-size:0.75rem;margin-left:38px;'>" +
              "<div class='card-header'>from <b>" + data[i]['comment_sender_name'] + " </b> at <i>" + humanreadable(data[i]['datecreated']) + "</i></div>" +
              "<div class='card-body'>" + data[i]['comment'] + "</div>" +
              "<div class='card-footer' align='left'>" + "<div class='post-action'>" + like_icon + "&nbsp;" + "<span id='likes_" + data[i]['commentid'] + "'> " + totalLikes + " likes </span></div>" + "<button class='rounded-pill p-2' onClick='postReply(" + data[i]['commentid'] + ")' style='cursor:pointer;'>Reply</button></div>" +
              "</div></div>";
            var item = $("<li>").html(comments);
            var reply_list = $("<ul style='list-style:none;'>");
            list.append(item);
            item.append(reply_list);
            listReplies(data[i].commentid, data, reply_list);
          }
        }
      }

      function getLikesUnlikes(commentId) {

        $.ajax({
          type: 'POST',
          async: false,
          url: '../controllers/getlikeunlike.php',
          data: {
            commentid: commentId
          },
          success: function(data) {
            data = JSON.parse(data);
            totalLikes = data.totallikes;
          }

        });

      }

      function getPostLikesUnlikes() {
        $.ajax({
          type: 'POST',
          async: false,
          url: '../controllers/getpostlikeunlike.php',
          success: function(data) {
            var data = JSON.parse(data);
            var totalLikes = data.posttotallikes;
            var post = eval("'#likes" + data.postid + "'");
            var pos = eval("'#div" + data.postid + "'");
            if (totalLikes > 0) {
              $(pos).removeClass('d-none');
              $("i", "form").css({
                'color': '#157efb'
              });
              $(post).html(totalLikes + " Like" + addS(totalLikes));
            }
          }
        });
      }

      $(document).ready(function() {
        getPostLikesUnlikes();
      });

      function postLikeOrDislike(postid, senderid, post_like_unlike) {
        $.ajax({
          url: '../controllers/postlikeunlike.php',
          async: false,
          type: 'post',
          data: {
            userid: senderid,
            postid: postid,
            post_like_unlike: post_like_unlike
          },
          dataType: 'json',
          success: function(data) {

            $("#likes_" + commentid).text(data + " likes");

            if (like_unlike == 1) {
              $("#like_" + commentid).css("display", "none");
              $("#unlike_" + commentid).show();
            }

            if (like_unlike == -1) {
              $("#unlike_" + commentid).css("display", "none");
              $("#like_" + commentid).show();
            }

          },
          error: function(data) {
            alert("error : " + JSON.stringify(data));
          }
        });
      }


      function likeOrDislike(commentid, senderid, like_unlike) {

        $.ajax({
          url: '../controllers/commentlikeunlike.php',
          async: false,
          type: 'post',
          data: {
            userid: senderid,
            commentid: commentid,
            like_unlike: like_unlike
          },
          dataType: 'json',
          success: function(data) {

            $("#likes_" + commentid).text(data + " likes");

            if (like_unlike == 1) {
              $("#like_" + commentid).css("display", "none");
              $("#unlike_" + commentid).show();
            }

            if (like_unlike == -1) {
              $("#unlike_" + commentid).css("display", "none");
              $("#like_" + commentid).show();
            }

          },
          error: function(data) {
            alert("error : " + JSON.stringify(data));
          }
        });
      }

      function addS(obj) {
        if (obj > 1) {
          var text = "s";
          return text;
        } else {
          return "";
        }
      }

      function displaylikes(obj) {
        var formdata = $("form", obj).serialize();
        $.ajax({
          url: "../controllers/postlikeunlike.php",
          type: 'POST',
          data: formdata,
          datatype: 'JSON',
          success: function(data) {
            var data = JSON.parse(data);
            var post = eval("'#likes" + data.postid + "'");
            var pos = eval("'#div" + data.postid + "'");
            if (data.posttotallikes > 0) {
              $(pos).removeClass('d-none');
              $("i", obj).css({
                'color': '#157efb'
              });
              $(post).html(data.posttotallikes + " Like" + addS(data.posttotallikes));
            }else{
                $(pos).addClass('d-none');
                $("i", obj).css({
                  'color': '#7f7f7f'
                });
                $(post).html("");
              }
          }
        });
      }

      function humanreadable(timestamp) {
        var time_ago = new Date(timestamp).getTime();
        var current_time = new Date().getTime();
        var time_difference = current_time - time_ago;
        var elapsed_time = time_difference;

        var temp = Math.floor(elapsed_time / 1000);
        var seconds = temp;
        var minutes = Math.floor(seconds / 60); // value 60 is seconds  
        var hours = Math.floor(seconds / 3600); //value 3600 is 60 minutes * 60 sec  
        var days = Math.floor(seconds / 86400); //86400 = 24 * 60 * 60;  
        var weeks = Math.floor(seconds / 604800); // 7*24*60*60;  
        var months = Math.floor(seconds / 2592000); //((365+365+365+365+366)/5/12)*24*60*60  
        var years = Math.floor(seconds / 31536000); //(365+365+365+365+366)/5 * 24 * 60 * 60

        if (seconds <= 60) {

          return "Just Now";

        } else if (minutes <= 60) {

          if (minutes == 1) {

            return "one minute ago";

          } else {

            return minutes + " minutes ago";

          }

        } else if (hours <= 24) {

          if (hours == 1) {

            return "an hour ago";

          } else {

            return hours + " hrs ago";

          }

        } else if (days <= 7) {

          if (days == 1) {

            return "yesterday";

          } else {

            return days + " days ago";

          }

        } else if (weeks <= 4.3) {

          if (weeks == 1) {

            return "a week ago";

          } else {

            return weeks + " weeks ago";

          }

        } else if (months <= 12) {

          if (months == 1) {

            return "a month ago";

          } else {

            return months + " months ago";

          }

        } else {

          if (years == 1) {

            return "one year ago";

          } else {

            return years + " years ago";

          }
        }
      }
    </script>
  </body>

  </html>
<?php
}
?>