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
                    
                    $("#contenido")
                    .html("")
                    .load("core/ControladorFrontal.php",{
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
            
            <!--Panel Izquierdo-->
            <div id="panel_izquierdo">
            
                <div class="contenedor_boton_menu">
                    <input type="button" class="item" module="cliente" value="Clientes">
                </div> 

                <div class="contenedor_boton_menu">
                    <input type="button" class="item" module="vehiculo" value="Vehiculos">
                </div>   
            
            </div>
            
            <!--Panel Derecho-->
            <div id="panel_derecho">
            
                <div class="contenedor_boton_menu">
                    <input type="button" class="item" module="servicio" value="Servicios">
                </div>                
            
                <div class="contenedor_boton_menu">
                    <input type="button" class="item" module="factura" value="Facturas">
                </div> 
            
            </div>
            
        </div>
        
        <div id="contenido" style="display:none">
        </div>
        
    </body>
</html>