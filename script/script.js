'use strict';

function callAjax() {
    $.ajax({
        type: "GET",
        url: "./getTweets.php",
        dataType: "json",
        success: function(data){
            getTweets(data);
        }
    });
}

function getTweets(data) {
    $(data).each(function() {
        var tweet = this;
        var list = document.getElementById('tweetsList');
        var twittarrIcon = document.createElement('img');
        twittarrIcon.className = 'twittarrImage';
        twittarrIcon.src = "./img/TwittarrLogo.png";
        var listObject = document.createElement('li');
        var tweetCreator = document.createElement('p');
        var tweetText = document.createElement('p');
        tweetCreator.className = 'tweetCreator';
        tweetText.className = 'tweetText';
        tweetCreator.textContent = tweet.user.name;
        tweetText.textContent = tweet.text;
        listObject.appendChild(tweetCreator);
        listObject.appendChild(tweetText);
        listObject.appendChild(twittarrIcon);
        list.appendChild(listObject);

        $(twittarrIcon).click(function() {
            callTranslate(tweet.text);
        });
    });

}

function callTranslate(tweet) {
    clearTranslation();
    if(tweet && tweet.length){
        $.ajax({
            type: "POST",
            url: "./translate.php",
            data: {tweet: tweet},
            dataType: "json"
        }).done(function(data){
            presentTranslation(data.pirate);
        });
    }
}

function presentTranslation(translatedTweet) {
    var translateBox = document.getElementById('translatedBox');
    var pirateTweet = document.createElement('p');
    pirateTweet.textContent = translatedTweet;
    translateBox.appendChild(pirateTweet);
}

function clearTranslation() {
    var translateBox = document.getElementById('translatedBox');
    translateBox.textContent = '';
}

window.onload = function() {
    callAjax();
};



