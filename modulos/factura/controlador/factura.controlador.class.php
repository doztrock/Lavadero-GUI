<?php

/**
 *  Controlador
 * 
 *  Objetivo:   Servir de intermediario entre el modelo y la vista.
 * 
 */

/* Incluimos el modelo */
require_once(__DIR__ . "/../modelo/factura.modelo.class.php");

/* Incluimos el modelo: CLIENTE */
require_once(__DIR__ . "/../../cliente/modelo/cliente.modelo.class.php");

class Factura{
    
    /* Modelo */
    private $modelo;
    
    /* Database */
    private $database;
    
    /* Constructor */
    public function __construct($database){
        
        $this->database = $database;
        
        /* Invocamos los modelos */
        $this->modelo = new ModeloFactura($this->database);
        $this->modeloCliente = new ModeloCliente($this->database);
                
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
         
            // Obtenemos el listado de facturas
            $listadoFacturas = $this->modelo->obtenerListado();
         
         
        /* Incluimos la vista y mostramos los resultados */
        require_once(__DIR__ . "/../vista/factura.vista.php");
        
    }
    
    /**
     *  Funcion:    registrar()
     * 
     *  Objetivo:   Iniciar la interfaz grafica del registro de factura.
     * 
     */
    public function registrar(){

        /**
         * Hacemos uso de las funciones del modelo
         */
         
            // Obtenemos el listado de clientes
            $listadoClientes = $this->modeloCliente->obtenerListado();


        /* Incluimos la vista y mostramos el formulario */
        require_once(__DIR__ . "/../vista/factura.registrar.formulario.vista.php");

    }
 
    /**
     *  Funcion:    guardar()
     * 
     *  Objetivo:   Guardar la informacion del registro de factura.
     * 
     */
     /*
    public function guardar(){

        $informacion = json_decode($_POST["informacion"]);
        $cliente = array();

        foreach($informacion as $dato){
            $cliente[$dato->name] = $dato->value;
        }*/

        /**
         * Hacemos uso de las funciones del modelo
         */
         /*
            // Guardamos la informacion del cliente
            $resultado = $this->modelo->guardar($cliente["cedula"], $cliente["nombre"], $cliente["telefono"]);

            // Obtenemos el listado de clientes
            $listadoClientes = $this->modelo->obtenerListado();
            */

        /* Incluimos la vista y mostramos los resultados */
      /*  require_once(__DIR__ . "/../vista/cliente.vista.php");

    }*/
    
}

?>