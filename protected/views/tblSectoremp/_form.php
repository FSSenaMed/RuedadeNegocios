<?php
/* @var $this TblSectorempController */
/* @var $model TblSectoremp */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-sectoremp-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sec_nombre'); ?>
		<?php echo $form->textField($model,'sec_nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'sec_nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sec_estado'); ?>
		<?php echo $form->textField($model,'sec_estado'); ?>
		<?php echo $form->error($model,'sec_estado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->