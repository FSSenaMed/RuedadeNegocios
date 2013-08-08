<?php $form=$this->beginWidget(	'CActiveForm',array(
			'id'=>'option-index',
		'enableAjaxValidation'=>false,

	));
 ?>


	<div class="row">
		
		<?php //echo $form->textField($model,'parti_imagen',array('size'=>45,'maxlength'=>45)); ?>
		 	<?php echo $form->labelEx($model, 'part_id'); ?>
 			<?php echo $form->TextField($model, 'part_id'); ?>
 			<?php echo $form->error($model, 'part_id'); ?>
		
	</div>
	<div>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Buscar' : 'Save',array('class'=>'btn btn-success btn btn-large')); ?>
	</div>
 <?php $this->endWidget(); ?>