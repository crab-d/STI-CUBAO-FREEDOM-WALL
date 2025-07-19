const tribute = new Tribute({
    trigger: "@",
    values: function (text, callback) {
        $.get("../User/Handler/UserMentionHandler.php", { query: text }, function (data) {
            callback(data);
        }, 'json');
    }
});

// Reattach every time a modal is shown
$(document).on('shown.bs.modal', '.modal', function () {
    tribute.attach(this.querySelectorAll('.comment-input-box'));
});
tribute.attach(document.querySelectorAll(".comment-input-box"));

