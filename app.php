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
                <link rel='shortcut icon' href='img/TwittarrLogoIcon.png' type='image/png'>
            </head>
            <body>" .
                $this->login->checkLogin()
            ."
            <div id='box'>
                    <img id='logoIcon' src='img/TwittarrLogo.png'>
                <h1 id='headerText'>Twittarr!</h1>
            </div>
            <div id='translatedBox'>
            </div>
            <script src='script/script.js'></script>
            <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
            <script src='//code.jquery.com/jquery-2.1.4.min.js'></script>
            </body>
        </html>";

        /*echo "<pre>";
        var_dump($_SESSION['data']->screen_name);
        echo "</pre>";*/
        return $view;
    }

    /*public function startView() {
        /*$url = '//' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        if (strpos($url,'index.php?success') !== false) {
            return $this->htmlView($this->loggedInView());
        }*/

    /*    $view = "";
        return $view;
    }*/

    public function loggedInView() {
        $view = "<ul id='tweetsList'>
                </ul>";
        return $view;
    }
}