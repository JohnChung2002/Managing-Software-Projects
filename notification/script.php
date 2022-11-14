<?php
if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
    http_response_code(403);
    exit;
}

include_once 'auth/is_loggedin.php';

echo "
<script src='https://www.gstatic.com/firebasejs/9.1.0/firebase-app-compat.js'></script>
<script src='https://www.gstatic.com/firebasejs/9.1.0/firebase-messaging-compat.js'></script>
<script src='init.js'></script>
<script>

Notification.requestPermission()
const messaging = firebase.messaging();

messaging.onMessage((payload) => {
  console.log('Message received. ', JSON.stringify(payload.FcmOptions));
  const notificationTitle = payload.notification.title;
  const notificationOptions = {
      body: payload.notification.body
  };
  navigator.serviceWorker.getRegistration('/firebase-cloud-messaging-push-scope').then(registration => {
    registration.showNotification(notificationTitle, notificationOptions)
  });
  updateNotificationIcon();
});

function updateNotificationIcon() {
  updateNotificationHeader().then(function(data) {
    $('#notification_icon').attr('src','images/notification-unread.png');
    $('#notification_container').html(data);
  });
  $('#notification_icon').click(function(){
    $('#notification_icon').attr('src','images/notification-read.png');
  });
}

function sendTokenToServer(currentToken) {
  return new Promise(function(resolve, reject) {
    $.ajax({
        type: 'GET',
        url: 'api/update_notification_token.php',
        data : {token : currentToken},
        success: function (result) {
            resolve(result);
        },
        error: function (result) {
            reject(result);
        }
    });
  });
}

function updateNotificationHeader() {
    return new Promise(function(resolve, reject) {
        $.ajax({
            type: 'GET',
            url: 'api/get_notifications.php',
            success: function (result) {
                resolve(result);
            },
            error: function (result) {
                reject(result);
            }
        });
    });
}

function isNotificationRejected() {
  return window.localStorage.getItem('rejected') === '0';
}

function rejectNotification() {
  window.localStorage.setItem('rejected', '0');
}

function isTokenSentToServer() {
  return window.localStorage.getItem('sentToServer') === '1';
}

function setTokenSentToServer(sent) {
  window.localStorage.setItem('sentToServer', sent ? '1' : '0');
}

function getNotificationToken() {
  if (!isNotificationRejected()) {
    messaging.getToken({vapidKey: 'BEQgC5sgDC2Sq4QvBM8SQ9yq2M1B_Tz0-J4bjlfiD0XCggZ66QtBESiId5JY5LR2ehTg3SH8dygYKAHR7ce46G8'}).then(function(currentToken) {
      if (!isTokenSentToServer()) {
        if (currentToken) {
          sendTokenToServer(currentToken).then(function(data) {
            if (data == true) {
              setTokenSentToServer(true);
            }
          }).catch((err) => {
            console.log('An error occurred while updating token. ', err);
          });
        }
      }
    }).catch((err) => {
      if (err.code == 'messaging/permission-blocked') {
          $('#exampleModal').modal('toggle');
      } else {
        console.log('An error occurred while retrieving token. ', err.message);
      }
    });
  }
}

function requestPermission() {
  Notification.requestPermission().then((permission) => {
    if (permission === 'granted') {
      getNotificationToken();
    } else {
      rejectNotification();
      console.log('Unable to get permission to notify.');
    }
  });
}

$(document).ready(function() {
  getNotificationToken();
});
</script>";
?>