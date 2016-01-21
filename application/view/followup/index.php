
  <div class="mini-container">
    <h2>Follow Up</h2>
    <form action="<?php echo URL; ?>followup/addfollowup" method="POST">
        <label>Lead ID</label>
        <select name="l_id">
        <?php foreach ($leads as $lead) { ?>
          <option value="<?php echo $lead->l_id; ?>"><?php echo $lead->l_id; ?></option>
        <?php } ?>
        </select><br><br>
        <label>Status</label> &nbsp;
        <select name="status">
          <option value="active" selected="true">Active</option>
          <option value="expired">Expired</option>
          <option value="postponed">Postponed</option>
          <option value="dismissed">Dismissed</option>
        </select><br><br>
        <label>Feedback</label>
        <input type="text" name="feedback" value="" required /><br><br>
        <label>Next Follow Up</label>
        <input type="text" name="next_followup" value="" placeholder="YYYY-MM-DD" required /><br><br>
        <label>Counsellor</label>
        <select name="c_id">
        <?php foreach ($c_ids as $c_id) { ?>
          <option value="<?php echo $c_id->c_id; ?>"><?php echo $c_id->c_id; ?></option>
        <?php } ?>
        </select><br><br>
        <input type="submit" name="submit_followup" value="Done" />
        <a href="<?php echo URL; ?>leads/index"><button type="button" name="back">Back</button></a>
    </form>
  </div>

</div> <!-- container ends -->
