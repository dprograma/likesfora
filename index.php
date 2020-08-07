<?php
include "view/partials/__header.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LikesFora | Friendship that pays</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/fonts/font.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script>
        function userlogin() {
            location.href = "#";
        }

        function userregister(){
            location.href = "view/signup.php";
        }
    </script>
</head>

<body>

    <body class="bgoverlay">
        <!-- top nav bar for login page -->
        <nav class="navbar navbar-expand-lg navbar-light sticky-top topbar">
            <a class="navbar-brand" href="#">
                <img src="assets/images/logo.png" alt="Likesfora Logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="mr-auto">
                </div>
                <div class="form-group has-search my-2 my-lg-0 ml-auto">
                    <button name="signup" class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="userregister();">Sign Up</button>
                    <button name="signin" class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="userlogin();">Sign In</button>
                </div>
            </div>
        </nav>
        <!-- main body -->
        <div class="container-fluid">
            <div class="row h-100">
                <div class="col-md-7 w-75 my-auto mx-auto pt-5">
                    <div class="w-75 mx-auto">
                        <p class="font-weight-bolder likeforamoto">Designed for friendship that pays.</p>

                        <p class="likesforatext">LikesFora is a social platform developed for people who want to do more on a social network.</p>
                    </div>
                </div>
                <div class="col-md-5 col-12">
                    <div class="row h-100">
                        <div class="card p-4 my-5 mx-auto w-75">
                            <?php
                            include "view/partials/__successreport.php";
                            include "view/partials/__errorreport.php";
                            ?>
                            <form action="controllers/usercontroller.php" method="POST">
                                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="action" id="action" class="btn btn-success btn-block btn-lg" value="Sign In To LikesFora">
                                </div>
                            </form>
                            <div class="row">
                                <div class="card-text p-3" style="font-size: 12px;color:#772a59;">Don't have an account? <a href="view/signup.php" class="font-weight-bold text-decoration-none">Sign up</a></div>
                                <div class="card-text ml-auto p-3" style="font-size: 12px;color:#772a59;"><a href="view/reset.php" class="font-weight-bold text-decoration-none">Reset password</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row to display the footer section -->
            <div class="row">
                <div class="mx-auto mt-5 pt-4 h-25">
                    <p style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size:13px; font-weight:bold;color:thistle; text-align: center;">By clicking “Sign up for LikesFora”, you agree to our <a href="#">Terms and Conditons</a> and <a href="#">Privacy Policy.</a></p>
                </div>
            </div>
        </div>
    </body>

</html>
</body>

</html>