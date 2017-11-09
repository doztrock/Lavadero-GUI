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
        <script type="text/javascript">
        
            $(document).ready(function(){
                
                $(".item").click(function(){
                    
                    var modulo = $(this).attr("module");
                    var accion = "iniciar";
                    
                    $("#contenido").load("core/ControladorFrontal.php",{
                        "modulo": modulo,
                        "accion": accion
                    });
                    
                    $("#contenido").show();
                    $("#menu").hide();
                    
                });
                
            });

        </script>
    </head>
    <body>
        
        <!--Menu Principal-->
        <div id="menu">
            
            <div class="item" module="cliente">
                Clientes
            </div>
            
            <div class="item" module="vehiculo">
                Vehiculos
            </div>
            
            <div class="item" module="servicio">
                Servicios
            </div>
            
            <div class="item" module="configuracion">
                Configuracion
            </div>
            
        </div>
        
        <div id="contenido">
        </div>
        
    </body>
</html>