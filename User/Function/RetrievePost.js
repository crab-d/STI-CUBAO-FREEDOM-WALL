$(document).ready(function () {
  let Page = 1; //initial page
  let isLoading = false; //initial loading status
  let PostFilter = ""; //initial filer, all contents
 
  //function handle loadPost with 1 paramenter that identifies the chanel of post
  function loadPosts(PostFilter) {
    if (isLoading) return; // If user scroll to the bottom already and content still loading, return
    isLoading = true; //if not then start loading contents
    $("#loading").show(); // show loading label

    //makes delay
    setTimeout(() => {
      //Data, success, failed -- 3 parameters
      $.ajax({
        url: "../User/Handler/RetrievePost.php", //Function file
        type: "GET", //Server request
        data: {
          // data pass to function
          page: Page,
          postFilter: PostFilter,
        },
        success: function (response) {
          //Success block  with function holding response from function file
          $("#response").append(response.html); //Add the new data to the current data in content body
          Page++; //increment page for offset reference
          if (response.count < 5) {
            //Check if there still more content to load
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
          //Handle error
          $("#response").html("Failed" + xhr.status + " - " + error);
          isLoading = false;
        },
      });
    }, 300);
  }

  $

  //Initial Load
  loadPosts(PostFilter);

  //Change Filter Value
  $('button[name="postFilter"]').click(function (e) {
    e.preventDefault(); //Prevent Refresh
    PostFilter = $(this).val();
    Page = 1;
    $("#loading").html("Loading contents");
    $("#response").html("");
    loadPosts(PostFilter);
  });

  const container = $("#MainBody");
  let bottomReach = false;

  $("#MainBody").on("scroll", function () {
    let scrollTop = container.scrollTop(); //get the current height from current position to the top of the div
    let scrollHeight = container[0].scrollHeight; //TOtal height of the div including hidden part
    let divHeight = container.outerHeight(); //Visible height

    //Detect if it reach the bottom of div content
    if (!bottomReach && scrollTop + divHeight >= scrollHeight - 1) {
      //curentbottomposition >= absolute bottom
      bottomReach = true;
      loadPosts(PostFilter);

      bottomReach = false;
    }
  });
});
