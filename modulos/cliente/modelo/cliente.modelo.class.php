<?php

/**
 *  Modelo
 * 
 *  Objetivo:   Realizar operaciones con la base de datos.
 * 
 */
class ModeloCliente{
    
    /* Database */
    private $database;
    
    /* Constructor */
    public function __contruct($database){
        $this->database = $database;
    }
   
    /**
     * Obtiene el listado de clientes
     */
    public function obtenerListado(){
        return $this->database->consulta("SELECT cedula, nombre, telefono FROM Cliente");
    }
    
    
}

?>