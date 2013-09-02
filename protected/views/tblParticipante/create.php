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
<center>

	<div class="container">
		<div class = "span12">

			<h1>Registre su empresa</h1>
		</div>
	</div>
</center>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>