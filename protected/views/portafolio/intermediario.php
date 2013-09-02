<!-- Mostrar en forma de modal que no puede salir-->
<?php if(Yii::app()->user->getFlash('salir')){ ?>

	<script type="text/javascript">

			$(document).ready(function(){
				// nombre del modal = dialog
				$('#dialog').modal('show')

			});

	</script>

<?php } ?>


<!--Modal-->
<div id="dialog" class="modal hide fade">
	<div class="modal-header">

		 <center>
         	<h3 class="btn-primary">¡ Advertencia !</h3>
         </center> 

    </div>

    <div class="modal-body">
        Necesita agregar almenos un producto en una de las dos categorias categorias (vendo, compro).
    </div>

    <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cerrar</button>

	</div>

</div>


<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl.'/css/customs.css'; ?>">


<h1>
	Ingrese si ofrece o necesita un producto
</h1><br><br>

<div class="container">
	<table class="table table-striped">
		<thead>
		<tr>
			<td>
			
			<div class="hero-unit opcion" onclick="javascript: location.href='<?php echo Yii::app()->createUrl('portafolio/agregar', array('id'=>$id, 'cate'=>1),'&')?>'">
				<center>
					<h1>Vendo</h1>

				</center>
			</div>
			
		
			</td>
			<td>
			<div class="hero-unit opcion" onclick="javascript: location.href='<?php echo Yii::app()->createUrl('portafolio/agregar', array('id'=>$id, 'cate'=>2),'&')?>'">
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
					<div class="hero-unit opcion" onclick="javascript: location.href='<?php echo Yii::app()->createUrl('portafolio/salir', array('id'=>$id)) ; ?>'">
					<center>
					<h1>Finalizar</h1>

				</center>
					</div>
			</center>
			</td>
		</tr>
	</table>
</div>