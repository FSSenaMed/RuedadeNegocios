<?php
/* @var $this TblProductoController */
/* @var $model TblProducto */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'prod_id'); ?>
		<?php echo $form->textField($model,'prod_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prod_producto'); ?>
		<?php echo $form->textField($model,'prod_producto',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prod_descripcion'); ?>
		<?php echo $form->textField($model,'prod_descripcion',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prod_sector'); ?>
		<?php echo $form->textField($model,'prod_sector',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parti_id'); ?>
		<?php echo $form->textField($model,'parti_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prod_estado'); ?>
		<?php echo $form->textField($model,'prod_estado',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_categoria'); ?>
		<?php echo $form->textField($model,'id_categoria'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->