<?php
require_once '../php/QueryManager.class.php';
$id = $_POST['id'];
$name_server=QueryManager::getServer_Name($id);
echo $name_server;
unlink('../rapports/'.$name_server);
QueryManager::delete(1);
