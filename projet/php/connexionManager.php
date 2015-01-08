<?php

if(!empty($_POST["login"]) && !empty($_POST["password"]))
{
  include './QueryManager.class.php';
  $login=$_POST["login"];
  $password=$_POST["password"];
  $co = QueryManager::connection("$login","$password");
  echo "co : ".$co;
  if($co!="")
  {
      session_start();
      $_SESSION['login']=$login;
       header('Location: ../pages/multiUpload.php'); 
       
  }
  else
  {
       header('Location: ../pages/connexion.php'); 
      
  }
}
else {
    header('HTTP/1.1 500 Internal Server Error');
    header('Content-type: text/plain');
    exit("Erreur lors de la connexion.");
}