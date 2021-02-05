<?php

use TD\Object_Factory;

define("BASEDIR", dirname(__FILE__));

include 'includes/init.php';



if(isset($argc) && $argc>1) {
    array_shift($argv);
    parse_str(implode('&',$argv),$_REQUEST);
}
if(!isset($_REQUEST['p']))
{
    $_REQUEST['p']='main';
}
$buffer = preg_replace('/[^_a-zA-Z0-9]/', '', $_REQUEST['p']);
$buffer = str_replace(array(":", "/", "..", ".", ";", "\\", "http", "ftp"), "", $buffer);

$obj = Object_Factory::getInstance()->getObject($buffer,isAjax());

$action = (isset($_REQUEST['a']) && !empty($_REQUEST['a'])) ? $_REQUEST['a'] : 'index';

if(!$obj)
{
    echo "Error: module does not exist";
}else {
    if(!isAjax()) {
        $content = $obj->render($action);
        echo $obj->View('master_layout', array('content' => $content));
    }
    else
    {
        $obj->execute();
    }
}