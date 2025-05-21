<?php
    class Locomotora{

        private $pesoLocomotora;
        private $velocidadMaxLocomotora;

        public function __construct( $pesoLocomotora,  $velocidadMaxLocomotora){$this->pesoLocomotora = $pesoLocomotora;$this->velocidadMaxLocomotora = $velocidadMaxLocomotora;}
	
        public function getPesoLocomotora() {return $this->pesoLocomotora;}

	    public function getVelocidadMaxLocomotora() {return $this->velocidadMaxLocomotora;}

        public function setPesoLocomotora( $pesoLocomotora): void {$this->pesoLocomotora = $pesoLocomotora;}

	    public function setVelocidadMaxLocomotora( $velocidadMaxLocomotora): void {$this->velocidadMaxLocomotora = $velocidadMaxLocomotora;}

        public function __toString() {
            return "Peso de la locomotora: " . $this->pesoLocomotora . " kg\n" .
                   "Velocidad máxima: " . $this->velocidadMaxLocomotora . " km/h\n";
        }
        
        
    }