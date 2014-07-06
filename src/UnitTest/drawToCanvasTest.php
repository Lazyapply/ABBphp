<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Pruebas Dibujo nodos</title>
	<script src="../js/abbGraph.js" type="text/javascript" charset="utf-8"></script>
	
</head>
<body>
	
	<!-- <input type="button" value="Dibujar Nodo" onclick="drawNode(100,100,50, 'green', 1, 15);">
	<canvas width="300" height="300" id="lienzo" style="border:1px solid #000000;"></canvas> -->
	<?php 
		require_once('../lib/ABBGraph.cls.php');

		$ABBG = new ABBGraph(1, 800, 600, 1);
		
		echo '<table border="10" style="width:50%"><tr><td>';
		echo 'ABB<br><b> Serie: ';

		$serie = array(6, 4, 11, 1, 9, 7);
		for($i=0;$i<6;$i++)
			echo $serie[$i].', ';
		echo '<b><br><hr><br></td><td> Dibujo el nodo con indice 5';

		$ABBG->insertarSerie($serie);
		// $ABBG->varDump();
		echo '</td></tr></table><br><br>';
		$ABBG->generateGraph();


	 ?>	
	
	<!--  <script>drawNode(100,100,50,'green',5,7);</script>-->
</body>
</html>