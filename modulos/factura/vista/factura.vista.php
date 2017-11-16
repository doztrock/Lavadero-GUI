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
        <tr>
            <th>Fecha</th>
            <th>Placa</th>
            <th>Cliente</th>
            <th>Precio</th>
        </tr>
        <?php
            foreach($listadoFacturas as $factura){
            ?>
            <tr>
                <td><?php print $factura["fecha_factura"]; ?></td>
                <td><?php print $factura["placa_vehiculo"]; ?></td>
                <td><?php print $factura["nombre_cliente"]; ?></td>
                <td><?php print $factura["precio_factura"]; ?></td>
            <tr>
            <?php
            }
        ?>
    </table>
    
    <!-- Boton "Registrar Factura" -->
    <div class="contenedor_boton_registrar">
        <input type="button" id="boton_registrar_factura" value="Registrar Factura">
    </div>
    
    </body>
</html>