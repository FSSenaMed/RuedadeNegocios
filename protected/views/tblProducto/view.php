<?php
/* @var $this TblProductoController */
/* @var $model TblProducto */

$this->breadcrumbs=array(
	'Tbl Productos'=>array('index'),
	$model->prod_id,
);

$this->menu=array(
	array('label'=>'List TblProducto', 'url'=>array('index')),
	array('label'=>'Create TblProducto', 'url'=>array('create')),
	array('label'=>'Update TblProducto', 'url'=>array('update', 'id'=>$model->prod_id)),
	array('label'=>'Delete TblProducto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->prod_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblProducto', 'url'=>array('admin')),
);
?>

<h1>View TblProducto #<?php echo $model->prod_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'prod_id',
		'prod_producto',
		'prod_descripcion',
		'prod_sector',
		'parti_id',
		'prod_estado',
		'id_categoria',
	),
)); ?>
