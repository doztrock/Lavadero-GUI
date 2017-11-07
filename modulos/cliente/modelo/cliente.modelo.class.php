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
        return array(array("0", "Pepito", "123154"));
    }
    
    
}

?>