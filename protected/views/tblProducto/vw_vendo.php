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
		<?php echo $form->labelEx($model,'Portafolio'); ?>
            <?php echo $form->textField($model,'prod_',array('size'=>20,'maxlength'=>20)); ?>
            
            <?php // $datos = CHtml::listData(TblPortanece::model()->findAll(),'porne_id','porne_nombre');?>
                <?php // echo $form->DropDownList($model,'id_portanece',$datos, array('empty'=>'Seleccione una opción'));  ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prod_producto'); ?>
		<?php echo $form->textField($model,'prod_producto',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'prod_producto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prod_descripcion'); ?>
		<?php echo $form->textArea($model,'prod_descripcion',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'prod_descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parti_id'); ?>
		<?php echo $form->textField($model,'parti_id'); ?>
		<?php echo $form->error($model,'parti_id'); ?>
	</div>

	<div class="row">
		<?php // echo $form->labelEx($model,'prod_estado'); ?>
		<?php // echo $form->textField($model,'prod_estado',array('size'=>10,'maxlength'=>10)); ?>
                    <?php // echo $form->error($model,'prod_estado'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Save'); ?>
	</div>
        
        <?php $dataProvider=new CActiveDataProvider('TblProducto');
 
       $this->widget('zii.widgets.grid.CGridView', array(
       'dataProvider'=>$dataProvider,
 )); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->
