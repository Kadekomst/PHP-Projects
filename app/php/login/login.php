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

// Put all of necessary fields values into variables
$email = $fields['email'];
$password = $fields['password'];

// Initialize the $errors array to control validation process
$errors = array();

if ( !empty($request) ) {

  // Establishing connection to database. Getting all existing data
  $db = new Database();
  $data = $db->fetchAll("SELECT * FROM users", PDO::FETCH_ASSOC);

  // Comparing new data with data from database
  foreach ( $data as $row )
  {
    // Initialize existing email and password on each iteration
    $existing_email = $row['email'];
    $existing_password = $row['password'];

    // Validate are fields empty
    if ( empty($password) ) $errors['password-empty'] = 'Please enter a password!';
    if ( empty($email) ) $errors['email-empty'] = 'Please enter an email!';

    // If fields aren't empty, comparing user entered values with database values.
    // If user-entered password and email are identical with password and email in the same database row, give to user an sccount access.
    if ( !empty($email) && !empty($password) )
    {
      if ( $existing_email === $email && $existing_password === $password ) header('Location: app/php/login/success.php');
      if ( $existing_password !== $password && $existing_email === $email ) $errors['password-incorrect'] = 'Password is incorrect!';
      if ( $existing_email !== $email && $existing_password === $password ) $errors['email-incorrect'] = 'Email is incorrect or doesn\'t exists!';
    }
  }
}
