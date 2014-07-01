<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Prueba de ABBphp</title>
</head>
<body>
	<?php 
		require('src/lib/ABBphp.cls.php');
		
		$node = new Nodo(6, 0);
		echo 'Nodo<br><b>'.$node->getData().'</b><br><hr>';

		$ABB = new ABBphp(11);
		echo 'ABB<br><b>'.$ABB->getData(0).'</b><br><hr>';
		echo ' esta el 11: '.$ABB->buscarNodo(11).'<br>';
		echo ' esta el 6: '.$ABB->buscarNodo(6).'<br>';
	?>
</body>
</html>