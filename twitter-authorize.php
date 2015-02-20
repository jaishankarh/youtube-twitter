<?php
    require "twitteroauth/autoload.php";
    
    use Abraham\TwitterOAuth\TwitterOAuth;
    session_start();
//try{
    if(!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret'])){
        define('CONSUMER_KEY', '2rP4dhTqcR2VVTJWFw1hgzCBI');
        define('CONSUMER_SECRET', 's1LBBByvyBSi03lxMETXhkkQWDmXV4g2rdc5YUjIZEGw36bve8');
        define('OAUTH_CALLBACK', "http://localhost/youtube-twitter/");
        $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
        
        $access_token = $connection->oauth("oauth/access_token", array("oauth_verifier" => $_REQUEST['oauth_verifier']));
//        $url = $connection->url("oauth/authorize", array("oauth_token" => "EaQLH34YD8pgKkUiSp8RbjjOgNxIYVh7"));
//        header('Location: '.$url);
        
        // Print user's info
        $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
        $_SESSION['access_token'] = $access_token['oauth_token'];
        $_SESSION['access_token_secret'] =  $access_token['oauth_token_secret'];
//        $statues = $connection->post("statuses/update", array("status" => "hello world"));
        $user_info = $connection->get('account/verify_credentials');
//        $statuses = $connection->get("statuses/home_timeline", array("count" => 25, "exclude_replies" => true));
        //print_r($user_info);
         header('Location: listbysearch.html');
    } else {
        // Something's missing, go back to square 1
        header('Location: twitter_login.php');
    }
//}
//catch(Exception $e){
//    echo 'Message: ' .$e->getMessage();
//}

    