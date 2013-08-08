<?php
/* @var $this TblSectorempController */
/* @var $model TblSectoremp */

$this->breadcrumbs=array(
	'Tbl Sectoremps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblSectoremp', 'url'=>array('index')),
	array('label'=>'Manage TblSectoremp', 'url'=>array('admin')),
);
?>

<h1>Create TblSectoremp</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>