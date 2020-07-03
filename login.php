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

<body class="bgoverlay">
    <!-- top nav bar for login page -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top topbar">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="mr-auto">
                <img src="assets/images/logo.png" alt="Likesfora Logo" class="logo">
            </div>
            <div class="form-group has-search my-2 my-lg-0 ml-auto">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign Up</button>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign In</button>
            </div>
        </div>
    </nav>
    <!-- main body -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 d-none d-md-block">
                <div style="margin-top:250px; margin-left:100px;">
                    <p class="font-weight-bolder" style="font-size:3rem;font-family: Verdana, Geneva, Tahoma, sans-serif;">Designed for friendship that pays.</p>

                    <p style="font-size:1.25rem;font-family: Verdana, Geneva, Tahoma, sans-serif;">LikesFora is a social platform developed for people who want to do more on a social network.</p>
                </div>
            </div>
            <div class="col-md-5 col-12">
                <div class="card p-4" style="margin-top: 100px; margin-right: 100px; z-index: 100000;">
                    <form action="">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="action" id="action" class="btn btn-success btn-block btn-lg" value="Sign Up For LikesFora">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Row to display the footer section -->
        <div class="row">
            <div class="mx-auto mt-5 pt-4">
                <p>By clicking “Sign up for LikesFora”, you agree to our <a href="#">Terms and Conditons</a> and <a href="#">Privacy Policy</a>. We’ll occasionally send you account related emails.</p>
            </div>
        </div>
    </div>
</body>

</html>