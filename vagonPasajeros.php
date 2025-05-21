<?php
    class VagonPasajeros extends Vagon{

        private $cantMaximaPasajerosVagon;
        private $cantActualPasajerosVagon;
        private $pesoPromedioVagon;

        public function __construct($anioInstalacionVagon,  $largoVagon,  $anchoVagon,  $pesoVacioVagon, $cantMaximaPasajerosVagon,  $cantActualPasajerosVagon){
            $this->pesoPromedioVagon = 50;
            $this->cantMaximaPasajerosVagon = $cantMaximaPasajerosVagon;
            $this->cantActualPasajerosVagon = $cantActualPasajerosVagon;
            parent::__construct($anioInstalacionVagon,  $largoVagon,  $anchoVagon,  $pesoVacioVagon);
        }

        public function calcularPesoVagon(){
            $pesoBase = $this->calcularPesoVagon();
            $pesoActualPasajeros = $this->getCantActualPasajerosVagon() * $this->getPesoPromedioVagon();
            $this->setPesoActualVagon($pesoActualPasajeros + $pesoBase);
            return $pesoBase + $pesoActualPasajeros;
        }

        public function getCantMaximaPasajerosVagon() {return $this->cantMaximaPasajerosVagon;}

	    public function getCantActualPasajerosVagon() {return $this->cantActualPasajerosVagon;}
        
	    public function getPesoPromedioVagon() {return $this->pesoPromedioVagon;}
        

        public function setCantMaximaPasajerosVagon( $cantMaximaPasajerosVagon): void {$this->cantMaximaPasajerosVagon = $cantMaximaPasajerosVagon;}

	    public function setCantActualPasajerosVagon( $cantActualPasajerosVagon): void {$this->cantActualPasajerosVagon = $cantActualPasajerosVagon;}

	    public function setPesoPromedioVagon( $pesoPromedioVagon): void {$this->pesoPromedioVagon = $pesoPromedioVagon;}

        public function incorporarPasajeroVagon($cantPasajParam){

            $bandera = false;
            if (($cantPasajParam + $this->getCantActualPasajerosVagon()) <= $this->getCantMaximaPasajerosVagon()){
                $this->setCantActualPasajerosVagon($this->getCantActualPasajerosVagon() + $cantPasajParam);
                parent::setPesoActualVagon(parent::getPesoActualVagon() + ($cantPasajParam * 50));
                $bandera = true;

            }

            return $bandera;
        }

        public function verificacionCompleto(){

            $bandera = true;

            if ($this->getCantActualPasajerosVagon() < $this->getCantMaximaPasajerosVagon()){
                $bandera = false;
            }

            return $bandera;
        }


        

        
	
    }