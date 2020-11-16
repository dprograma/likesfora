  <?php
  include "partials/__header.php";
  if ($loggedin == 1 || $registered == 1) {
  ?>
    <!DOCTYPE html>
    <html>
    <?php $title = $firstname . "'s page";
    include "partials/__head.php"; ?>

    <body>
      <!-- likes class declaration for displaying total user likes -->
      <!-- top row for heading with logo and user account -->
      <?php include "partials/__nav2.php"; ?>
      <?php $margintop = "mt-5"; ?>
      <!-- adjustment to the page -->
      <div class="container-fluid containermobile">
        <!-- left scrollable part with column 8 for mobile view only -->
        <div class="col-md-8 col-12 carouselwrapper">
          <!--first row for carousel-->
          <?php include "partials/__carouselblock.php"; ?>
          <!-- second row for adding video, picture, likes and feelings -->
          <?php include "partials/__graphicsblock.php"; ?>
          <!-- friends post section -->
          <?php include "partials/__postsblock.php"; ?>
        </div>
        <!-- Right non-scrollable part with column 4 -->
        <div class="col-md-4 col-12 ml-auto fixed-top d-none d-md-block" style="top:120px;margin-right: 20px;">
          <!-- user story section -->
          <div><small><em>Your story</em></small></div>
          <hr />
          <?php include "partials/__storyblock.php"; ?>
          <!-- user profile item section -->
          <!-- first part of the section for friend request, friend list, and likes -->
          <?php include "partials/__friendblock.php"; ?>
        </div>
      </div>
      <div class="overlay" style="z-index:10000000000000000;"></div>
      <div id="editcontent2" class="customshadow popup" style="position:fixed; left:50%; top: 50%; transform: translate(-50%, -100%)"></div>
      <div id='ajax_loader' style="position: fixed; left: 50%; top: 50%; display: none;">
        <img src="../assets/images/gif/ajax-loader.gif">
      </div>
      <?php include "partials/__script.php"; ?>
      <script>
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
              var fas = eval("'#fas" + data.postid + "'");
              if (totalLikes > 0) {
                $(pos).removeClass('d-none');
                $(fas).css({
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
      </script>
    </body>

    </html>
  <?php
  } else {
    header("location:../index.php");
  }
