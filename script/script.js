'use strict';

/* Makes a call to the php function and sends the returned data to the presentUserTweets function for presentation.*/
function callAjax() {
    $.ajax({
        type: "GET",
        url: "./getTweets.php",
        dataType: "json",
        success: function(data){
            presentUserTweets(data);
        }
    });
}

/* Uses the data from the ajax call and displays it on the body in the html */
function presentUserTweets(data) {
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

/* Makes a call to the php function and sends the returned data to the presentTranslation function for presentation.*/
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

/* Uses the data from the ajax call and displays it on the body in the html */
function presentTranslation(translatedTweet) {
    var translateBox = document.getElementById('translatedBox');
    var pirateTweet = document.createElement('p');
    pirateTweet.textContent = translatedTweet;
    translateBox.appendChild(pirateTweet);
}

/* Clears the translated result from the body in the html. */
function clearTranslation() {
    var translateBox = document.getElementById('translatedBox');
    translateBox.textContent = '';
}

/* Checks if a form has been posted and makes a call to a php function and sends the returned data to the
* presentSearchedTweets function for presentation.*/
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
            presentSearchedTweets(JSON.parse(data));
        }).fail(function(data) {
            console.log("Fail");
        });
    });
}

/* Uses the data from the ajax call and displays it on the body in the html */
function presentSearchedTweets(searchResult) {
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

/* Clears the search result from the body in the html. */
function clearSearchResult() {
    var searchBox = document.getElementById('searchResult');
    searchBox.textContent = '';
}

window.onload = function() {
    search();
    callAjax();
};



