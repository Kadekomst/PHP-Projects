<?php require_once 'login.php' ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Success!</title>
  <link rel="stylesheet" href="/registration_php/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/registration_php/app/css/style.css"/>
</head>
<body>
<div class="container-fluid">
  <div class="wrapper">
    <h1>Success!</h1>
    <p class="text-center">Your were signed in via <?php print $email; ?></p>
  </div>
</div>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
</body>
</html>