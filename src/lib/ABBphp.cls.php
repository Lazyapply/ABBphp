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
		function getIndex(){return $this->indice;}
	}


	class ABBphp extends Nodo{
	 	private $nodo = array();
	 	private $nNodos =0;

		function __construct($dato){

			$this->nodo[$this->nNodos] = new Nodo($dato, $this->nNodos);
			$this->nNodos++;
		}

		function varDump(){
			return var_dump($this->nodo);
		}
		function insertarNodo($valor, &$index){
			

			if($this->buscarNodo($valor) == false){
				//izquierda
				if($valor < $this->nodo[$index]->dato){
					if($this->nodo[$index]->izq == null){
						//creamos el nodo
						$this->nodo[$this->nNodos] = new Nodo($valor, $this->nNodos);
						//colocamos al anterior su izq hacia este indice
						$this->nodo[$index]->izq = $this->nNodos;
						//aumentamos el numero de nodos
						$this->nNodos++;

						return true;
					}
					else{//no es null su izquierda
						$this->insertarNodo($valor, $this->nodo[$index]->izq);
					}
				}
				else{//derecha
					if($this->nodo[$index]->der == null){
						//creamos el nodo
						$this->nodo[$this->nNodos] = new Nodo($valor, $this->nNodos);
						//colocamos al anterior su izq hacia este indice
						$this->nodo[$index]->der = $this->nNodos;
						//aumentamos el numero de nodos
						$this->nNodos++;

						return true;
					}
					else{//no es null su izquierda
						$this->insertarNodo($valor, $this->nodo[$index]->der);
					}
				
				}
			}
			else{
				return false;
			}
			
		}

		function buscarNodo($valor){

			for($i=0;$i<$this->nNodos;$i++){
				if($this->nodo[$i]->dato == $valor){
					return true;
				}
			}
			return false;
		}

		function insertarSerie($serie){
			$fin = sizeof($serie);

			for($i=0;$i<$fin;$i++){
				$aux = 0;
				$this->insertarNodo($serie[$i], $aux);
			}
		}

		function getData($index){return $this->nodo[$index]->dato;}
		function getnNodos(){return $this->nNodos;}
	}

	
	
	

 ?>