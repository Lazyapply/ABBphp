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


		
		$serie = array(6, 4, 11, 1, 9, 7, 3, 12, 10, 15);
		$f = sizeof($serie);
		for($i=0;$i<$f;$i++)
			echo $serie[$i].', ';
		echo '<b><br><hr><br></td><td>';
		$ABB->insertarSerie($serie);
		$ABB->varDump();
		
		//--------------- INICIO Pruebas Imprimir Arbol--------------
		$ABB->imprimirArbol($ABB->getDataStructure());
		
		//--------------- FIN Pruebas Imprimir Arbol--------------

		echo '</td></tr></tabl></body></html>'
	?>












