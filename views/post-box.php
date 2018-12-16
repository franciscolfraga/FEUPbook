<div id="postContainer" style="display: none;">
</div>
<form method="post" action="../actions/insert-post.php" id="post-box-form" enctype="multipart/form-data">
    <input type="text" name="circleid" value="<?= $postscircle; ?>" style="display:none;">
    <input type="text" name="location" value="<?= $location; ?>" style="display:none;">
    <textarea name="post-text" id="mytextarea" cols="40" rows="5" placeholder="Post something..."></textarea>
    <table id="post-box-buttons" style="display: none;">
      <tr>
        <td id="fill-col">
        </td>
        <td id="file-col">
          <input type="file" name="myfile" id="UploadFile" style="display:none;">
          <img id="file-pic" src="media/icons/file.png">
        </td>
        <td id="button-col">
          <input type="submit" value="Submit">
        </td>
      </tr>
    </table>
</form>
