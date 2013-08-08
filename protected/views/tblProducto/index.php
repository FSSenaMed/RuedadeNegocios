<?php
/* @var $this TblProductoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Productos',
);

$this->menu=array(
	array('label'=>'Create TblProducto', 'url'=>array('create')),
	array('label'=>'Manage TblProducto', 'url'=>array('admin')),
);
?>

<h1>Tbl Productos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
