  <div class="mini-container">
    <h2>Add Counsellor</h2>
    <form action="<?php echo URL; ?>top/addcounsellor" method="POST">
        <label>Name</label>
        <input autofocus type="text" name="c_name" value="" required /><br><br>
        <label>Username</label>
        <input type="text" name="usrname" value="" required /><br><br>
        <label>Password</label>
        <input type="password" name="pwd" value="" required /><br><br>
        <input type="submit" name="submit_counsellor" value="Done" />
        <a href="<?php echo URL; ?>top/index"><button type="button" name="back">Back</button></a>
    </form>
  </div>

</div> <!-- container ends -->
