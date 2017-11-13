<?php

/**
 *  Vista
 * 
 *  Objetivo:   Mostrar el formulario de registro de factura.
 * 
 */

?>

<html>
    <head>
        <script type="text/javascript">
        
            $(document).ready(function(){
                
                $("#boton_cancelar").click(function(){
                    
                    var modulo = "cliente";
                    var accion = "iniciar";
                    
                    $("#contenido").load("core/ControladorFrontal.php",{
                        "modulo": modulo,
                        "accion": accion
                    });
                    
                });
                
                $("#boton_guardar").click(function(){
    
                    var modulo = "cliente";
                    var accion = "guardar";

                    $("#contenido").load("core/ControladorFrontal.php",{
                        "modulo": modulo,
                        "accion": accion,
                        "informacion": JSON.stringify($("#formulario").serializeArray())
                    });
                    
                });
                
            });

        </script>
    </head>
    <body>

    <!-- Formulario de Registro -->
    <form id="formulario">
        Cedula: <input type="text" name="cedula">
        Nombre: <input type="text" name="nombre">
        Telefono: <input type="text" name="telefono">
        
        
        <!-- Listado de clientes -->
        Cliente:
        <select name="identificador_cliente">
            <?php
                foreach($listadoClientes as $cliente){
                ?>
                <option value="<?php print $cliente["identificador"]; ?>">
                    <?php print $cliente["nombre"]; ?>
                </option>
                <?php
            }
            ?>
        </select>
        
    </form>

    <!-- Boton "Cancelar" -->
    <input type="button" id="boton_cancelar" value="Cancelar">

    <!-- Boton "Guardar" -->
    <input type="button" id="boton_guardar" value="Guardar">

    </body>
</html>