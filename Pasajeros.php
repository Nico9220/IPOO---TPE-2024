<?php

/**
 * Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono.
 * Implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero.
 */

class Pasajeros{
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;

    public function __construct($nombreInput, $apellidoInput,$documentoInput, $telefonoInput){
        $this->nombre = $nombreInput;
        $this->apellido = $apellidoInput;
        $this->documento = $documentoInput;
        $this->telefono = $telefonoInput;
    }

    //Getters

    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getDocumento(){
        return $this->documento;
    }
    public function getTelefono(){
        return $this->telefono;
    }

    //Setters

    public function setNombre($nombreInput){
        $this->nombre = $nombreInput;
    }
    public function setApellido($apellidoInput){
        $this->apellido = $apellidoInput;
    }
    public function setDocumento($documentoInput){
        $this->documento = $documentoInput;
    }
    public function setTelefono($telefonoInput){
        $this->telefono = $telefonoInput;
    }

    public function __toString(){
        return "Nombre: " . $this->getNombre() . "\n".
        "Apellido: " .$this->getApellido() . "\n". 
        "Documento: " .$this->getDocumento(). "\n". 
        "Telefono: " .$this->getTelefono() . "\n";
    }
}