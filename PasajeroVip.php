<?php

/*
La clase "PasajeroVIP" tiene como atributos adicionales el número de viajero frecuente y cantidad de millas de pasajero.
Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%.
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

    public function darPorcentajeIncremento()
    {
        $incremento = 35;
        if ($this->getCantidadMillas() > 300){
            $incremento += 30;
        }
        return $incremento;
    }

    public function __toString(){
        $cadena = parent :: __toString();
        $cadena .= "Numero de viajero frecuente: " . $this->getNumeroViajeroFrecuente() . "\n" . 
        "Cantidad de millas: " . $this->getCantidadMillas() . "\n";
        return $cadena;
    }
}