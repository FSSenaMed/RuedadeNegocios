<?php
/* @var $this TblParticipanteController */
/* @var $model TblParticipante */
/* @var $form CActiveForm */
?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl.'/css/customs.css'; ?>">

<div class="container">
	<div class="span12">
		<div class="hero-unit shadows">

<?php if(Yii::app()->user->getFlash('empresa')){ ?>
	<script type="text/javascript">
		alert('El nombre de empresa ya se encuentra inscrito');
	</script>

<?php 
} ?>

<?php if(Yii::app()->user->getFlash('mail')){ ?>
	<script type="text/javascript">
		alert('El correo electornico ya se encuetra inscrito');
	</script>

<?php 
} ?>

<?php Yii::app()->clientScript->registerScriptFile( Yii::app()->request->baseurl . '/assets/js/pass.js' ); ?>

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
		<p id="error1" style="display: none; color:red">Las contraseñas no coinciden</p>
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>45,'maxlength'=>45, 'id'=>'pass1')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
        
        
        <div class="row">
        <p id="error2" style="display: none; color:red ">La contraseña debe ser al menos de 4 digitos</p>
		<?php echo $form->labelEx($model,'canfir_passwor'); ?>
		<?php echo $form->passwordField($model,'canfir_passwor',array('size'=>45,'maxlength'=>45, 'id'=>'pass2','onblur'=>'Deshabilitar()')); ?>
		<?php echo $form->error($model,'canfir_passwor'); ?>
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
                <?php echo $form->labelEx($model,'parti_ntrabajadores'); ?><br>
                <?php
                      $accountStatus = array('1-10'=>'1-10', '11-25'=>'11-25', '26-50'=>'26-50','50-100'=>'50-100','Mas de 100'=>'Mas de 100');
                      echo $form->radioButtonList($model,'parti_ntrabajadores',$accountStatus, array('labelOptions'=>array('style'=>'display:inline'),'separator'=>" &nbsp; &nbsp; &nbsp;"));
              ?>
                <?php echo $form->error($model,'parti_ntrabajadores'); ?>
        </div><br>



	<div class="row">
		
            
            <?php echo $form->labelEx($model,'Sector empresarial'); ?>
                <?php $datos = CHtml::listData(TblSectoremp::model()->findAll(),'sec_id','sec_nombre');?>
                <?php echo $form->DropDownList($model,'parti_sector',$datos, array('empty'=>'Seleccione una opción'));  ?>
		<?php // echo $form->textField($model,'parti_sector'); ?>
		<?php // echo $form->error($model,'parti_sector'); ?>
	</div>


        <input type="checkbox" name="option" id="option" onclick="showMe()" value="estado"/> Acepto los  <?php echo CHtml::link('términos y condiciones','',array('href'=>"#myModal",'data-toggle'=>"modal")); ?>
        <br><br>

	<div class="row buttons" id="div1" style="display:none"> 
		<?php 
                
                echo CHtml::submitButton($model->isNewRecord ? 'Siguiente' : 'Siguiente',array('class'=>'btn btn-success btn btn-large', 'id'=>'siguiente')); ?>
	</div>

<?php $this->endWidget(); ?>
        
        

        
        
        
        

</div><!-- form -->

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    			<h3 id="myModalLabel">Términos y condiciones</h3>
  	</div>
	<div class="modal-body">
                        Protección de Datos Personales<br><br>

                        En cumplimiento de la Ley 1581 de 2012 y su decreto Reglamentario 1377 de 2013, o Ley de protección de Datos Personales en posesión y guarda de entidades particulares del ámbito privado,
                        RUEDA DE NE GOCIOS como tratante de los datos personales obtenidos a través de este formulario, le solicita autorización para el tratamiento de los datos de la empresa
                        registrada conforme a las Políticas de Privacidad para el tratamiento de los datos personales.
                        <br><br>
                        Los datos personales que se solicitan serán almacenados, protegidos y administrados en pleno cumplimiento de la mencionada Ley con la finalidad de garantizar la privacidad y seguridad de los datos.
                        <br><br>
                        De conformidad con los procedimientos contenidos en la Ley 1581 de 2012 y el Decreto 1377 de 2013, los registrados podrán ejercer sus derechos de conocer, actualizar, rectificar y suprimir sus 
                        datos personales enviando su solicitud a soporte@ruedadenegocios.net 
                        

                </div>
  		<div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    	
	  	</div>
</div>		
 		
 		</H1>
 	</div>	
 

 		</div>
 	</div>
 </div>