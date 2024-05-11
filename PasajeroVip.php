<?php

/*
La clase "PasajeroVIP" tiene como atributos adicionales el número de viajero frecuente y cantidad de millas de pasajero.
*/

class PasajeroVip extends Pasajero {
    private $numeroViajeroFrecuente;
    private $cantidadMillas;

    public function __construct($nombre, $apellido, $documento, $telefono, $numeroViajeroFrecuente, $cantidadMillas){
        parent :: __construct($nombre, $apellido, $documento, $telefono);
        $this->numeroViajeroFrecuente = $numeroViajeroFrecuente;
        $this->cantidadMillas = $cantidadMillas;
    }

    //metodos GET
    public function getNumeroViajeroFrecuente(){
        return $this->numeroViajeroFrecuente;
    }
    public function getCantidadMillas(){
        return $this->cantidadMillas;
    }

    //metodos SET
    public function setNumeroViajeroFrecuente($numeroViajeroFrecuente){
        $this->numeroViajeroFrecuente = $numeroViajeroFrecuente;
    }
    public function setCantidadMillas($cantidadMillas){
        $this->cantidadMillas = $cantidadMillas;
    }

    public function __toString(){
        $cadena = parent :: __toString();
        $cadena .= "Numero de viajero frecuente: " . $this->getNumeroViajeroFrecuente() . "\n" . 
        "Cantidad de millas: " . $this->getCantidadMillas() . "\n";
        return $cadena;
    }
}