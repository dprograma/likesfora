<?php include "partials/__header.php";
if ($loggedin == 1 || $registered == 1) {
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include "partials/__head.php"; ?>

    <body>
        <div class="container">
            <div id="result"></div>
            <div class="d-flex flex-column text-center">
                <div class="ml-auto clspopup">&times;</div>
                <h5>Edit Your Personal Info</h5>
                <hr />
            </div>
            <div class="row p-2">
                <form id="bioform" method="post">
                    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                    <div class="form-group">
                        <label for="whatido" class="col-form">Describe what you do.</label>
                        <textarea name="whatido" id="whatido" maxlength="65" cols="80" rows="1" class="form-control" onkeyup="calculateDiscussCommentsRemainingCharsOne(); return ismaxlength_discussComments(this);"><?php echo $description; ?></textarea>
                        <span id="wid" class="row justify-content-end" style="width:500px; text-align:right;font-size:0.75rem; color:dimgrey;transform: translate(200px, 0px); -ms-transform: translate(200px, 0px); -moz-transform: translate(200px, 0px);">65 characters remaining</span>
                    </div>
                    <div class="form-group">
                        <label for="kindofperson" class="col-form">What kind of person are you?</label>
                        <textarea name="kindofperson" id="kindofperson" maxlength="120" cols="80" rows="1" class="form-control" onkeyup="calculateDiscussCommentsRemainingCharsTwo(); return ismaxlength_discussComments(this);"><?php echo $bio; ?></textarea>
                        <span id="kop" class="row justify-content-end" style="width:500px; text-align:right;font-size:0.75rem; color:dimgrey; transform: translate(200px, 0px); -ms-transform: translate(200px, 0px); -moz-transform: translate(200px, 0px);">120 characters remaining</span>
                    </div>
                    <div class="row justify-content-center form-group">
                        <button type="submit" name="action" id="ebio" value="Edit Bio" class="pr-4 pl-4 pt-2 pb-2 mr-2 rounded-pill"><i class="fas fa-edit pr-1"></i>Edit Bio</button>
                        <button type="reset" value="Reset" class="pr-4 pl-4 pt-2 pb-2 ml-2 rounded-pill"><i class="fas fa-redo pr-1"></i>Reset</button>
                    </div>
                </form>
            </div>
        </div>
        <?php include "partials/__script.php"; ?>
        <script>
            //countdown for textarea input
            function calculateDiscussCommentsRemainingCharsOne() {
                var remaining;
                if (document.getElementById('whatido').value.length <= 65) {
                    remaining = 65 - document.getElementById('whatido').value.length;
                    document.getElementById('wid').innerHTML = +remaining.toString() + " characters remaining ";
                } else {
                    document.getElementById('wid').innerHTML = " 0 characters remaining ";
                }
            }

            function calculateDiscussCommentsRemainingCharsTwo() {
                var remaining;
                if (document.getElementById('kindofperson').value.length <= 120) {
                    remaining = 120 - document.getElementById('kindofperson').value.length;
                    document.getElementById('kop').innerHTML = +remaining.toString() + " characters remaining ";
                } else {
                    document.getElementById('kop').innerHTML = " 0 characters remaining ";
                }
            }

            function ismaxlength_discussComments(obj) {
                var mlength = obj.getAttribute ? parseInt(obj.getAttribute("maxlength")) : ""
                if (obj.getAttribute && obj.value.length > mlength)
                    obj.value = obj.value.substring(0, mlength)
            }
        </script>
    </body>

    </html>
<?php
} else {
    header("location:../index.php");
}
