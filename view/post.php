<?php
include "partials/__header.php";
if ($loggedin == 1 || $registered == 1) {
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include "partials/__head.php"; ?>

    <body>
        <div class="container">
            <div class="d-flex flex-column text-center">
                <div id="result"></div>
                <div class="ml-auto clspopup">&times;</div>
                <h5>Create Post</h5>
                <hr />
            </div>
            <div class="row">
                <div class="col-md-12 col-12">
                    <p>
                        <span class="ml-2" style="color:dimgray; font-family:sans-serif; font-size:0.85rem; transform: translate(0px, 10px)">
                            <a href="../view/user.php?id=<?php echo $userid; ?>" style="color:inherit; text-decoration: none;"><img src="../assets/images/profile/<?php echo $profileimage; ?>" alt="" class="postimg mr-auto">
                                <?php echo $firstname . " " . $lastname . "</a>";
                                if (!empty($_GET)) {
                                    echo " is with ";
                                    foreach ($_GET as $key => $value) {
                                        echo "<strong>" . $value . "</strong> &#128578; ";
                                    }
                                } ?>
                        </span>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-12">
                    <form class="postform" method="post">
                        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                        <div class="form-group">
                            <?php
                            if (!empty($_GET)) {
                                foreach ($_GET as $key => $value) {
                                    echo "<input type='hidden' name='$key'  value='$value'>";
                                }
                            }

                            ?>
                            <div style=" -moz-appearance: textfield-multiline;-webkit-appearance: textarea;border: 1px solid lightgrey;padding:10px;height: 128px;word-wrap:break-word;white-space: normal;overflow: auto;width: 100%;resize: both;">
                                <div id="postcontent" contenteditable="true"></div>
                                <output id="imgresult">
                            </div>
                        </div>
                        <div class="row form-group pr-5 pl-5 mr-5 ml-5">
                            <div class="row mr-auto" style="line-height: 3rem;">Add to your post</div>
                            <div class="row ml-auto">
                                <label class="btn" data-toggle="tooltip" data-html="true" data-placement="top" title="Add Image/Video"><input type="file" name="img[]" id="img" class="d-none" accept="image/*|video/*" multiple>
                                    <img src="../assets/images/picture.png" alt="" class="postimage">
                                </label>
                                <label id="tag" class="btn" data-toggle="tooltip" data-html="true" data-placement="top" title="Tag a friend">
                                    <img src="../assets/images/tagfriend.png" alt="" class="postimage">
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="action" value="Submit Post" class="rounded-pill btn-block p-2">Post</button>
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
    header("Location:../index.php");
}
