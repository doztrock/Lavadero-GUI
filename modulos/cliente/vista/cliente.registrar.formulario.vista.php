<?php

/**
 *  Vista
 * 
 *  Objetivo:   Mostrar el formulario de registro de cliente.
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
    </form>

    <!-- Boton "Cancelar" -->
    <input type="button" id="boton_cancelar" value="Volver">

    <!-- Boton "Guardar" -->
    <input type="button" id="boton_guardar" value="Registrar Cliente">

    </body>
</html>