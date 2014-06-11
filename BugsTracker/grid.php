<?php
ob_start();
require_once('FirePHPCore/fb.php');
include 'Smarty/Smarty.class.php';

$smarty = new Smarty();
$smarty->assign('js_filename', 'js/grid.js');
$smarty->display('grid.tpl');
FB::log('blaaaaaaaaaaaaaaablaaaaa');