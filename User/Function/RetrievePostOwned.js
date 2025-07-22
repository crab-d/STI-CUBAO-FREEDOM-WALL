$(document).ready(function () {
  let Page = 1; 
  let isLoading = false;

  function loadPosts() {
    if (isLoading) return; 
    isLoading = true;
    $("#loading").show();

    setTimeout(() => {
      $.ajax({
        url: "../User/Handler/RetrievePostOwned.php", 
        type: "GET",
        data: {
          page: Page,
        },
        success: function (response) {
          $("#response").append(response.html);  
          Page++;  
          if (response.count < 5) {
            $("#loading").html(
              "No more available post. Try to reload for new contents"
            );
          } else {
            $("#loading").html("Loading more contents");
          }
          isLoading = false;
          $("#loading").hide();
        },
        error: function (xhr, status, error) {
          $("#response").html("Failed" + xhr.status + " - " + error);
          isLoading = false;
        },
      });
    }, 300);
  }

  $

  loadPosts();

  const container = $("#MainBody");
  let bottomReach = false;

  $("#MainBody").on("scroll", function () {
    let scrollTop = container.scrollTop();
    let scrollHeight = container[0].scrollHeight;
    let divHeight = container.outerHeight();

    if (!bottomReach && scrollTop + divHeight >= scrollHeight - 1) {
      bottomReach = true;
      loadPosts();
      bottomReach = false;
    }
  });
});
