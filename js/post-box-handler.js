$(document).ready(function(){

    $('#mytextarea').focus(function() {
        $('#postContainer').fadeIn(0);
        $('#post-box-buttons').fadeIn(0);
    });
    $('#post-box-buttons').focus(function() {
        $('#postContainer').fadeIn(0);
        $('#post-box-buttons').fadeIn(0);
    });
    $('#postContainer').click(function(){
      $('#postContainer').fadeOut(0);
      $('#post-box-buttons').fadeOut(0);
    });

    $('#file-pic').on('click', function() {
      $('#UploadFile').click();
    });

  });
