<?php
/* @var $this TblSectorempController */
/* @var $model TblSectoremp */

$this->breadcrumbs=array(
	'Tbl Sectoremps'=>array('index'),
	$model->sec_id,
);

$this->menu=array(
	array('label'=>'List TblSectoremp', 'url'=>array('index')),
	array('label'=>'Create TblSectoremp', 'url'=>array('create')),
	array('label'=>'Update TblSectoremp', 'url'=>array('update', 'id'=>$model->sec_id)),
	array('label'=>'Delete TblSectoremp', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->sec_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblSectoremp', 'url'=>array('admin')),
);
?>

<h1>View TblSectoremp #<?php echo $model->sec_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sec_id',
		'sec_nombre',
		'sec_estado',
	),
)); ?>
