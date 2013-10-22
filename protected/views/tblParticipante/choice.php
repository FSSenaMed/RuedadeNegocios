	
<?php if(Yii::app()->user->getFlash('flash')){ ?>

	<script type="text/javascript">
		//alert('Debe ingresar almenos un producto');
		//window.location.href='#myModal';

		$(document).ready(function() {

    	$('#dialog').modal('show')

		});

	</script>

	 <!-- Button trigger modal -->
<?php } ?>

<div id="dialog" class="modal hide fade">
    <div class="modal-header">
          
         <center>
         	<h3 class="btn-primary">¡ Advertencia !</h3>
         </center> 
    </div>
    <div class="modal-body">
        Necesita agregar almenos un producto en las dos categorias (vendo, compro).
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    </div>
</div> 


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

-webkit-box-shadow: inset 0px 0px 100px 60px rgba(40, 19, 200, 1);
box-shadow: inset 0px 0px 100px 60px rgba(40, 19, 200, 1);
}
</style>

<h1>
	Ingrese si ofrece o necesita un producto
</h1><br><br>

<div class="container">
	<table class="table table-striped">
		<thead>
		<tr>
			<td>
			
			<div class="hero-unit box-button" onclick="javascript: location.href='<?php echo Yii::app()->createUrl('portafolio/add', array('id'=>$id, 'cate'=>1),'&')?>'">
				<center>
					<h1>Vendo</h1>

				</center>
			</div>
			
		
			</td>
			<td>
			<div class="hero-unit box-button" onclick="javascript: location.href='<?php echo Yii::app()->createUrl('portafolio/add', array('id'=>$id, 'cate'=>2),'&')?>'">
				<center>
					<h1>Necesito</h1>

				</center>
			</div>
			</td>
		</tr>
</thead>
		<tr>
			<td colspan = "2">
			<center>
					<div class="hero-unit box-button" onclick="javascript: location.href='<?php echo Yii::app()->createUrl('portafolio/salir', array('id'=>$id)) ?>'">
					<center>
					<h1>Finalizar</h1>

				</center>
					</div>
			</center>
			</td>
		</tr>
	</table>
</div>

			

			



	
	<?php 
	$modelo = TblProducto::model()->findAll();
	$dataProvider=new CActiveDataProvider('TblProducto',
		array(
			'criteria' => array(
				'select' =>'prod_producto, prod_descripcion',
				'condition'=>'parti_id = '.$id
				),
			)
		);

	$this->widget('bootstrap.widgets.TbGridView',array(
		'dataProvider'=>$dataProvider,
		'columns' => array('prod_producto','prod_descripcion'),
		));

	 ?>


<?php $this->endWidget(); ?>


