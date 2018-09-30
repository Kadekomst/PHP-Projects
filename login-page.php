<?php require_once 'app/php/login/login.php' ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="app/css/style.css"/>
</head>
<body>
<div class="container-fluid">
  <div class="wrapper">
    <h1>Login</h1>
    <p class="text-center">Enter all required data to login into your account</p>
    <form action="" method="post">
      <div class="field-group">
        <label for="">Email</label>
        <input type="text" name="email" placeholder="Your email address" value="<?php isset($_POST['email']) ? print $_POST['email'] : ''; ?>">
        <span class="error"><?php isset($errors['email-empty']) ? print $errors['email-empty'] : print $errors['email-incorrect']; ?></span>
      </div>
      <div class="field-group">
        <label for="">Password</label>
        <input type="password" name="password" placeholder="Enter the password" value="<?php isset($_POST['password']) ? print $_POST['password'] : ''; ?>">
        <span class="error"><?php isset($errors['password-empty']) ? print $errors['password-empty'] : print $errors['password-incorrect']; ?></span>
      </div>
      <button class="btn btn-primary" type="submit">Create</button>
    </form>
  </div>
</div>

</body>
</html>
