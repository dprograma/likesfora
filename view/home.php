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

      <?php include "../view/partials/__nav2.php"; ?>


      <!-- adjustment to the page -->
      <div class="container-fluid containermobile">
        <!-- left scrollable part with column 8 for mobile view only -->
        <div class="col-md-8 col-12 carouselwrapper">
          <!-- user story section -->
          <div><small><em>Your story</em></small></div>
          <hr />
          <div class="row d-flex flex-row pl-2 pr-2 d-block d-md-none" style="margin-top: 45px;">
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg">
                <i class="fas fa-plus hoverstory" style="text-align:center; line-height:71px;"></i>
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg">
                <img src="../assets/images/story1.jpg" class="card-img hoverstory">
                <div class="card-img-overlay">
                  <h6 class="card-title">My Story</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg ">
                <img src="../assets/images/story2.jpg" class="card-img hoverstory">
                <div class="card-img-overlay">
                  <h6 class="card-title">My Story</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg">
                <img src="../assets/images/story3.jpg" class="card-img hoverstory">
                <div class="card-img-overlay">
                  <h6 class="card-title">My Story</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg">
                <img src="../assets/images/story4.jpg" class="card-img hoverstory">
                <div class="card-img-overlay">
                  <h6 class="card-title">My Story</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg">
                <img src="../assets/images/story5.jpg" class="card-img hoverstory">
                <div class="card-img-overlay">
                  <h6 class="card-title">My Story</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg">
                <img src="../assets/images/story6.jpg" class="card-img hoverstory">
                <div class="card-img-overlay">
                  <h6 class="card-title">My Story</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg">
                <img src="../assets/images/story7.jpg" class="card-img hoverstory">
                <div class="card-img-overlay">
                  <h6 class="card-title">My Story</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg">
                <img src="../assets/images/story8.jpg" class="card-img hoverstory">
                <div class="card-img-overlay">
                  <h6 class="card-title">My Story</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg">
                <img src="../assets/images/story9.jpg" class="card-img hoverstory">
                <div class="card-img-overlay">
                  <h6 class="card-title">My Story</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg">
                <img src="../assets/images/story10.jpg" class="card-img hoverstory">
                <div class="card-img-overlay">
                  <h6 class="card-title">My Story</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg">
                <img src="../assets/images/story11.jpg" class="card-img hoverstory">
                <div class="card-img-overlay">
                  <h6 class="card-title">My Story</h6>
                </div>
              </div>
            </div>
          </div>
          <!-- user profile item section -->
          <!-- first part of the section for friend request, friend list, and likes -->
          <div class="card customshadow d-block d-md-none">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-6">
                  <div class="card border-top-0 border-left-0 border-bottom-0 border-right-0">
                    <p class="friendboard">
                      <img src="../assets/images/request.png" alt="friend request" class="imgboard mr-3">Friend Request
                    </p>
                    <p class="indicatortext"><img src="../assets/images/online2.png" alt="friend requests" class="rqst"> 2 friends requests</p>
                    <p></p>
                    <p class="friendboard">
                      <img src="../assets/images/friendlist2.png" alt="friend list" class="imgboard mr-3">Friend List
                    </p>
                    <p class="indicatortext">See all your friends</p>
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
          <!--first row for carousel-->
          <div class="row mt-lg-5 d-none d-md-block" style="margin:auto;">
            <div id="carouselExampleCaptions" class="carousel slide carousel-fade d-block d-md-block" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="../assets/images/slider1.png" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="../assets/images/slider2.png" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="../assets/images/slider3.png" class="d-block w-100" alt="...">
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
          <!-- second row for adding video, picture, likes and feelings -->
          <div class="row" style="margin: auto;">
            <div class="card mt-5 mb-4 p-2 customshadow w-100">
              <div class="row">
                <div class="col-md-3 col-6">
                  <p class="text-center mb-2 mx-auto" style="font-size: 13px;">Add Video <img src="../assets/images/addvideo.png" alt="add video" class="mr-5 imgicon mx-auto"></p>
                </div>
                <div class="col-md-3 col-6">
                  <p class="text-center mb-2" style="font-size: 13px;">Photo <img src="../assets/images/picture.png" alt="add images" class="mr-5 imgicon mx-auto"></p>
                </div>
                <div class="col-md-3 col-6">
                  <p class="text-center mb-2" style="font-size: 13px;">Buy likes <img src="../assets/images/like&getpaid.png" alt="buy likes" class="mr-5 pb-2 imgicon mx-auto"></p>
                </div>
                <div class="col-md-3 col-6">
                  <p class="text-center mb-2" style="font-size: 13px;">How are you feeling? <img src="../assets/images/smile.png" alt="how are you feeling?" class="imgicon mx-auto"></p>
                </div>
              </div>
              <hr />
              <div class="card-body pt-1">
                <div class="card-text">
                  <img src="../assets/images/story1.jpg" alt="profle name" class="postimg mr-1">
                  <p style="font-size:14px;">Say something to friends...</p>
                </div>
                <form method="get" action="">
                  <input type="text" class="form-control mt-2">
                </form>
              </div>
            </div>
          </div>
          <!-- friends post section -->
          <div class="row" style="margin: auto;">
            <div class="card p-3 mb-4 customshadow">
              <p class="friendboard font-weight-bold card-text"><img src="../assets/images/story2.jpg" alt="profile name" class="postimg mr-3" style="border-radius: 50%;">Profile name</p>
              <span class="hourspace pl-3">4 hours ago</span>

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

              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum enim assumenda ex esse deleniti cupiditate aliquid facilis impedit, culpa ducimus id praesentium, totam nihil dignissimos eos ab asperiores sequi eum.</p>
              <div class="card p-3">
                <img src="../assets/images/collage1.png" alt="photo collage 1" class="card-img img-fluid" style="width: 100%;">
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
                  <img src="../assets/images/story2.jpg" alt="profile image" class="postimg mr-3" style="border-radius: 50%;">
                </div>
                <div class="col-md-11 pt-1">
                  <form action="">
                    <input type="text" name="" id="" class="form-control" placeholder="Write a quick comment.">
                  </form>
                </div>
              </div>
            </div>
            <div class="card p-3 mb-4 customshadow">
              <p class="friendboard font-weight-bold card-text"><img src="../assets/images/story3.jpg" alt="profile name" class="postimg mr-3" style="border-radius: 50%;">Profile name</p>
              <span class="hourspace pl-3">5 hours ago</span>

              <ul class="nav nav-tabs-custom imgpos">
                <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="dropdown" href="#" role="tab" aria-haspopup="true" aria-expanded="false" data-flip='false'><img src="../assets/images/caretdown2.png" alt="see more" class="dwcaret"></a>
                  <div class="dropdown-menu customshadow dropdown-menu-right reverse ddown">
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

              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum enim assumenda ex esse deleniti cupiditate aliquid facilis impedit, culpa ducimus id praesentium, totam nihil dignissimos eos ab asperiores sequi eum.</p>
              <div class="card p-3">
                <img src="../assets/images/collage2.png" alt="photo collage 1" class="card-img img-fluid" style="width: 100%;">
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
                  <img src="../assets/images/story2.jpg" alt="profile image" class="postimg mr-3" style="border-radius: 50%;">
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
        <!-- Right non-scrollable part with column 4 -->
        <div class="col-md-4 col-12 ml-auto fixed-top d-none d-md-block" style="top:120px;margin-right: 20px;">
          <!-- user story section -->
          <div><small><em>Your story</em></small></div>
          <hr />
          <div class="row pl-2 pr-2 mb-2">
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg">
                <i class="fas fa-plus hoverstory" style="text-align:center; line-height:71px;"></i>
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg">
                <img src="../assets/images/story1.jpg" class="card-img hoverstory">
                <div class="card-img-overlay">
                  <h6 class="card-title">My Story</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg ">
                <img src="../assets/images/story2.jpg" class="card-img hoverstory">
                <div class="card-img-overlay">
                  <h6 class="card-title">My Story</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg">
                <img src="../assets/images/story3.jpg" class="card-img hoverstory">
                <div class="card-img-overlay">
                  <h6 class="card-title">My Story</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg">
                <img src="../assets/images/story4.jpg" class="card-img hoverstory">
                <div class="card-img-overlay">
                  <h6 class="card-title">My Story</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg">
                <img src="../assets/images/story5.jpg" class="card-img hoverstory">
                <div class="card-img-overlay">
                  <h6 class="card-title">My Story</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg">
                <img src="../assets/images/story6.jpg" class="card-img hoverstory">
                <div class="card-img-overlay">
                  <h6 class="card-title">My Story</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg">
                <img src="../assets/images/story7.jpg" class="card-img hoverstory">
                <div class="card-img-overlay">
                  <h6 class="card-title">My Story</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg">
                <img src="../assets/images/story8.jpg" class="card-img hoverstory">
                <div class="card-img-overlay">
                  <h6 class="card-title">My Story</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg">
                <img src="../assets/images/story9.jpg" class="card-img hoverstory">
                <div class="card-img-overlay">
                  <h6 class="card-title">My Story</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg">
                <img src="../assets/images/story10.jpg" class="card-img hoverstory">
                <div class="card-img-overlay">
                  <h6 class="card-title">My Story</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-4">
              <div class="card bg-dark text-white cardbg">
                <img src="../assets/images/story11.jpg" class="card-img hoverstory">
                <div class="card-img-overlay">
                  <h6 class="card-title">My Story</h6>
                </div>
              </div>
            </div>
          </div>
          <!-- user profile item section -->
          <!-- first part of the section for friend request, friend list, and likes -->
          <div class="row pl-2 pr-2 mb-2">
            <div class="card customshadow">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6 col-6">
                    <div class="card border-top-0 border-left-0 border-bottom-0 border-right-0">
                      <p class="friendboard">
                        <img src="../assets/images/request.png" alt="friend request" class="imgboard mr-3">Friend Request
                      </p>
                      <p class="indicatortext"><img src="../assets/images/online2.png" alt="friend requests" class="rqst"> 2 friends requests</p>
                      <p></p>
                      <p class="friendboard">
                        <img src="../assets/images/friendlist2.png" alt="friend list" class="imgboard mr-3">Friend List
                      </p>
                      <p class="indicatortext">See all your friends</p>
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
        </div>
      </div>
    </body>

    </html>
  <?php
  } else {
    echo "Invalid request!";
  }
