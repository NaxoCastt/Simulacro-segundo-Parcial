<?php
    class Formacion{
        private $refLocomotoraFormacion;
        private $colecVagonFormacion;
        private $maxVagonesFormacion;

        public function __construct( $refLocomotoraFormacion,  $colecVagonFormacion,  $maxVagonesFormacion){$this->refLocomotoraFormacion = $refLocomotoraFormacion;$this->colecVagonFormacion = $colecVagonFormacion;$this->maxVagonesFormacion = $maxVagonesFormacion;}
	
        public function getRefLocomotoraFormacion() {return $this->refLocomotoraFormacion;}

	    public function getColecVagonFormacion() {return $this->colecVagonFormacion;}

	    public function getMaxVagonesFormacion() {return $this->maxVagonesFormacion;}

        public function setRefLocomotoraFormacion( $refLocomotoraFormacion): void {$this->refLocomotoraFormacion = $refLocomotoraFormacion;}

    	public function setColecVagonFormacion( $colecVagonFormacion): void {
            array_push($this->colecVagonFormacion, $colecVagonFormacion);}

    	public function setMaxVagonesFormacion( $maxVagonesFormacion): void {$this->maxVagonesFormacion = $maxVagonesFormacion;}

        public function incorporarPasajeroFormacion($cantPasajParam){

            $bandera = false;
            $i = 0;
            $colecPasajerosVagones = $this->getColecVagonPasajeros();

            while ($bandera == false && $i < count($colecPasajerosVagones) && empty($colecPasajerosVagones) == false){

                if ($colecPasajerosVagones[$i]->incorporarPasajeroVagon($cantPasajParam)){
                    $bandera = true;
                }
                $i++;
            }

            return $bandera;
        }   

        public function incorporarVagonFormacion($vagoncito){

            $bandera = false;

            if (count($this->getColecVagonFormacion()) < $this->getMaxVagonesFormacion()){
                $this->setColecVagonFormacion($vagoncito);
                $bandera = true;
        }

        return $bandera;
        }

        public function getColecVagonPasajeros(){

            $conjuntoVagones= [];

            if (empty($this->getColecVagonFormacion()) == false){
            for ($i = 0 ; $i < count($this->getColecVagonFormacion()) ; $i++){

                if (is_a($this->getColecVagonFormacion()[$i], "VagonPasajeros")){

                    array_push($conjuntoVagones, $this->getColecVagonFormacion()[$i]);
                }
            }
            return $conjuntoVagones;
        }}
        public function getColecVagonCarga(){

            $conjuntoVagones= [];

            if (empty($this->getColecVagonFormacion()) == false){
            for ($i = 0 ; $i < count($this->getColecVagonFormacion()) ; $i++){

                if (is_a($this->getColecVagonFormacion()[$i], "VagonCarga")){

                    array_push($conjuntoVagones, $this->getColecVagonFormacion()[$i]);
                }
            }
        }
            return $conjuntoVagones;
        }
    


        
        public function promedioPasajeroFormacion(){

            $vagonPasajeros = $this->getColecVagonPasajeros();
            $suma = 0;
            if (empty($vagonPasajeros) == false){

                for ($i = 0 ; $i < count($vagonPasajeros) ;$i++){

                    $suma += $vagonPasajeros[$i]->getPesoPromedioVagon(); 
                }
            }

            return $suma / count($vagonPasajeros);

        }

        public function pesoFormacion(){

            $peso = 0;

            if ( empty($this->getMaxVagonesFormacion()) == false){

                for ($i = 0 ; $i < count($this->getColecVagonFormacion()) ; $i++){

                    $peso += $this->getColecVagonFormacion()[$i]->calcularPesoVagon();
                }
            }

            return $peso;
        }

        public function retornarVagonSinCompletar(){

            $bandera = false;
            $i = 0;
            $vagonEnCuestion = null;

            while ($bandera == false && $i < count($this->getColecVagonFormacion()) && empty($this->getColecVagonFormacion()) == false){

                if ($this->getColecVagonFormacion()[$i]->verificacionCompleto()==false){

                    $bandera = true;
                    $vagonEnCuestion = $this->getColecVagonFormacion()[$i];
                }
                $i++;
            }
            return $vagonEnCuestion;
        }
        public function __toString() {
            $detalleVagones = "Vagones en la formación:\n";
            
            foreach ($this->colecVagonFormacion as $vagon) {
                $detalleVagones .= "- " . $vagon . "\n"; // Suponiendo que cada vagón tiene su propio __toString()
            }
        
            return "🚂 Información de la Formación 🚂\n" .
                   "Locomotora: " . $this->refLocomotoraFormacion . "\n" .
                   "Cantidad máxima de vagones: " . $this->maxVagonesFormacion . "\n" .
                   "Peso total de la formación: " . $this->pesoFormacion() . " kg\n" .
                   $detalleVagones;
        }
        
    }
