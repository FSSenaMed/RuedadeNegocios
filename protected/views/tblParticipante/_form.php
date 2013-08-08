<?php
/* @var $this TblParticipanteController */
/* @var $model TblParticipante */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-participante-form',
	'enableAjaxValidation'=>false,
 	'enableClientValidation'=>true,
 	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
 	'clientOptions'=>array(
 	'validateOnSubmit'=>true,
 	),
)); ?>

<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    
<p class="note">Los campos marcados con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		
		<?php //echo $form->textField($model,'parti_imagen',array('size'=>45,'maxlength'=>45)); ?>
		 	<?php echo $form->labelEx($model, 'foto'); ?>
 			<?php echo $form->fileField($model, 'foto'); ?>
 			<?php echo $form->error($model, 'foto'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parti_nombreempresa'); ?>
		<?php echo $form->textField($model,'parti_nombreempresa',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'parti_nombreempresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parti_nit'); ?>
		<?php echo $form->textField($model,'parti_nit',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'parti_nit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parti_nom_represantante'); ?>
		<?php echo $form->textField($model,'parti_nom_represantante',array()); ?>
		<?php echo $form->error($model,'parti_nom_represantante'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parti_direccion'); ?>
		<?php echo $form->textField($model,'parti_direccion',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'parti_direccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parti_departamento'); ?>
               <?php echo $form->dropDownList($model,'parti_departamento',
                   
                 CHtml::ListData(TblDepartamento::model()-> findAll(), 'dep_id', 'dep_nombre'),
                       array(
                           'ajax'=>array(
                               'type'=>'POST',
                               'url'=>  CController::createUrl('TblParticipante/Seleccion'),
                               'update'=>'#'.CHtml::activeId($model, 'parti_ciudad'),
                               
                           ),'prompt'=>'Seleccione un departamento'
                           
                       )
               ); ?>  
              
		<?php  echo $form->error($model,'parti_departamento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parti_ciudad');?>
                <?php // echo $form->dropDownList($model,'parti_ciudad',array('prompt'=>'----------------------------')); ?>
               
               <?php $datos = CHtml::listData(TblMunicipio::model()->findAll(),'mun_id','mun_nombre');?>
                <?php echo $form->DropDownList($model,'parti_ciudad',$datos, array('empty'=>'----------------------'));  ?>		            
		<?php echo $form->error($model,'parti_ciudad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parti_email'); ?>
		<?php echo $form->textField($model,'parti_email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'parti_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parti_telefono'); ?>
		<?php echo $form->textField($model,'parti_telefono',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'parti_telefono'); ?>
	</div>
       <div class="row">
		<?php echo $form->labelEx($model,'parti_celular'); ?>
		<?php echo $form->textField($model,'parti_celular',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'parti_celular'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'parti_fax'); ?>
		<?php echo $form->textField($model,'parti_fax',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'parti_fax'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parti_web'); ?>
		<?php echo $form->textField($model,'parti_web',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'parti_web'); ?>
	</div>

	
        <div class="row">
                <?php echo $form->labelEx($model,'parti_ntrabajadores'); ?>
                <?php // echo $form->radioButton($model,'parti_ntrabajadores',array('value'=>'1-10')) . '1-10'; ?>
                <?php
                      $accountStatus = array('1-10'=>'1-10', '11-25'=>'11-25', '26-50'=>'26-50','50-100'=>'50-100','Mas de 100'=>'Mas de 100');
                      echo $form->radioButtonList($model,'parti_ntrabajadores',$accountStatus,array('separator'=>' '));
              ?>
                <?php echo $form->error($model,'parti_ntrabajadores'); ?>
        </div>


	<div class="row">
		
            
            <?php echo $form->labelEx($model,'Sector empresarial'); ?>
                <?php $datos = CHtml::listData(TblSectoremp::model()->findAll(),'sec_id','sec_nombre');?>
                <?php echo $form->DropDownList($model,'parti_sector',$datos, array('empty'=>'Seleccione una opción'));  ?>
		<?php // echo $form->textField($model,'parti_sector'); ?>
		<?php // echo $form->error($model,'parti_sector'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Siguiente' : 'Save',array('class'=>'btn btn-success btn btn-large')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->