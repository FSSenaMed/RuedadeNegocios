
<style>
.productos{
	cursor: pointer;
}
.productos:hover{
	-webkit-box-shadow: inset 0px 0px 100px 60px rgba(40, 19, 200, 0.50);
box-shadow: inset 0px 0px 100px 60px rgba(40, 19, 200, 0.50);
}
</style>

<h1><?php echo "listar ".$id; ?></h1>

<?php $form=$this->beginWidget('CActiveForm',array(
	'id'=>'listar-view',
	'enableAjaxValidation'=>false,
	)); ?>

<?php ?>
	 

	 <div>
	 		<?php echo $form->dropDownList($model, 'prod_sector',  

	 			CHtml::ListData(TblSectoremp::model()->findAll(),'sec_id','sec_nombre')
	 			, array('empty'=>'todos')
	 			

	 			
	 		); ?>
	 		<?php echo CHtml::submitButton($model->isNewRecord ? 'Buscar' : 'Save',array('class'=>'btn btn-success btn btn-large')); ?>
	 </div>

	 <div> <h1>Productos</h1></div>

<?php if(Yii::app()->user->getFlash('sector')){ ?>

	<?php $modelo = TblProducto::model()->findAll('prod_sector =:id',array(':id'=>$id)); ?>

		<?php foreach ($modelo as $key) { ?>
				<div class = "hero-unit productos">
					<div><h4>Nombre</h4></div>
					<?php echo $key->prod_producto; ?>
				</div>

	<?php } } ?>

<?php if(Yii::app()->user->getFlash('todos')){ ?>
	<?php foreach($lista as $i)
   {?>
      
       <div class = "hero-unit productos"  onclick="javascript: location.href='<?php echo Yii::app()->createUrl('TblProducto/view', array('id'=>5))?>'">
				<table>
					<tr>
						<td><b>Nombre:&nbsp;</b> </td><td><?php echo $i['prod_producto'],'<br>'; ?></td>
					</tr>

					<tr>
						<td><b>Categoria:&nbsp;</b> </td><td><?php  echo $i['cate_nombre'],'<br>';?></td>
					</tr>
					<tr>
						<td><b>Sector:&nbsp;</b> </td><td><?php  echo $i['sec_nombre'],'<br>';?></td>
					</tr>
				
     			</table>
     	</div>
 <?php } ?>

<?php } ?>

	
<?php $this->endWidget(); ?>