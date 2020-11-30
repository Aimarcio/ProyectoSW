<?php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');


$soapclient = new nusoap_client('https://www.ehusw.es/jav/ServiciosWeb/comprobarcontrasena.php?wsdl',true);
$result = $soapclient->call('comprobar', array('x'=>$_GET['ps'],'y'=>$_GET['t']));

echo $result;
?>