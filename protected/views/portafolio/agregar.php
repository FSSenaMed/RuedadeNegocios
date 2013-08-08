<!--titulo-->
<?php if($categoria == '1'){ ?>
	
	<h3>Describa brevemente el producto que ofrece</h3>

<?php } ?>
<?php if($categoria == '2'){ ?>

	<h3>Describa brevemente el producto que necesita</h3>

<?php } ?>


<?php $form=$this->beginWidget(	'CActiveForm',array(
		'id'=>'option-index',
		'enableAjaxValidation'=>false,
)); ?>


<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    
	<p class="note">Los campos con  <span class="required">*</span> son requeridos.</p>

<?php echo $form->errorSummary($model); ?>


<div class="row">
		 	<p class="note">Nombre del producto <span class="required">*</span></p>
 			<?php echo $form->TextField($model, 'prod_producto'); ?>
 			<?php echo $form->error($model, 'prod_producto'); ?>		
</div>


<?php if($categoria==2) {?>
		<div class="row">
		
		
            <p class="note">Sector empresarial al que pertenece <span class="required">*</span></p>
            <?php $datos = CHtml::listData(TblSectoremp::model()->findAll(),'sec_id','sec_nombre');?>
        	<?php echo $form->DropDownList($model,'prod_sector',$datos, array('empty'=>'Seleccione una opción'));  ?>
 			<?php echo $form->error($model, 'prod_sector'); ?>

	</div>
<?php } ?>

	<div class="row">
		 	<p class="note">Descripcion <span class="required">*</span></p>
 			<?php echo $form->TextArea($model,'prod_descripcion'); ?>
 			<?php echo $form->error($model, 'prod_descripcion'); ?>
	</div>

<div class="row buttons">
		
            <?php  echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Save',array('class'=>'btn btn-primary btn-large')); ?>
            <?php  echo CHtml::Link(CHtml::Button('Terminar',array('class'=>'btn btn-success btn btn-large')),  array('portafolio/intermediario','id'=>$id)); ?>
	
	</div>
<?php $this->endWidget(); ?>



<?php 

$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'tbl-participante-grid',
        'type'=>'striped bordered condensed',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
                'prod_producto',
                'prod_descripcion',
		'idCategoria.cate_nombre',
                'prodSector.sec_nombre',	

                    array(
                    'class'=>'bootstrap.widgets.TbButtonColumn',
                    'template'=>'{delete}',
                         'buttons'=>array
                    (
                        'delete' => array
                        (
                            'label'=>'Borrar',
                            'icon'=>'minus',
                            'url'=>'Yii::app()->createUrl("Portafolio/Delete", array("id"=>$data->prod_id))',
                                'options'=>array(
                        'class'=>'btn btn-danger',
                    ),
                    ),

            
            
//		array(
//			'class'=>'bootstrap.widgets.TbButtonColumn',
//		),
	),
)))); 

 ?>