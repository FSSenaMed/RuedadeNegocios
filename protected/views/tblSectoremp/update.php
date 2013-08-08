<?php
/* @var $this TblSectorempController */
/* @var $model TblSectoremp */

$this->breadcrumbs=array(
	'Tbl Sectoremps'=>array('index'),
	$model->sec_id=>array('view','id'=>$model->sec_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblSectoremp', 'url'=>array('index')),
	array('label'=>'Create TblSectoremp', 'url'=>array('create')),
	array('label'=>'View TblSectoremp', 'url'=>array('view', 'id'=>$model->sec_id)),
	array('label'=>'Manage TblSectoremp', 'url'=>array('admin')),
);
?>

<h1>Update TblSectoremp <?php echo $model->sec_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>