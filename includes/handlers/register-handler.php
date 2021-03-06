<?php

function sanitizeFormUserName($inputText) {
  $inputText = strip_tags($inputText);
  $inputText = str_replace(" ", "", $inputText);
  return $inputText;
}

function sanitizeFormString($inputText) {
  $inputText = strip_tags($inputText);
  $inputText = str_replace(" ", "", $inputText);
  $inputText = ucfirst(strtolower($inputText));
  return $inputText;
}

function sanitizePassword($inputText) {
  $inputText = strip_tags($inputText);
  return $inputText;
}

if(isset($_POST['registerButton'])) {
  // Register button was pressed
  $username = sanitizeFormUserName($_POST['username']);
  $firstName = sanitizeFormString($_POST['firstName']);
  $lastName = sanitizeFormString($_POST['lastName']);
  $email = sanitizeFormString($_POST['email']);
  $email2 = sanitizeFormString($_POST['email2']);
  $password = sanitizePassword($_POST['password']);
  $password2 = sanitizePassword($_POST['password2']);

  $wasSuccessful = $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);

  if($wasSuccessful) {
    header("Location: index.php");
  }
}

?>