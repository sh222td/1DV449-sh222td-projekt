<?php
require_once('twitterLogin/OAuth.php');
require_once('twitterLogin/twitteroauth.php');
require_once('properties/properties.php');
require_once('login.php');


class GetTweets {

    private $properties;
    private $consumerKey;
    private $consumerSecret;
    private $accessToken;
    private $accessTokenSecret;
    private $twitter;
    private $login;

    public function __construct() {
        $this->properties = new Properties();
        $this->consumerKey = $this->properties->getConsumerKey();
        $this->consumerSecret = $this->properties->getConsumerSecret();
        $this->accessToken = $this->properties->getAccessToken();
        $this->accessTokenSecret = $this->properties->getAccessTokenSecret();
        $this->twitter = new TwitterOAuth($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessTokenSecret);
        $this->login = new Login();

        $this->getTweets();
    }

    public function getTweets() {
        $this->login->checkLogin();
        /*if(file_exists('tweets.json') && filemtime('tweets.json') > (time() - 900)){
            echo file_get_contents('tweets.json');
        }else{*/
        //$tweets = $this->twitter->get('https://api.twitter.com/1.1/statuses/user_timeline.json');

        $currentUser = $_SESSION['data']->screen_name;
        $tweets = $this->twitter->get('https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$currentUser.'');

        $arr = json_encode($tweets);
        file_put_contents('tweets.json',$arr);
        echo file_get_contents('tweets.json');
        /*}*/
    }


}

new GetTweets();