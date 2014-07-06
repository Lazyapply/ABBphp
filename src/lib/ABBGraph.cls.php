<?php 
	require_once('ABBphp.cls.php');

	/**
	 * Esta clase contiene las funciones para la representación gráfica usando CANVAS de HTML5.
	 * Se ha optado por separar la estructura de datos y la representacion para poder utilizar
	 * la implementación de memoria por separado.
	 */
	class ABBGraph extends ABBphp{

		private $c_width;
		private $c_height;
		private $border;

		/**
		 * Constructor de ABBGraph
		 * @param int/String Es el valor que toma el nodo padre, llamado en el contructor de Nodo
		 * @param float Ancho del Canvas que va a usar la clase
		 * @param float Alto del Canvas que va a usar la clase
		 * @param bool 1 muestra el borde y 0 no, del canvas
		 */
		function __construct($val ,$width, $height, $border){
			ABBphp::__construct($val);
			$this->c_width 	= $width;
			$this->c_height = $height;
			$this->border = $border;
		}

		/**
		 * Crea el canvas para la clase
		 * @return String Cuerpo del canvas con los valores del constructor
		 */
		function createCanvas(){
			$bodyStr = '<canvas width="300" height="300" id="lienzo"';
			if ($this->border == 1)
				$bodyStr .= ' style="border:1px solid #000000;"';
			
			$bodyStr .= ' >';
			echo $bodyStr;
		}

		/**
		 * Esta función devuelve el codigo de llamada en Js para dibujar un nodo
		 * @param  int Indice del nodo que se quiere dibujar en el lienzo
		 * @return String         String de llamada a la función
		 */
		function drawNode($indice){
			$memIndex = $this->index2memIndex($indice);
			$button = '';

			$x = 100;
			$y = 100;
			$r = 50;
			$c = "'green'";
			$i =  $this->nodo[$memIndex]->indice;
			$v =  $this->nodo[$memIndex]->dato;

			// $button .= '<input type="button" value="Dibujar Nodo" ';
			// $button .= ' onclick= "drawNode('.$x.','.$y.','.$r.','.$c.','.$i.','.$v.');" ';
			// $button .= '>';
			
			$button = '<script>drawNode('.$x.','.$y.','.$r.','.$c.','.$i.','.$v.');</script>';
			echo  $button;
		}

		/**
		 * Con esta función se genera todo lo necesario para la representación gráfica del ABB
		 * @return String Codigo de representación.
		 */
		function generateGraph(){
			$this->createCanvas();
			$this->drawNode(5);
		
		}
	}


 ?>