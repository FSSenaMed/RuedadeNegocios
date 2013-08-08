<?php
/* @var $this TblParticipanteController */
/* @var $model TblParticipante */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'part_id'); ?>
		<?php echo $form->textField($model,'part_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parti_imagen'); ?>
		<?php echo $form->textField($model,'parti_imagen',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parti_nombreempresa'); ?>
		<?php echo $form->textField($model,'parti_nombreempresa',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parti_nit'); ?>
		<?php echo $form->textField($model,'parti_nit',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parti_nom_represantante'); ?>
		<?php echo $form->textField($model,'parti_nom_represantante',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parti_direccion'); ?>
		<?php echo $form->textField($model,'parti_direccion',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parti_departamento'); ?>
		<?php echo $form->textField($model,'parti_departamento',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parti_ciudad'); ?>
		<?php echo $form->textField($model,'parti_ciudad',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parti_email'); ?>
		<?php echo $form->textField($model,'parti_email',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parti_telefono'); ?>
		<?php echo $form->textField($model,'parti_telefono',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parti_fax'); ?>
		<?php echo $form->textField($model,'parti_fax',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parti_web'); ?>
		<?php echo $form->textField($model,'parti_web',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parti_ntrabajadores'); ?>
		<?php echo $form->textField($model,'parti_ntrabajadores',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parti_sector'); ?>
		<?php echo $form->textField($model,'parti_sector'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->