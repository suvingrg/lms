<div class="container">

    <div id="loginbox">
      <h2>Login</h2>
      <img src=img/demo-image.jpg" alt="" />
      <fieldset style="border: none;">
        <form action="<?php echo URL; ?>home/login" method="POST">
          <input type="text" name="usrname" placeholder="Username" required /><br /><br />
          <input type="password" name="pwd" placeholder="Password" required /><br /><br />
          <input type="submit" name="loginSubmit" id="loginButton" value="LOGIN" />
        </form>
      </fieldset>
    </div>

</div>
