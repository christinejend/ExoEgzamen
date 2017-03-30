<?php

function login(){
  return ['view' => 'views/userlogin.php'];
};

function postLogin(){
  include 'models/userModel.php';
  $email = $_SESSION['email'];

  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      user();
      return ['view' => 'views/taskindex.php'];
  } else {
        echo 'l\addesse ne semble pas être une adresse email valide';
     }
};

function getLogout(){
  session_destroy();
  return ['view' => 'views/userlogin.php'];
}
