<div class="card customshadow p-3">
    <div class="card-text" style="font-size: 1rem;font-weight: bold;">Info</div>
    <hr />
    <?php if($work1){; ?>
    <div class="card-text p-2 m-2"><i class="fas fa-briefcase mr-2"></i> Worked at <strong><?php echo $work1; ?></strong></div><?php }; ?>
    <?php if($work2){; ?>
    <div class="card-text p-2 m-2"><i class="fas fa-briefcase mr-2"></i> Worked at <strong><?php echo $work2; ?></strong></div><?php }; ?>
    <?php if($work3){; ?>
    <div class="card-text p-2 m-2"><i class="fas fa-briefcase mr-2"></i> Worked at <strong><?php echo $work3; ?></strong></div><?php }; ?>
    <?php if($work4){; ?>
    <div class="card-text p-2 m-2"><i class="fas fa-briefcase mr-2"></i> Worked at <strong><?php echo $work4; ?></strong></div><?php }; ?>
    <?php if($education1){; ?>
    <div class="card-text p-2 m-2"><i class="fas fa-graduation-cap mr-2"></i> Went to <strong><?php echo $education1; ?></strong></div><?php }; ?>
    <?php if($education2){; ?>
    <div class="card-text p-2 m-2"><i class="fas fa-graduation-cap mr-2"></i> Went to <strong><?php echo $education2; ?></strong></div><?php }; ?>
    <?php if($education3){; ?>
    <div class="card-text p-2 m-2"><i class="fas fa-graduation-cap mr-2"></i> Went to <strong><?php echo $education3; ?></strong></div><?php }; ?>
    <?php if($education4){; ?>
    <div class="card-text p-2 m-2"><i class="fas fa-graduation-cap mr-2"></i> Went to <strong><?php echo $education4; ?></strong></div><?php }; ?>
    <?php if($address){; ?>
    <div class="card-text p-2 m-2"><i class="fas fa-home mr-2"></i> Lives in <strong><?php echo $address; ?></strong></div><?php }; ?>
    <?php if($location){; ?>
    <div class="card-text p-2 m-2"><i class="fas fa-map-marker-alt mr-2"></i>  <strong><?php echo $location; ?></strong></div><?php }; ?>
    <form method="post">
        <button type="submit" name="action" id="editprofile" class="pl-3 pr-3 pt-2 pb-2 ml-3 rounded-pill" value="Edit Profile">
            <i class="fas fa-user-edit mr-2"></i>Edit Profile
        </button>
    </form>
</div>