<?php
	class Nodo{
		protected $dato, $izq, $der, $indice;

		public function __construct($dat, $ind){
			$this->dato 	= $dat;
			$this->indice 	= $ind;
			$this->izq 		= null;
			$this->der 		= null; 
		}


		//function getData(){return $this->dato;}
		function getIndex(){return $this->indice;}
		function esHoja(){
			if(($this->izq == null) && ($this->der == null))
				return true;
			else
				return false;
		}
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

		/**
		 * [insertarNodo description]
		 * @param  int/string $valor [description]
		 * @param  int $index [description]
		 * @return void        [description]
		 */
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

		function indexFromValue($valor){
			$index = -1;

			for($i=0;$i<$this->nNodos;$i++){
				if($this->nodo[$i]->dato == $valor){
					$index = $i;
					return $index;
				}
			}
			return $index;
		}


		function parentFromValue($valor){

			$indiceBuscado = $this->indexFromValue($valor);
			$r = array();
			$r[0] = null;
			$r[1] = -1;

			for($i=0;$i<$this->nNodos;$i++){
				if($this->nodo[$i]->izq == $indiceBuscado){//es izquierda de su padre
					$r[0] = $i;
					$r[1] = 0;
					return $r;
				}
				if($this->nodo[$i]->der == $indiceBuscado){ //es derecha de su padre
					$r[0] = $i;
					$r[1] = 1;
					return $r;
				}
			}

			
			return $r;
		}

		//getters and setters
		function getData($index){return $this->nodo[$index]->dato;}
		function getnNodos(){return $this->nNodos;}

















	}

	


	// function borrarNodo($valor){

	// 	if()

	// }
	

 ?>