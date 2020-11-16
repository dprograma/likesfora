$("document").ready(function () {
    sinchClient = new SinchClient({
        applicationKey: "d7b1cd8e-1b44-42c4-9240-c6815e3d5e92",
        capabilities: { calling: true, video: true },
        supportActiveConnection: true,
        onLogMessage: function (message) {
            console.log(message.message);
        },
    });

    var callClient;
    var call;

    $("#login").on("click", function (event) {
        event.preventDefault();

        var signUpObj = {};
        signUpObj.username = $("input#username").val();
        signUpObj.password = $("input#password").val();

        sinchClient.start(signUpObj, afterStartSinchClient());
    });

    $("#signup").on("click", function (event) {
        event.preventDefault();

        var signUpObj = {};
        signUpObj.username = $("input#username").val();
        signUpObj.password = $("input#password").val();

        sinchClient.newUser(signUpObj, function (ticket) {
            sinchClient.start(ticket, afterStartSinchClient());
        });
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
            $("div#status").append("<div>Incoming Call</div>");
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
            $("div#status").append("<div>Call established</div>");
            $("video#outgoing").attr("src", call.outgoingStreamURL);
            $("video#incoming").attr("src", call.incomingStreamURL);
        },
        //ended by either party
        onCallEnded: function (call) {
            $("div#status").append("<div>Call ended</div>");
            $("video#outgoing").attr("src", "");
            $("video#incoming").attr("src", "");
            call = null;
        }
    }

    //When the call button is clicked, gether the username to call
    $("#call").on("click", function (event) {
        event.preventDefault();
        //if there isn't a current call
        if (!call) {
            usernameToCall = $("input#usernameToCall").val()
            //change the value of the status label
            $("div#status").append("<div>Calling " + usernameToCall + "</div>");
            //change the call variable to the new call
            //call = callClient.callUser(usernameToCall);
            call = sinchClient.callUser(usernameToCall);
            //monitor the status of the call through callListeners
            call.addEventListener(callListeners);
        }
    });

    //Ansering a cal
    $("#answer").click(function (event) {
        event.preventDefault();
        //make sure a call exists before attempting to answer
        if (call) {
            $("div#status").append("<div>You answered the call</div>");
            call.answer();
        }
    });

    //Hangup
    $("#hangup").click(function (event) {
        event.preventDefault();
        //Make sure there is a current call to hangup
        if (call) {
            $("div#status").append("<div>You hung up the call</div>");
            //Simply call the hangup() method on the call variable
            call.hangup();
            //set the call variable to null and then you are ready to call again!
            call = null
        }
    });
});