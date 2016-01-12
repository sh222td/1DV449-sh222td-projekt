<?php
require_once('twitterLogin/OAuth.php');
require_once('twitterLogin/twitteroauth.php');
require_once('properties/properties.php');
require_once('login.php');
require_once('app.php');

/* Class that takes the posted data from the ajax call and makes a call to the
 * twitter API's search function.
 */
class SearchTweets {

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
    }

    public function searchTweets($data) {
        $search = rawurlencode($data['searchTweet']);
        $result = $this->twitter->get('https://api.twitter.com/1.1/search/tweets.json?q='.$search.'');
        $tweets = json_encode(['result' => $result]);

        echo $tweets;
    }
}

$translate = new SearchTweets();
$translate->searchTweets($_POST);