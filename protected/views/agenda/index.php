

<?php 


 	$contarh=0;
	$respuesta=0;
	echo '<table class="table">';
	echo '<thead>
          <tr>
            <th>Hora-citas</th>
            <th>Disponibilidad</th>
            <th>mesa</th>
            <th>empresa</th>
          </tr>
        </thead>';
      echo '<tbody>';
	if(count($hDiponible)==0)
	{
	while ($contarh<count($horario)) {	
echo '<tr class="success">';
			echo "<td>".date('H:i:s',$horario[$contarh])."</td>";
            echo "<td>"."disponible"."</td>";
            echo "<td>"."----"."</td>";
            echo "<td>"."----"."</td>";
			echo "</tr>";
			$contarh++;

	}
	}else{

$variable=null;
	while ($contarh<count($horario)) {
		$variable=null;
		for ($i=0; $i <count($hDiponible); $i++) { 
			if($hDiponible[$i]==date('H:i:s',$horario[$contarh])) {
				$respuesta=1;
				break;
			}
			else{
				$respuesta=2;
			}
		}
		if ($respuesta==1) {
			echo '<tr  BGCOLOR="#E59D9D">';
			echo "<td>".date('H:i:s',$horario[$contarh])."</td>";
            echo "<td>"."no dispoble"."</td>";
            $hora=date('H:i:s',$horario[$contarh]);
         
          echo "<td>". AgendaController::nombreMesa($hora)."</td>";
            echo "<td>".AgendaController::nombreEmpresa($hora)."</td>";
           
            echo "</tr>";
			//echo date('H:i:s',$horario[$contarh])." no disponible";
		}else
		if ($respuesta==2) {

			echo '<tr class="success">';
			echo "<td>".date('H:i:s',$horario[$contarh])."</td>";
            echo "<td>"."disponible"."</td>";
            echo "<td>"."----"."</td>";
            echo "<td>"."----"."</td>";

			echo "</tr>";

			//echo date('H:i:s',$horario[$contarh])." disponible";
		}
		
		$contarh++;
	
	}

      echo "</tbody></table>";

	

    //echo "</tbody>";
    //print_r("</table>")
}

 ?>

