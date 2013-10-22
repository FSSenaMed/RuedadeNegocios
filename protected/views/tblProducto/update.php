<?php
/* @var $this TblProductoController */
/* @var $model TblProducto */

$this->breadcrumbs=array(
	'Tbl Productos'=>array('index'),
	$model->prod_id=>array('view','id'=>$model->prod_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblProducto', 'url'=>array('index')),
	array('label'=>'Create TblProducto', 'url'=>array('create')),
	array('label'=>'View TblProducto', 'url'=>array('view', 'id'=>$model->prod_id)),
	array('label'=>'Manage TblProducto', 'url'=>array('admin')),
);
?>

<h1>Update TblProducto <?php echo $model->prod_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>