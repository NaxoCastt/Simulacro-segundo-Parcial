<?php
    include_once 'formacion.php';
    include_once 'locomotora.php';
    include_once 'vagon.php';
    include_once 'vagonCarga.php';
    include_once 'vagonPasajeros.php';

    #Programa principal

    $locomotora = new Locomotora(188, 140);

    $vagon[0] = new VagonPasajeros(1999, 20, 5, 15000, 30, 25);

    $vagon[1] = new VagonCarga(2000, 30, 5, 15000, 70000, 55000);

    $vagon[2] = new VagonPasajeros(2012, 20, 5, 15000, 50, 50);

    $formacion = new Formacion($locomotora, [], 5);


    echo "\n--------------Punto 3---------------\n";
    if ($formacion->incorporarVagonFormacion($vagon[0])){
        echo "La incorporacion se pudo hacer correctamente.\n";
    }
    else {
        echo "No se pudo incorporar\n";
    }
    if ($formacion->incorporarVagonFormacion($vagon[1])){
        echo "La incorporacion se pudo hacer correctamente.\n";
    }
    else {
        echo "No se pudo incorporar\n";
    }
    if ($formacion->incorporarVagonFormacion($vagon[2])){
        echo "La incorporacion se pudo hacer correctamente.\n";
    }
    else {
        echo "No se pudo incorporar\n";
    }
    echo "\n--------------Punto 4---------------\n";
    
    if ($formacion->incorporarPasajeroFormacion(6)){
        echo "La incorporacion de los pasajeros se hizo correctamente. \n";
    }
    
    else{
        echo "La incorporacion de los pasajeros no se pudo hacer :( \n  ";
    }
    
    echo "\n--------------Punto 5---------------\n";
    echo $vagon[0];
    
    echo "\n-----------------------------\n";
    
    echo $vagon[1];
    
    echo "\n-----------------------------\n";
    echo $vagon[2];
    
    echo "\n-----------------------------\n";
    
    
    echo "\n--------------Punto 6---------------\n";
    
    if ($formacion->incorporarPasajeroFormacion(15)){
        echo "La incorporacion de los pasajeros se hizo correctamente. \n";
    }
    
    else{
        echo "La incorporacion de los pasajeros no se pudo hacer :( \n  ";
    }
    
    echo "\n--------------Punto 7---------------\n";
    
    echo $locomotora;
    
    echo "\n--------------Punto 8---------------\n";
    
    echo "El promedio es de " . $formacion->promedioPasajeroFormacion(). "kg.\n";
    
    echo "\n--------------Punto 9---------------\n";
    
    echo "El peso de la formacion es de " .$formacion->pesoFormacion() . "kg.\n";
    
    echo "\n--------------Punto 10---------------\n";
    
    echo($vagon[0]);
    
    echo "\n-----------------------------\n";
    echo($vagon[1]);
    
    echo "\n-----------------------------\n";
    echo($vagon[2]);
    
    echo "\n-----------------------------\n";
    
    