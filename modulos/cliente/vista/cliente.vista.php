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
                
                $("#boton_nuevo_cliente").click(function(){
                    $("#contenido").hide();
                    $("#menu").show();
                });
                
                $("#boton_registrar_cliente").click(function(){
                
                    var modulo = "cliente";
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
    <input type="button" id="boton_volver" value="Volver">

    <!-- Listado de clientes -->
    <table border=1>
        <?php
            foreach($listadoClientes as $cliente){
            ?>
            <tr>
                <td><?php print $cliente["cedula"]; ?></td>
                <td><?php print $cliente["nombre"]; ?></td>
                <td><?php print $cliente["telefono"]; ?></td>
            <tr>
            <?php
            }
        ?>
    </table>
    
    <!-- Boton "Registrar Cliente" -->
    <input type="button" id="boton_registrar_cliente" value="Registrar Cliente">

    </body>
</html>