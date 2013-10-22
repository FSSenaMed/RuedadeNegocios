<?php echo $category; ?>
	<?php $form=$this->beginWidget('CActiveForm',array('id'=>'vista-lista','enableAjaxValidation'=>false)); ?>


		<div class="row">
		
            
            <?php echo $form->labelEx($model,'Sector empresarial'); ?>
                <?php $datos = CHtml::listData(TblSectoremp::model()->findAll(),'sec_id','sec_nombre');?>
                <?php echo $form->DropDownList($model,'prod_sector',$datos,   array(
        				'empty'=> 'Select Vehicle',
       					'ajax' => array(
                        'type' => 'POST', 
                        'url' => CController::createUrl('Ajax'),
                        'data'=> array('vehId'=>'js: $(this).val()'),  
                        'update'=>'#mydiv',
 
                       )
  ));  ?>
	
	</div>


		
	<?php 
	$modelo = TblProducto::model()->findAll('id_categoria = :id',array(':id'=>$category));


	foreach ($modelo as $key ) {?>
		<div class="hero-unit" id="mydiv">

			<table>
				<tr>
					<td><h4>Nombre de empresa</h4></td>
					<td><?php $sectorTbl =TblParticipante::model()->findAll('part_id = :id', array(':id'=> $key->parti_id)); 
						foreach ($sectorTbl as $s) {
							echo $s->parti_nombreempresa;
						}
				?></td> 
				</tr>
				<tr>
					<td><label><h4>Producto</h4></label></td>
					<td><?php echo $key->prod_producto; ?></td>
				</tr>
				<tr>
					<td><label><h4>descripcion producto</h4></label></td>
					<td><?php echo $key->prod_descripcion; ?></td> 
				</tr>

				<tr>
					<td><label><h4>sector</h4></label></td>
					<td><?php $sectorTbl =TblSectoremp::model()->findAll('sec_id = :id', array(':id'=> $key->prod_sector)); 
						foreach ($sectorTbl as $s) {
							echo $s->sec_nombre;
						}
					?></td> 
				</tr>

				<tr>
					<td><label><h4>categoria</h4></label></td>
					<td><?php if($key->id_categoria == '1'){
						echo "vendo";
					}else{ echo "compro";} ?></td> 
				</tr>

			</table>
		</div>
		<?php
	}
/*
	$dataProvider=new CActiveDataProvider('TblProducto',
		array(
			'criteria' => array(
				'select' =>'prod_producto, prod_descripcion,prod_sector, id_categoria',
				'condition'=>'id_categoria = '.$category
				),
			)
		);

	$this->widget('bootstrap.widgets.TbGridView',array(
		'dataProvider'=>$dataProvider,
		'columns' => array('prod_producto','prod_descripcion','prod_sector','id_categoria'),
		));
*/
	 ?>
	 <?php $this->endWidget(); ?>