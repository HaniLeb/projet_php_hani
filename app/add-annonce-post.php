<?php
$auth = true;
require "includes/config.php";
include_once '_head.php';

echo '<pre>';
var_dump($_POST);
echo '</pre>';

echo '<pre>';
var_dump($_FILES);
echo '</pre>';

if(empty($_POST['title']) || empty($_POST['type']) || empty($_POST['description']) || empty($_POST['country']) || empty($_POST['town']) || empty($_POST['cp']) || empty($_POST['price'])){

}else{

}
?>