<?php
/* @var $this TblProductoController */
/* @var $model TblProducto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-producto-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'prod_producto'); ?>
		<?php echo $form->textField($model,'prod_producto',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'prod_producto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prod_descripcion'); ?>
		<?php echo $form->textField($model,'prod_descripcion',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'prod_descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prod_sector'); ?>
		<?php echo $form->textField($model,'prod_sector',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'prod_sector'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parti_id'); ?>
		<?php echo $form->textField($model,'parti_id'); ?>
		<?php echo $form->error($model,'parti_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prod_estado'); ?>
		<?php echo $form->textField($model,'prod_estado',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'prod_estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_categoria'); ?>
		<?php echo $form->textField($model,'id_categoria'); ?>
		<?php echo $form->error($model,'id_categoria'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->