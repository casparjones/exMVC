<?php
define('exAPP', dirname(__FILE__));
define('exAPPLIB', exAPP . '/libs');

define('exSUBDIR', exDIR . '/exp');
define('exMOD', exDIR . '/exp/modules');

$urlData  = pathinfo($_SERVER['REQUEST_URI']);
$urlParam = parse_url($_SERVER['REQUEST_URI']);

define('exHOST', 'http://' . $_SERVER['HTTP_HOST']);
if($urlData['dirname'] == '/') {
 define('exURL', exHOST . $urlParam['dirnamepath']);
 define('exPUB', exHOST . $urlParam['dirnamepath'] . '/exp/pub');
 define('exINDEX', exHOST . $urlParam['path'] . 'index.php');
} else {
 define('exURL', exHOST . $urlData['dirname']);
 define('exPUB', exHOST . $urlData['dirname'] . '/exp/pub');
 define('exINDEX', exHOST . $urlParam['path']);
}

function exAutoload($class)
{
	if (substr($class, 0, 2) === 'ex') {
		include exAPP . DIRECTORY_SEPARATOR . "class" . DIRECTORY_SEPARATOR . $class . '.class.php';
	}
}

spl_autoload_register('exAutoload');

require_once(exAPP . '/../vendor/autoload.php');
include(exAPP . '/init.php');

?>