<?php
    require "twitteroauth/autoload.php";
    
    use Abraham\TwitterOAuth\TwitterOAuth;
    session_start();
    define('CONSUMER_KEY', '2rP4dhTqcR2VVTJWFw1hgzCBI');
    define('CONSUMER_SECRET', 's1LBBByvyBSi03lxMETXhkkQWDmXV4g2rdc5YUjIZEGw36bve8');
    define('OAUTH_CALLBACK', "http://localhost/youtube-twitter/twitter-authorize.php");
    $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
   // $content = $connection->get("account/verify_credentials");
    $request_token = false;
    try{
    $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
    }
    catch(Exception $e){
        echo 'Message: ' .$e->getMessage();
    }

    //die($request_token);
    $_SESSION['oauth_token'] = $request_token['oauth_token'];
    $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

//    if($connection->http_code==200){
//        // Let's generate the URL and redirect
//        
//    } else {
//        // It's a bad idea to kill the script, but we've got to know when there's an error.
//        die('Something wrong happened.');
//    }
    $url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
        header('Location: '. $url);
    


