<?php

/**
 * Se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido.
 */

class ResponsableV{
    private $idEmpleado;
    private $idLicencia;
    private $nombre;
    private $apellido;

    public function __Construct($idEmpleadoInput, $idLicenciaInput, $nombreInput, $apellidoInput){
        $this->idEmpleado = $idEmpleadoInput;
        $this->idLicencia = $idLicenciaInput;
        $this->nombre = $nombreInput;
        $this->apellido = $apellidoInput;
    }

    //Getters
    public function getIdEmpleado(){
        return $this->idEmpleado;
    }
    public function getIdLicencia(){
        return $this->idLicencia;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }

    //Setters
    public function setIdEmpleado($idEmpleadoInput){
        $this->idEmpleado = $idEmpleadoInput;
    }
    public function setIdLicencia($idLicenciaInput){
        $this->idLicencia = $idLicenciaInput;
    }
    public function setNombre($nombreInput){
        $this->nombre = $nombreInput;
    }
    public function setApellido($apellidoInput){
        $this->apellido = $apellidoInput;
    }

    public function __toString(){
        return "\n" . "El numero de empleado es: " . $this->getIdEmpleado() . "\n" . 
        "Su licencia es: " .$this->getIdLicencia() . "\n" . 
        "Su nombre es: " .$this->getNombre() . "\n" . 
        "Su apellido es: " .$this->getApellido();
    }
}