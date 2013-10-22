
<h1><?php ?></h1>


<?php $form=$this->beginWidget(	'CActiveForm',array(
		'id'=>'option-index',
		'enableAjaxValidation'=>false,

	)); ?>
<style>
.box-button {cursor: pointer;
	-webkit-border-radius: 70px;
border-radius: 70px;
}
.box-button:hover {

-webkit-box-shadow: inset 1px 1px 200px -60px rgba(0, 0, 256, 0.5);
box-shadow: inset 1px 1px 200px -60px rgba(0, 0, 256, 0.5);
}
.box-button-e {cursor: pointer;
-webkit-border-radius: 70px;
border-radius: 70px;
}
.box-button-e:hover {

	-webkit-box-shadow: inset 1px 1px 200px -60px rgba(0, 256, 0, 0.5);
box-shadow: inset 1px 1px 200px -60px rgba(0, 256, 0, 0.5);
}
</style>

<div class="container">
	<table class="table table-striped" size="60%">
		<thead>
		<tr>
			<td>
		
			<div class="hero-unit box-button" onclick="javascript: location.href='<?echo Yii::app()->createUrl('InterBusqueda/list', array('cate'=>1),'&')?>'">
				<center>
					<h1>Vendo</h1>

				</center>
			</div>
		
			</td>
			<td>
			<div class="hero-unit box-button" onclick="javascript: location.href='<?echo Yii::app()->createUrl('InterBusqueda/list', array('cate'=>2),'&')?>'">
				<center>
					<h1>Necesito</h1>

				</center>
			</div>
			</td>
		</tr>
</thead>

	</table>
</div>


<?php $this->endWidget(); ?>

<?php //echo Yii::app()->createUrl('TblParticipante/view', array('id'=>$id),'&') ?>