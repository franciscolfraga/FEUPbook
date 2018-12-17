<form method="post" action="actions/insert-chat-entry.php" id="chat-box-form">
    <input type="text" name="chatid" value="<?= $chatid; ?>" style="display:none;">
    <input type="text" name="location" value="<?= $location; ?>" style="display:none;">
    <textarea name="post-text" id="mytextarea" cols="40" rows="5" placeholder="Post something..."></textarea>
    <table id="chat-box-buttons">
      <tr>
        <td id="fill-col">
        </td>
        <td id="button-col">
          <input type="submit" value="Send">
        </td>
      </tr>
    </table>
</form>
