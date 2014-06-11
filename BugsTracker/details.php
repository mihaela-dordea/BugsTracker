<?php
ob_start();
session_start();
require_once('FirePHPCore/fb.php');
include 'Smarty/Smarty.class.php';
require_once('Freshdesk.php');

$freshdesk=new Freshdesk();
$freshdesk->setUsername($_SESSION['username']);
$freshdesk->setPwd($_SESSION['password']);
$freshdesk->setCompName($_SESSION['comp_name']);

$id = $_GET['id'];
	
$response = $freshdesk->FreshdeskRestCall("/helpdesk/tickets/".$id.".json","GET","",false);

$json = json_decode($response);

function format_status($status) {
		if($status==2)
			return "Open";
		else if($status==3)
			return "Pending";
		else if($status==4)
			return "Resolved";
		else if($status==5)
			return "Closed";
		else
			return "Unknown";
	}
	

$smarty = new Smarty();
$smarty->assign('js_filename', 'js/details.js');
$smarty->assign('id',$id);
$smarty->assign('subject',$json->helpdesk_ticket->subject);
$smarty->assign('description',$json->helpdesk_ticket->description);
$smarty->assign('status',$json->helpdesk_ticket->status);
$smarty->assign('format_status',format_status($json->helpdesk_ticket->status));
$smarty->display('details.tpl');
