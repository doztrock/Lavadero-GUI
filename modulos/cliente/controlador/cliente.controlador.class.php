<?php

/**
 *  Controlador
 * 
 *  Objetivo:   Servir de intermediario entre el modelo y la vista.
 * 
 */

/* Incluimos el modelo */
require_once(__DIR__ . "/../modelo/cliente.modelo.class.php");

class Cliente{
    
    /* Modelo */
    private $modelo;
    
    /* Database */
    private $database;
    
    /* Constructor */
    public function __contruct($database){
        $this->database = $database;
    }
    
    /**
     *  Funcion:    iniciar()
     * 
     *  Objetivo:   Iniciar la interfaz grafica del modulo.
     * 
     */
    public function iniciar(){
        
        /* Invocamos los modelos */
        $this->modelo = new ModeloCliente($this->database);
        
        /**
         * Hacemos uso de las funciones del modelo
         */
         
       // $prueba = $this->modelo->prueba();
        
        /* Incluimos la vista y mostramos los resultados */
        require_once(__DIR__ . "/../vista/cliente.vista.php");
        
    }
    
}

?>