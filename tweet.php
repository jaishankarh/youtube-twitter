<?php
    require "twitteroauth/autoload.php";
    
    use Abraham\TwitterOAuth\TwitterOAuth;
    session_start();
    define('CONSUMER_KEY', '2rP4dhTqcR2VVTJWFw1hgzCBI');
    define('CONSUMER_SECRET', 's1LBBByvyBSi03lxMETXhkkQWDmXV4g2rdc5YUjIZEGw36bve8');
    if(!isset($_GET['title'])) {
        die("no title");
    }
    if(empty($_SESSION['access_token']) || empty($_SESSION['access_token_secret'])) {
        header('Location: twitter-login.php');
    }
    else{
        $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['access_token'], $_SESSION['access_token_secret']);
        $msg = "Watching ". $_GET['title'];
        $statues = $connection->post("statuses/update", array("status" => $msg ));
        if ($connection->getLastHttpCode() == 200) {
            echo "true";
        } else {
            echo "error occured";
        }
    }