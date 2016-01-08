<?php

class Translate {
    public function pirateTranslate($post) {
        $tweet = rawurlencode($post['tweet']);
        $requestString = "http://isithackday.com/arrpi.php?text=".$tweet;
        //$requestString = "http://isithackday.com/arrpi.php?text=".$tweet."&format=json";

        $result = stripslashes(file_get_contents($requestString));
        $result = json_encode(['pirate' => $result]);
        echo $result;
        //$json = json_decode($result);
        //echo $json->translation->pirate;
    }
}

$translate = new Translate();
$translate->pirateTranslate($_POST);
