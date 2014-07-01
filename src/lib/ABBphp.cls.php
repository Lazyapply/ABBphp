<?php
	class Nodo{
		protected $dato, $izq, $der, $indice;

		public function __construct($dat, $ind){
			$this->dato 	= $dat;
			$this->indice 	= $ind;
			$this->izq 		= null;
			$this->der 		= null; 
		}


		function getData(){return $this->dato;}
	}


	class ABBphp extends Nodo{
	 	private $nodo = array();
	 	private $nNodos =0;

		function __construct($dato){
			$this->nodo[$this->nNodos] = new Nodo($dato, $this->nNodos);
			$this->nNodos++;
		}


		function insertarNodo($valor){

			if($this->buscarNodo($valor) == false){
				//if($valor < $this->nodo)
			}

			//insertamos el nodo
			$this->nodo[$this->nNodos] = new Nodo($dato, $this->nNodos+1);
			$this->nNodos++;
		}

		function buscarNodo($valor){

			for($i=0;$i<$this->nNodos;$i++){
				if($this->nodo[$i]->dato == $valor){
					return true;
				}
			}
			return false;
		}
		function getData($index){return $this->nodo[$index]->dato;}
		function getnNodos(){return $this->nNodos;}
	}

	
	
	

 ?>