<?php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');

$soapclient = new nusoap_client('https://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl ',true);
$result = $soapclient->call('comprobar', array('x'=>$_GET['em']));

echo $result;
?>