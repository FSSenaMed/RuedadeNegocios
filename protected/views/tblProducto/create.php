<?php
/* @var $this TblProductoController */
/* @var $model TblProducto */

$this->breadcrumbs=array(
	'Tbl Productos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblProducto', 'url'=>array('index')),
	array('label'=>'Manage TblProducto', 'url'=>array('admin')),
);
?>

<h1>Create TblProducto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>