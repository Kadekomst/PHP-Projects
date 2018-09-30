<?php

// Accept all errors except notices
error_reporting(E_ALL & ~E_NOTICE);

// Including files with main classes
require_once __DIR__ . '/../Form.php';
require_once __DIR__ . '/../Database.php';

// Setting the namespaces of classes
use Form\Form;
use Database\Database;

// Data request
$request = $_REQUEST;

// Getting form fields values
$form = new Form();
$fields = $form->get_processed_fields_values($request);

// Put values of fields into variables for easier work with SQL.
$name = $fields['name'];
$nickname = $fields['nickname'];
$email = $fields['email'];
$password = $fields['password'];
$password_repeating = $fields['password-repeating'];

// Initialize the $errors array to control validation process
$errors = array();

// Validate fields values
if ( !empty($request) ) {

  // Common validation of form
  if ( strlen($name) < 3 ) $errors['name'] = 'Your name must be longer than 2 characters!';
  if ( strlen($nickname) < 3 ) $errors['nickname'] = 'Your nickname must be longer than 2 characters!';
  if ( !preg_match('/@/', $email) ) $errors['email'] = 'Your email address must contain the "@" character!';
  if ( strlen($password) < 6 ) $errors['password'] = 'Your password must be longer than 5 characters!';
  if ( $password !== $password_repeating ) $errors['password-repeating'] = 'Passwords are not identical!';

  // Receiving all existing data from database
  $db = new Database();
  $data = $db->fetchAll("SELECT * FROM users", PDO::FETCH_ASSOC);

  // Comparing new data with data from database
  foreach ( $data as $row )
  {
    foreach ( $row as $name => $value )
    {
      if ( $fields[$name] === $value )
      {
        switch($name)
        {
          case 'name':
            $errors['name-exists'] = 'This name is already exists!';
            break;
          case 'nickname':
            $errors['nickname-exists'] = 'This nickname is already exists!';
            break;
          case 'email':
              $errors['email-exists'] = 'This email is already in use!';
              break;
          case 'password':
            $errors['password-exists'] = 'This password is already in use!';
            break;
        }
      }
    }
  }

  // If no errors found, insert new data to database and redirect to success.php page
  if ( empty($errors) ) {

    // Establishing connection to database for inserting
    $db = new Database();

    // Inserting new data into database
    $db->query("INSERT INTO users (name, nickname, email, password) VALUES('$name', '$nickname', '$email', '$password')", 'insert');

    // Redirecting
    header('Location: app/php/registration/success.php');
    exit;

  }
}
