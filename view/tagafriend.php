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
                <div class="mr-auto tagnav"><i class="fas fa-arrow-left" style="margin: 0 auto;"></i></div>
                <div id="result"></div>
                <div class="ml-auto clspopup">&times;</div>
                <h5>Tag a friend</h5>
                <hr />
            </div>
            <div class="row">
                <a href="../view/user.php?id=<?php echo $userid; ?>" style="color:inherit; text-decoration: none;"><img src="../assets/images/profile/<?php echo $profileimage; ?>" alt="" class="postimg mr-auto">
                    <span class="ml-2" style="transform: translate(0px, 10px)">
                        <?php echo $firstname . " " . $lastname; ?>
                    </span></a>
                    <div id="tagnames" class="row mx-auto"></div>
                <div class="ml-auto"><form id="addtagform" class='addtagform'><button type="submit" class="rounded-lg p-2" name="action" value="Add"><i class="fas fa-plus pr-2"></i>Add</button></form></div>
            </div>
            <div class="row pl-5 pr-5" style="overflow-y: auto;">
                <table class="table table-hover">
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
                    $sql = "SELECT * FROM user WHERE `userId` IN ($id)";
                    $stms = $mysqli->prepare($sql);
                    $stms->bind_param(str_repeat('i', count($friendsid)), ...array_values($friendsid));
                    $stms->execute();
                    $res = $stms->get_result();
                    while ($row = $res->fetch_assoc()) {
                        !empty($row['profileimage']) ? $img = $row['profileimage'] : $img = 'avater.png';
                        echo "<tr><td style='border:none;' width='10%'><a href='../view/user.php?id=" . $row['userId'] . "'><img src='../assets/images/profile/$img' style='width:30px; height:30px;'></a></td><td style='border:none;' width='60%'>" . $row['firstname'] . " " . $row['lastname'] . "</td><td style='border:none;' width='30%' align='center'><form class='tagform' action='../controllers/postcontroller.php' method='post'><input type='hidden' name='csrf_token' value='$csrf_token'><input type='hidden' name='userid'  value='$userid'><input type='hidden' name='friendsid'  value='" . $row['userId'] . "'><input type='hidden' name='firstname'  value='" . $row['firstname'] . "'><input type='hidden' name='lastname'  value='" . $row['lastname'] . "'><button type='submit' name='action' value='Tag' class='rounded-pill pl-3 pr-3 pt-2 pb-2'><i class='fas fa-user pr-2'></i>Tag</button></form></td></tr>";
                    }
                    if ($res->num_rows == 0) {
                        echo "You have no friends request at this time. You may begin to add friends from the friends <a href='friendlist.php'>page</a>";
                    }
                    ?>
                </table>
            </div>
        </div>
        <?php include "partials/__script.php"; ?>
    </body>

    </html>
<?php
} else {
    header("Location:../index.php");
}
