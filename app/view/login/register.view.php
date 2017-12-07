<div class="login">

<div class="login-card">
<h1 class="title">Sign Up</h1>

<form method="POST">
  <ul class="login-form register-form">
    <li>
      <label for="full_name">Your Name</label>
      <span class="validate">
        <input type="text" id="full_name" name="full_name">
        <span class="tooltip"></span>
      </span>
    </li>
    <li>
      <label for="username">Username</label>
      <span class="validate">
        <input type="text" id="username" name="username">
        <span class="tooltip"></span>
        <span class="badge"></span>
      </span>
    </li>
    <li>
      <label for="email">Email</label>
      <span class="validate">
        <input type="text" id="email" name="email">
        <span class="tooltip"></span>
        <span class="badge"></span>
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
      <label for="confirm_password">Confirm Password</label>
      <span class="validate">
        <input type="password" id="confirm_password">
        <span class="tooltip"></span>
      </span>
    </li>
    <li>
      <label for="phone_number">Phone Number</label>
      <span class="validate">
        <input type="text" id="phone_number" name="phone_number">
        <span class="tooltip"></span>
      </span> 
    </li>
    <li class="register-field-driver">
      <input type="checkbox" id="is_driver" name="is_driver">
      <label for="is_driver">Also sign me up as a driver!</label>
    </li>

    <li>
      <a class="login-link-register" href="login.php">Already have an account?</a>
      <input type="submit" id="submit" value="Register">
    </li>
  </ul>
</form>

<script src="<?php echo $data->doc_root ?>/static/main.js"></script>
<script>
Sahih ('#full_name').handle (function (elmt) {
  if (!elmt.value)
    return "Full name is too short"
})

Sahih ('#username').handle (function (elmt) {
  if (!elmt.value)
    return "Username is too short"
  if (elmt.value.length > 20)
    return "Username is too long"
  if (/\s/g.test (elmt.value))
    return "Username can't contain whitespaces"
})
.element.onblur = function (e) {
  let url =
    '<?php echo $data->doc_root ?>/api/register.php?username=' +
    encodeURIComponent (e.target.value)
  
  if (!Sahih (e.target).isValid ())
    return

  AjaxJson (url)
    .error (function (err) {
      Sahih (e.target)
        .badge ('error').tooltip ("Unable to get data from server")
    })
    .data (function (json) {
      if (json.username_valid) {
        Sahih (e.target)
          .validate ()
          .badge ('valid')
      } else {
        Sahih (e.target)
          .invalidate ()
          .badge ('invalid').tooltip ("Username has already taken")
      }
    })
    .send ()
}

Sahih ('#email').handle (function (elmt) {
  let emailRegExp =
    /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
  
    if (!elmt.value)
    return "E-mail is too short"
  if (!emailRegExp.test (elmt.value))
    return "E-mail is invalid"
})
.element.onblur = function (e) {
  let url =
    '<?php echo $data->doc_root ?>/api/register.php?email=' +
    encodeURIComponent (e.target.value)
  
  if (!Sahih (e.target).isValid ())
    return

  AjaxJson (url)
    .error (function (err) {
      Sahih (e.target)
        .badge ('error').tooltip ("Unable to get data from server")
    })
    .data (function (json) {
      if (json.email_valid) {
        Sahih (e.target)
          .validate ()
          .badge ('valid')
      } else {
        Sahih (e.target)
          .invalidate ()
          .badge ('invalid').tooltip ("E-mail has already taken")
      }
    })
    .send ()
}

Sahih ('#password').handle (function (elmt) {
  if (!elmt.value)
    return "Password is too short"
})

Sahih ('#confirm_password').handle (function (elmt) {
  let passwordElmt = document.querySelector ('#password')

  if (elmt.value !== passwordElmt.value)
    return "Password doesn't match"
})

Sahih ('#phone_number').handle (function (elmt) {
  let phoneNumberRegExp = /\(?[0-9]+\)?[-. 0-9]+/

  if (!elmt.value)
    return "Phone number is too short"
  if (!phoneNumberRegExp.test (elmt.value))
    return "Phone number is invalid"
})

Sahih ('#submit').apply ()
</script>
</div>
</div>
