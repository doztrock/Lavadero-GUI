<?php

/**
 *  Vista
 * 
 *  Objetivo:   Mostrar los resultados obtenidos por el controlador.
 * 
 */

?>

<html>
    <head>
        <script type="text/javascript">
        
            $(document).ready(function(){
                
                $("#boton_volver").click(function(){
                    $("#contenido").hide();
                    $("#menu").show();
                });

                $("#boton_registrar_factura").click(function(){
                
                    var modulo = "factura";
                    var accion = "registrar";
                    
                    $("#contenido").load("core/ControladorFrontal.php",{
                        "modulo": modulo,
                        "accion": accion
                    });
                    
                });
                
            });

        </script>
    </head>
    <body>

    <!-- Boton "Volver" -->
    <input type="button" id="boton_volver" value="">

    <!-- Listado de facturas -->
    <table border=1 id="tabla_factura">
        <?php
            foreach($listadoFacturas as $factura){
            ?>
            <tr>
                <td><?php print $factura["nombre_cliente"]; ?></td>
                <td><?php print $factura["placa_vehiculo"]; ?></td>
            <tr>
            <?php
            }
        ?>
    </table>
    
    <!-- Resultado del registro de factura -->
    <?php
    
        if(isset($resultado)){
            
            if($resultado == TRUE){
                print "Factura registrada exitosamente.<br>";
            }else{
                print "Ha ocurrido un error.<br>";
            }
            
        }
    
    ?>
    
    <!-- Boton "Registrar Factura" -->
    <div class="contenedor_boton_registrar">
        <input type="button" id="boton_registrar_factura" value="Registrar Factura">
    </div>
    
    </body>
</html>