<?php 
	require('../lib/ABBphp.cls.php');
		

	$ABB = new ABBphp(6);
	echo 'ABB<br><b> Serie: ';

	$serie = array(6, 4, 11, 1, 9, 7);
		for($i=0;$i<6;$i++)
			echo $serie[$i].', ';
		echo '<b><br><hr><br>';
		$ABB->insertarSerie($serie);
		$ABB->varDump();

	//--------------- INICIO pruebas indexFromValue ---------------------------------
		
		echo '<br><a>Indice del valor 9: '.$ABB->indexFromValue(9).'</a>';
		echo '<br><a>Indice del valor 11: '.$ABB->indexFromValue(11).'</a>';
		echo '<br><a>Indice del valor 15: '.$ABB->indexFromValue(15).'</a>';

	//--------------- FIN pruebas indexFromValue ---------------------------------

	//--------------- INICIO pruebas parentFromValue ---------------------------------
		
		for($j=0;$j<6;$j++){
			$aux = $ABB->parentFromValue($serie[$j]);
			echo '<br><hr><br>Busco el [ '.$serie[$j].' ] <br> <a>Padre: </a>'. $aux[0].'<br><a>Lado: </a>';
			if($aux[1] == 0)
				echo 'Izquierda';
			if($aux[1] == 1)
				echo 'Derecha';

			echo '<hr>------------------------------------------------------------------';
		}


		//--------------- FIN pruebas parentFromValue ---------------------------------

 ?>