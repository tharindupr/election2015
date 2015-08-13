


<!DOCTYPE HTML>
<html>
<head>
  <title>Art TV General Election 2015</title>
  <meta charset="UTF-8" />

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/reset.css'); ?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/structure.css'); ?>"/>
</head>

<body>
<?php echo validation_errors(); ?>
<?php echo form_open('verifylogin'); ?>
<div class="box login">
  <fieldset class="boxBody">
    <label for="username">Username</label>
    <input type="text" tabindex="1" placeholder="Username" id="username" name="username" required>
    <label for="password">Password</label>
    <input type="password" tabindex="2" placeholder="Password" id="passowrd" name="password" required>

  </fieldset>
  <footer>

    <input type="submit" class="btnLogin" value="Login" tabindex="4">
  </footer>

</div>
</form>
</body>
</html>

