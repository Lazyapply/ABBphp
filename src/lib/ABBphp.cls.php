<?php
	
	require_once 'Nodo.cls.php';

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
		 * @param  int/String  Valor que almacena el nodos
		 * @param  int  indice del nodo
		 * @return void        
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
						//colocamos al anterior su der hacia este indice
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
		 * @return void        
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
					$index = $this->nodo[$i]->indice;
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

		/**
		 * Con esta función eliminamos el nodo y se reconstruye el arbol de indices
		 * @param  int/String Valor del nodo que queremos eliminar
		 * @return bool        Verdadero si lo hemos eliminado y falso en caso contrario
		 */
		function eliminarNodo($valor){

			if($this->buscarNodo($valor)){
				$indice = $this->indexFromValue($valor);
				//en caso de ser hoja
				if($this->nodo[$indice]->esHoja()){
					//echo '<b>Es HOJA indice: '.$indice.'</b>';
					$indiceP = $this->parentFromValue($valor);
					//echo '<br>IndiceNodo: '.$indiceP[0].' -- Lado: '.$indiceP[1];
					if($indiceP[1] == 0){//si cuelga de la izquierda de su padre
						$this->nodo[$indiceP[0]]->izq = null;
						$this->deleteData($indice);
					}
					else{//si cuelga de la derecha de su padre
						$this->nodo[$indiceP[0]]->der = null;
						$this->deleteData($indice);
					}

				}
				else{//no es hoja
					//si tiene solo hijo derecho
					if(($this->nodo[$indice]->der != null) && ($this->nodo[$indice]->izq == null)){
						echo '<b>No es HOJA, le cuelga un Hijo a la derecha indice: '.$indice.'</b>';
						$indiceP = $this->parentFromValue($valor);

						if($indiceP[1] == 0){//si cuelga de la izquierda de su padre
							$this->nodo[$indiceP[0]]->izq = $this->nodo[$indice]->der;
							$this->deleteData($indice);
						}
						else{//si cuelga de la derecha de su padre
							$this->nodo[$indiceP[0]]->der = $this->nodo[$indice]->izq;;
							$this->deleteData($indice);
						}
					}
					else if(($this->nodo[$indice]->der == null) && ($this->nodo[$indice]->izq != null)){
						//si tiene solo hijo izquierdo
						echo '<b>No es HOJA, le cuelga un Hijo a la izquierda indice: '.$indice.'</b>';
						$indiceP = $this->parentFromValue($valor);

						if($indiceP[1] == 0){//si cuelga de la izquierda de su padre
							$this->nodo[$indiceP[0]]->izq = $this->nodo[$indice]->izq;
							$this->deleteData($indice);
						}
						else{//si cuelga de la derecha de su padre
							$this->nodo[$indiceP[0]]->der = $this->nodo[$indice]->der;;
							$this->deleteData($indice);
						}
					}
					else{//En caso de que cuelgue un subarbol
						$indiceP = $this->parentFromValue($valor);
						//si cuelga del padre por la derecha
						if($indiceP[1] == 1){
							//la derecha del padre apunta a la izquierda del nodo a borrar
							$this->nodo[$indiceP[0]]->der = $this->nodo[$indice]->izq;
							//Buscamos el subarbol mas a la derecha de la izquierda del nodo a borrar
							$i = $this->nodo[$indice]->izq;
							while($this->nodo[$i]->der){
								$i = $this->nodo[$i]->der;
							}
							echo "Nodo mas a la derecha: ".$this->nodo[$i]->indice;
							//Apuntamos la derecha del nodo mas a la derecha a la derecha del nodo a borrar
							$this->nodo[$i]->der = $this->nodo[$indice]->der;
						}
						else{//si cuelga del padre por la izquierda
							//la izquierda del padre apunta a la derecha del nodo a borrar
							$this->nodo[$indiceP[0]]->izq = $this->nodo[$indice]->izq;
							//Buscamos el subarbol mas a la izquierda de la derecha del nodo a borrar
							$i = $this->nodo[$indice]->izq;
							while($this->nodo[$i]->izq){
								$i = $this->nodo[$i]->izq;
							}
							echo "Nodo mas a la izquierda: ".$this->nodo[$i]->indice;
							//Apuntamos la derecha del nodo mas a la derecha a la derecha del nodo a borrar
							$this->nodo[$i]->der = $this->nodo[$indice]->der;
							//borramos el nodo
							$this->deleteData($indice);
						}
					}

				}
			}
			// return false;
		}
		/**
		 * Pone a nulos todos los valores del nodo, para posteriormente ser identificado como nodo vacio.
		 * @param  int  Indice del nodo que se quiere preparar para borrar
		 * @return void
		 */
		function deleteData($index){
			$this->nodo[$index]->izq = null;
			$this->nodo[$index]->der = null;
			$this->nodo[$index]->dato = null;
			$this->nodo[$index]->indice = null;
		}
		//getters and setters
		function getData($index){return $this->nodo[$index]->dato;}
		function getnNodos(){return $this->nNodos;}



	}

 ?>