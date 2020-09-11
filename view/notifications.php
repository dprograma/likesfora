<?php
include "partials/__header.php";
if ($loggedin == 1 || $registered == 1) {
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php
    $title = ucfirst($firstname) . " notifications";
    include "partials/__head.php";
    ?>

    <body>
        <?php include "partials/__nav2.php"; ?>
        <div class="container-fluid" style="margin-top: 7.5rem;">
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="d-flex" style="min-height:350px; margin:0 auto;">
                        <div class="card mb-4 p-4 customshadow" style="width:100%; min-height: 450px;">
                            <h4 style="text-decoration: underline;color:#c44da6ba;text-align:center;">Your Notifications</h4>
                            <table class="table p-3" width="80%">

                                <?php
                                $sql = "SELECT * FROM notifications WHERE `userid` = ?";
                                $stmt = $mysqli->prepare($sql);
                                $stmt->bind_param('i', $userid);
                                $stmt->execute();
                                $res = $stmt->get_result();

                                while ($row = $res->fetch_assoc()) {
                                    $img1 = $row['friendsid'] . ".jpg";
                                    $img2 = $row['friendsid'] . ".jpg";
                                    if (is_file($img1)) {
                                        $img = $img1;
                                    } elseif (is_file($img2)) {
                                        $img = $img2;
                                    } else {
                                        $img = "avater.png";
                                    }
                                    echo "<tr><td><img src='../assets/images/profile/$img' style='width:30px; height: 30px;'></td><td>" . $row['body'] . "</td><td style='font-size:11px;font-style:italic;color:dimgrey;'>" . date('F j, Y', strtotime($row['dateupdated'])) . "</td></tr>";
                                }
                                if ($res->num_rows == 0) :
                                ?>
                                    <div class="row justify-content-center align-items-center my-auto">
                                        <h3>You have no notifications.</h3>
                                    </div>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12 d-none d-md-block">
                    <?php
                    include "partials/__storyblock.php";
                    include "partials/__friendblock.php";
                    ?>
                </div>
            </div>
        </div>
        <?php include "partials/__popup.php"; ?>
        <?php include "partials/__script.php"; ?>
    </body>

    </html>
<?php
} else {
    header("Location:../index.php");
}
