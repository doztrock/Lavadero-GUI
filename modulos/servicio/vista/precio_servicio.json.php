<?php

/**
 *  Vista JSON
 * 
 *  Objetivo:   Mostrar un objeto en JSON, con el precio respectivo a un servicio.
 * 
 */

header("Content-type:application/json");

// Imprimimos el precio del servicio
print json_encode($precioServicio);

?>