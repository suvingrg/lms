
  <div class="mini-container">
    <h2></h2>
    <form action="<?php echo URL; ?>top/update" method="POST">
        <label>Name</label>
        <input autofocus type="text" name="c_name" value="<?php echo htmlspecialchars($counsellor->c_name, ENT_QUOTES, 'UTF-8'); ?>" required /><br><br>
        <label>Username</label>
        <input type="text" name="usrname" value="" required /><br><br>
        <label>Password</label>
        <input type="text" name="contact" value="" required /><br><br>
        <input type="hidden" name="c_id" value="<?php echo htmlspecialchars($counsellor->c_id, ENT_QUOTES, 'UTF-8'); ?>" />
        <input type="hidden" name="a_id" value="<?php echo htmlspecialchars($counsellor->a_id, ENT_QUOTES, 'UTF-8'); ?>" />
        <input type="submit" name="submit_update_counsellor" value="Update" />
        <a href="<?php echo URL; ?>top/index"><button type="button" name="back">Back</button></a>
    </form>
  </div>

</div> <!-- container ends -->
