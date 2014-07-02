	<?php 
		require('../lib/ABBphp.cls.php');
		

		$ABB = new ABBphp(6);
		echo '
					<html>
		
		<head>
			<meta charset="UTF-8">
			<title>ABBT: InsertarNodo</title>
		</head>
		<body>
		';
	echo '<table border="10" style="width:100%"><tr><td>';
	echo 'ABB<br><b> Serie: ';


		//----------------INICIO Pruebas izquierda (derecha no implementada aun) -----------------------

		// //Izquierda
		// echo '<br><br>'.$ABB->varDump();
		// $index = 0;
		// echo 'Insertar Nodo 4('.$ABB->insertarNodo(4, $index).'):';
		// echo '<br><br>'.$ABB->varDump();
		// //izquierda
		// echo '<br><hr><br>';
		// $index = 0;
		// echo 'Insertar Nodo 1('.$ABB->insertarNodo(1, $index).'):';
		// echo '<br><br>'.$ABB->varDump();
		// //izquierda
		// echo '<br><hr><br>';
		// $index = 0;
		// echo 'Insertar Nodo 0('.$ABB->insertarNodo(0, $index).'):';
		// echo '<br><br>'.$ABB->varDump();
		// //Repetido (1)
		// echo '<br><hr><br>';
		// $index = 0;
		// echo 'Insertar Nodo 1('.$ABB->insertarNodo(1, $index).'):';
		// echo '<br><br>'.$ABB->varDump();
		// //Izquieda (negativo)
		// echo '<br><hr><br>';
		// $index = 0;
		// echo 'Insertar Nodo -10('.$ABB->insertarNodo(-10, $index).'):';
		// echo '<br><br>'.$ABB->varDump();

		//------------------ FIN PRUEBAS IZQUIERDA ------------------



		//--------------- INICIO Pruebas con derecha implementada--------------
		//funciona bien pero hace extraños con el bool que debe devolver
		//derecha

		// echo '<br><br>'.$ABB->varDump();
		// $index = 0;
		// echo 'Insertar Nodo 11('.$ABB->insertarNodo(11, $index).'):';
		// echo '<br><br>'.$ABB->varDump().'<hr>';

		// //derecha
		// $index = 0;
		// echo 'Insertar Nodo 13('.$ABB->insertarNodo(13, $index).'):';
		// echo '<br><br>'.$ABB->varDump();

		// //derecha
		// $index = 0;
		// echo 'Insertar Nodo 17('.$ABB->insertarNodo(17, $index).'):';
		// echo '<br><br>'.$ABB->varDump();

		// //repeticion
		// $index = 0;
		// echo '<b>Buscar Nodo 17('.$ABB->buscarNodo(17).'):</b>';
		// echo '<br><br>'.$ABB->varDump();


		//--------------- FIN Pruebas con derecha implementada--------------

		//--------------- INICIO Pruebas serie completa--------------
		// Serie de prueba -> 6, 4, 11, 1, 9, 7
		// $serie = array(6, 4, 11, 1, 9, 7);
		// for($i=0;$i<6;$i++)
		// 	echo $serie[$i].', ';

		// echo '<b><br><hr><br>';
		// for($i=0;$i<6;$i++){
		// 	$x = 0;
		// 	$ABB->insertarNodo($serie[$i], $x);
		// }
			
		// $ABB->varDump();
		//--------------- FIN Pruebas serie completa--------------

		//--------------- INICIO Pruebas serie completa (funcion insertarSerie)--------------
		// Serie de prueba -> 6, 4, 11, 1, 9, 7
		$serie = array(6, 4, 11, 1, 9, 7);
		for($i=0;$i<6;$i++)
			echo $serie[$i].', ';
		echo '<b><br><hr><br></td><td>';
		$ABB->insertarSerie($serie);
		$ABB->varDump();
		
		//--------------- FIN Pruebas serie completa (funcion insertarSerie)--------------
		
		
		

		echo '</td></tr></tabl></body></html>'
	?>












