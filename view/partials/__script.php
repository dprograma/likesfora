<script type="text/javascript" src="../assets/js/app.js"></script>
<script src="../assets/js/sinch.min.js"></script>
<script src="../assets/js/sinchindex.js"></script>
<script src="../assets/emojilib/js/config.js"></script>
<script src="../assets/emojilib/js/util.js"></script>
<script src="../assets/emojilib/js/jquery.emojiarea.js"></script>
<script src="../assets/emojilib/js/emoji-picker.js"></script>
<script>
    function userlogin() {
        location.href = "../index.php";
    }

    function userregister() {
        location.href = "../view/signup.php";
    }
</script>
<script>
    $(function() {
        window.emojiPicker = new EmojiPicker({
            emojiable_selector: '[data-emojiable=true]',
            assetsPath: '../assets/emojilib/img/',
            popupButtonClasses: 'fas fa-smile'
        });
        window.emojiPicker.discover();
    });

    function getData(uid) {
        $.ajax({
            url: 'handler.php?uid=' + uid,
            success: function(html) {
                var ajaxDisplay = document.getElementById('comments');

                ajaxDisplay.innerHTML = html;
            }
        });
    }
</script>