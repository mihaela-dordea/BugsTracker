<?php
ob_start();
session_start();
require_once('FirePHPCore/fb.php');
require_once('Freshdesk.php');
$freshdesk=new Freshdesk();
$freshdesk->setUsername($_SESSION['username']);
$freshdesk->setPwd($_SESSION['password']);
$freshdesk->setCompName($_SESSION['comp_name']);

$id = $_GET['id'];
$status = $_GET['status'];

$jsondata = array (
	'helpdesk_ticket[status]' => $status
);
$response = $freshdesk->FreshdeskRestCall("/helpdesk/tickets/".$id.".json","PUT",$jsondata,false);
//echo $response;
header("location: details.php?id=$id");