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
                    $("#contenido").hide();
                    $("#menu").show();
                });
                
                $("#boton_guardar").click(function(){
                
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

    <!-- Formulario de Registro -->
    <form>
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