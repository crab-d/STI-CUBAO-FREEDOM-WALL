const tribute = new Tribute({
    trigger: "@",
    values: function (text, callback) {
        $.get("../User/Handler/UserMentionHandler.php", { query: text }, function (data) {
            callback(data);
        }, 'json');
    }
});

tribute.attach(document.getElementById("comment-box"));