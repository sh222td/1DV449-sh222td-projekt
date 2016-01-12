<?php

/* Class that sends the data from the jQuery ajax to the translate API,
 * before send-off it encodes the data with rawurlencode()
 * when finished, it sends back the data to the ajax call.
 */
class Translate {
    public function pirateTranslate($post) {
        $tweet = rawurlencode($post['tweet']);
        $requestString = "http://isithackday.com/arrpi.php?text=".$tweet;

        $result = stripslashes(file_get_contents($requestString));
        $result = json_encode(['pirate' => $result]);
        echo $result;
    }
}

$translate = new Translate();
$translate->pirateTranslate($_POST);
