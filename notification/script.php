<?php
if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
    http_response_code(403);
    exit;
}

include 'auth/is_loggedin.php';

echo "
<script src='https://www.gstatic.com/firebasejs/9.1.0/firebase-app-compat.js'></script>
<script src='https://www.gstatic.com/firebasejs/9.1.0/firebase-messaging-compat.js'></script>
<script src='init.js'></script>
<script>
Notification.requestPermission()
const messaging = firebase.messaging();

// IDs of divs that display registration token UI or request permission UI.
const tokenDivId = 'token_div';
const permissionDivId = 'permission_div';

// Handle incoming messages. Called when:
// - a message is received while the app has focus
// - the user clicks on an app notification created by a service worker
//   `messaging.onBackgroundMessage` handler.
messaging.onMessage((payload) => {
  console.log('Message received. ', payload);
  // Update the UI to include the received message.
  //appendMessage(payload);
  updateNotificationHeader().then(function(data){
    $('#notification_icon').attr('src','images/notification-unread.png');
    $('#notification_container').html(data);
  });
});

// Send the registration token your application server, so that it can:
// - send messages back to this app
// - subscribe/unsubscribe the token from topics
function sendTokenToServer(currentToken) {
    console.log(currentToken);
  console.log('Initiating connection to server...');
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

function getNotificationToken() {
    messaging.getToken({vapidKey: 'BEQgC5sgDC2Sq4QvBM8SQ9yq2M1B_Tz0-J4bjlfiD0XCggZ66QtBESiId5JY5LR2ehTg3SH8dygYKAHR7ce46G8'}).then(function(currentToken) {  
        if (currentToken) {
          sendTokenToServer(currentToken).then(function(data) {
            if (data == true) {
              console.log('Token sent to server.');
            } else {
              console.log('Token already sent to server so won\'t send it again unless it changes');
            }
          }).catch((err) => {
            console.log('An error occurred while updating token. ', err);
          });
          updateUIForPushEnabled(currentToken);
        } else {
          // Show permission request.
          console.log('No registration token available. Request permission to generate one.');
          // Show permission UI.
          updateUIForPushPermissionRequired();
        }
      }).catch((err) => {
        console.log('An error occurred while retrieving token. ', err.message);
        if (err.code == 'messaging/permission-blocked') {
            $('#exampleModal').modal('toggle');
        }
        showToken('Error retrieving registration token. ', err);
    });
}

function resetUI() {
  clearMessages();
  showToken('loading...');
  // Get registration token. Initially this makes a network call, once retrieved
  // subsequent calls to getToken will return from cache.
  getNotificationToken();
}


function showToken(currentToken) {
  // Show token in console and UI.
  const tokenElement = document.querySelector('#token');
  tokenElement.textContent = currentToken;
}


function showHideDiv(divId, show) {
  const div = document.querySelector('#' + divId);
  if (show) {
    div.style = 'display: visible';
  } else {
    div.style = 'display: none';
  }
}

function requestPermission() {
  console.log('Requesting permission...');
  Notification.requestPermission().then((permission) => {
    if (permission === 'granted') {
      console.log('Notification permission granted.');
      // TODO(developer): Retrieve a registration token for use with FCM.
      // In many cases once an app has been granted notification permission,
      // it should update its UI reflecting this.
      getNotificationToken();
      resetUI();
    } else {
      console.log('Unable to get permission to notify.');
    }
  });
}

function deleteToken() {
  // Delete registration token.
  messaging.getToken().then((currentToken) => {
    messaging.deleteToken(currentToken).then(() => {
      console.log('Token deleted.');
      resetUI();
    }).catch((err) => {
      console.log('Unable to delete token. ', err);
    });
  }).catch((err) => {
    console.log('Error retrieving registration token. ', err);
    showToken('Error retrieving registration token. ', err);
  });
}

// Add a message to the messages element.
function appendMessage(payload) {
  const messagesElement = document.querySelector('#messages');
  const dataHeaderElement = document.createElement('h5');
  const dataElement = document.createElement('pre');
  dataElement.style = 'overflow-x:hidden;';
  dataHeaderElement.textContent = 'Received message:';
  dataElement.textContent = JSON.stringify(payload, null, 2);
  messagesElement.appendChild(dataHeaderElement);
  messagesElement.appendChild(dataElement);
}

// Clear the messages element of all children.
function clearMessages() {
  const messagesElement = document.querySelector('#messages');
  while (messagesElement.hasChildNodes()) {
    messagesElement.removeChild(messagesElement.lastChild);
  }
}

function updateUIForPushEnabled(currentToken) {
  showHideDiv(tokenDivId, true);
  showHideDiv(permissionDivId, false);
  showToken(currentToken);
}

function updateUIForPushPermissionRequired() {
  showHideDiv(tokenDivId, false);
  showHideDiv(permissionDivId, true);
}

$(document).ready(function() {
  resetUI();
});
</script>";
?>