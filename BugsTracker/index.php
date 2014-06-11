<?php
ob_start();
require_once('FirePHPCore/fb.php');

function st_debug($msg){
	FB::log("msg: $msg");
}

include 'Smarty/Smarty.class.php';

$smarty = new Smarty();

$smarty->assign('js_filename', 'js/BugsTracker.js');
$smarty->display('index.tpl');
$xx = "abcd";
st_debug($xx);

?>