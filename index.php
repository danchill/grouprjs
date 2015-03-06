<?php

    error_reporting(E_ALL);

    $API_KEY = 14125041;
    $API_SECRET = "704e3a4b2082783f11a2856c63bf8750c89bee61";

    echo $API_KEY;

    require_once 'lib/vendor/php/OpenTok/OpenTok.php';

    $apiObj = new OpenTok($API_KEY, $API_SECRET);
    $session = $apiObj->create_session($_SERVER["REMOTE_ADDR"],
        array('mediaMode' => MediaMode::ROUTED));
    $session = $apiObj->create_session();
    //echo $session->getSessionId();
?>

<html>
  <head></head>
  <body>

    <div id='myPublisherDiv'></div>
    <div id='subscribersDiv'></div>

    <script src='//static.opentok.com/webrtc/v2.2/js/opentok.min.js'></script>
    <script>
      var apiKey = '14125041';
      var sessionId = '<?php echo $session->getSessionId(); ?>';
      var token = 'T1==cGFydG5lcl9pZD0xNDEyNTA0MSZzaWc9MzU3NWE3MzBmYmFkNTI1N2RkZjllOTU1NDkxMGJhODcyNWY2MDU1ZTpyb2xlPXB1Ymxpc2hlciZzZXNzaW9uX2lkPTFfTVg0eE5ERXlOVEEwTVg1LU1UUXlNRFk1TXpBMU5EVTBOMzQxYTA5WlYyVkVVelU0V0VKc1ZGUnNMMFJ3TjFSaFFsQi1mZyZjcmVhdGVfdGltZT0xNDI1NjEzMTM5Jm5vbmNlPTAuMTIyODI1NDcyMzYyOTMzMTc=';
      var session = OT.initSession(apiKey, sessionId);
      session.on({
          streamCreated: function(event) {
            session.subscribe(event.stream, 'subscribersDiv', {insertMode: 'append'});
          }
      });
      session.connect(token, function(error) {
        if (error) {
          console.log(error.message);
        } else {
          session.publish('myPublisherDiv', {width: 320, height: 240});
        }
      });
    </script>
  </body>
</html>
