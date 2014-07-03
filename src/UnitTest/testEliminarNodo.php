<?php 
	require('../lib/ABBphp.cls.php');
		

	$ABB = new ABBphp(6);
	echo '
					<html>
		
		<head>
			<meta charset="UTF-8">
			<title>ABBT: EliminarNodo</title>
		</head>
		<body>
		';
	echo '<table border="10" style="width:100%"><tr><td>';
	echo 'ABB<br><b> Serie: ';


	
	$serie = array(6, 4, 11, 1, 9, 7, 3, 12, 10);
	$f = sizeof($serie);
		for($i=0;$i<$f;$i++)
			echo $serie[$i].', ';
		echo '</a><br><hr><br>';
		$ABB->insertarSerie($serie);
		
		
		echo '</td><td>';
		echo '<hr><br>';

		echo '<h3>Comprobaciones</h3>';
		echo '<a>Test nodo Hoja: </a> OK <br>';
		echo '<a>Test solo hijo derecho: </a> OK <br>';
		echo '<a>Test  solo hijo izquierdo: </a> OK <br>';
		echo '<a>Test nodo Hoja: </a> ACTUAL <br><hr><br>';
		$ABB->varDump();
		echo '</td>';
	//Test nodo Hoja
	// echo 'Quiero eliminar el nodo con valor 1<br><hr><br>';
	// $ABB->eliminarNodo(1);
	// echo '<hr><br>';
	// $ABB->varDump();
	// echo '<hr><br>';

	//Test solo hijo derecho
	// echo 'Quiero eliminar el nodo con valor 1 <br><hr><br>';
	// $ABB->eliminarNodo(1);
	// echo '<hr><br>';
	// $ABB->varDump();
	// echo '<hr><br>';

	//Test solo hijo izquierdo
	// echo '<td>Quiero eliminar el nodo con valor 4 <br><hr><br>';
	// $ABB->eliminarNodo(4);
	// echo '<hr><br>';
	// $ABB->varDump();
	// echo '<hr><br>';

	//Test cuelga subarbol
	// echo '<td>Quiero eliminar el nodo con valor 11 <br><hr><br>';
	// $ABB->eliminarNodo(11);
	// echo '<hr><br>';
	// $ABB->varDump();
	// echo '<hr><br>';

	//Test cuelga subarbol 2
	echo '<td>Quiero eliminar el nodo con valor 9 <br><hr><br>';
	$ABB->eliminarNodo(9);
	echo '<hr><br>';
	$ABB->varDump();
	echo '<hr><br>';



	echo '</td></tr></table></body></html>';
 ?>