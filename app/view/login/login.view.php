<div class="login">

<div class="login-card">
<h1 class="title">Login</h1>

<?php if ($data->is_login_failed) { ?>
<p>Login is failed!</p>
<?php } ?>

<form method="POST">
  <ul class="login-form">
    <li>
      <label for="username">Username</label>
      <span class="validate">
        <input type="text" id="username" name="username">
        <span class="tooltip"></span>
      </span>
    </li>
    <li>
      <label for="password">Password</label>
      <span class="validate">
        <input type="password" id="password" name="password">
        <span class="tooltip"></span>
      </span>
    </li>

    <li>
      <a class="login-link-register" href="register.php">Don't have an account?</a>
      <input type="submit" id="submit" value="GO!">
    </li>
  </ul>
</form>

<script src="<?php echo $data->doc_root ?>/static/main.js"></script>
<script>
Sahih ('#username').handle (function (elmt) {
  if (!elmt.value)
    return "Username is too short"
})

Sahih ('#password').handle (function (elmt) {
  if (!elmt.value)
    return "Password is too short"
})

Sahih ('#submit').apply ()
</script>

</div>
</div>
