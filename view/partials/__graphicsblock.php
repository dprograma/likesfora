<div class="row" style="margin: auto;">
  <div class="card <?php echo $margintop; ?> mb-4 p-2 customshadow w-100">
    <div class="row">
      <div class="col-md-3 col-6">
        <p class="text-center mb-2 mx-auto" style="font-size: 13px;">Add Video <img src="../assets/images/addvideo.png" alt="add video" class="mr-5 imgicon mx-auto"></p>
      </div>
      <div class="col-md-3 col-6">
        <p class="text-center mb-2" style="font-size: 13px;">Photo <img src="../assets/images/picture.png" alt="add images" class="mr-5 imgicon mx-auto"></p>
      </div>
      <div class="col-md-3 col-6">
        <p class="text-center mb-2" style="font-size: 13px;">Buy likes <img src="../assets/images/like&getpaid.png" alt="buy likes" class="mr-5 pb-2 imgicon mx-auto"></p>
      </div>
      <div class="col-md-3 col-6">
        <p class="text-center mb-2" style="font-size: 13px;">How are you feeling? <img src="../assets/images/smile.png" alt="how are you feeling?" class="imgicon mx-auto"></p>
      </div>
    </div>
    <hr />
    <div class="card-body pt-1">
      <div class="card-text">
        <img src="../assets/images/profile/<?php echo $profileimage; ?>" alt="profle name" class="postimg mr-1">
      </div>
      <form method="POST">     
        <input type="button" value="Say something to friends..." class="rounded-pill btn-block p-2 pl-3 text-left mt-2 sendpost">
      </form>
    </div>
  </div>
</div>