  <?php
  include "partials/__header.php";
  if ($loggedin == 1 || $registered == 1) {
  ?>
    <!DOCTYPE html>
    <html>

    <?php $title = $firstname . "'s page";
    include "partials/__head.php"; ?>

    <body>
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
    </body>

    </html>
  <?php
  } else {
    header("location:../index.php");
  }
