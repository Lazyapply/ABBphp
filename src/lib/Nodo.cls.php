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


 ?>