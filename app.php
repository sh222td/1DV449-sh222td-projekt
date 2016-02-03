<?php
require_once('login.php');

class App {
    private $login;

    public function startView() {
        $this->login = new Login();

        $view = "<!DOCTYPE html>
        <html>
            <head>
                <meta charset = 'UTF-8'>
                <link rel='stylesheet' type='text/css' href='style/style.css' media='screen'>
                <link rel='stylesheet' type='text/css' href='style/offline-theme-default.css' media='screen,projection'>
                <link rel='stylesheet' type='text/css' href='style/offline-language-english.css' media='screen,projection'>
                <link rel='stylesheet' type='text/css' href='style/offline-language-english-indicator.css' media='screen,projection'>
                <link rel='shortcut icon' href='img/TwittarrLogoIcon.png' type='image/png'>
                <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
                <script src='script/script.js'></script>
                <script src='//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
                <script src='//code.jquery.com/jquery-2.1.4.min.js'></script>
                <script src='script/offline.min.js'></script>
            </head>
            <body>
            <div id='introText'>Hi and welcome to Twittarr, your very own twitter translator!<br><br><strong>Step 1:</strong> Log in to your twitter account
            <br><strong>Step 2:</strong> Start translating your own tweets into piratical language!</div>
            <div id='translatedBox'></div>
            " .
                $this->login->checkLogin()
            ."
            <div id='box'>
                    <img id='logoIcon' src='img/TwittarrLogo.png'>
                <h1 id='headerText'>Twittarr!</h1>
            </div>

            <ul id='searchResult'></ul>
            </body>
        </html>";

        return $view;
    }

    public function loggedInView() {
        $view = "<ul id='tweetsList'>
                </ul>
                <div id='searchBox'>
                    <div id='removeButton'></div>
                    <form id='searchForm' method='post' action='?search'>
                        Search
                        <i class='material-icons'>search</i>
                        <input id='inputText' type='text' name='searchTweet' pattern='[a-zA-Z0-9!@#$%^*_|]{0,30}' title='Allowed characters: a-z,#,@,!,^,%,_,$' placeholder=' Hashtag, keyword, etc...'>
                    </form>
                </div>";

        return $view;
    }
}