<?php
ob_start();
session_start();
require_once('FirePHPCore/fb.php');
require_once('Freshdesk.php');
$freshdesk=new Freshdesk();
$freshdesk->setUsername($_SESSION['username']);
$freshdesk->setPwd($_SESSION['password']);
$freshdesk->setCompName($_SESSION['comp_name']);
$response=$freshdesk->FreshdeskRestCall("/helpdesk/tickets/filter/all_tickets?format=json&page=1","GET","",false);
echo $response;