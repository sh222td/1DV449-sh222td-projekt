<?php
require_once('twitterLogin/OAuth.php');
require_once('twitterLogin/twitteroauth.php');
require_once('properties/properties.php');
require_once('login.php');
require_once('app.php');

/* Class that checks which user is online and makes an call to the twitter API's
 * search function and returns all the user's tweeets.
 */
class GetTweets {

    private $app;
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
        $this->app = new App();

        $this->app->loggedInView();
        $this->getTweets();
    }

    public function getTweets() {
        $this->login->checkLogin();

        $currentUser = $_SESSION['data']->screen_name;
        $result = $this->twitter->get('https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$currentUser.'');

        $tweets = json_encode($result);
        echo $tweets;
    }
}

new GetTweets();