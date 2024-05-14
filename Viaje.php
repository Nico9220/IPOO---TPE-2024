<?php

/**
    * La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.

    Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los datos de los pasajeros). Utilice clases y arreglos  para   almacenar la información correspondiente a los pasajeros. Cada pasajero guarda  su “nombre”, “apellido” y “numero de documento”.

    Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos.

    Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono. El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido. La clase Viaje debe hacer referencia al responsable de realizar el viaje.

    Implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.

    TPE 2
    Modificar la clase viaje para almacenar el costo del viaje, la suma de los costos abonados por los pasajeros e implementar el método venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros ( solo si hay espacio disponible), actualizar los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.
    Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es menor a la cantidad máxima de pasajeros y falso caso contrario
 */


class Viaje{
    private $codigoViaje;
    private $destino;
    private $cantMaxPasajeros;
    private $objPasajero;
    private $objResponsableV;
    private $costoViaje;
    private $costoAbonado;

    public function __construct($codigoViajeInput, $destinoInput, $cantMaxPasajerosInput, $objPasajero, $objResponsableV, $costoViaje, $costoAbonado){
        $this->codigoViaje = $codigoViajeInput;
        $this->destino = $destinoInput;
        $this->cantMaxPasajeros = $cantMaxPasajerosInput;
        $this->objPasajero = [];
        $this->objResponsableV = $objResponsableV;
        $this->costoViaje = $costoViaje;
        $this->costoAbonado = $costoAbonado;
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
        return $this->objPasajero;
    }
    public function getObjResponsableV(){
        return $this->objResponsableV;
    }
    public function getCostoViaje(){
        return $this->costoViaje;
    }
    public function getCostoAbonado(){
        return $this->costoAbonado;
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
    public function setPasajeros($objPasajero){
        $this->objPasajero = $objPasajero;
    }
    public function setObjResponsableV($objResponsableV){
        $this->objResponsableV = $objResponsableV;
    }
    public function setCostoViaje($costoViaje){
        $this->costoViaje = $costoViaje;
    }
    public function setCostoAbonado($costoAbonado){
        $this->costoAbonado = $costoAbonado;
    }

    //Agregamos a un nuevo pasajero.

    public function agregarPasajero($pasajero) {
        $pasajeroExiste = false;
        $cantidadMaximaAlcanzada = false;
    
        //Verificamos si el pasajero ya está en la lista
        foreach ($this->objPasajero as $p) {
            if ($p->getDocumento() === $pasajero->getDocumento()) {
                $pasajeroExiste = true;
                break;
            }
        }
        //Verificamos si se supera la cantidad máxima de pasajeros
        if (count($this->objPasajero) >= $this->cantMaxPasajeros) {
            $cantidadMaximaAlcanzada = true;
        }
        //Si el pasajero ya existe o se superó la cantidad máxima, no se puede agregar
        if ($pasajeroExiste || $cantidadMaximaAlcanzada) {
            return false;
        }
        //Si no se cumplieron las condiciones anteriores, agregamos el pasajero y retornamos true
        $this->objPasajero[] = $pasajero;
        return true;
    }

    //Modificamos los datos de un pasajero
    public function modificarPasajero($indice, $nombre, $apellido, $numeroDocumento, $telefono) {
        $modificado = false;
        if (isset($this->objPasajero[$indice])) {
            $this->objPasajero[$indice]->setNombre($nombre);
            $this->objPasajero[$indice]->setApellido($apellido);
            $this->objPasajero[$indice]->setDocumento($numeroDocumento);
            $this->objPasajero[$indice]->setTelefono($telefono);
            $modificado = true;
        }
        return $modificado;
    }


    public function eliminarPasajero($indice) {
        $eliminado = false;
        if (isset($this->objPasajero[$indice])) {
            array_splice($this->objPasajero, $indice, 1);
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
    
    public function hayPasajesDisponibles(){
        $hayEspacio = false; 
        if (count ($this->getObjPasajeros()) < $this->getCantMaxPasajeros()){
            $hayEspacio = true;
        }
        return $hayEspacio;
    }

    public function venderPasaje($objPasajero){
        $costoTotal = 0;
        $disponible = $this->hayPasajesDisponibles();
        
        if($disponible){
            $porcentajeIncremento = $objPasajero->darPorcentajeIncremento();
            $costoTotal = $this->getCostoViaje() * (1 + ($porcentajeIncremento / 100));
            
            $this->setCostoAbonado($this->getCostoAbonado() + $costoTotal);
            
            $this->objPasajero[] = $objPasajero;
        }
        
        return $costoTotal;
    }

    public function __toString(){
        return "El codigo es: " . $this->getCodigoViaje() . "\n" . 
        "El destino es: " . $this->getDestino() . "\n" . 
        "La cantidad maxima de pasajeros es: " . $this->getCantMaxPasajeros() . "\n" .
        "Pasajeros: " . "\n" . $this->concatenarPasajeros($this->getObjPasajeros()) . "\n" . 
        "Datos del responsable: " . $this->getObjResponsableV() . "\n" . 
        "Costo del viaje: " .$this->getCostoViaje() . "\n" . 
        "Costo Abonado: " . $this->getCostoAbonado() . "\n";
    }
}