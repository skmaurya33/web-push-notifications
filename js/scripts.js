// Initialize Firebase
var config = {
    apiKey: "AIzaSyBX3igw-kBAwZMLTcBq2GfFNucJJFoAmvg",
    authDomain: "gcm-push-e9ad8.firebaseapp.com",
    databaseURL: "https://gcm-push-e9ad8.firebaseio.com",
    projectId: "gcm-push-e9ad8",
    storageBucket: "gcm-push-e9ad8.appspot.com",
    messagingSenderId: "381897553235"
};
firebase.initializeApp(config);

// Retrieve Firebase Messaging object.
const messaging = firebase.messaging();
messaging.requestPermission().then(function () {
    console.log('Notification permission granted.');

    if (isTokenSentToServer()) {
        console.log('Token already saved.');
    } else {
        getRegToken();
    }

}).catch(function (err) {
    setTokenSentToServer(false);
    console.log('Unable to get permission to notify.', err);
});

function getRegToken() {

    messaging.getToken().then(function (currentToken) {
        if (currentToken) {
            saveToken(currentToken);
            console.log(currentToken);
            setTokenSentToServer(true);
        } else {
            console.log('No Instance ID token available. Request permission to generate one.');
            setTokenSentToServer(false);
        }
    }).catch(function (err) {
        console.log('An error occurred while retrieving token. ', err);
        //showToken('Error retrieving Instance ID token. ', err);
        setTokenSentToServer(false);
    });
}

function isTokenSentToServer() {
    return window.localStorage.getItem('sentToServer') === '1';
}

function setTokenSentToServer(sent) {
    window.localStorage.setItem('sentToServer', sent ? '1' : '0');
}
function saveToken(currentToken) {
    var formData = new FormData();
    formData.append('token', currentToken);

    $.ajax({
        type: "post",
        url: 'ajax.php',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
    }).done(function (result) {
        console.log(result);
    });

    /*if (!isTokenSentToServer()) {
     console.log('Sending token to server...');
     // TODO(developer): Send the current token to your server.
     setTokenSentToServer(true);
     } else {
     console.log('Token already sent to server so won\'t send it again ' +
     'unless it changes');
     }*/
}

messaging.onMessage(function (payload) {
    console.log(payload);

    var notificationTitle = payload.data.title;
    var notificationOptions = {
        body: payload.data.body,
        icon: payload.data.icon,
        //image: payload.data.image
        click_action: payload.data.click_action,
        /*actions:[
               {
            title: "Like",
            action: "like",
            icon: "icons/heart.png"
     
        }]*/
    };
    //console.log(notificationOptions);
    var notification = new Notification(notificationTitle, notificationOptions);


/*
    notification.onclick = function (event) {
        console.log(event);
        event.preventDefault(); // prevent the browser from focusing the Notification's tab
        window.open('http://www.mozilla.org', '_blank');
    };*/


});