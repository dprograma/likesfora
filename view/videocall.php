<?php
include "partials/__header.php";
if ($loggedin == 1 || $registered == 1) {
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php
    $title = "Video Call";
    include "partials/__head.php";
    ?>

    <body>
        <div class="container-fluid">
            <?php include "partials/__nav2.php"; ?>
            <div class="row">
                <div class="col-md-5 col-12" style="top:125px;margin-bottom:20px;font-size:0.8rem;color:dimgray;">
                    <div class="card mx-auto customshadow mb-3">
                        <div class="card-header text-center">
                            Video/Audio controls
                        </div>
                        <div class="card-body">
                            <form><input type='hidden' name='loggeduserid' value='$userid'><input type='hidden' name='loggedfirstname' value='$firstname'><input type='hidden' name='loggedlastname' value='$lastname'><input type='hidden' name='loggedpassword' value='$password'>

                                <div class="row">
                                    <div class="col-md-6 col-6">
                                        <div id="mystatus"></div>
                                    </div>
                                    <div class="col-md-6 col-6"><button type='submit' name='action' id="answer" value='answer call' class='rounded-pill pl-3 pt-2 pb-2 pr-3 mr-2 mt-2 answer'><i class='fas fa-video pr-2' style='color:#06d755;'></i>Answer</button><button type='submit' name='action' id='hangup' value='end call' class='rounded-pill pl-3 pt-2 pb-2 pr-3 mr-2 mt-2 end'><i class='fas fa-video pr-2' style='color:#cccccc;'></i>End</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card mx-auto customshadow">
                        <div class="card-header text-center">Make a video call to a friend</div>
                        <div class="row mx-auto" id="status"></div>
                        <table class="table p-5" style="margin:0 auto;">
                            <?php
                            $stmt = $mysqli->query("SELECT * FROM user WHERE `userId` IN (SELECT `friendsid` FROM friends WHERE `userid` = '$userid')");
                            while ($row = $stmt->fetch_assoc()) {
                                !empty($row['profileimage']) ? $img = $row['profileimage'] : $img = 'avater.png';
                                echo "<tr><td width='30%' style='border: 0px;'><a href='../view/user.php?id=" . $row['userId'] . "' style='color:inherit;text-decoration:none;'><img src='../assets/images/profile/" . $img . "' class='' style='width:30px; height:30px;'><span class='pl-2' style='font-size:0.75rem;'>" . $row['firstname'] . " " . $row['lastname'] . "</span></a></td><td style='border: 0px;' align='right'><form class='videoform'><input type='hidden' name='loggeduserid' value='$userid'><input type='hidden' name='userid' value='" . $row['userId'] . "'><input type='hidden' name='loggedfirstname' value='$firstname'><input type='hidden' name='loggedlastname' value='$lastname'><input type='hidden' name='firstname' value='" . $row['firstname'] . "'><input type='hidden' name='lastname' value='" . $row['lastname'] . "'><input type='hidden' name='loggedpassword' value='$password'><input type='hidden' name='password' value='" . $row['password'] . "'><button type='submit' name='action'  value='video call' class='rounded-pill pl-3 pt-2 pb-2 pr-3 mr-2 mt-2 call'><i class='fas fa-video pr-2' style='color:#e74c3c;'></i>Call</button><button type='submit' name='action'  value='answer call' class='rounded-pill pl-3 pt-2 pb-2 pr-3 mr-2 mt-2 answer'><i class='fas fa-video pr-2' style='color:#06d755;'></i>Answer</button><button type='submit' name='action'  value='end call' class='rounded-pill pl-3 pt-2 pb-2 pr-3 mr-2 mt-2 end'><i class='fas fa-video pr-2' style='color:#cccccc;'></i>End</button></form></td></tr>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="col-md-7 col-12" style="top:125px;">
                    <div class="card customshadow" style="height:500px;">
                        <div id="incoming" style="position:relative;margin: 0 auto;display:block;width:95%;height:95%;border:1px solid dimgray;border-style: dashed;margin-top:auto;margin-bottom:auto;"><video id="incoming" autoplay></video></div>
                        <div id="sinch"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "partials/__script.php"; ?>
    </body>

    </html>
<?php
}
