'use strict';

function callAjax() {
    $.ajax({
        type: "get",
        url: "./getTweets.php",
        success: function(data){
            getTweets(data);
        }
    });
}

function getTweets(data) {
    var json = $.parseJSON(data);
    /*$.(function () {
    });*/

    /*$.each( json, function( key, value ) {
        console.log(this.text);
    });*/
    $(json).each(function() {
        console.log(this.text);
        var tweet = this;
        var list = document.getElementById('tweetsList');
        var listObject = document.createElement('li');
        listObject.textContent = tweet.text;
        list.appendChild(listObject);
    });

}

window.onload = function() {
    callAjax();
};



