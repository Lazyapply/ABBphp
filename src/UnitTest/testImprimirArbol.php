	<?php 
		require('../lib/ABBphp.cls.php');
		

		$ABB = new ABBphp(6);
		echo '
					<html>
		
		<head>
			<meta charset="UTF-8">
			<title>ABBT: Imprimir Arbol</title>
		</head>
		<body>
		';
	echo '<table border="10" style="width:100%"><tr><td>';
	echo 'ABB<br><b> Serie: ';


		
		$serie = array(6, 12, 3, 4);
		$f = sizeof($serie);
		for($i=0;$i<$f;$i++)
			echo $serie[$i].', ';

		$ABB->insertarSerie($serie);
		echo '<br><br><hr>';
		//--------------- INICIO Pruebas Imprimir Arbol--------------
		$ABB->imprimirArbol('IN');
		
		//--------------- FIN Pruebas Imprimir Arbol--------------

		echo '<b><br><hr><br></td><td>';
		
		$ABB->varDump();
		


		echo '</td></tr></tabl></body></html>'
	?>












