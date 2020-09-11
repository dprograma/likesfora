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

    $(".sendpost").click(function () {
        $(".overlay").fadeIn(); // show/hide the overlay
        $("#editcontent2").fadeIn().load("post.php");
        $("body").css({
            'overflow-y': 'auto', /* Hide vertical scrollbar */
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

    $("#tag").on("click", function (e) {
        e.preventDefault();
        $("#editcontent2").fadeIn().load("tagafriend.php");
    });

    $(".tagnav").on("click", function (e) {
        e.preventDefault();
        $("#editcontent2").fadeIn().load("post.php");
    });

    $(".overlay").click(function () {
        $(this).fadeOut(); // show/hide the overlay
        $("#editcontent").fadeOut();
        $("#editcontent2").fadeOut();
        $("body").css({
            'overflow-y': 'visible', /* Hide vertical scrollbar */
            'overflow-x': 'visible' /* Hide horizontal scrollbar */
        });
        window.location = window.location;
    });

    $(".clspopup").click(function () {
        $(".overlay").fadeOut(); // show/hide the overlay
        $("#editcontent").fadeOut();
        $("#editcontent2").fadeOut();
        $("body").css({
            'overflow-y': 'visible', /* Hide vertical scrollbar */
            'overflow-x': 'visible' /* Hide horizontal scrollbar */
        });
        window.location = window.location;
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

    $(".postform").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('content', $("#postcontent").html());
        var buttonvalue = $(this).find('button[name=action]').val();
        $.ajax({
            type: "post",
            data: formData,
            url: "../controllers/postcontroller.php?action=" + buttonvalue,
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

    $("#addtagform").on("submit", function (e) {
        e.preventDefault();
        $("#editcontent2").fadeIn().load("post.php", $(this).serialize());
    });

    $(".tagform").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var buttonvalue = $(".tagform").find('button[name=action]').val();
        $.ajax({
            type: "post",
            data: formData,
            url: "../controllers/postcontroller.php?action=" + buttonvalue,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (response) {
                if (response !== "") {
                    var tagnames = document.getElementById("tagnames");
                    var i = document.createElement("i");
                    var input = document.createElement("input");
                    i.className = "fas fa-times";
                    i.classList.add("notag");
                    tagnames.appendChild(i);
                    var val = response.replace(" ", "");
                    input.setAttribute("form", "addtagform");
                    input.setAttribute("name", val);
                    input.setAttribute("id", val);
                    input.setAttribute("value", response);
                    input.classList.add("tagclass");
                    i.onclick = function () {
                        $(this).fadeOut();
                        $(this).next('input').fadeOut();
                    };
                    input.innerHTML = response;
                    tagnames.insertBefore(input, null);
                }
            }
        });

    });

    $('#img').on("change", function (event) {
        var files = event.target.files; //FileList object
        var output = document.getElementById("imgresult");
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            //Only pics
            // if(!file.type.match('image'))
            if (file.type.match('image.*')) {
                if (this.files[0].size < 2097152) {
                    // continue;
                    var picReader = new FileReader();
                    picReader.addEventListener("load", function (event) {
                        var picFile = event.target;
                        var div = document.createElement("div");
                        div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                            "title='preview image'/>";
                        output.appendChild(div);
                    });
                    //Read the image
                    $('#imgresult').show();
                    picReader.readAsDataURL(file);
                } else {
                    alert("Image Size is too big. Minimum size is 2MB.");
                    $(this).val("");
                }
            } else {
                var vidcontent = document.getElementById("imgresult");
                var vid = document.createElement("div");
                let blobURL = URL.createObjectURL(file);
                vid.innerHTML = "<video class='thumbnail'><source id='vidprev'  src='" + blobURL + "' contenteditable='true'></video>";
                vidcontent.appendChild(vid);
                $('#imgresult').show();
            }
        }

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
                $('.imgprev').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    // $(document).on("change", "#vid", function (evt) {
    //     var $source = $('.vidprev');
    //     $source[0].src = URL.createObjectURL(this.files[0]);
    //     $source.parent()[0].load();
    // });

    $("#profileimage").change(function () {
        readURL(this);
    });
    $("#img").change(function () {
        readURL(this);
    });
    $("#gif").change(function () {
        readURL(this);
    });
    $("#tag").change(function () {
        readURL(this);
    });
    $("#emoji").change(function () {
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




