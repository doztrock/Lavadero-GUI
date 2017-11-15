<?php

/**
 *  Vista
 * 
 *  Objetivo:   Mostrar el formulario de registro de servicio.
 * 
 */

?>

<html>
    <head>
        <script type="text/javascript">
        
            $(document).ready(function(){
                
                $("#boton_cancelar").click(function(){
                    
                    var modulo = "servicio";
                    var accion = "iniciar";
                    
                    $("#contenido").load("core/ControladorFrontal.php",{
                        "modulo": modulo,
                        "accion": accion
                    });
                    
                });
                
                $("#boton_guardar").click(function(){
    
                    var modulo = "servicio";
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
        <label class="titulo">Registrar Servicio</label>
    </div>

    <!-- Formulario de Registro -->
    <form id="formulario">
        <table class="tabla_registro">
            <tr>
                <td>Tipo: </td>
                <td><input type="text" name="tipo"></td>
            </tr>
            <tr>
                <td>Duracion: </td>
                <td><input type="text" name="duracion"></td>
            </tr>
            <tr>
                <td>Precio: </td>
                <td><input type="text" name="precio"></td>
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