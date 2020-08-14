<?php
include "partials/__header.php";
if ($loggedin == 1 || $registered == 1) {
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php
    $title = "Friend List";
    include "partials/__head.php";
    ?>

    <body>
        <?php include "partials/__nav2.php";
        ?>
        <div class="container-fluid" style="margin-top: 7.5rem;">
            <div class="row">
                <div class="col-md-8 col-12 p-4">
                    <h5 style="text-align: center;">Friends . <span style="font-size:1rem;color:grey;font-family: sans-serif;"><?php echo $friends; ?></span> </h5>
                    <table class="table p-4">
                        <?php
                        $stmt = $mysqli->prepare("SELECT DISTINCT `friendsid` FROM friends WHERE `userid` = ?");
                        $stmt->bind_param('i', $userid);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $friendsid = [];
                        while ($row = $result->fetch_assoc()) {
                            $friendsid[] = $row['friendsid'];
                        }
                        $id = join(',', array_fill(0, count($friendsid), '?'));
                        $sql = "SELECT * FROM user WHERE `userid` IN ($id)";
                        $stms = $mysqli->prepare($sql);
                        $stms->bind_param(str_repeat('i', count($friendsid)), ...array_values($friendsid));
                        $stms->execute();
                        $res = $stms->get_result();
                        while ($row = $res->fetch_assoc()) {
                            !empty($row['profileimage']) ? $img = $row['profileimage'] : $img = 'avater.png';
                            echo "<tr><td width='10%'><a href=''><img src='../assets/images/profile/$img' style='width:30px; height:30px;'></a></td><td width='60%'>" . $row['firstname'] . " " . $row['lastname'] . "</td><td width='30%' align='center'><form action='../controllers/postcontroller.php' method='post'><input type='hidden' name='csrf_token' value='$csrf_token'><input type='hidden' name='userid'  value='$userid'><input type='hidden' name='friendsid'  value='" . $row['userId'] . "'><input type='hidden' name='firstname'  value='" . $row['firstname'] . "'><input type='hidden' name='lastname'  value='" . $row['lastname'] . "'><button type='submit' name='action' value='Remove' class='rounded-pill pl-3 pr-3 pt-2 pb-2'><i class='fas fa-times pr-2'></i>Remove</button></form></td></tr>";
                        }
                        if ($res->num_rows == 0) {
                            echo "You have no friends list at this time. You can begin to add friends from the friends suggestion below";
                        }
                        ?>
                    </table>
                    <hr />
                    <h5 style="text-align: center;">Friend Suggestion</h5>
                    <?php
                    include "partials/__successreport.php";
                    include "partials/__errorreport.php";
                    ?>
                    <table class="table">
                        <?php
                        $sql = "SELECT DISTINCT userId, email, password, firstname, lastname, username, dob, sex, phone, profileimage, coverimage, description, bio, loggedin, registered FROM user WHERE `userid` NOT IN ($id)";
                        $stma = $mysqli->prepare($sql);
                        $stma->bind_param(str_repeat('i', count($friendsid)), ...array_values($friendsid));
                        $stma->execute();
                        $rst = $stma->get_result();
                        while ($row = $rst->fetch_assoc()) {
                            !empty($row['profileimage']) ? $img = $row['profileimage'] : $img = 'avater.png';
                            echo "<tr><td width='10%'><a href=''><img src='../assets/images/profile/$img' style='width:30px; height:30px;'></a></td><td width='60%'>" . $row['firstname'] . " " . $row['lastname'] . "</td><td width='30%' align='center'><form action='../controllers/postcontroller.php' method='POST'><input type='hidden' name='csrf_token' value='$csrf_token'><input type='hidden' name='userid'  value='$userid'><input type='hidden' name='friendsid'  value='" . $row['userId'] . "'><input type='hidden' name='firstname'  value='" . $row['firstname'] . "'><input type='hidden' name='lastname'  value='" . $row['lastname'] . "'><button type='submit' name='action' value='Add Friend' class='tgl rounded-pill pl-3 pr-3 pt-2 pb-2'> <i class='fas fa-user-friends pr-2'></i>Add Friend</button></form></td></tr>";
                        }
                        ?>
                    </table>
                </div>
                <div class="col-md-4 col-12 d-none d-md-block">
                    <?php
                    include "partials/__storyblock.php";
                    include "partials/__friendblock.php";
                    ?>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
} else {
    header("Location:../index.php");
}
