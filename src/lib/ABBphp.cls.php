<?php
	
	/**
	 * Clase que simula un nodo Binario, teniendo izquierda, derecha, un indice y un valor que almacenar
	 */
	class Nodo{
		/**
		 * Dato que almacena el nodo
		 * @var int/String
		 */
		protected $dato;
		/**
		 * Indice al que apunta la izquierda del nodo
		 * @var int
		 */		
		protected $izq;
		/**
		 * Indice al que apunta la derecha del nodo
		 * @var int
		 */
		protected $der;
		/**
		 * Indice del nodo
		 * @var int
		 */
		protected $indice;

		/**
		 * Constructor por parámetros
		 * @param int/String  Dato que almacena el nodo
		 * @param int     Indice del nodo
		 */
		public function __construct($dat, $ind){
			$this->dato 	= $dat;
			$this->indice 	= $ind;
			$this->izq 		= null;
			$this->der 		= null; 
		}


		//function getData(){return $this->dato;}
		function getIndex(){return $this->indice;}

		/**
		 * Función que devuelve si un nodo es hoja
		 * @return Booleano Verdadero si es hoja, Falso en caso contrario
		 */
		function esHoja(){
			if(($this->izq == null) && ($this->der == null))
				return true;
			else
				return false;
		}
	}

	/**
	 * Clase que simula un Arbol de búsqueda binaria.
	 * Está compuesto por un conjunto de nodos, todos del mismo tipo de dato
	 */
	class ABBphp extends Nodo{
		/**
		 * Estructura semiEstática para almacenar los nodos, array de nodos
		 * @var array
		 */
	 	private $nodo = array();
	 	/**
	 	 * Total de nodos que hay en la estructura
	 	 * @var integer
	 	 */
	 	private $nNodos =0;

	 	/**
	 	 * Cuando llamamos al constructor debemos pasarle un valor, para el nodo padre del arbol
	 	 * @param int/String Valor que almacena el nodo
	 	 */
		function __construct($dato){

			$this->nodo[$this->nNodos] = new Nodo($dato, $this->nNodos);
			$this->nNodos++;
		}
		/**
		 * Devuelve el dump de array de nodos
		 * @return dump Dump del array de memoria principal
		 */
		function varDump(){
			return var_dump($this->nodo);
		}
		/**
		 * Funcion para insertar un nodo en el arbol
		 * @param  int/String  Valor que almacena el nodo
		 * @param  int  Indice del nodo, aqui se usa como auxiliar
		 * @return booleano        Verdadero/Falso en caso de Acertar/Fallar la insercion
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
		/**
		 * Busca un nodo detro del arbol
		 * @param  int/String  Valor que buscamos en el arbol
		 * @return booleano        True/False si Está/No está
		 */
		function buscarNodo($valor){

			for($i=0;$i<$this->nNodos;$i++){
				if($this->nodo[$i]->dato == $valor){
					return true;
				}
			}
			return false;
		}
		/**
		 * Función para insertar un serie.
		 * @param  array([int|String])  Debe pasarse un array de enteros o de Strings
		 * @return void        [description]
		 */
		function insertarSerie($serie){
			$fin = sizeof($serie);

			for($i=0;$i<$fin;$i++){
				$aux = 0;
				$this->insertarNodo($serie[$i], $aux);
			}
		}
		/**
		 * Devuelve el valor de un nodo, en función de su valor
		 * @param  int/String  Valor del nodo que buscamos
		 * @return int        Indice del nodo que contiene el valor buscado
		 */
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

		/**
		 * Devuelve el padre y el lado del que cuelga en función de un valor
		 * @param  int/String  Valor del nodo
		 * @return Array        Array[0] = Indice del padre, Array[1] = Lado del que cuelga
		 */
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

 ?>