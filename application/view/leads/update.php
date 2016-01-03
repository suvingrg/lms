
  <div class="mini-container">
    <h2></h2>
    <form action="<?php echo URL; ?>leads/update" method="POST">
        <label>Name</label>
        <input autofocus type="text" name="l_name" value="<?php echo htmlspecialchars($lead->l_name, ENT_QUOTES, 'UTF-8'); ?>" required /><br><br>
        <label>Address</label>
        <input type="text" name="address" value="<?php echo htmlspecialchars($lead->address, ENT_QUOTES, 'UTF-8'); ?>" required /><br><br>
        <label>Contact No.</label>
        <input type="text" name="contact" value="<?php echo htmlspecialchars($lead->contact, ENT_QUOTES, 'UTF-8'); ?>" required /><br><br>
        <label>Status</label>
        <input type="text" name="contact" value="<?php echo htmlspecialchars($lead->contact, ENT_QUOTES, 'UTF-8'); ?>" required /><br><br>
        <label>Next Follow Up</label>
        <input type="text" name="next_followup" value="<?php echo htmlspecialchars($lead->next_followup, ENT_QUOTES, 'UTF-8'); ?>" required /><br><br>
        <input type="hidden" name="l_id" value="<?php echo htmlspecialchars($lead->l_id, ENT_QUOTES, 'UTF-8'); ?>" />
        <input type="submit" name="submit_update_lead" value="Update" />
        <a href="<?php echo URL; ?>leads/index"><button type="button" name="back">Back</button></a>
    </form>
  </div>

</div> <!-- container ends -->
