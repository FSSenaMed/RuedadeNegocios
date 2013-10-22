<?php echo "hola"; ?>

<?php /*
$tabla=array();
	foreach ($registro as $regis) {
		array_push($tabla,$regis->attributes);
	}
echo "<pre>";
	print_r($tabla);
echo "</pre>";

 print_r("<br>");
 foreach ($tabla as $i) {
 	print_r("<br>");
 	print($i['prod_sector']);
	 }
	print_r("<br>");
	
 */
 ?>

 <?php $this->widget('bootstrap.widgets.TbGridView', array(
 					'id'=>'tbl-participante-grid',
 					'dataProvider'=>$dataProvider,
 					'columns'=>array(
 						'prod_producto',
 						'prod_descripcion',
 						'idCategoria.Cate_nombre',
 						'NomSector.Sec_nombre',
 						),
 	)); ?>