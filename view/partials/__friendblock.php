<div class="row pl-2 pr-2 mb-2">
  <div class="card customshadow">
    <div class="card-body">
      <div class="row">
        <div class="col-md-6 col-6">
          <div class="card border-top-0 border-left-0 border-bottom-0 border-right-0">
            <p class="friendboard">
              <a class="text-decoration-none" href="../view/friendrequest.php" style="color:inherit;">
                <img src="../assets/images/request.png" alt="friend request" class="imgboard mr-3">Friend Request
              </a>
            </p>
            <p class="indicatortext">
              <a class="text-decoration-none" href="../view/friendrequest.php" style="color:inherit;"><?php if ($request > 0) { ?><img src="../assets/images/online2.png" alt="friend requests" class="rqst"><?php echo $request; ?> friends requests</a><?php } ?>
            </p>
            <p></p>
            <p class="friendboard">
              <a class="text-decoration-none" href="../view/friendlist.php" style="color:inherit;"><img src="../assets/images/friendlist2.png" alt="friend list" class="imgboard mr-3">Friend List</a>
            </p>
            <p class="indicatortext"><a class="text-decoration-none" href="../view/friendlist.php" style="color:inherit;">See all your friends</a></p>
            <p></p>
            <p class="friendboard">
              <img src="../assets/images/likes2.png" alt="your likes" class="imgboard mr-3">Your Likes
            </p>
            <p class="indicatortext">View your likes history</p>
          </div>
        </div>
        <div class="col-md-6 col-6">
          <div class="card border-top-0 border-left-0 border-bottom-0 border-right-0">
            <p class="friendboard">
              <img src="../assets/images/videos.png" alt="my videos" class="imgboard mr-3">Videos
            </p>
            <p class="indicatortext">See your videos</p>
            <p></p>
            <p class="friendboard">
              <img src="../assets/images/events.png" alt="friend list" class="imgboard mr-3">Events
            </p>
            <p class="indicatortext">Your upcoming events</p>
            <p></p>
            <p class="friendboard">
              <img src="../assets/images/memories.png" alt="your likes" class="imgboard mr-3">Memories
            </p>
            <p class="indicatortext">Check on your past activities</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>