$(document).ready(function(){
        var newscounter = 0;
        var bottomReached = false;
        var noMoreNews = false;
        const loader = '<div class="lds-ellipsis" id ="loader"><div></div><div></div><div></div><div></div></div>';
        const endOfNews = '<div id ="endNews"><b>No more news to be displayed!</b></div>';
        $('#news_feed').append(loader);
        $.ajax({
          url: '../actions/addNews.php',
          type: 'post',
          data: { "start": "0"},
            success: function(data) {
                $('#loader').remove();
                $('#news_feed').append(data);
                newscounter += 2;
                bottomReached = false;
            }
        });
        $(window).scroll(function() {
          if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
            if(bottomReached == false && noMoreNews == false){
              bottomReached = true;
              $('#news_feed').append(loader);
              $.ajax({
                url: '../actions/addNews.php',
                type: 'post',
                data: { "start": newscounter},
                  success: function(data) {
                      $('#loader').remove();
                      $('#news_feed').append(data);
                      newscounter += 2;
                      bottomReached = false;
                      if(!data){
                        noMoreNews = true;
                        $('#news_feed').append(endOfNews);
                      }
                  }
              });
            }
          }
        });
   });
