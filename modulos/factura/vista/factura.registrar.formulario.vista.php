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

                                $.each(data, function (identificador, vehiculo) {

                                    $("select[name=identificador_vehiculo]").append(
                                    $('<option>', 
                                        {
                                            value: identificador,
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

        </script>
    </head>
    <body>

    <!-- Formulario de Registro -->
    <form id="formulario">
        
        Fecha: <input type="text" name="cedula">
        
        <!-- Listado de clientes -->
        Cliente:
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
        
        <!-- Listado de vehiculos -->
        Vehiculo:
        <select name="identificador_vehiculo" disabled>
            <option value="0">Seleccione...</option>
        </select>
        
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