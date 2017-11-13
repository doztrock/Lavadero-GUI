<?php

/**
 *  Vista JSON
 * 
 *  Objetivo:   Mostrar un objeto en JSON, con los vehiculos pertenecientes a un cliente.
 * 
 */

header("Content-type:application/json");

// Imprimimos el listado de vehiculos
print json_encode($listadoVehiculos);

?>