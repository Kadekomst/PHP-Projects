<?php require_once 'app/php/registration/registration.php' ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="app/css/style.css"/>
</head>
<body>
<div class="container-fluid">
  <div class="wrapper">
    <h1>Registration</h1>
    <p class="text-center">Enter all required data to create an account</p>
    <form action="" method="post">
      <div class="field-group">
        <label for="">Name</label>
        <input type="text" name="name" placeholder="Your name" value="<?php isset($_POST['name']) ? print $_POST['name'] : ''; ?>">
        <span class="error"><?php isset($errors['name']) ? print $errors['name'] : print $errors['name-exists']; ?></span>
      </div>
      <div class="field-group">
        <label for="">Nickname</label>
        <input type="text" name="nickname" placeholder="Your nickname" value="<?php isset($_POST['nickname']) ? print $_POST['nickname'] : ''; ?>">
        <span class="error"><?php isset($errors['nickname']) ? print $errors['nickname'] : print $errors['nickname-exists']; ?></span>
      </div>
      <div class="field-group">
        <label for="">Email</label>
        <input type="text" name="email" placeholder="Your email address" value="<?php isset($_POST['email']) ? print $_POST['email'] : ''; ?>">
        <span class="error"><?php isset($errors['email']) ? print $errors['email'] : print $errors['email-exists']; ?></span>
      </div>
      <div class="field-group">
        <label for="">Password</label>
        <input type="password" name="password" placeholder="Enter the password" value="<?php isset($_POST['password']) ? print $_POST['password'] : ''; ?>">
        <span class="error"><?php isset($errors['password']) ? print $errors['password'] : print $errors['password-exists']; ?></span>
      </div>
      <div class="field-group">
        <label for="">Repeat password</label>
        <input type="password" name="password-repeating" placeholder="Repeat your password" value="<?php isset($_POST['password-repeating']) ? print $_POST['password-repeating'] : ''; ?>">
        <span class="error"><?php echo $errors['password-repeating']; ?></span>
      </div>
      <button class="btn btn-primary" type="submit">Create</button>
    </form>
  </div>
</div>

</body>
</html>
