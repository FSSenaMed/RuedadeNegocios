

<?php
//echo CHtml::link('Eleccion', array('portafolio/index'))." / busqueda";

	$this->breadcrumbs=array(
	'cambiar categoria'=>array('portafolio/index'),
	'busqueda'
	

		);



	$this->menu=array(
		array('label'=>'Create TblProducto', 'url'=>array('create')),
		array('label'=>'Manage TblProducto', 'url'=>array('admin')),
		);
?>


<?php $form=$this->beginWidget(	'CActiveForm',array(
			'id'=>'eleccion-view',
			'enableAjaxValidation'=>false,
		)); ?>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl.'/css/customs.css'; ?>">

	<div class="container ">
		<div class="span12">
				<div class="hero-unit shadows">


						<center>
					            <h4>Buscar por sector empresarial </h4>

					                        <?php $datos = CHtml::listData(TblSectoremp::model()->findAll(),'sec_id','sec_nombre');?>

					        		<?php echo $form->DropDownList($model,'prod_sector',$datos, array('empty'=>'todos'));  ?>
					        		<br>
					        		 <?php  echo CHtml::submitButton($model->isNewRecord ? 'Buscar' : 'Save',array('class'=>'btn btn-primary btn-large')); ?>
					 			<?php echo $form->error($model, 'prod_sector'); ?>
					 			
				 		</center>
				</div> 			
			</div>
		</div>


<?php $this->endWidget(); ?>