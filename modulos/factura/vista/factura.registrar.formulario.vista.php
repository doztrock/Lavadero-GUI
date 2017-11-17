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
                    
                    var modulo = "factura";
                    var accion = "iniciar";
                    
                    $("#contenido").load("core/ControladorFrontal.php",{
                        "modulo": modulo,
                        "accion": accion
                    });
                    
                });
                
                $("#boton_guardar").click(function(){
    
                    var modulo = "factura";
                    var accion = "guardar";

                    $("#contenido").load("core/ControladorFrontal.php",{
                        "modulo": modulo,
                        "accion": accion,
                        "informacion": JSON.stringify($("#formulario").serializeArray())
                    });
                    
                });
                
                $("#boton_agregar").click(function(){
                    
                    $("table[class='tabla_detalle']").find('tr:last').before(
                        $("#tabla_oculta").find("tr:last").clone()
                    );
                    
                });
                
                $("select[name=identificador_cliente]").on('change', function() {
                
                    var modulo = "vehiculo";
                    var accion = "consultarPropietario";

                    $.ajax({
                        url: "core/ControladorFrontal.php",
                        type: "POST",
                        data: {
                            "modulo": modulo,
                            "accion": accion,
                            "identificador_cliente": this.value
                        },success: function(data){

                            if(data.length > 0){
                                
                                $("select[name=identificador_vehiculo]").empty();

                                $("select[name=identificador_vehiculo]").append(
                                $('<option>', 
                                    {
                                        value: 0,
                                        text: 'Seleccione...'
                                    })
                                );

                                $.each(data, function (indice, vehiculo) {

                                    $("select[name=identificador_vehiculo]").append(
                                    $('<option>', 
                                        {
                                            value: vehiculo.identificador,
                                            text: vehiculo.placa
                                        })
                                    );
                                    
                                });
                                
                                $("#boton_guardar").prop("disabled", false);
                                $("select[name=identificador_vehiculo]").prop("disabled", false);
                                
                            }else{
                                
                                $("select[name=identificador_vehiculo]").empty();
                                
                                $("select[name=identificador_vehiculo]").append(
                                $('<option>', 
                                    {
                                        value: 0,
                                        text: 'No Existe'
                                    })
                                );
                                
                                $("#boton_guardar").prop("disabled", true);
                                $("select[name=identificador_vehiculo]").prop("disabled", true);
                                
                            }
                            
                        }
                        
                    });
                    
                });

            });
            
            function consultarPrecio(elemento){
                   
                var modulo = "servicio";
                var accion = "consultarPrecio";

                $.ajax({
                    url: "core/ControladorFrontal.php",
                    type: "POST",
                    data: {
                        "modulo": modulo,
                        "accion": accion,
                        "identificador_servicio": elemento.val()
                    },success: function(data){
                        
                        if(data != null){
                            elemento.parent().parent().find("input[name='precio_servicio[]']").val(data.precio);
                        }else{
                            elemento.parent().parent().find("input[name='precio_servicio[]']").val("");
                        }
                        
                    }
                });
                    
            }

        </script>
    </head>
    <body>
        
    <!-- Titulo -->
    <div class="contenedor_titulo">
        <label class="titulo">Registrar Factura</label>
    </div>

    <!-- Formulario de Registro -->
    <form id="formulario">
        <table class="tabla_registro">
            <tr>
                <td>Fecha: </td>
                <td><input type="text" name="fecha" value="<?php echo date("Y-m-d H:i"); ?>"></td>
            </tr>
            <tr>
                <td>Cliente: </td>
                <td>
                    <select name="identificador_cliente">
                        <option value="0">Seleccione...</option>
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
                <td>Vehiculo: </td>
                <td>
                    <select name="identificador_vehiculo" disabled>
                        <option value="0">Seleccione...</option>
                    </select>
                </td>
            </tr>
        </<table>
        <table class="tabla_detalle">
            <tr>
                <th>Servicio</th>
                <th>Precio</th>
            </tr>
            <tr>
                <td><input type="button" id="boton_agregar" value=""></td>
            </tr>
        </table>
    </form>

    <!-- Botones -->
    <div class="contenedor_botones">

        <!-- Boton "Cancelar" -->
        <input type="button" id="boton_cancelar" value="">

        <!-- Boton "Guardar" -->
        <input type="button" id="boton_guardar" value="">
    
    </div>

    <!-- Fila de Servicios -->
    <table id="tabla_oculta" style="display:none">
        <tr id="fila_servicio">
            <td>
                <select name="identificador_servicio[]" onchange="consultarPrecio($(this))">
                    <option value="0">Seleccione...</option>
                    <?php
                        foreach($listadoServicios as $servicio){
                        ?>
                        <option value="<?php print $servicio["identificador"]; ?>">
                            <?php print $servicio["tipo"]; ?>
                        </option>
                        <?php
                        }
                    ?>
                </select>
            </td>
            <td>
                <input type="text" name="precio_servicio[]">
            </td>
        </tr>
    </table>

    </body>
</html>