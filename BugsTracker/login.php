<?php
ob_start();
session_start();
require_once('FirePHPCore/fb.php');
require_once('Freshdesk.php');
$freshdesk=new Freshdesk();
$freshdesk->setUsername($_GET['username']);
$freshdesk->setPwd($_GET['password']);
$freshdesk->setCompName($_GET['comp_name']);
$response=$freshdesk->FreshdeskRestCall("/helpdesk/tickets.json","GET","",false);
$obj = json_decode($response);
//FB::log($response);
$login=1;
//FB::log($login);
if(strcmp($response,'{"require_login":true}')==0){
   // FB::log("aaaa");
    $login=0;
    
}
if($login==1){
    $_SESSION['username']=$_GET['username'];
    $_SESSION['password']=$_GET['password'];
    $_SESSION['comp_name']=$_GET['comp_name'];
}
FB::log($login);
echo "{  \"login\": $login }";
//FB::log($_GET);