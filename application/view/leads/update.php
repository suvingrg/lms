
  <div class="mini-container">
    <h2></h2>
    <form action="<?php echo URL; ?>leads/update" method="POST">
        <label>Name</label>
        <input autofocus type="text" name="l_name" value="<?php echo htmlspecialchars($song->artist, ENT_QUOTES, 'UTF-8'); ?>" required /><br><br>
        <label>Address</label>
        <input type="text" name="address" value="<?php echo htmlspecialchars($song->track, ENT_QUOTES, 'UTF-8'); ?>" required /><br><br>
        <label>Link</label>
        <input type="text" name="link" value="<?php echo htmlspecialchars($song->link, ENT_QUOTES, 'UTF-8'); ?>" />
        <input type="hidden" name="song_id" value="<?php echo htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?>" />
        <input type="submit" name="submit_update_song" value="Update" />
    </form>
  </div>

</div> <!-- container ends -->
