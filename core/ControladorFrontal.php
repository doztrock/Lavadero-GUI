<?php

class ControladorFrontal{
    
    /* Modulos soportados */
    private $MODULO = array(
        "cliente"
    );
    
    public function iniciar(){
        
        /* Peticion */
        $modulo = $_POST["modulo"];
        $accion = $_POST["accion"];
        
        /* Incluimos el controlador */
        require(__DIR__ . "/../modulos/$modulo/controlador/$modulo.controlador.class.php");
        
        /* Creamos el objeto */
        $controlador = new $modulo();
        
        /* Ejecutamos la accion */
        $controlador->$accion();
        
        return;
    }
    
}

/* Ejecutamos el controlador */
$controlador = new ControladorFrontal();
$controlador->iniciar();

unset($controlador);

?>