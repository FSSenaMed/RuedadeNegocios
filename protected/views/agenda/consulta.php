<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl.'/css/customs.css'; ?>">

<?php if(Yii::app()->user->getFlash('Mesas')){ ?>

	<script type="text/javascript">

			$(document).ready(function(){
				// nombre del modal = dialog
				$('#dialog').modal('show');

			});

	</script>

<?php } ?>

<?php if(Yii::app()->user->getFlash('Mesa fija')){ ?>

	<script type="text/javascript">

			$(document).ready(function(){
				// nombre del modal = dialog
				$('#mesas').modal('show');

			});

	</script>

<?php } ?>


<!--Modal-->
<div id="dialog" class="modal hide fade">
	<div class="modal-header">

		 <center>
         	<h3 class="btn-primary">¡ Advertencia !</h3>
         </center> 

    </div>

    <div class="modal-body">
        No hay mesas disponibles para el horario que usted selecciono
    </div>

    <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cerrar</button>

	</div>

</div>

<?php 
 	$contarh=0;
	$respuesta=0;
	if(count($hDiponible)==0)
	{
		echo '<table  class="table">';
		echo "<tr>
            <th>Hora-citas</th>
            <th>Disponibilidad</th>
          </tr>";
	while ($contarh<count($horario)) {
			/*	
			echo '<tr class="success">';
			echo "<td>".date('H:i:s',$horario[$contarh])."</td>";
            echo "<td>"."disponible"."</td>";
			echo "</tr>";
			*/
			?>
<tr onclick="javascript:if (confirm('esta seguro que desea agendarse con esta persona')){ location.href='<?php echo Yii::app()->createUrl('Agenda/citar',array('mensaje'=>date('H:i:s',$horario[$contarh]),'id'=>$id))?>'}"class="success hero-unit box-button"  >
				<td><?php echo date('H:i:s',$horario[$contarh]);?></td>
            	<td>disponible</td>
			</tr>
		

			<?php 
			
			$contarh++;

	}
	echo '</table>';
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
		
<tr onclick="javascript:if (confirm('esta seguro que desea agendarse con esta persona')){ location.href='<?php echo Yii::app()->createUrl('Agenda/citar',array('mensaje'=>date('H:i:s',$horario[$contarh]),'id'=>$id))?>'}"class="success hero-unit box-button"  >
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
echo '&nbsp;&nbsp;&nbsp'; 
echo CHtml::link(CHtml::button('Atras',array('class'=>'btn btn-success btn btn-large')),array('Portafolio/index'));


	 ?>


	 <div id="mesas" class="modal hide fade">
	<div class="modal-header">

		 <center>
         	<h3 class="btn-primary">¡ Advertencia !</h3>
         </center> 

    </div>

    <div class="modal-body">
        dos participantes con mesas fijas no pueden agendarse
    </div>

    <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cerrar</button>

	</div>

</div>

