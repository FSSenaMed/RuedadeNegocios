<?php
/* @var $this TblProductoController */
/* @var $data TblProducto */
?>
<style>
		

		.box-button {cursor: pointer;
			-webkit-border-radius: 70px;
		border-radius: 70px;


		}

		.box-button:hover {
				background-color:#D5E7FD;
				-webkit-box-shadow: 0px 0px 20px 10px #11AFEE;
				box-shadow: 0px 0px 20px 10px #11AFEE;
		}
</style>


<?php $participante= TblParticipante::model()->findByPk($data->parti_id); ?>
<!--<?php //onclick="javascript: location.href='<?php echo Yii::app()->createUrl('portafolio/psector', array('id'=>$data->parti_id))?>'" ?>-->
<div class="hero-unit box-button " onclick="javascript: location.href='<?php echo Yii::app()->createUrl('portafolio/view', array('id'=>$data->parti_id, 'cate'=>$cate));?>'">

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


</div>