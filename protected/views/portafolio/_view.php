<?php
/* @var $this TblProductoController */
/* @var $data TblProducto */
?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl.'/css/customs.css'; ?>">


<?php $participante= TblParticipante::model()->findByPk($data->parti_id); ?>
<!--<?php //onclick="javascript: location.href='<?php echo Yii::app()->createUrl('portafolio/psector', array('id'=>$data->parti_id))?>'" ?>-->
<div class="hero-unit box-button " onclick="javascript: location.href='<?php echo Yii::app()->createUrl('portafolio/view', array('id'=>$data->parti_id, 'cate'=>$cate, 'sector'=>$sector));?>'">

	<b><?php /*echo CHtml::encode($data->getAttributeLabel('prod_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->prod_id), array('view', 'id'=>$data->prod_id)); */?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prod_producto')); ?>:</b>
	<?php echo CHtml::encode($data->prod_producto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prod_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->prod_descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prod_sector')); ?>:</b>
	<?php echo CHtml::encode($data->prodSector->sec_nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parti_id')); ?>:</b>
	<?php echo CHtml::encode($participante->parti_nombreempresa); ?>
	<br />

	<?php /*echo CHtml::encode($data->getAttributeLabel('prod_estado')); ?>:</b>
	<?php echo CHtml::encode($data->prod_estado); */?>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->idCategoria->cate_nombre); ?>
	<br />

	<center> <h3 class="btn-info text">Clic para ver información del participante...</h3> </center>

</div>
