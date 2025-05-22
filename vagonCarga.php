<?php
    class VagonCarga extends Vagon{

        private $pesoMaximoVagcarga;
        private $pesoCargaVagCarga;
        private $indice;


        public function __construct($anioInstalacionVagon,  $largoVagon,  $anchoVagon,  $pesoVacioVagon, $pesoMaximoVagcarga,  $pesoCargaVagCarga){
            $this->pesoMaximoVagcarga = $pesoMaximoVagcarga;
            $this->pesoCargaVagCarga = $pesoCargaVagCarga;
            $this->indice = 0.2;
            parent::__construct($anioInstalacionVagon,  $largoVagon,  $anchoVagon,  $pesoVacioVagon);

        }

        public function getPesoMaximoVagcarga() {return $this->pesoMaximoVagcarga;}

        public function getIndice(){
            return $this->indice;
        }
	    public function getPesoCargaVagCarga() {return $this->pesoCargaVagCarga;}

        public function setPesoMaximoVagcarga( $pesoMaximoVagcarga): void {$this->pesoMaximoVagcarga = $pesoMaximoVagcarga;}

	    public function setPesoCargaVagCarga( $pesoCargaVagCarga): void {$this->pesoCargaVagCarga = $pesoCargaVagCarga;}

        
        public function __toString() {
            return parent::__toString() . 
                   "Peso máximo de carga: " . $this->pesoMaximoVagcarga . " kg\n" .
                   "Peso de la carga: " . $this->pesoCargaVagCarga . " kg\n".
                   "\nEl peso de este vagon es ". $this->calcularPesoVagon(). "kg\n" ;
        }

        public function incorporarCargaVagon($cantCarga){

            $bandera = false;

            if( ($cantCarga + ($cantCarga * $this->getIndice())) <= $this->getPesoMaximoVagcarga()){

                $bandera = true;
                $this->setPesoActualVagon($this->calcularPesoVagon() +($cantCarga + ($cantCarga * $this->getIndice())));
                $this->setPesoCargaVagCarga($this->getPesoCargaVagCarga() + $cantCarga);
            }

            return $bandera;
        }

        public function calcularPesoVagon(){
            $pesoBase = parent::calcularPesoVagon();
            $pesoFinal = $this->getPesoCargaVagCarga() + ($this->getPesoCargaVagCarga() * $this->getIndice());
            $this->setPesoActualVagon($pesoFinal + $pesoBase);
            return $pesoFinal + $pesoBase;
        }

        public function verificacionCompleto(){
            $bandera = true;

            if ($this->getPesoCargaVagCarga() < $this->getPesoMaximoVagcarga()){
                $bandera = false;
            }

            return $bandera;
        }

        
    }