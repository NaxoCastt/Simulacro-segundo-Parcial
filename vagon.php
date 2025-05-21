<?php
    class Vagon{

        private $anioInstalacionVagon;
        private $largoVagon;
        private $anchoVagon;
        private $pesoVacioVagon;
        private $pesoActualVagon;

        public function __construct( $anioInstalacionVagon,  $largoVagon,  $anchoVagon,  $pesoVacioVagon){
            $this->anioInstalacionVagon = $anioInstalacionVagon;
            $this->largoVagon = $largoVagon;
            $this->anchoVagon = $anchoVagon;
            $this->pesoVacioVagon = $pesoVacioVagon;
            $this->pesoActualVagon = $pesoVacioVagon;
        }

        public function calcularPesoVagon(){
            return $this->getPesoActualVagon() ;
        }
	
        public function setAnioInstalacionVagon( $anioInstalacionVagon): void {$this->anioInstalacionVagon = $anioInstalacionVagon;}

	    public function setLargoVagon( $largoVagon): void {$this->largoVagon = $largoVagon;}

	    public function setAnchoVagon( $anchoVagon): void {$this->anchoVagon = $anchoVagon;}

	    public function setPesoVacioVagon( $pesoVacioVagon): void {$this->pesoVacioVagon = $pesoVacioVagon;}

        public function getAnioInstalacionVagon() {return $this->anioInstalacionVagon;}

    	public function getLargoVagon() {return $this->largoVagon;}

        public function getPesoActualVagon(){
            return $this->pesoActualVagon;
        }

        public function setPesoActualVagon($x){

            $this->pesoActualVagon = $x;
        }

    	public function getAnchoVagon() {return $this->anchoVagon;}

    	public function getPesoVacioVagon() {return $this->pesoVacioVagon;}

        public function __toString() {
            return "Año de Instalación: " . $this->anioInstalacionVagon . "\n" .
                   "Largo del Vagón: " . $this->largoVagon . " metros\n" .
                   "Ancho del Vagón: " . $this->anchoVagon . " metros\n" .
                   "Peso en vacío: " . $this->pesoVacioVagon . " kg\n";
        }

        
	
    }