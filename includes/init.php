<?php

include 'ClassLoader.php';
$loader = new ClassLoader();
$loader->register();

include 'config.php';

function isAjax()
{          $headers = apache_request_headers();
    return (isset($headers['X-Requested-With']) && $headers['X-Requested-With'] == 'XMLHttpRequest');
}

if (isset($HTTP_POST_VARS)) {
    $_POST     = $HTTP_POST_VARS;
    $_GET      = $HTTP_GET_VARS;
    $_REQUEST  = array_merge($_POST, $_GET);
}

