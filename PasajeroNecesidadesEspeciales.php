<?php

/**
 * La clase Pasajeros con necesidades especiales se refiere a pasajeros que pueden requerir servicios especiales como sillas de ruedas, asistencia para el embarque o desembarque, o comidas especiales para personas con alergias o restricciones alimentarias.
 * Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%.
 */

class PasajeroNecesidadesEspeciales extends Pasajero{
    private $sillaDeRuedas;
    private $asistencia;
    private $comidaEspecial;

    public function __construct($nombre, $apellido, $documento, $telefono, $sillaDeRuedas, $asistencia, $comidaEspecial){
        parent :: __construct($nombre, $apellido, $documento, $telefono);
        $this->sillaDeRuedas = $sillaDeRuedas;
        $this->asistencia = $asistencia;
        $this->comidaEspecial = $comidaEspecial;
    }

    //metodos GET
    public function getSillaDeRuedas(){
        return $this->sillaDeRuedas;
    }
    public function getAsistencia(){
        return $this->asistencia;
    }
    public function getComidaEspecial(){
        return $this->comidaEspecial;
    }

    //metodos SET
    public function setSillaDeRuedas($sillaDeRuedas){
        $this->sillaDeRuedas = $sillaDeRuedas;
    }
    public function setAsistencia($asistencia){
        $this->asistencia = $asistencia;
    }
    public function setComidaEspecial($comidaEspecial){
        $this->comidaEspecial = $comidaEspecial;
    }

    public function darPorcentajeIncremento()
    {
        $incremento = 0;
        if ($this->getSillaDeRuedas() && $this->getAsistencia() && $this->getComidaEspecial()){
            $incremento = 30;
        }elseif($this->getSillaDeRuedas() || $this->getAsistencia() || $this->getComidaEspecial()){
            $incremento = 15;
        }
        return $incremento;
    }

    public function __toString(){
        $cadena = parent :: __toString();
        $cadena .= "Silla de ruedas: " . $this->getSillaDeRuedas() . "\n" . "Necesita asistencia: " . $this->getAsistencia() . "\n" . "Comida especial: " . "\n" . $this->getComidaEspecial() . "\n";
        return $cadena;
    }
}