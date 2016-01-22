<div class="container">
  <div class="sidebar">
    <form action="<?php echo URL; ?>home/logout" method="post">
      <img src="../img/account.png" id="account" alt="" />
      <h4>Hello <?php echo $_SESSION['usrname']; ?></h4>
      <input type="submit" name="logout" value="Logout" />
    </form>

  </div>
