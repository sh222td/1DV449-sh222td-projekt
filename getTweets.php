<?php
require_once('twitterLogin/twitteroauth/OAuth.php');
require_once('twitterLogin/twitteroauth/twitteroauth.php');
require_once('properties/properties.php');


class GetTweets {

    private $properties;
    private $consumerKey;
    private $consumerSecret;
    private $accessToken;
    private $accessTokenSecret;
    private $twitter;

    public function __construct() {
        $this->properties = new Properties();
        $this->consumerKey = $this->properties->getConsumerKey();
        $this->consumerSecret = $this->properties->getConsumerSecret();
        $this->accessToken = $this->properties->getAccessToken();
        $this->accessTokenSecret = $this->properties->getAccessTokenSecret();
        $this->twitter = new TwitterOAuth($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessTokenSecret);

        $this->getTweets();
    }

    public function getTweets() {
        /*if(file_exists('tweets.json') && filemtime('tweets.json') > (time() - 900)){
            echo file_get_contents('tweets.json');
        }else{*/
        $tweets = $this->twitter->get('https://api.twitter.com/1.1/statuses/user_timeline.json');
        $arr = json_encode($tweets);

        file_put_contents('tweets.json',$arr);
        echo file_get_contents('tweets.json');
        /*}*/
    }
}

new GetTweets();