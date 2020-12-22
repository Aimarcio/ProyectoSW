<?php
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');

$ns="http://".$_SERVER['HTTP_HOST']."/MIGRACION2020-MASTER/php";
$server = new soap_server;
$server->configureWSDL('Contrasenias',$ns);
$server->wsdl->schemaTargetNamespace=$ns;

$server->register('comprobar',
array('x'=>'xsd:string','y'=>'xsd:int'),
array('z'=>'xsd:string'),
$ns);

function comprobar($x,$y){
    if($y!=1010){
        return 'SIN SERVICIO';
    }
    $file = file('../txt/toppasswords.txt');
    if (strpos($file,$x)!=false){
        return 'INVALIDA';
    }
    return 'VALIDA';
}
    //llamamos al método service de la clase nusoap antes obtenemos los valores de los parámetros
    if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
    $server->service($HTTP_RAW_POST_DATA);
?>