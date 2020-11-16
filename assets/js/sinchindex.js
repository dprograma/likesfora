$("document").ready(function () {
    sinchClient = new SinchClient({
        applicationKey: "d7b1cd8e-1b44-42c4-9240-c6815e3d5e92",
        capabilities: { calling: true, video: false },
        supportActiveConnection: true,
        onLogMessage: function (message) {
            console.log(message.message);
        },
    });

    var callClient;
    var call;

    // $("#signup").on("click", function (event) {
    //     event.preventDefault();

    //     var signUpObj = {};
    //     signUpObj.username = $("input#username").val();
    //     signUpObj.password = $("input#password").val();

    //     sinchClient.newUser(signUpObj, function (ticket) {
    //         sinchClient.start(ticket, afterStartSinchClient());
    //     });
    // });

    $("#videocall").on("click", function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controllers/videocontroller.php',
            type: 'POST',
            datatype: 'JSON',
            success: function (data) {
                var data = JSON.parse(data);
                for (var i = 0; i < (data.length); i++) {
                    var signUpObj = {};
                    signUpObj.userid = data[i].userId;
                    signUpObj.firstname = data[i].firstname;
                    signUpObj.lastname = data[i].lastname;
                    signUpObj.password = data[i].password;
                    sinchClient.newUser(signUpObj, function (ticket) {
                        sinchClient.start(ticket, afterStartSinchClient());
                    });
                }
                location.href = "../view/videocall.php";
            }
        });
    });

    $(".call").on("click", function (event) {
        event.preventDefault();

        var loggeduserid = $(this).siblings("input[name='loggeduserid']").val();
        var userid = $(this).siblings("input[name='userid']").val();
        var loggedfirstname = $(this).siblings("input[name='loggedfirstname']").val();
        var firstname = $(this).siblings("input[name='firstname']").val();
        var loggedlastname = $(this).siblings("input[name='loggedlastname']").val();
        var lastname = $(this).siblings("input[name='lastname']").val();
        var loggedpassword = $(this).siblings("input[name='loggedpassword']").val();
        var password = $(this).siblings("input[name='password']").val();
        console.log(loggeduserid, userid, loggedfirstname, firstname, loggedlastname, lastname);

        var signUpObj1 = {};
        var signUpObj2 = {};
        signUpObj1.loggeduserid = loggeduserid;
        signUpObj2.userid = userid;
        signUpObj1.loggedfirstname = loggedfirstname;
        signUpObj2.firstname = firstname;
        signUpObj1.loggedlastname = loggedlastname;
        signUpObj2.lastname = lastname;
        signUpObj1.loggedpassword = loggedpassword;
        signUpObj2.password = password;

        sinchClient.newUser(signUpObj1, function (ticket) {
            sinchClient.start(ticket, afterStartSinchClient());
        });

        sinchClient.newUser(signUpObj2, function (ticket) {
            sinchClient.start(ticket, afterStartSinchClient());
        });

        // sinchClient.start(signUpObj1, afterStartSinchClient());
        // sinchClient.start(signUpObj2, afterStartSinchClient());

        if (!call) {
            usernameToCall = firstname + ' ' + lastname;
            //change the value of the status label
            $("div#status").append("<div>Calling " + usernameToCall + " <img src='../assets/images/gif/videocall-loader.gif'></div>");
            //change the call variable to the new call
            call = callClient.callUser(usernameToCall);
            //monitor the status of the call through callListeners
            call.addEventListener(callListeners);
        }
    });

    function afterStartSinchClient() {
        // hide auth form
        $("form#authForm").css("display", "none");
        // show logged-in view
        $("div#sinch").css("display", "inline");
        // start listening for incoming calls
        sinchClient.startActiveConnection();
        // define call client (to handle incoming/outgoing calls)
        callClient = sinchClient.getCallClient();
        //initialize media streams, asks for microphone & video permission
        callClient.initStream();
        //what to do when there is an incoming call
        callClient.addEventListener(incomingCallListener);
    }

    var incomingCallListener = {
        onIncomingCall: function (incomingCall) {
            //Change the view to display an incoming call
            $("div#mystatus").append("<div>Incoming Call <img src='../assets/images/gif/videocall-loader.gif'></div>");
            //assign the call variable to the incoming call
            call = incomingCall;
            //Use the addEventListener method on the call object to make sure we are updated of any changes to the call's status
            call.addEventListener(callListeners);
        }
    }

    var callListeners = {
        //call is "ringing"
        onCallProgressing: function (call) {
            $("div#status").append("<div>Ringing</div>");
        },
        //they picked up the call!
        onCallEstablished: function (call) {
            $("div#mystatus").append("<div>Call established</div>");
            $("div#status").append("<div>Call established</div>");
            $("video#incoming").attr("src", call.outgoingStreamURL);
            $("video#incoming").attr("src", call.incomingStreamURL);
        },
        //ended by either party
        onCallEnded: function (call) {
            $("div#status").append("<div>Call ended</div>");
            $("div#mystatus").append("<div>Call ended</div>");
            $("video#incoming").attr("src", "");
            $("video#incoming").attr("src", "");
            call = null;
        }
    }

    // $("#login").on("click", function (event) {
    //     event.preventDefault();

    //     var signUpObj = {};
    //     signUpObj.username = $("input#username").val();
    //     signUpObj.password = $("input#password").val();

    //     sinchClient.start(signUpObj, afterStartSinchClient());
    // });

    //When the call button is clicked, gether the username to call
    // $(".call").on("click", function (event) {
    //     event.preventDefault();

    //     var signUpObj = {};
    //     signUpObj.userid = data.userId;
    //     signUpObj.firstname = data.firstname;
    //     signUpObj.lastname = data.lastname;
    //     signUpObj.password = data.password;

    //     sinchClient.start(signUpObj, afterStartSinchClient());
    //     //if there isn't a current call
    //     if (!call) {
    //         usernameToCall = data.firstname + ' ' + data.lastname;
    //         //change the value of the status label
    //         $("div#status").append("<div>Calling " + usernameToCall + "</div>");
    //         //change the call variable to the new call
    //         call = callClient.callUser(usernameToCall);
    //         //monitor the status of the call through callListeners
    //         call.addEventListener(callListeners);
    //     }
    // });



    //Ansering a cal
    $("#answer").click(function (event) {
        event.preventDefault();
        //make sure a call exists before attempting to answer
        if (call) {
            $("div#mystatus").append("<div>You answered the call<img src='../assets/images/gif/videocall-loader.gif'></div>");
            call.answer();
        }
    });

    //Hangup
    $("#hangup").click(function (event) {
        event.preventDefault();
        //Make sure there is a current call to hangup
        if (call) {
            $("div#mystatus").append("<div>You hung up the call</div>");
            //Simply call the hangup() method on the call variable
            call.hangup();
            //set the call variable to null and then you are ready to call again!
            call = null
        }
    });
});



