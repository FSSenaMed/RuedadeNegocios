<?php
/* @var $this TblSectorempController */
/* @var $model TblSectoremp */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'sec_id'); ?>
		<?php echo $form->textField($model,'sec_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sec_nombre'); ?>
		<?php echo $form->textField($model,'sec_nombre',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sec_estado'); ?>
		<?php echo $form->textField($model,'sec_estado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->