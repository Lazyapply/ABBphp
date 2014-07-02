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


	
	$serie = array(6, 4, 11, 1, 9, 7, 3);
		for($i=0;$i<7;$i++)
			echo $serie[$i].', ';
		echo '</a><br><hr><br>';
		$ABB->insertarSerie($serie);
		
		echo '<hr><br>';

		echo '<h3>Comprobaciones</h3>';
		echo '<a>Test nodo Hoja: </a> OK <br>';
		echo '<a>Test solo hijo derecho: </a> OK <br>';
		echo '<a>Test  solo hijo izquierdo: </a> ACTUAL <br>';
		echo '<a>Test nodo Hoja: </a> -- <br>';
		echo '</td><td>';
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

	//Testo solo hijo izquierdo
	echo '<td>Quiero eliminar el nodo con valor 4 <br><hr><br>';
	$ABB->eliminarNodo(4);
	echo '<hr><br>';
	$ABB->varDump();
	echo '<hr><br>';


	echo '</td></tr></table></body></html>';
 ?>