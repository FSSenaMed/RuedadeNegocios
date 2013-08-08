<?php
/* @var $this TblParticipanteController */
/* @var $model TblParticipante */

$this->breadcrumbs=array(
	'Participantes'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Participantes', 'url'=>array('index')),
	array('label'=>'Crear Participante', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tbl-participante-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrador Participantes</h1>

<p>
También puede escribir un operador de comparación <b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al comienzo de cada uno de sus valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'tbl-participante-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'part_id',
		'parti_imagen',
		'parti_nombreempresa',
		'parti_nit',
		'parti_nom_represantante',
		'parti_direccion',
		/*
		'parti_departamento',
		'parti_ciudad',
		'parti_email',
		'parti_telefono',
		'parti_fax',
		'parti_web',
		'parti_ntrabajadores',
		'parti_sector',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
