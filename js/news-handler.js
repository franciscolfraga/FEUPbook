$(document).ready(function(){
        var newscounter = 0;
        var bottomReached = false;
        $.ajax({
          url: '../actions/addNews.php',
          type: 'post',
          data: { "start": "0"},
            success: function(data) {
                $('#feed').append(data);
                newscounter += 2;
                bottomReached = false;
            }
        });
        $(window).scroll(function() {
          if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
            if(bottomReached == false){
              bottomReached = true;
              $.ajax({
                url: '../actions/addNews.php',
                type: 'post',
                data: { "start": newscounter},
                  success: function(data) {
                      $('#feed').append(data);
                      newscounter += 2;
                      bottomReached = false;
                  }
              });
            }
          }
        });
   });
