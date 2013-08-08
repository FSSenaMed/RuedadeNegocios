<?php
/* @var $this TblSectorempController */
/* @var $data TblSectoremp */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('sec_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->sec_id), array('view', 'id'=>$data->sec_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sec_nombre')); ?>:</b>
	<?php echo CHtml::encode($data->sec_nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sec_estado')); ?>:</b>
	<?php echo CHtml::encode($data->sec_estado); ?>
	<br />


</div>