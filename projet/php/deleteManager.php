<?php

session_start();
if (empty($_SESSION['login'])) {
    header('Location: ../pages/index.php');
}
require_once '../php/QueryManager.class.php';
if (isset($_POST)) {
    $id = intval($_POST['id']);

    $name_server = QueryManager::getServer_Name($id);
    //echo $name_server;
    unlink('../rapports/' . $name_server);
    QueryManager::delete($id);
}

