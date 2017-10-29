<?php

require_once("core/Configuracion.php");

if(Configuracion::ENTORNO == Configuracion::DESARROLLO){
    error_reporting(E_ALL);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Lavadero - AutoLimpio
        </title>
        <link type="text/css" rel="stylesheet" href="core/static/css/static.css">
        <script type="text/javascript" src="core/static/js/jquery.js"></script>
        <script type="text/javascript" src="core/static/js/static.js"></script>
    </head>
    <body>
        
        <!--Menu Principal-->
        <div id="menu">
            
            <div id="item">
                Clientes
            </div>
            
            <div id="item">
                Vehiculos
            </div>
            
            <div id="item">
                Servicios
            </div>
            
            <div id="item">
                Configuracion
            </div>
            
        </div>
        
        <div id="contenido">
        </div>
        
    </body>
</html>