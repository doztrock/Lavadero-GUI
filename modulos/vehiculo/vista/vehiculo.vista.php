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

                $("#boton_registrar_vehiculo").click(function(){
                
                    var modulo = "vehiculo";
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

    <!-- Listado de vehiculos -->
    <table border=1 id="tabla_factura">
        <tr>
            <th>Placa</th>
            <th>Modelo</th>
            <th>Color</th>
            <th>Cliente</th>
        </tr>
        <?php
            foreach($listadoVehiculos as $vehiculo){
            ?>
            <tr>
                <td><?php print $vehiculo["placa"]; ?></td>
                <td><?php print $vehiculo["modelo"]; ?></td>
                <td><?php print $vehiculo["color"]; ?></td>
                <td><?php print $vehiculo["nombre_cliente"]; ?></td>
            <tr>
            <?php
            }
        ?>
    </table>
    
    <!-- Boton "Registrar vehiculo" -->
    <div class="contenedor_boton_registrar">
        <input type="button" id="boton_registrar_vehiculo" value="Registrar Vehiculo">
    </div>

    </body>
</html>