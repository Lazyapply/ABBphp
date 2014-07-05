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
		private $bodyStr;

		function __construct($val ,$width, $height, $border){
			ABBphp::__construct($val);
			$this->c_width 	= $width;
			$this->c_height = $height;
			$this->border = $border;
		}

		function createCanvas(){
			$this->bodyStr = '<canvas width="300" height="300" id="lienzo"';
			if ($this->border == 1)
				$this->bodyStr .= ' style="border:1px solid #000000;"';
			
			$this->bodyStr .= ' >';
		}

		function drawNode($indice){
			$memIndex = $this->index2memIndex($indice);
			
			$x = 100;
			$y = 100;
			$r = 50;
			$c = 'green';
			$i =  $this->nodo[$memIndex]->indice;
			$v =  $this->nodo[$memIndex]->dato;

			return  '<Script>drawNode('.$x.','.$y.','.$r.','.$c.','.$i.','.$v.');</Script>';
		}

		function generateGraph(){
			//cuerpo
			$this->createCanvas();
			echo $this->bodyStr;
			//nodo
			echo $this->drawNode(5);
		}
	}


 ?>