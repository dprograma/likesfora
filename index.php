<?php

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LikesFora</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/app.css">
  <link rel="stylesheet" href="assets/fonts/font.css">
  <script type="text/javascript" src="assets/js/app.js"></script>
</head>

<body>
  <!-- top row for heading with logo and user account -->

  <nav class="topbar col-md-12 col-12">

    <ul class="nav nav-tabs">
      <img src="assets/images/logo.png" alt="LikesFora logo" class="logo">
      <li class="nav-item dropdown ml-auto list">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <img src="assets/images/story1.jpg" alt="user profile" class="profileimage">
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#"><i class="fas fa-tachometer-alt mr-2"></i> Timeline<p class="ml-4"><small><em>See your timeline.</em></small></p></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><i class="fas fa-user-circle mr-2"></i> User name<p class="ml-4"><small><em>Your profile.</em></small></p></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i> Settings<p></p></a>
          <a class="dropdown-item" href="#"><i class="fas fa-question-circle mr-2"></i> Help and Support<p></p></a>
          <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt mr-2"></i> Logout<p></p></a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- second navigation after the top bar -->
  <nav class="navbar navbar-expand-lg navbar-dark secondnav sticky-top" style="background-color:black;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto text-white-50">
        <li class="nav-item active">
          <a class="nav-link" href="#"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-users"></i> Group</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-plus"></i> Create
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#"><i class="fas fa-edit mr-2"></i> Post<p class="ml-4"><small><em>Share your post to friends.</em></small></p></a>
            <a class="dropdown-item" href="#"><i class="fas fa-book-open mr-2"></i> Story<p class="ml-4"><small><em>Share a video or text to your friends.</em></small></p></a>
            <a class="dropdown-item" href="#"><i class="far fa-star mr-2"></i> Event<p class="ml-4"><small><em>Add a life even and share.</em></small></p></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><i class="fas fa-users mr-2"></i> Group<p class="ml-4"><small><em>Join a group of friends and post comments.</em></small></p></a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" title="Notification"><i class="fas fa-bell"></i> Notification</a>
        </li>
        <li>
          <a href="#" class="nav-link" title="Video"><i class="fas fa-video" aria-hidden="true"></i> Video</a>
        </li>
        <li>
          <a href="#" class="nav-link" title="Audio"><i class="fa fa-audio-description" aria-hidden="true"></i> Audio</a>
        </li>
      </ul>
      <div class="form-group has-search my-2 my-lg-0">
        <span class="fa fa-search form-control-feedback"></span>
        <input type="search" class="form-control searchbg text-sm" placeholder="Looking for?">
      </div>
    </div>
  </nav>

  <!--main page wrapper -->
  <div class="container-fluid">
    <div class="row" style="margin: auto;">
      <!--add a carousel -->
      <div class="col-md-8 col-12 carouselwrapper">
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="assets/images/slider1.png" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="assets/images/slider2.png" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="assets/images/slider3.png" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <!--starting a flex box for user story section-->
      <div class="col-md-4 col-12 carouselwrapper">
        <div><small><em>Your story</em></small></div>
        <hr />
        <div class=" row d-flex flex-row pl-2 pr-2">
          <div class="col-md-4 col-4">
            <div class="card bg-dark text-white cardbg">
              <i class="fas fa-plus hoverstory" style="text-align:center; line-height:71px;"></i>
            </div>
          </div>
          <div class="col-md-4 col-4">
            <div class="card bg-dark text-white cardbg">
              <img src="assets/images/story1.jpg" class="card-img hoverstory">
              <div class="card-img-overlay">
                <h6 class="card-title">My Story</h6>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-4">
            <div class="card bg-dark text-white cardbg ">
              <img src="assets/images/story2.jpg" class="card-img hoverstory">
              <div class="card-img-overlay">
                <h6 class="card-title">My Story</h6>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-4">
            <div class="card bg-dark text-white cardbg">
              <img src="assets/images/story3.jpg" class="card-img hoverstory">
              <div class="card-img-overlay">
                <h6 class="card-title">My Story</h6>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-4">
            <div class="card bg-dark text-white cardbg">
              <img src="assets/images/story4.jpg" class="card-img hoverstory">
              <div class="card-img-overlay">
                <h6 class="card-title">My Story</h6>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-4">
            <div class="card bg-dark text-white cardbg">
              <img src="assets/images/story5.jpg" class="card-img hoverstory">
              <div class="card-img-overlay">
                <h6 class="card-title">My Story</h6>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-4">
            <div class="card bg-dark text-white cardbg">
              <img src="assets/images/story6.jpg" class="card-img hoverstory">
              <div class="card-img-overlay">
                <h6 class="card-title">My Story</h6>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-4">
            <div class="card bg-dark text-white cardbg">
              <img src="assets/images/story7.jpg" class="card-img hoverstory">
              <div class="card-img-overlay">
                <h6 class="card-title">My Story</h6>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-4">
            <div class="card bg-dark text-white cardbg">
              <img src="assets/images/story8.jpg" class="card-img hoverstory">
              <div class="card-img-overlay">
                <h6 class="card-title">My Story</h6>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-4">
            <div class="card bg-dark text-white cardbg">
              <img src="assets/images/story9.jpg" class="card-img hoverstory">
              <div class="card-img-overlay">
                <h6 class="card-title">My Story</h6>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-4">
            <div class="card bg-dark text-white cardbg">
              <img src="assets/images/story10.jpg" class="card-img hoverstory">
              <div class="card-img-overlay">
                <h6 class="card-title">My Story</h6>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-4">
            <div class="card bg-dark text-white cardbg">
              <img src="assets/images/story11.jpg" class="card-img hoverstory">
              <div class="card-img-overlay">
                <h6 class="card-title">My Story</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--add a section for send posts, videos, pictures and feelings -->
    <div class="row" style="margin: auto;">
      <div class="col-md-8 col-12">
        <div class="card mt-5 p-2 customshadow">
          <p class="text-center mb-2">Add Video <img src="assets/images/addvideo.png" alt="add video" class="mr-5 imgicon"> Photo <img src="assets/images/picture.png" alt="add images" class="mr-5 imgicon"> Buy likes <img src="assets/images/like&getpaid.png" alt="buy likes" class="mr-5 pb-2 imgicon"> How are you feeling? <img src="assets/images/smile.png" alt="how are you feeling?" class="imgicon"></p>
          <hr />
          <div class="card-body pt-1">
            <div class="card-text">
              <img src="assets/images/story1.jpg" alt="profle name" class="postimg mr-1"> Say something to friends...
            </div>
            <form method="get" action="">
              <input type="text" class="form-control mt-2">
            </form>
          </div>
        </div>
      </div>
      <!-- section to add friends, see friend requests, videos, events, memories, friend list, likes, groups -->
      <div class="col-md-4 col-12" class="userwrapper">
        <!-- first part of the section for friend request, friend list, and likes -->
        <div class="card customshadow">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-6">
                <div class="card border-top-0 border-left-0 border-bottom-0 border-right-0">
                  <p class="friendboard">
                    <img src="assets/images/request.png" alt="friend request" class="imgboard mr-3">Friend Request
                  </p>
                  <p class="indicatortext"><img src="assets/images/online2.png" alt="friend requests" class="rqst"> 2 friends requests</p>
                  <p></p>
                  <p class="friendboard">
                    <img src="assets/images/friendlist2.png" alt="friend list" class="imgboard mr-3">Friend List
                  </p>
                  <p class="indicatortext">See all your friends</p>
                  <p></p>
                  <p class="friendboard">
                    <img src="assets/images/likes2.png" alt="your likes" class="imgboard mr-3">Your Likes
                  </p>
                  <p class="indicatortext">View your likes history</p>
                </div>
              </div>
              <div class="col-md-6 col-6">
                <div class="card border-top-0 border-left-0 border-bottom-0 border-right-0">
                  <p class="friendboard">
                    <img src="assets/images/videos.png" alt="my videos" class="imgboard mr-3">Videos
                  </p>
                  <p class="indicatortext">See your videos</p>
                  <p></p>
                  <p class="friendboard">
                    <img src="assets/images/events.png" alt="friend list" class="imgboard mr-3">Events
                  </p>
                  <p class="indicatortext">Your upcoming events</p>
                  <p></p>
                  <p class="friendboard">
                    <img src="assets/images/memories.png" alt="your likes" class="imgboard mr-3">Memories
                  </p>
                  <p class="indicatortext">Check on your past activities</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- section for all posts from friends -->
    <div class="row" style="margin: auto;">
      <div class="col-md-8 col-12">
        <div class="card p-3 mb-4 customshadow">
          <p class="friendboard font-weight-bold card-text"><img src="assets/images/story2.jpg" alt="profile name" class="postimg mr-3" style="border-radius: 50%;">Profile name</p>
          <span class="hourspace pl-3">4 hours ago</span>

          <ul class="nav nav-tabs-custom imgpos">
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#" role="tab" aria-haspopup="true" aria-expanded="false"><img src="assets/images/caretdown2.png" alt="see more" class="dwcaret"></a>
              <div class="dropdown-menu customshadow dropdown-menu-right">
                <a class="dropdown-item" href="#"><i class="fas fa-bookmark mr-2"></i>Save Your Post<p class="pl-4"><small>Add this to your saved items.</small></p></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="fas fa-bell mr-2"></i>Turn On Notification For This Post.<p class="pl-4"></p></a>
                <a class="dropdown-item" href="#"><i class="fas fa-code mr-2"></i>Embed<p class="pl-4"></p></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="fas fa-times-rectangle mr-2"></i>Hide Your Post<p class="pl-4"><small>See less of this type of post.</small></p></a>
                <a class="dropdown-item" href="#"><i class="fas fa-clock mr-2"></i>Snooze Profile Name for 15 Days<p class="pl-4"><small>Temporarily Stop Seeing This Post.</small></p></a>
                <a class="dropdown-item" href="#"><i class="fas fa-remove mr-2"></i>Unfollow Profile name<p class="pl-4"><small>Stop Seeing This Post But Remain Friends.</small></p></a>
                <a class="dropdown-item" href="#"><i class="fas fa-minus-square mr-2"></i>Report This Post<p class="pl-4"><small>I Have My Concerns About This Post.</small></p></a>
              </div>
            </li>
          </ul>

          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum enim assumenda ex esse deleniti cupiditate aliquid facilis impedit, culpa ducimus id praesentium, totam nihil dignissimos eos ab asperiores sequi eum.</p>
          <div class="card p-3">
            <img src="assets/images/collage1.png" alt="photo collage 1" class="card-img" style="width: 100%; height: 450px;">
          </div>
          <div class="card-body row p-2 mr-3 ml-3">
            <div class="mr-auto likesstyle">
              <img src="assets/images/likes2.png" alt="👍" class="likesimg"><img src="assets/images/smile.png" alt="😊" class="likesimg">20K
            </div>
            <div class="ml-auto likesstyle">
              <span class="mr-2">4.2K Comments</span><span>412 Shares</span></p>
            </div>
          </div>
          <hr />
          <div class="card-body row p-2 mr-3 ml-3">
            <div class="mr-auto text-black-50"><i class="fas fa-thumbs-up mr-2"></i>Like</div>
            <div class="mx-0 text-black-50"><i class="fas fa-comment mr-2"></i>Comment</div>
            <div class="ml-auto text-black-50"><i class="fas fa-share mr-2"></i>Share</div>
          </div>
          <div class="row card-body">
            <div class="col-md-1">
              <img src="assets/images/story2.jpg" alt="profile image" class="postimg mr-3" style="border-radius: 50%;">
            </div>
            <div class="col-md-11 pt-1">
              <form action="">
                <input type="text" name="" id="" class="form-control" placeholder="Write a quick comment.">
              </form>
            </div>
          </div>
        </div>
        <div class="card p-3 mb-4 customshadow">
          <p class="friendboard font-weight-bold card-text"><img src="assets/images/story3.jpg" alt="profile name" class="postimg mr-3" style="border-radius: 50%;">Profile name</p>
          <span class="hourspace pl-3">5 hours ago</span>

          <ul class="nav nav-tabs-custom imgpos">
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#" role="tab" aria-haspopup="true" aria-expanded="false"><img src="assets/images/caretdown2.png" alt="see more" class="dwcaret"></a>
              <div class="dropdown-menu customshadow dropdown-menu-right">
                <a class="dropdown-item" href="#"><i class="fas fa-bookmark mr-2"></i>Save Your Post<p class="pl-4"><small>Add this to your saved items.</small></p></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="fas fa-bell mr-2"></i>Turn On Notification For This Post.<p class="pl-4"></p></a>
                <a class="dropdown-item" href="#"><i class="fas fa-code mr-2"></i>Embed<p class="pl-4"></p></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="fas fa-times-rectangle mr-2"></i>Hide Your Post<p class="pl-4"><small>See less of this type of post.</small></p></a>
                <a class="dropdown-item" href="#"><i class="fas fa-clock mr-2"></i>Snooze Profile Name for 15 Days<p class="pl-4"><small>Temporarily Stop Seeing This Post.</small></p></a>
                <a class="dropdown-item" href="#"><i class="fas fa-remove mr-2"></i>Unfollow Profile name<p class="pl-4"><small>Stop Seeing This Post But Remain Friends.</small></p></a>
                <a class="dropdown-item" href="#"><i class="fas fa-minus-square mr-2"></i>Report This Post<p class="pl-4"><small>I Have My Concerns About This Post.</small></p></a>
              </div>
            </li>
          </ul>

          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum enim assumenda ex esse deleniti cupiditate aliquid facilis impedit, culpa ducimus id praesentium, totam nihil dignissimos eos ab asperiores sequi eum.</p>
          <div class="card p-3">
            <img src="assets/images/collage2.png" alt="photo collage 1" class="card-img" style="width: 100%; height: 450px;">
          </div>
          <div class="card-body row p-2 mr-3 ml-3">
            <div class="mr-auto likesstyle">
              <img src="assets/images/likes2.png" alt="👍" class="likesimg"><img src="assets/images/smile.png" alt="😊" class="likesimg">20K
            </div>
            <div class="ml-auto likesstyle">
              <span class="mr-2">4.2K Comments</span><span>412 Shares</span></p>
            </div>
          </div>
          <hr />
          <div class="card-body row p-2 mr-3 ml-3">
            <div class="mr-auto text-black-50"><i class="fas fa-thumbs-up mr-2"></i>Like</div>
            <div class="mx-0 text-black-50"><i class="fas fa-comment mr-2"></i>Comment</div>
            <div class="ml-auto text-black-50"><i class="fas fa-share mr-2"></i>Share</div>
          </div>
          <div class="row card-body">
            <div class="col-md-1">
              <img src="assets/images/story2.jpg" alt="profile image" class="postimg mr-3" style="border-radius: 50%;">
            </div>
            <div class="col-md-11 pt-1">
              <form action="">
                <input type="text" name="" id="" class="form-control" placeholder="Write a quick comment.">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>