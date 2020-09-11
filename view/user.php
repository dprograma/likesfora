<?php
include "partials/__userheader.php";
if ($loggedin == 1 || $registered == 1) {
?>
    <!DOCTYPE html>
    <html lang="en">
    <!-- top head web page information -->
    <?php $title = ucfirst($firstname) . "'s Timeline";
    include "partials/__head.php"; ?>

    <body>
        <!-- top row for heading with logo and user account -->
        <?php include "partials/__nav2.php"; ?>
        <div class="profilelayer">
            <?php include "partials/__userstopblock.php";?>
            <div class="container containertopmargin">
                <div class="row justify-content-center">
                    <div class="col-md-4 col-12">
                        <?php
                        $margin = "mt-3";
                        include "partials/__userprofiledetails.php";
                        include "partials/__photosblock.php";
                        include "partials/__friendsgroup.php";
                        include "partials/__eventsblock.php";
                        ?>
                    </div>
                    <div class="col-md-8 col-12">
                        <?php
                        $margintop = "mt-0";
                        include "partials/__graphicsblock.php";
                        include "partials/__postsblock.php";
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include "partials/__popup.php"; ?>
        <?php include "partials/__script.php"; ?>
    </body>

    </html>
<?php
} else {
    header("location:../index.php");
}
