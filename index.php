<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Prueba de ABBphp</title>
</head>
<body>
	<?php 
		require('src/lib/ABBphp.cls.php');
		

		$ABB = new ABBphp(6);
		echo 'ABB<br><b>'.$ABB->getData(0).'</b><br><hr>';

		//Izquierda
		echo '<br><br>'.$ABB->varDump();
		$index = 0;
		echo 'Insertar Nodo 4('.$ABB->insertarNodo(4, $index).'):';
		echo '<br><br>'.$ABB->varDump();
		//izquierda
		echo '<br><hr><br>';
		$index = 0;
		echo 'Insertar Nodo 1('.$ABB->insertarNodo(1, $index).'):';
		echo '<br><br>'.$ABB->varDump();
		//izquierda
		echo '<br><hr><br>';
		$index = 0;
		echo 'Insertar Nodo 0('.$ABB->insertarNodo(0, $index).'):';
		echo '<br><br>'.$ABB->varDump();
		//Repetido (1)
		echo '<br><hr><br>';
		$index = 0;
		echo 'Insertar Nodo 1('.$ABB->insertarNodo(1, $index).'):';
		echo '<br><br>'.$ABB->varDump();
		//Izquieda (negativo)
		echo '<br><hr><br>';
		$index = 0;
		echo 'Insertar Nodo -10('.$ABB->insertarNodo(-10, $index).'):';
		echo '<br><br>'.$ABB->varDump();

	?>
</body>
</html>