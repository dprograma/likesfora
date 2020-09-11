<?php include "../view/partials/__header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php $title = "Change password";
include "../view/partials/__head.php"; ?>

<body>
    <?php include "../view/partials/__nav1.php"; ?>
    <div class="container">
        <div class="row h-100">
            <div class="col-md-5 col-12 mx-auto my-5 pt-5">
                <div class="card p-4">
                    <?php
                    include "partials/__successreport.php";
                    include "partials/__errorreport.php";
                    ?>
                    <form action="../controllers/usercontroller.php" method="post">
                        <div class="form-group">
                            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                            <label for="password">Enter your password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm">Confirm</label>
                            <input type="password" name="confirm" id="confirm" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="action" value="Update password" class="btn btn-success btn-block btn-lg">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include "partials/__script.php"; ?>
</body>

</html>