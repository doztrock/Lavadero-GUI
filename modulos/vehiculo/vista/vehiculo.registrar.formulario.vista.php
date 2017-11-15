<?php

/**
 *  Vista
 * 
 *  Objetivo:   Mostrar el formulario de registro de vehiculo.
 * 
 */

?>

<html>
    <head>
        <script type="text/javascript">
        
            $(document).ready(function(){
                
                $("#boton_cancelar").click(function(){
                    
                    var modulo = "vehiculo";
                    var accion = "iniciar";
                    
                    $("#contenido").load("core/ControladorFrontal.php",{
                        "modulo": modulo,
                        "accion": accion
                    });
                    
                });
                
                $("#boton_guardar").click(function(){
    
                    var modulo = "vehiculo";
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
        <label class="titulo">Registrar Vehiculo</label>
    </div>

    <!-- Formulario de Registro -->
    <form id="formulario">
        <table class="tabla_registro">
            <tr>
                <td>Cliente: </td>
                <td>
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
                </td>
            </tr>
            <tr>
                <td>Placa: </td>
                <td><input type="text" name="placa"></td>
            </tr>
            <tr>
                <td>Modelo: </td>
                <td><input type="text" name="modelo"></td>
            </tr>
            <tr>
                <td>Color: </td>
                <td><input type="text" name="color"></td>
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