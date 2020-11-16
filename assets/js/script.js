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

    $(document).ready(function () {
        $(".likesimage").on("mouseover", function () {
            $(".toptotallikes").css({
                'transform': 'scale(1.5) translateX(15px)',
                'transition': '0.3s ease'
            });
        });

        $(".likesimage").on("mouseout", function () {
            $(".toptotallikes").css({
                'transform': 'scale(1.0) translateX(0px)',
                'transition': '0.3s ease',
            });
        });
    });

    // function humanreadable(timestamp){

    //     var time_ago        = new Date(timestamp).getTime();
    //     var current_time    = new Date().getTime();
    //     var time_difference = current_time - time_ago;
    //     var seconds         = time_difference;

    //     var minutes = Math.round(seconds / 60); // value 60 is seconds  
    //     var hours   = Math.round(seconds / 3600); //value 3600 is 60 minutes * 60 sec  
    //     var days    = Math.round(seconds / 86400); //86400 = 24 * 60 * 60;  
    //     var weeks   = Math.round(seconds / 604800); // 7*24*60*60;  
    //     var months  = Math.round(seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60  
    //     var years   = Math.round(seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

    //     if (seconds <= 60){

    //       return "Just Now";

    //     } else if (minutes <= 60){

    //       if (minutes == 1){

    //         return "one minute ago";

    //       } else {

    //         return "$minutes minutes ago";

    //       }

    //     } else if (hours <= 24){

    //       if (hours == 1){

    //         return "an hour ago";

    //       } else {

    //         return hours+" hrs ago";

    //       }

    //     } else if (days <= 7){

    //       if (days == 1){

    //         return "yesterday";

    //       } else {

    //         return days+" days ago";

    //       }

    //     } else if (weeks <= 4.3){

    //       if (weeks == 1){

    //         return "a week ago";

    //       } else {

    //         return weeks+" weeks ago";

    //       }

    //     } else if (months <= 12){

    //       if (months == 1){

    //         return "a month ago";

    //       } else {

    //         return months+" months ago";

    //       }

    //     } else {

    //       if (years == 1){

    //         return "one year ago";

    //       } else {

    //         return years+" years ago";

    //       }
    //     }
    //   }


    // function postReply(commentId) {
    //     $('#commentId').val(commentId);
    //     $("#name").focus();
    // }

    // $("#commentform").on("submit", function (e) {
    //     e.preventDefault();
    //     $("#commentmessage").css('display', 'none');
    //     var str = $(this).serialize();
    //     $.ajax({
    //         url: "../controllers/addcommentcontroller.php",
    //         data: str,
    //         type: 'post',
    //         success: function (response) {
    //             var result = eval('(' + response + ')');
    //             if (response) {
    //                 $("#commentmessage").css('display', 'inline-block');
    //                 $("#comment").val("");
    //                 $("#commentid").val("");
    //                 listComment();
    //             } else {
    //                 alert("Failed to add comments !");
    //                 return false;
    //             }
    //         }
    //     });
    // });

    // listComment();

    // function listComment() {
    //     $.ajax({
    //         url:"../controllers/fetchcommentcontroller.php",
    //         type: "post",
    //         datatype: "JSON",
    //         success: function(data){
    //             var data = JSON.parse(data)
    //             var comments = "";
    //             var replies = "";
    //             var item = "";
    //             var parent = -1;
    //             var results = new Array();

    //             var list = $("<ul style='list-style:none;'>");
    //             var item = $("<li>").html(comments);

    //             for (var i = 0; (i < data.length); i++) {
    //                 var commentId = data[i]['commentid'];
    //                 parent = data[i]['parentcommentid'];

    //                 if (parent == "0") {
    //                     comments = "<div class='card mt-2 mb-2' style='font-size:0.75rem;'>" +
    //                         "<div class='card-header'>from <b>from" + data[i]['comment_sender_name'] + "</b> at <i>" + humanreadable(data[i]['datecreated']) + "</i></div>" +
    //                         "<div class='card-body'>" + data[i]['comment'] + "</div>" +
    //                         "<div class='card-footer' align='right'><a class='rounded-pill p-2' onClick='postReply(" + commentId + ")'>Reply</a></div>" +
    //                         "</div>";

    //                     var item = $("<li>").html(comments);
    //                     list.append(item);
    //                     var reply_list = $("<ul style='list-style:none;'>");
    //                     item.append(reply_list);
    //                     listReplies(commentId, data, reply_list);
    //                 }
    //             }
    //             $("#commentdisplay").html(list);
    //         }
    //         });
    //     }

    //     $.post("../controllers/fetchcommentcontroller.php",
    //         function (data) {
    //             var comments = "";
    //             var replies = "";
    //             var item = "";
    //             var parent = -1;
    //             var results = new Array();

    //             var list = $("<ul class='outer-comment'>");
    //             var item = $("<li>").html(comments);

    //             for (var i = 0; (i < data.length); i++) {
    //                 var commentId = data[i]['commentid'];
    //                 parent = data[i]['parentcommentid'];

    //                 if (parent == "0") {
    //                     comments = "<div class='comment-row'>" +
    //                         "<div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['comment_sender_name'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'><?php echo humanreadable(" + data[i]['datecreated'] + "); ?></span></div>" +
    //                         "<div class='comment-text'>" + data[i]['comment'] + "</div>" +
    //                         "<div><a class='btn-reply' onClick='postReply(" + commentId + ")'>Reply</a></div>" +
    //                         "</div>";

    //                     var item = $("<li>").html(comments);
    //                     list.append(item);
    //                     var reply_list = $('<ul>');
    //                     item.append(reply_list);
    //                     listReplies(commentId, data, reply_list);
    //                 }
    //             }
    //             $("#commentdisplay").html(list);
    //         });
    // }

    // function listReplies(commentId, data, list) {
    //     for (var i = 0; (i < data.length); i++) {
    //         if (commentId == data[i].parentcommentid) {
    //             var comments = "<div class='card mt-2 mb-2' style='font-size:0.75rem;'>" +
    //                 "<div class='card-header'>from <b>" + data[i]['comment_sender_name'] + " </b> at <i> class='posted-at'>" + humanreadable(data[i]['datecreated']) + "</i></div>" +
    //                 "<div class='card-body'>" + data[i]['comment'] + "</div>" +
    //                 "<div class='card-footer' align='right'><a class='rounded-pill p-2' onClick='postReply(" + data[i]['commentid'] + ")'>Reply</a></div>" +
    //                 "</div>";
    //             var item = $("<li>").html(comments);
    //             var reply_list = $("<ul style='list-style:none;'>");
    //             list.append(item);
    //             item.append(reply_list);
    //             listReplies(data[i].comment_id, data, reply_list);
    //         }
    //     }
    // }

    // $(".commentform").on("submit", function (e) {
    //     e.preventDefault();
    //     var formdata = $(this).serialize();
    //     $.ajax({
    //         url: '../controllers/addcommentcontroller.php',
    //         data: formdata,
    //         method: 'POST',
    //         datatype: 'JSON',
    //         success: function (data) {
    //             if (data.error != '') {
    //                 $(".commentform")[0].reset();
    //                 $(".commentmessage").html(data.error);
    //                 var id = $("input[name='loggedinuserid']").val();
    //                 $(".commentid").val(id);
    //                 loadcomment();
    //             }
    //         }
    //     });
    // });

    // $(".commentform").on("submit", function (e) {
    //     e.preventDefault();
    //     var formdata = $(this).serialize();
    //     var buttonvalue = $(this).find('button[name=action]').val();
    //     $.ajax({
    //         url: '../view/viewpost.php?action=' + buttonvalue,
    //         data: formdata,
    //         method: 'POST',
    //         datatype: 'JSON',
    //         success: function(response){
    //             location.href="../view/viewpost.php";
    //         }
    //     });
    // });

    // loadcomment();

    // function loadcomment() {
    //     var id = $("input[name='loggedinuserid']").val();
    //     var sid = $("input[name='senderid']").val();
    //     var pid = $("input[name='postid']").val();
    //     $.ajax({
    //         url: '../controllers/fetchcommentcontroller.php',
    //         method: 'POST',
    //         data: 'loggedinuserid=' + id + '&senderid=' + sid + '&postid=' + pid,
    //         datatype: 'JSON',
    //         success: function (response) {
    //             if (response !== "") {
    //                 var data = JSON.parse(response);
    //                 //var post = eval("'#post" + data.postid + "'");
    //                 // $(post).css({ 'background-color': 'green', 'display': 'block', 'width': '100%', 'height': '30px' });

    //                 // console.log(response);
    //                 $("#commentdisplay").html(data.message);

    //             }
    //         }
    //     });
    // }

    // $("document").on("click", ".reply", function () {
    //     var commentid = $(this).attr('id');
    //     $("input[name='senderid']").val(commentid);
    //     $("#comment").focus();
    // });

    // function focuscomment(obj){
    //     obj.click(function (){
    //         $('.comment').focus();
    //     });
    // }

    // function onreply(obj) {
    //     var commentid = obj.attr('id');
    //     $("input[name='senderid']").val(commentid);
    //     $(".comment").focus();
    // }

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




