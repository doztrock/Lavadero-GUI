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

                $("#boton_registrar_servicio").click(function(){
                
                    var modulo = "servicio";
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

    <!-- Listado de servicios -->
    <table border=1 id="tabla_servicio">
        <tr>
            <th>Servicio</th>
            <th>Duracion (m)</th>
            <th>Precio</th>
        </tr>
        <?php
            foreach($listadoServicios as $servicio){
            ?>
            <tr>
                <td><?php print $servicio["tipo"]; ?></td>
                <td><?php print $servicio["duracion"]; ?></td>
                <td><?php print "$" . $servicio["precio"]; ?></td>
            <tr>
            <?php
            }
        ?>
    </table>
    
    <!-- Boton "Registrar Servicio" -->
    <div class="contenedor_boton_registrar">
        <input type="button" id="boton_registrar_servicio" value="Registrar Servicio">
    </div>

    </body>
</html>