<?php

require("lib/vendor/OpenTok/OpenTok.php");

$apiKey = "14125532";
$apiSecret = "6bd69c1953ba422cb7fab5fe2b5769d8f077ac1d";

$opentok = new OpenTok($apiKey, $apiSecret);

$session = $opentok->createSession();


?>

<html>
  <head>

    <style type="text/css">

    #streams{
      position:absolute;
      top:0px;
      left:100%;
      width:400px;
      margin-left:-400px;
    }

    </style>


    <script src='//static.opentok.com/webrtc/v2.2/js/opentok.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.firebase.com/js/client/2.2.2/firebase.js"></script>

  </head>
  <body>

    <div id='myPublisherDiv'></div>
    <div id='subscribersDiv'></div>

    <script>
      var apiKey = '14125041';
      var sessionId = '1_MX4xNDEyNTA0MX5-MTQyMDY5MzA1NDU0N341a09ZV2VEUzU4WEJsVFRsL0RwN1RhQlB-fg';
      var token = 'T1==cGFydG5lcl9pZD0xNDEyNTA0MSZzaWc9MzU3NWE3MzBmYmFkNTI1N2RkZjllOTU1NDkxMGJhODcyNWY2MDU1ZTpyb2xlPXB1Ymxpc2hlciZzZXNzaW9uX2lkPTFfTVg0eE5ERXlOVEEwTVg1LU1UUXlNRFk1TXpBMU5EVTBOMzQxYTA5WlYyVkVVelU0V0VKc1ZGUnNMMFJ3TjFSaFFsQi1mZyZjcmVhdGVfdGltZT0xNDI1NjEzMTM5Jm5vbmNlPTAuMTIyODI1NDcyMzYyOTMzMTc=';
      var session = OT.initSession(apiKey);

      console.log(session);

      var fbref =
      fbref.child("streams").on("value",listStreams);
      fbref.child("streams").push({
          "sessionID":sessionId
      });

      session.on({
          //streamCreated: function(event) {
          //  session.subscribe(event.stream, 'subscribersDiv', {insertMode: 'append'});
          //}
      });
      session.connect(token, function(error) {
        if (error) {
          console.log(error.message);
        } else {
          session.publish('myPublisherDiv', {width: 320, height: 240});
        }
      });


      function listStreams(e){
        $("#streams").empty();
        var streams = e.val();

        for(x in streams){

          console.log(streams[x]);

          $("#streams").append(streams[x].sessionID+"<br />");
        }

      }

    </script>

    <div id="streams">



    </div>

  </body>
</html>
