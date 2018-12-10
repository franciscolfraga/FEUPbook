const loader = '<div class="lds-ellipsis" id ="loader"><div></div><div></div><div></div><div></div></div>';
const endOfPosts = '<div id ="endPosts"><b>No more posts to be displayed!</b></div>';
var postscounter = 0;

$(document).ready(function(){
        addPostRecursively();
   });

  function addPostRecursively(){
    $('#posts_feed').append(loader);
    $.ajax({
      url: '../actions/addFeedPosts.php',
      type: 'post',
      data: { "start": postscounter},
        success: function(data) {
            $('#loader').remove();
            $('#posts_feed').append(data);
            postscounter += 4;
            bottomReached = false;
            if( $('#posts_feed').height() < $(window).height() ) {
              addPostRecursively();
            } else {
              scrollAllowed();
            }
        }
    });
  }
  function scrollAllowed() {
    var bottomReached = false;
    var noMorePosts = false;
    console.log(postscounter);
    $(window).scroll(function() {
      if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
        if(bottomReached == false && noMorePosts == false){
          bottomReached = true;
          $('#posts_feed').append(loader);
          $.ajax({
            url: '../actions/addFeedPosts.php',
            type: 'post',
            data: { "start": postscounter},
              success: function(data) {
                  $('#loader').remove();
                  $('#posts_feed').append(data);
                  postscounter += 4;
                  bottomReached = false;
                  if(!data){
                    noMorePosts = true;
                    $('#posts_feed').append(endOfPosts);
                  }
              }
          });
        }
      }
    });
  }
