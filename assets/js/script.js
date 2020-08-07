$(document).ready(function () {
    $('#error').fadeIn().delay(5000).fadeOut();
    $('#success').fadeIn().delay(5000).fadeOut();

    $("#editprofileimage").click(function () {
        $(".overlay").fadeIn(); // show/hide the overlay
        $("#editcontent").fadeIn();
        $("#editcontent").load("../view/editimage.php", { profile: "profile image" });
        $("body").css({
            'overflow-y': 'hidden', /* Hide vertical scrollbar */
            'overflow-x': 'hidden' /* Hide horizontal scrollbar */
        });
        return false;
    });

    $("#editcoverimage").click(function () {
        $(".overlay").fadeIn(); // show/hide the overlay
        $("#editcontent").fadeIn().load("../view/editimage.php", { profile: "cover image" });
        $("body").css({
            'overflow-y': 'hidden', /* Hide vertical scrollbar */
            'overflow-x': 'hidden' /* Hide horizontal scrollbar */
        });
    });

    $("#editbio").click(function () {
        $(".overlay").fadeIn(); // show/hide the overlay
        $("#editcontent").fadeIn().load("../view/editbio.php");
        $("body").css({
            'overflow-y': 'hidden', /* Hide vertical scrollbar */
            'overflow-x': 'hidden' /* Hide horizontal scrollbar */
        });
    });

    $("#editprofile").click(function (e) {
        e.preventDefault();
        $(".overlay").fadeIn(); // show/hide the overlay
        $("#editcontent").fadeIn().load("../view/info.php").css({
            'transform': 'translate(0px, 350px)', 'overflow': 'auto'
        });
        $("body").css({
            'overflow-y': 'auto', /* Hide vertical scrollbar */
            'overflow-x': 'hidden', /* Hide horizontal scrollbar */
        });
    });

    $(".overlay").click(function () {
        $(this).fadeOut(); // show/hide the overlay
        $("#editcontent").fadeOut().css({ 'transform': 'translate(0px, -50px)' });
        $("body").css({
            'overflow-y': 'visible', /* Hide vertical scrollbar */
            'overflow-x': 'visible' /* Hide horizontal scrollbar */
        });
    });

    $(".clspopup").click(function () {
        $(".overlay").fadeOut(); // show/hide the overlay
        $("#editcontent").fadeOut().css({ 'transform': 'translate(0px, -50px)' });
        $("body").css({
            'overflow-y': 'visible', /* Hide vertical scrollbar */
            'overflow-x': 'visible' /* Hide horizontal scrollbar */
        });
    });

    $(".uploadform").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var buttonvalue = $(".uploadform").find('input[name=action]').val();
        $.ajax({
            type: "post",
            data: formData,
            url: "../controllers/usercontroller.php?action=" + buttonvalue,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.successmgs !== "") {
                    $("#result").empty();
                    $("#result").html("<div id='success' class='alert alert-success alert-dismissible text-center font-weight-bolder'>" + response.successmsg + "<a href='#' class='close' data-dismiss = 'alert' aria-label = 'close'>&times;</a></div>");
                }
                if (response.errormsg !== "") {
                    $("#result").empty();
                    $("#result").html("<div id='error' class='alert alert-danger alert-dismissible text-center font-weight-bolder'><a href='#' class='close' data-dismiss = 'alert' aria-label = 'close'>&times;</a>" + response.errormsg + "</div>");
                }
            }
        });

    });

    $("#bioform").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var buttonvalue = $("#bioform").find('button[name=action]').val();
        $.ajax({
            type: "post",
            data: formData,
            url: "../controllers/usercontroller.php?action=" + buttonvalue,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.successmgs !== "") {
                    $("#result").empty();
                    $("#result").html("<div id='success' class='alert alert-success alert-dismissible text-center font-weight-bolder'>" + response.successmsg + "<a href='#' class='close' data-dismiss = 'alert' aria-label = 'close'>&times;</a></div>");
                }
                if (response.errormsg !== "") {
                    $("#result").empty();
                    $("#result").html("<div id='error' class='alert alert-danger alert-dismissible text-center font-weight-bolder'><a href='#' class='close' data-dismiss = 'alert' aria-label = 'close'>&times;</a>" + response.errormsg + "</div>");
                }
            }
        });

    });

    $(".infoform").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var buttonvalue = $(".infoform").find('button[name=action]').val();
        $.ajax({
            type: "post",
            data: formData,
            url: "../controllers/usercontroller.php?action=" + buttonvalue,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.successmgs !== "") {
                    $("#result").empty();
                    $("#result").html("<div id='success' class='alert alert-success alert-dismissible text-center font-weight-bolder'>" + response.successmsg + "<a href='#' class='close' data-dismiss = 'alert' aria-label = 'close'>&times;</a></div>");
                }
                if (response.errormsg !== "") {
                    $("#result").empty();
                    $("#result").html("<div id='error' class='alert alert-danger alert-dismissible text-center font-weight-bolder'><a href='#' class='close' data-dismiss = 'alert' aria-label = 'close'>&times;</a>" + response.errormsg + "</div>");
                }
            }
        });

    });




    $("#backgd").on("click keyup", function (e) {
        e.preventDefault();
        $(".workbg").toggle({
            "display": "block"
        });
    });

    $("#academ").on("click keyup", function (e) {
        e.preventDefault();
        $(".academbg").toggle({
            "display": "block"
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgprev').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
 
    $("#profileimage").change(function () {
        readURL(this);
    });

    $(document).ajaxStop(function () {
        $("#ajax_loader").hide();
        return false;
    });
    $(document).ajaxStart(function () {
        $("#ajax_loader").show();
        return false;
    });
});

    // jQuery(function ($){
    //     $(document).ajaxStop(function(){
    //         $("#ajax_loader").hide();
    //      });
    //      $(document).ajaxStart(function(){
    //          $("#ajax_loader").show();
    //      });    
    // });    


