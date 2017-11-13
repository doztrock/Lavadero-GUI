<?php

/**
 *  Modelo
 * 
 *  Objetivo:   Realizar operaciones con la base de datos.
 * 
 */
class ModeloVehiculo{
    
    /* Database */
    private $database;
    
    /* Constructor */
    public function __construct($database){
        $this->database = $database;
    }
   
    /**
     * Obtiene el listado de vehiculos
     */
    public function obtenerListado(){
        return $this->database->consulta("SELECT Vehiculo.identificador, Vehiculo.placa, Vehiculo.modelo, Vehiculo.color, Cliente.nombre AS nombre_cliente FROM Vehiculo INNER JOIN Cliente ON Vehiculo.identificador_cliente = Cliente.identificador");
    }
    
    /**
     *  Guardar la informacion del vehiculo
     */
    public function guardar($identificador_cliente, $placa, $modelo, $color){
        
        $resultado = $this->database->consulta(
            sprintf("INSERT INTO Vehiculo (identificador_cliente, placa, modelo, color) VALUES ('%s', '%s', '%s', '%s')", $identificador_cliente, $placa, $modelo, $color)
        );
        
        return $resultado;
    }
    
    /**
     * Obtiene el listado de vehiculos basado en el identificador del cliente
     */
    public function obtenerListadoPorCliente($identificador_cliente){
        
        $resultado = $this->database->consulta(sprintf(
            "SELECT Vehiculo.identificador, Vehiculo.placa 
             FROM Vehiculo 
             INNER JOIN Cliente ON Cliente.identificador = Vehiculo.identificador_cliente 
             WHERE Vehiculo.identificador_cliente = %d", $identificador_cliente
        ));
        
        return $resultado;
    }
    
}

?>