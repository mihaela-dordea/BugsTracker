<?php
ob_start();
session_start();
require_once('FirePHPCore/fb.php');
require_once('Freshdesk.php');
$freshdesk=new Freshdesk();
$freshdesk->setUsername($_SESSION['username']);
$freshdesk->setPwd($_SESSION['password']);
$freshdesk->setCompName($_SESSION['comp_name']);

$subject = $_GET['subject'];
$description = $_GET['description'];

$jsondata = array (
	'helpdesk_ticket[email]' => 'john@freshdesk.com',
	'helpdesk_ticket[subject]' => $subject,
	'helpdesk_ticket[description]' => $description
);
$response = $freshdesk->FreshdeskRestCall("/helpdesk/tickets.json","POST",$jsondata,false);
//echo $response;
header("location: grid.php");