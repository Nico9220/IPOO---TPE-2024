<?php

include_once 'Viaje.php';
include_once 'Pasajero.php';
include_once 'ResponsableV.php';


$objPasajero = new Pasajero ("Nicolas", "Caretta", 36329071, 154769210);
$objResponsableV = new ResponsableV (369, 071, "Ependimo", "Gonzalez");
$objViaje = new Viaje(333, "Cancun", 100, $objPasajero, $objResponsableV, 500, 450);

function menu() {
    echo "1. Cargar información del viaje\n";
    echo "2. Modificar información del viaje\n";
    echo "3. Ver información del viaje\n";
    echo "4. Agregar responsable\n";
    echo "5. Agregar pasajero\n";
    echo "6. Salir\n";
    echo "Seleccione una opción: ";
}

function principal($objPasajero, $objResponsableV){
    $viaje = null;
    $continuar = true;

    while($continuar){
        menu();
    
        $opcion = trim(fgets(STDIN));

        switch ($opcion){
            case '1':
                echo "Ingrese el código de viaje: ";
                $codigo = trim(fgets(STDIN));
                echo "Ingrese destino del viaje: ";
                $destino = trim(fgets(STDIN));
                echo "Ingrese cantidad máxima de pasajeros: ";
                $cantMaxPasajeros = trim(fgets(STDIN));
                echo "Ingrese el costo del Viaje: ";
                $costoViaje = trim(fgets(STDIN));
                echo "Ingrese el costo abonado: ";
                $costoAbonado = trim(fgets(STDIN));
                $viaje = new Viaje($codigo, $destino, $cantMaxPasajeros, $objPasajero, $objResponsableV, $costoViaje, $costoAbonado);
                echo "Viaje registrado con éxito.\n";
                break;
            case '2':
                if($viaje){
                    echo "Modificar información del viaje\n";

                    echo "Ingrese el nuevo código de viaje: ";
                    $codigo = trim(fgets(STDIN));
                    echo "Ingrese el nuevo destino del viaje: ";
                    $destino = trim(fgets(STDIN));
                    echo "Ingrese la nueva cantidad máxima de pasajeros: ";
                    $cantMaxPasajeros = trim(fgets(STDIN));
            
                    // Se modifican los atributos del viaje
                    $viaje->setCodigoViaje($codigo);
                    $viaje->setDestino($destino);
                    $viaje->setCantMaxPasajeros($cantMaxPasajeros);
            
                    echo "Información del viaje modificada con éxito.\n";
                } else {
                    echo "Primero debe cargar la información del viaje.\n";
                }
                break;
            case '3':
                if($viaje){
                    echo "Información del viaje:\n";
                    echo $viaje . "\n";
                } else {
                    echo "Primero debe cargar la información del viaje.\n";
                }
                break;

                case '4':
                    // Agregamos responsable al viaje
                    if($viaje){
                        echo "Agregar responsable al viaje\n";
                        // Solicitar información del nuevo responsable
                        echo "Ingrese el codigo de Empleado: ";
                        $idEmpleado = trim(fgets(STDIN));
                        echo "Ingrese su Licencia: ";
                        $idLicencia = trim(fgets(STDIN));
                        echo "Ingrese el nombre: ";
                        $nombreEmpleado = trim(fgets(STDIN));
                        echo "Ingrese su apellido: ";
                        $apellidoEmpleado = trim(fgets(STDIN));
                    
                        //instanciamos el objeto
                        $nuevoResponsable = new ResponsableV($idEmpleado, $idLicencia, $nombreEmpleado, $apellidoEmpleado);
                    
                        // Se agrega al nuevo responsable al viaje
                        $responsableAgregado = $viaje->agregarResponsableV($nuevoResponsable);
                    
                        if($responsableAgregado) {
                            echo "Responsable agregado con éxito al viaje.\n";
                        } else {
                            echo "Ya existe un responsable asignado al viaje.\n";
                        }
                    } else {
                        echo "Primero debe cargar la información del viaje.\n";
                    }
                    break;

            case '5':
                //agregamos el pasajero
                if($viaje){
                    echo "Agregar pasajero al viaje\n";

                    echo "Ingrese el nombre del pasajero: ";
                    $nombrePasajero = trim(fgets(STDIN));
                    echo "Ingrese el apellido del pasajero: ";
                    $apellidoPasajero = trim(fgets(STDIN));
                    echo "Ingrese el documento del pasajero: ";
                    $documentoPasajero = trim(fgets(STDIN));
                    echo "Ingrese el teléfono del pasajero: ";
                    $telefonoPasajero = trim(fgets(STDIN));
                    
                    $nuevoPasajero = new Pasajero($nombrePasajero, $apellidoPasajero, $documentoPasajero, $telefonoPasajero);
                    
                    // Agregar el nuevo pasajero al viaje
                    $pasajeroAgregado = $viaje->agregarPasajero($nuevoPasajero);
                    
                    if($pasajeroAgregado) {
                        echo "Pasajero agregado con éxito al viaje.\n";
                    } else {
                        echo "El pasajero ya está cargado en el viaje o se ha alcanzado el límite de pasajeros.\n";
                    }
                } else {
                    echo "Primero debe cargar la información del viaje.\n";
                }

                echo "¿Desea realizar alguna acción adicional con los pasajeros? (S/N): ";
                $accionPasajeros = strtolower(trim(fgets(STDIN)));

                if ($accionPasajeros === 's') {
                    // Mostrar opciones adicionales
                    echo "1. Modificar pasajero\n";
                    echo "2. Eliminar pasajero\n";
                    echo "Seleccione una opción: ";
                    $opcionAccion = trim(fgets(STDIN));
                    switch ($opcionAccion) {

                        case '1':
                        // Modificar pasajero
                        if ($viaje !== null) {
                        echo "Ingrese el documento del pasajero a modificar: ";
                        $documentoModificar = trim(fgets(STDIN));
                    
                        // Buscar el índice del pasajero por su número de documento
                        $indiceModificar = null;
                        foreach ($viaje->getObjPasajeros() as $indice => $pasajero) {
                        if ($pasajero->getDocumento() == $documentoModificar) {
                            $indiceModificar = $indice;
                            break;
                        }
                    }
                    
                    if ($indiceModificar !== null) {
                        // Modificar el pasajero utilizando su índice
                        echo "Ingrese el nuevo nombre del pasajero: ";
                        $nuevoNombre = trim(fgets(STDIN));
                        echo "Ingrese el nuevo apellido del pasajero: ";
                        $nuevoApellido = trim(fgets(STDIN));
                        echo "Ingrese el nuevo número de documento del pasajero: ";
                        $nuevoDocumento = trim(fgets(STDIN));
                        echo "Ingrese el nuevo teléfono del pasajero: ";
                        $nuevoTelefono = trim(fgets(STDIN));
                        
                        // Llamo función modificarPasajero() pasando el índice y los nuevos datos
                        if ($viaje->modificarPasajero($indiceModificar, $nuevoNombre, $nuevoApellido, $nuevoDocumento, $nuevoTelefono)) {
                            echo "Pasajero modificado con éxito.\n";
                        } else {
                            echo "Error al modificar el pasajero.\n";
                        }
                    } else {
                        echo "No se encontró ningún pasajero con ese documento.\n";
                    }
                } else {
                    echo "Primero debe cargar la información del viaje.\n";
                }
                break;
                        case '2':
                    // Eliminamos pasajero
                    if ($viaje !== null) {
                    echo "Ingrese el documento del pasajero a eliminar: ";
                    $documentoEliminar = trim(fgets(STDIN));
                    
                    // Buscamos el índice del pasajero por su número de documento
                    $indiceEliminar = null;
                    foreach ($viaje->getObjPasajeros() as $indice => $pasajero) {
                        if ($pasajero->getDocumento() == $documentoEliminar) {
                            $indiceEliminar = $indice;
                            break;
                        }
                    }
                    
                    if ($indiceEliminar !== null) {
                        if ($viaje->eliminarPasajero($indiceEliminar)) {
                            echo "Pasajero eliminado con éxito.\n";
                        } else {
                            echo "Error al eliminar el pasajero.\n";
                        }
                    } else {
                        echo "No se encontró ningún pasajero con ese documento.\n";
                    }
                } else {
                    echo "Primero debe cargar la información del viaje.\n";
                }
                break;

            case '6':
                // Salir
                echo "Saliendo del programa...\n";
                $continuar = false;
                break;
            default:
                echo "Opción inválida. Por favor, seleccione una opción válida.\n";
                break;
            }
        }
    }
}
}
?>