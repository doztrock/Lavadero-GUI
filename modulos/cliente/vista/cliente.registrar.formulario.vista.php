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
        <table border=1 class="tabla_registro">
            <tr>
                <td>Cedula: </td>
                <td><input type="text" name="cedula"></td>
            </tr>
            <tr>
                <td>Nombre: </td>
                <td><input type="text" name="nombre"></td>
            </tr>
            <tr>
                <td>Telefono: </td>
                <td><input type="text" name="telefono"></td>
            </tr>
        </<table>
    </form>

    <!-- Boton "Cancelar" -->
    <input type="button" id="boton_cancelar" value="Cancelar">

    <!-- Boton "Guardar" -->
    <input type="button" id="boton_guardar" value="Guardar">

    </body>
</html>