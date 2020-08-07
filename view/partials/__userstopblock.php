<div class="card profilecard">
    <img class="img-fluid" style="position:relative; display: block; width: 100%;margin:0 auto;background-size: cover;" src="../assets/images/profile/<?php echo $coverimage; ?>" alt="<?php $firstname . "'s cover image"; ?>">
</div>
<div class="card profileimgcard">
    <img style="position:relative; display: block; width: 192px; height: 192px;border-radius: 50%;margin:0 auto;margin-top: 0.16rem;" src="../assets/images/profile/<?php echo $profileimage; ?>" alt="<?php $firstname . "'s profile picture"; ?>">
</div>
<div class="userdescription">
    <p>
        <h3 style="text-shadow: 3px 3px 2px whitesmoke;color: #353b35;font-weight: bold;"><?php echo $firstname . " " . $lastname; ?></h3>
    </p>
    <p style="text-shadow: 2px 2px 2px whitesmoke;color: #353b35;font-weight: bold;"><?php $description ? $desc = $description : $desc = "Enterprenuer, Social philantropist, social marketer and celebrity.";
        echo ucwords($desc); ?></p>
</div>
<div class="row text-center d-none d-md-block pl-5 pr-5" style="color:dimgray;">
    <p>
        <h5>Bio</h5>
    </p>
    <hr />
    <?php $bio ? $userbio = $bio : $userbio = "I love playing on the guiter and piano in my free time. Otherwise you find me out there in the tennis court.";
    echo wordwrap($userbio, 200, '<br/>') . "<br/><button type='submit' name='editbio' id='editbio' class='btn btn-link text-decoration-none shadow-none'>Edit</button>"; ?>
</div>
<div class="pixplaceholder">
    <button type="file" name="editprofileimage" id="editprofileimage" class="rounded-circle p-3"><i class="fas fa-camera"></i></button>
</div>
<div class="row coverplaceholder justify-content-center">
    <button type="submit" name="editcoverimage" id="editcoverimage" class="rounded-pill pl-3 pr-3 buttonpos button-loader" data-loading-text="<i class='fa fa-spinner fa-spin'></i> ...Loading"><i class="fas fa-edit mr-2"></i>Edit Cover Image</button>
</div>