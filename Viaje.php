<?php

/**
    * La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.

    Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los datos de los pasajeros). Utilice clases y arreglos  para   almacenar la información correspondiente a los pasajeros. Cada pasajero guarda  su “nombre”, “apellido” y “numero de documento”.

    Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos.

    Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono. El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido. La clase Viaje debe hacer referencia al responsable de realizar el viaje.

    Implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.
 */


class Viaje{
    private $codigoViaje;
    private $destino;
    private $cantMaxPasajeros;
    private $objPasajeros;
    private $objResponsableV;

    public function __construct($codigoViajeInput, $destinoInput, $cantMaxPasajerosInput, $objPasajeros, $objResponsableV){
        $this->codigoViaje = $codigoViajeInput;
        $this->destino = $destinoInput;
        $this->cantMaxPasajeros = $cantMaxPasajerosInput;
        $this->objPasajeros = [];
        $this->objResponsableV = $objResponsableV;
    }

    //Getters

    public function getCodigoViaje(){
        return $this->codigoViaje;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }
    public function getObjPasajeros(){
        return $this->objPasajeros;
    }
    public function getObjResponsableV(){
        return $this->objResponsableV;
    }

    //Setters

    public function setCodigoViaje($codigoViajeInput){
        $this->codigoViaje = $codigoViajeInput;
    }
    public function setDestino($destinoInput){
        $this->destino = $destinoInput;
    }
    public function setCantMaxPasajeros($cantMaxPasajerosInput){
        $this->cantMaxPasajeros = $cantMaxPasajerosInput;
    }
    public function setPasajeros($objPasajeros){
        $this->objPasajeros = $objPasajeros;
    }
    public function setObjResponsableV($objResponsableV){
        $this->objResponsableV = $objResponsableV;
    }

    //Agregamos a un nuevo pasajero.

    public function agregarPasajero($pasajero) {
        $pasajeroExiste = false;
        $cantidadMaximaAlcanzada = false;
    
        //Verificamos si el pasajero ya está en la lista
        foreach ($this->objPasajeros as $p) {
            if ($p->getDocumento() === $pasajero->getDocumento()) {
                $pasajeroExiste = true;
                break;
            }
        }
    
        //Verificamos si se supera la cantidad máxima de pasajeros
        if (count($this->objPasajeros) >= $this->cantMaxPasajeros) {
            $cantidadMaximaAlcanzada = true;
        }
    
        //Si el pasajero ya existe o se superó la cantidad máxima, no se puede agregar

        if ($pasajeroExiste || $cantidadMaximaAlcanzada) {
            return false;
        }
    
        //Si no se cumplieron las condiciones anteriores, agregamos el pasajero y retornamos true
        $this->objPasajeros[] = $pasajero;
        return true;
    }

    //Modificamos los datos de un pasajero
    public function modificarPasajero($indice, $nombre, $apellido, $numeroDocumento, $telefono) {
        $modificado = false;
        if (isset($this->objPasajeros[$indice])) {
            $this->objPasajeros[$indice]->setNombre($nombre);
            $this->objPasajeros[$indice]->setApellido($apellido);
            $this->objPasajeros[$indice]->setDocumento($numeroDocumento);
            $this->objPasajeros[$indice]->setTelefono($telefono);
            $modificado = true;
        }
        return $modificado;
    }


    public function eliminarPasajero($indice) {
        $eliminado = false;
        if (isset($this->objPasajeros[$indice])) {
            array_splice($this->objPasajeros, $indice, 1);
            $eliminado = true;
        }
        return $eliminado;
    }

    public function concatenarPasajeros($objPasajeros){
        $cadenaPasajeros = "";
        foreach ($objPasajeros as $pasajero){
            $cadenaPasajeros .= $pasajero;
        }
        return $cadenaPasajeros;
    }

    public function agregarResponsableV($responsable) {
        $responsableCargado = false;
            if ($this->objResponsableV === $responsable) {
                $responsableCargado = true;
            }else{
                $this->objResponsableV = $responsable;
            }
        
        return $responsableCargado;
    }

    public function eliminarResponsable(){
        if ($this->objResponsableV !== null){
            $this->objResponsableV = null;
        }
    }

    public function __toString(){
        return "El codigo es: " . $this->getCodigoViaje() . "\n" . 
        "El destino es: " . $this->getDestino() . "\n" . 
        "La cantidad maxima de pasajeros es: " . $this->getCantMaxPasajeros() . "\n" .
        "Pasajeros: " . "\n" . $this->concatenarPasajeros($this->getObjPasajeros()) . "\n" . 
        "Datos del responsable: " . $this->getObjResponsableV();
    }
}