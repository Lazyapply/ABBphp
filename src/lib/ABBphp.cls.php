<?php
	class Nodo{
		private $dato, $izq, $der;

		function __construct(){
			$dato 	= 15;
			$izq 	= -1;
			$der 	= -1; 
		}

		public function getDato(){return $this->dato;}
	}


	class ABBphp{
	 $nodo = new Nodo();

		function __construct(){
			parent::__construct();
			echo "encendido";

		}
	}

	
	
	

 ?>