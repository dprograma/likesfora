<?php include "partials/__header.php";
if ($loggedin == 1 || $registered == 1) {
    if (isset($_POST['profile'])) {
        $profile = ucwords($_POST['profile']);
    } else {
        $profile = "";
    }

    $value = "Update " . $profile;
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include "partials/__head.php"; ?>

    <body>
        <div class="container popupcontainer">
            <div id="result"></div>
            <div class="d-flex flex-column text-center">
                <div class="ml-auto clspopup">&times;</div>
                <h5>Edit Your <?php echo $profile; ?></h5>
                <hr />
            </div>
            <div class="d-flex flex-row">
                <?php if ($profile == "Profile Image") {
                    $imgprev = $profileimage;
                } else {
                    $imgprev = $coverimage;
                } ?>"
                <div class="card">
                    <img class="imgprev" style="position:relative; display: block; width: 192px; height: 192px;border-radius: 4px;margin:0 auto;" src="../assets/images/profile/<?php echo $imgprev; ?>" alt="">
                </div>
                <div class="card ml-auto p-3">
                    <form class="uploadform" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                            <label class="btn btn-light btn-outline-secondary btn-block">
                                <input type="file" name="profileimage" id="profileimage" class="d-none" onchange="$('#photoupload').html(this.files[0].name); "><i class="fas fa-image pr-2"></i>Browse <?php echo $profile; ?>
                            </label>
                            <span class="label label-info" id="photoupload"></span>
                            <label class="btn btn-success btn-block mt-2">
                                <input type="submit" name="action" id="uploadbutton" value="<?php echo $value; ?>" class="d-none"><i class="fas fa-upload pr-2"></i><?php echo $value; ?></label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include "partials/__script.php"; ?>
    </body>

    </html>
<?php

} else {
    header("location:../index.php");
}
