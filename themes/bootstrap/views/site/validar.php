<div>
<?php $form= $this->beginWidget('CActiveForm', array(
	'id'=>'validar',
	'enableAjaxValidation'=>false,
 	'enableClientValidation'=>true,
 	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
 	'clientOptions'=>array(
 	'validateOnSubmit'=>true,
 	),
)); ?>
<center>
		<h4>Ingrese el nit de su empresa</h4>
		<?php echo $form->textField($model,'parti_nit',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'parti_nit'); ?><br>

		 <?php  echo CHtml::Link(CHtml::Button('Atras',array('class'=>'btn btn-success btn btn-large')),  array('site/index')); ?>	
		<?php  echo CHtml::submitButton($model->isNewRecord ? 'Validar' : 'Save',array('class'=>'btn btn-primary btn btn-large', 'id'=>'siguiente')); ?>

</center>

<?php $this->endWidget(); ?>
</div>


<?php if(Yii::app()->user->getFlash('inscrito')){
	

 ?>
	<script type="text/javascript">
			$(document).ready(function(){
				// nombre del modal = dialog
				$('#dialog').modal('show')

			});

	</script>
<?php } ?>

<!--Modal-->
<div id="dialog" class="modal hide fade">
	<div class="modal-header">

		 <center>
         	<h3 class="btn-primary">¡ Advertencia !</h3>
         </center> 

    </div>

    <div class="modal-body">
        usted ya se encuentra inscrito a rueda de negocios
    </div>

    <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cerrar</button>

	</div>

</div>