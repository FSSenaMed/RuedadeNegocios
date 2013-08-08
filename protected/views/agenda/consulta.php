

<style>
.box-button {
cursor: pointer;



}
.box-button:hover {

color:#4AAEFF;

}

</style>

<?php 
 	$contarh=0;
	$respuesta=0;
	if(count($hDiponible)==0)
	{
	while ($contarh<count($horario)) {	
echo '<tr class="success">';
			echo "<td>".date('H:i:s',$horario[$contarh])."</td>";
            echo "<td>"."disponible"."</td>";
			echo "</tr>";
			$contarh++;

	}
	}else{
?>
	<table id="example" class="table">
	<thead>
          <tr>
            <th>Hora-citas</th>
            <th>Disponibilidad</th>
          </tr>
        </thead>
    <tbody><?php
	while ($contarh<count($horario)) {
		
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
			?>
			<tr BGCOLOR="#E59D9D">
				<td><?php echo date('H:i:s',$horario[$contarh]);?></td>
            	<td>no dispoble</td>
            </tr>
		<?php 	
		}else
		if ($respuesta==2) {
		?>
		
			<tr onclick="javascript: location.href='<?php echo Yii::app()->createUrl('Agenda/citar',array('mensaje'=>date('H:i:s',$horario[$contarh]),'id'=>$id))?>'"class="success hero-unit box-button"  >
				<td><?php echo date('H:i:s',$horario[$contarh]);?></td>
            	<td>disponible</td>
			</tr>
		
		<?php			
		}
		
		$contarh++;
	
	}
	?>
      </tbody></table>
	<?php 

}
	 ?>
