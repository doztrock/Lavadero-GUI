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
    public function __construct($database){
        
        $this->database = $database;
        
        /* Invocamos los modelos */
        $this->modelo = new ModeloCliente($this->database);
                
    }
    
    /**
     *  Funcion:    iniciar()
     * 
     *  Objetivo:   Iniciar la interfaz grafica del modulo.
     * 
     */
    public function iniciar(){
        
        /**
         * Hacemos uso de las funciones del modelo
         */
         
            // Obtenemos el listado de clientes
            $listadoClientes = $this->modelo->obtenerListado();
         
         
        /* Incluimos la vista y mostramos los resultados */
        require_once(__DIR__ . "/../vista/cliente.vista.php");
        
    }
    
    /**
     *  Funcion:    registrar()
     * 
     *  Objetivo:   Iniciar la interfaz grafica del registro de cliente.
     * 
     */
    public function registrar(){

        /* Incluimos la vista y mostramos el formulario */
        require_once(__DIR__ . "/../vista/cliente.registrar.formulario.vista.php");

    }
 
    /**
     *  Funcion:    guardar()
     * 
     *  Objetivo:   Guardar la informacion del registro de cliente.
     * 
     */
    public function guardar(){

        $informacion = json_decode($_POST["informacion"]);
        $cliente = array();

        foreach($informacion as $dato){
            $cliente[$dato->name] = $dato->value;
        }

        /**
         * Hacemos uso de las funciones del modelo
         */
         
            // Guardamos la informacion del cliente
            $resultado = $this->modelo->guardar($cliente["cedula"], $cliente["nombre"], $cliente["telefono"]);

            // Obtenemos el listado de clientes
            $listadoClientes = $this->modelo->obtenerListado();
            

        /* Incluimos la vista y mostramos los resultados */
        require_once(__DIR__ . "/../vista/cliente.vista.php");

    }
    
}

?>