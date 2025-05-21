<?php
    class VagonCarga extends Vagon{

        private $pesoMaximoVagcarga;
        private $pesoCargaVagCarga;


        public function __construct($anioInstalacionVagon,  $largoVagon,  $anchoVagon,  $pesoVacioVagon, $pesoMaximoVagcarga,  $pesoCargaVagCarga){
            $this->pesoMaximoVagcarga = $pesoMaximoVagcarga;
            $this->pesoCargaVagCarga = $pesoCargaVagCarga;
            parent::__construct($anioInstalacionVagon,  $largoVagon,  $anchoVagon,  $pesoVacioVagon, ($this->pesoCargaVagCarga + ($this->pesoCargaVagCarga * 0.2)));

        }

        public function getPesoMaximoVagcarga() {return $this->pesoMaximoVagcarga;}

	    public function getPesoCargaVagCarga() {return $this->pesoCargaVagCarga;}

        public function setPesoMaximoVagcarga( $pesoMaximoVagcarga): void {$this->pesoMaximoVagcarga = $pesoMaximoVagcarga;}

	    public function setPesoCargaVagCarga( $pesoCargaVagCarga): void {$this->pesoCargaVagCarga = $pesoCargaVagCarga;}

        
        public function __toString() {
            return parent::__toString() . 
                   "Peso máximo de carga: " . $this->pesoMaximoVagcarga . " kg\n" .
                   "Peso de la carga: " . $this->pesoCargaVagCarga . " kg\n" ;
        }

        public function incorporarCargaVagon($cantCarga){

            $bandera = false;

            if( ($cantCarga + ($cantCarga * 0.2)) <= $this->getPesoMaximoVagcarga()){

                $bandera = true;
                parent::setPesoActualVagon(parent::getPesoActualVagon() +($cantCarga + ($cantCarga * 0.2)));
                $this->setPesoCargaVagCarga($this->getPesoCargaVagCarga() + $cantCarga);
            }

            return $bandera;
        }

        public function calcularPesoVagon(){
            return parent::calcularPesoVagon();
        }

        public function verificacionCompleto(){
            $bandera = true;

            if ($this->getPesoCargaVagCarga() < $this->getPesoMaximoVagcarga()){
                $bandera = false;
            }

            return $bandera;
        }

        
    }