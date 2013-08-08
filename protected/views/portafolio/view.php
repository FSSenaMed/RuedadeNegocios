<?php
/* @var $this TblProductoController */
/* @var $model TblProducto */

$this->breadcrumbs=array(
	'Cambiar categoria'=>array('index'),
	$model->parti_nombreempresa, 
);

$this->menu=array(
	array('label'=>'List TblProducto', 'url'=>array('index')),
	array('label'=>'Create TblProducto', 'url'=>array('create')),
	array('label'=>'Update TblProducto', 'url'=>array('update', 'id'=>$model->part_id)),
	array('label'=>'Delete TblProducto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->part_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblProducto', 'url'=>array('admin')),
);
?>

<style>

.divi{
    background-color:#D5E7FD;
}

.imagen:hover{
    cursor: pointer;
}
</style>

<div class="hero-unit divi">
<h1>Participante<?php echo "    ".$model->parti_nombreempresa; ?></h1>


<div>
 		<H1>

 		<?php
 			 echo CHtml::image(Yii::app()->request->baseUrl.$model->parti_imagen,"",
 			 	array('class'=>'imagen', 'width'=>200,'href'=>"#myModal",'data-toggle'=>"modal"));		
 		 ?>	
 		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    			<h3 id="myModalLabel"><?php echo $model->parti_nombreempresa; ?></h3>
  		</div>
  		<div class="modal-body">

 		<?php
 			 echo CHtml::image(Yii::app()->request->baseUrl.$model->parti_imagen,"",
 			 	array('width'=>500));
		
 		 ?>	
  		</div>
  		<div class="modal-footer">
    	<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    	
	  	</div>
		</div>		
 		
 		</H1>
 	</div>	



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		
		'parti_nombreempresa',
		'parti_nit',
		'parti_nom_represantante',
		
		'partiCiudad.depCodigo.dep_nombre',
		'partiCiudad.mun_nombre',
		'parti_email',
		'parti_telefono',
		'parti_celular',
		
		'parti_web',
	
		'partiSector.sec_nombre',		
	),
)); ?>
</div>
<?php echo CHtml::link(CHtml::button('Atras',array('class'=>'btn btn-success btn btn-large')),array('portafolio/buscar','cate'=>$cate)); ?>

 &nbsp;
<?php echo CHtml::link(CHtml::button('Agendarme',array('class'=>'btn btn-primary btn btn-large')),array('portafolio/consultar', 'id'=>$model->part_id)); ?>