$(document).ready(function(){
        var newscounter = 0;
        var bottomReached = false;
        $('#feed').append('<div class="lds-ellipsis" id ="loader"><div></div><div></div><div></div><div></div></div>');
        $.ajax({
          url: '../actions/addNews.php',
          type: 'post',
          data: { "start": "0"},
            success: function(data) {
                $('#loader').remove();
                $('#feed').append(data);
                newscounter += 2;
                bottomReached = false;
            }
        });
        $(window).scroll(function() {
          if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
            if(bottomReached == false){
              bottomReached = true;
              $('#feed').append('<div class="lds-ellipsis" id ="loader"><div></div><div></div><div></div><div></div></div>');
              $.ajax({
                url: '../actions/addNews.php',
                type: 'post',
                data: { "start": newscounter},
                  success: function(data) {
                      $('#loader').remove();
                      $('#feed').append(data);
                      newscounter += 2;
                      bottomReached = false;
                  }
              });
            }
          }
        });
   });
