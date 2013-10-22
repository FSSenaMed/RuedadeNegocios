<?php
/* @var $this TblParticipanteController */
/* @var $model TblParticipante */

$this->breadcrumbs=array(
	'Participantes'=>array('index'),
	$model->part_id=>array('view','id'=>$model->part_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblParticipante', 'url'=>array('index')),
	array('label'=>'Create TblParticipante', 'url'=>array('create')),
	array('label'=>'View TblParticipante', 'url'=>array('view', 'id'=>$model->part_id)),
	array('label'=>'Manage TblParticipante', 'url'=>array('admin')),
);
?>

<h1>Update TblParticipante <?php echo $model->part_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>