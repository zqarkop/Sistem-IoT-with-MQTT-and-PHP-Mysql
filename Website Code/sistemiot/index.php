<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location: login.php');
}
include "config/connectDatabase.php";
include "inc/alerts.php";
include "inc/header.php";
include "inc/navbar.php";
include "inc/sidebar.php";

if(isset($_GET['pages'])){
  if($_GET['pages'] == $_GET['pages']){
    include "pages/".$_GET['pages'].".php";
  }
}else{
  include "pages/dashboard.php";
}

include "inc/footer.php";
?>