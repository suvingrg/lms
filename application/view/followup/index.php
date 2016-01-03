
  <div class="mini-container">
    <h2>Follow Up</h2>
    <form action="<?php echo URL; ?>followup/addfollowup" method="POST">
        <label>Lead ID</label>
        <input autofocus type="text" name="l_id" value="" required /><br><br>
        <label>Status</label>
        <input type="text" name="status" value="" required /><br><br>
        <label>Feedback</label>
        <input type="text" name="feedback" value="" required /><br><br>
        <label>Next Follow Up</label>
        <input type="text" name="next_followup" value="" required /><br><br>
        <input type="hidden" name="c_id" value="<?php echo htmlspecialchars($lead->l_id, ENT_QUOTES, 'UTF-8'); ?>" />
        <input type="submit" name="submit_followup" value="Done" />
        <a href="<?php echo URL; ?>leads/index"><button type="button" name="back">Back</button></a>
    </form>
  </div>

</div> <!-- container ends -->
