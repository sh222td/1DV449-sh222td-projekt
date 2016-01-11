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
        var tweetDate = document.createElement('p');
        tweetCreator.className = 'tweetCreator';
        tweetText.className = 'tweetText';
        tweetDate.className = 'tweetDate';
        tweetCreator.textContent = tweet.user.name;
        tweetText.textContent = tweet.text;
        tweetDate.textContent = tweet.created_at;
        listObject.appendChild(tweetCreator);
        listObject.appendChild(tweetDate);
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

function search() {
    $('#searchForm').submit(function(event) {
        clearSearchResult();
        event.preventDefault(); // Prevent the form from submitting via the browser
        var form = $(this);
        $.ajax({
            type: form.attr('method'),
            url: "./searchTweets.php",
            data: form.serialize()
        }).done(function(data) {
            presentTweets(JSON.parse(data));
        }).fail(function(data) {
            console.log("Fail");
        });
    });
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

function presentTweets(searchResult) {
    $(searchResult.result.statuses).each(function() {
        var tweet = this;
        var searchResult = document.getElementById('searchResult');
        var twittarrIcon = document.createElement('img');
        twittarrIcon.className = 'twittarrImage';
        twittarrIcon.src = "./img/TwittarrLogo.png";
        var listObject = document.createElement('li');
        var tweetCreator = document.createElement('p');
        var tweetText = document.createElement('p');
        var tweetDate = document.createElement('p');
        tweetCreator.className = 'tweetCreator';
        tweetText.className = 'tweetText';
        tweetDate.className = 'tweetDate';
        tweetCreator.textContent = tweet.user.name;
        tweetDate.textContent = tweet.created_at;
        tweetText.textContent = tweet.text;
        listObject.appendChild(tweetCreator);
        listObject.appendChild(tweetDate);
        listObject.appendChild(tweetText);
        listObject.appendChild(twittarrIcon);
        searchResult.appendChild(listObject);

        $(twittarrIcon).click(function() {
            callTranslate(tweet.text);
        });
    });
}

function clearSearchResult() {
    var translateBox = document.getElementById('searchResult');
    translateBox.textContent = '';
}

window.onload = function() {
    search();
    callAjax();
};



