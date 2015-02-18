<?php

session_start();
if (empty($_SESSION['login'])) {
    exit(0);
}

include './QueryManager.class.php';

$login = $_POST['login'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if ($login == "")
{
    header("Location: ../pages/ajouterAdministrateur.php?error_form=1");
} 
else if ($password == "")
{
    header("Location: ../pages/ajouterAdministrateur.php?error_form=2");
} 
else if ($password == "")
{
    header("Location: ../pages/ajouterAdministrateur.php?error_form=3");
} 
else if ($password == $password)
{
    $val = QueryManager::searchUser($login);
    if ($val == "") 
    {
	QueryManager::insertUser($login, $password);
	header("Location: ../pages/ajouterAdministrateur.php?succes=1");
    }
    else {
	header("Location: ../pages/ajouterAdministrateur.php?error_form=5");
    }
} 
else
{
	header("Location: ../pages/ajouterAdministrateur.php?error_form=4");
}
?>