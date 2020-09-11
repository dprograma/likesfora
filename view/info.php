<?php
include "partials/__header.php";
if ($loggedin == 1 || $registered == 1) {
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include "partials/__head.php"; ?>

    <body>
        <div class="container h-100">
            <div class="d-flex flex-column text-center">
                <div id="result"></div>
                <div class="ml-auto clspopup">&times;</div>
                <h5>Edit Your Background Info</h5>
                <hr />
            </div>
            <div class="row p-2">
                <div class="col-md-12 col-12">
                    <form class="infoform" method="post">
                        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                        <!-- work history section -->
                        <div class="form-group">
                            <label for="">Add Work History</label>
                            <input type="text" name="work" id="work" class="form-control">
                            <label for="work"><a id="backgd" class="dspmore" href=""><i class="fas fa-plus-square pr-1"></i>Add more work history</a></label>
                        </div>
                        <div class="form-group workbg">
                            <label for="work1"></label>
                            <input type="text" name="work1" id="work1" class="form-control">
                        </div>
                        <div class="form-group workbg">
                            <label for="work2"></label>
                            <input type="text" name="work2" id="work2" class="form-control">
                        </div>
                        <div class="form-group workbg">
                            <label for="work3"></label>
                            <input type="text" name="work3" id="work3" class="form-control">
                        </div>
                        <!-- academic section -->
                        <div class="form-group">
                            <label for="edu">Add Your academic background</label>
                            <input type="text" name="edu" id="edu" class="form-control">
                            <label for=""><a id="academ" class="dspmore" href="" onclick="showworkhistory(this);"><i class="fas fa-plus-square pr-1"></i>Add more academic history</a></label>
                        </div>
                        <div class="form-group academbg">
                            <label for=""></label>
                            <input type="text" name="edu1" id="edu1" class="form-control">
                        </div>
                        <div class="form-group academbg">
                            <label for="edu2"></label>
                            <input type="text" name="edu2" id="edu2" class="form-control">
                        </div>
                        <div class="form-group academbg">
                            <label for="edu3"></label>
                            <input type="text" name="edu3" id="edu3" class="form-control">
                        </div>
                        <div class="form-group addressbg">
                            <label for="addr">Your current address</label>
                            <input type="text" name="addr" id="addr" class="form-control">
                        </div>
                        <div class="form-group addressbg">
                            <label for="loc">Your current location</label>
                            <input type="text" name="loc" id="loc" class="form-control">
                        </div>
                        <div class="form-group mt-5">
                            <button type="submit" name="action" class="pl-4 pr-4 pt-3 pb-3 rounded-pill " value="Update Info" style="transform:translateX(270px)"><i class="fas fa-upload pr-1"></i>Update Info</button>
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
