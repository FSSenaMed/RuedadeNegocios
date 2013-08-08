<?php
/* @var $this TblSectorempController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Sectoremps',
);

$this->menu=array(
	array('label'=>'Create TblSectoremp', 'url'=>array('create')),
	array('label'=>'Manage TblSectoremp', 'url'=>array('admin')),
);
?>

<h1>Tbl Sectoremps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
