<nav class="topbar col-md-12 col-12">

<ul class="nav nav-tabs">
  <img src="../assets/images/logo.png" alt="LikesFora logo" class="logo">
  <li class="nav-item dropdown ml-auto list">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color: #3c3c3c; font-family: Arial, Helvetica, sans-serif;font-size: 13px;background-color: #f8f9fa;"><?php echo "Hi, " . ucfirst($firstname); ?>
      <img src="../assets/images/story1.jpg" alt="user profile" class="profileimage">
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#"><i class="fas fa-tachometer-alt mr-2"></i> Timeline<p class="ml-4"><small><em>See your timeline.</em></small></p></a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#"><i class="fas fa-user-circle mr-2"></i> <?php echo ucfirst($firstname) . " " . ucfirst($lastname); ?><p class="ml-4"><small><em>Your profile.</em></small></p></a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i> Settings<p></p></a>
      <a class="dropdown-item" href="#"><i class="fas fa-question-circle mr-2"></i> Help and Support<p></p></a>
      <a class="dropdown-item" href="../controllers/usercontroller.php?action=logout"><i class="fas fa-sign-out-alt mr-2"></i> Logout<p></p></a>
    </div>
  </li>
</ul>
</nav>
<!-- second navigation after the top bar -->
<nav class="navbar navbar-expand-lg navbar-dark secondnav sticky-top" style="position:fixed;background-color:black;">
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
