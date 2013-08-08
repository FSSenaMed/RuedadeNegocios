

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



<h1>Productos</h1>

<?php $form=$this->beginWidget(	'CActiveForm',array(
			'id'=>'eleccion-view',
			'enableAjaxValidation'=>false,
		)); ?>


<?php if(Yii::app()->user->hasFlash('hola')){?>

    <div class="info">
        <?php echo Yii::app()->user->getFlash('hola'); ?>
    </div>

 <?php } ?>

 			
            <p class="note">Sector empresarial al que pertenece <span class="required">*</span></p>

            <?php $datos = CHtml::listData(TblSectoremp::model()->findAll(),'sec_id','sec_nombre');?>
        	<?php echo $form->DropDownList($model,'prod_sector',$datos, array('empty'=>'todos'));  ?>
 			<?php echo $form->error($model, 'prod_sector'); ?>

<?php  echo CHtml::submitButton($model->isNewRecord ? 'Buscar' : 'Save',array('class'=>'btn btn-primary btn-large')); ?>


<?php $this->endWidget(); ?>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'viewData'=>array('cate'=>$cate),

)); ?>
