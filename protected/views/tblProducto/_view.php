<?php
/* @var $this TblProductoController */
/* @var $data TblProducto */
?>

<div class="hero-unit">

	<b><?php echo CHtml::encode($data->getAttributeLabel('prod_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->prod_id), array('view', 'id'=>$data->prod_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prod_producto')); ?>:</b>
	<?php echo CHtml::encode($data->prod_producto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prod_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->prod_descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prod_sector')); ?>:</b>
	<?php echo CHtml::encode($data->prod_sector); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parti_id')); ?>:</b>
	<?php echo CHtml::encode($data->parti_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prod_estado')); ?>:</b>
	<?php echo CHtml::encode($data->prod_estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->id_categoria); ?>
	<br />


</div>