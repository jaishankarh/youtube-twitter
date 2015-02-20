// The client ID is obtained from the Google Developers Console
// at https://console.developers.google.com/.
// If you run this code from a server other than http://localhost,
// you need to register your own client ID.
var API_KEY = 'AIzaSyBHvd2Es2oyfDxRJNqGi-OveiMsWzUdswU';
var OAUTH2_SCOPES = [
  'https://www.googleapis.com/auth/youtube'
];

$(document).ready(function(){
  $('#login-link').click(function() {
      $("#search-button").attr("class","loading");
      //$("#search-button").html("");
      gapi.client.setApiKey(API_KEY);
      $('.pre-auth').hide();
      $('.post-auth').show();
      loadAPIClientInterfaces();
  });

});

// Load the client interfaces for the YouTube Analytics and Data APIs, which
// are required to use the Google APIs JS client. More info is available at
// http://code.google.com/p/google-api-javascript-client/wiki/GettingStarted#Loading_the_Client
function loadAPIClientInterfaces() {
  gapi.client.load('youtube', 'v3', function() {
    handleAPILoaded();
  });
}

// // Upon loading, the Google APIs JS client automatically invokes this callback.
// googleApiClientReady = function() {
//   gapi.client.setApiKey(API_KEY);
//   // gapi.auth.init(function() {
//   //   window.setTimeout(checkAuth, 1);
//   // });
// }

// // Attempt the immediate OAuth 2.0 client flow as soon as the page loads.
// // If the currently logged-in Google Account has previously authorized
// // the client specified as the OAUTH2_CLIENT_ID, then the authorization
// // succeeds with no user intervention. Otherwise, it fails and the
// // user interface that prompts for authorization needs to display.
// // function checkAuth() {
// //   gapi.auth.authorize({
// //     client_id: OAUTH2_CLIENT_ID,
// //     scope: OAUTH2_SCOPES,
// //     immediate: true
// //   }, handleAuthResult);
// // }

// // Handle the result of a gapi.auth.authorize() call.
// function handleAuthResult(authResult) {
//   if (authResult && !authResult.error) {
//     // Authorization was successful. Hide authorization prompts and show
//     // content that should be visible after authorization succeeds.
    
//   } else {
//     // Make the #login-link clickable. Attempt a non-immediate OAuth 2.0
//     // client flow. The current function is called when that flow completes.

//   }
// }

