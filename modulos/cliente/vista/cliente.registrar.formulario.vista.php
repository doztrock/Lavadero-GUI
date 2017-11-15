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
        
    <!-- Titulo -->
    <div class="contenedor_titulo">
        <label class="titulo">Registrar Cliente</label>
    </div>

    <!-- Formulario de Registro -->
    <form id="formulario">
        <table class="tabla_registro">
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

    <!-- Botones -->
    <div class="contenedor_botones">

        <!-- Boton "Cancelar" -->
        <input type="button" id="boton_cancelar" value="">

        <!-- Boton "Guardar" -->
        <input type="button" id="boton_guardar" value="">
    
    </div>

    </body>
</html>