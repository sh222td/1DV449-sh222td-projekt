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
                <link rel='stylesheet' type='text/css' href='offline/themes/offline-theme-default.css' media='screen'>
                <link rel='stylesheet' type='text/css' href='offline/themes/offline-language-english.css' media='screen'>
                <link rel='shortcut icon' href='img/TwittarrLogoIcon.png' type='image/png'>
            </head>
            <body>" .
                $this->login->checkLogin()
            ."
            <div id='box'>
                    <img id='logoIcon' src='img/TwittarrLogo.png'>
                <h1 id='headerText'>Twittarr!</h1>
            </div>
            <div id='translatedBox'></div>
            <ul id='searchResult'></ul>
            <script src='script/script.js'></script>
            <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
            <script src='//code.jquery.com/jquery-2.1.4.min.js'></script>
            <script src='offline/offline.js'></script>
            <script src='offline/offline.min.js'></script>
            </body>
        </html>";

        return $view;
    }

    public function loggedInView() {
        $view = "<ul id='tweetsList'>
                </ul>
                <div id='searchBox'>
                    <form id='searchForm' method='post' action='?search'>
                        Search tweets:
                        <input id='inputText' type='text' name='searchTweet' pattern='[a-zA-Z0-9!@#$%^*_|]{0,30}' title='Allowed characters: a-z,#,@,!,^,%,_,$' placeholder=' Hashtag, keyword, etc...'>
                        <button id='submitSearch'>Search</button>
                    </form>
                </div>";

        return $view;
    }
}