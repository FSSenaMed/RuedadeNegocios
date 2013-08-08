<?php
/* @var $this TblParticipanteController */
/* @var $model TblParticipante */

$this->breadcrumbs=array(
	'Participantes'=>array('index'),
	'crear',
);

$this->menu=array(
	array('label'=>'Listar Participantes', 'url'=>array('index')),
	array('label'=>'Administra Participantes', 'url'=>array('admin')),
);
?>

<h1>Crear Participante</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>