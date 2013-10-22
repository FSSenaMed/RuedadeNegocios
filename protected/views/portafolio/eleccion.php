<?php $this->breadcrumbs=array(
	'eleccion',
); ?>


<?php if(Yii::app()->user->getFlash('Cita Exitosa')){ ?>

	<script type="text/javascript">

			$(document).ready(function(){
				// nombre del modal = dialog
				$('#dialog').modal('show');

			});

	</script>

<?php } ?>


<!--Modal-->
<div id="dialog" class="modal hide fade">
	<div class="modal-header">

		 <center>
         	<h3 class="btn-success">¡Cita exitosa!</h3>
         </center> 

    </div>

    <div class="modal-body">
        Puede realizar otra cita en el fomulario de busqueda de productos
    </div>

    <div class="modal-footer">
        <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Cerrar</button>

	</div>

</div>

<h1>Busque productos en oferta o demanda</h1><br><br>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl.'/css/customs.css'; ?>">


<div class="container">
	<table class="table table-striped">
		<thead>
			<tr>
				<td>
			
				<div class="hero-unit opcion" onclick="javascript: location.href='<?php echo Yii::app()->createUrl('portafolio/filtrar', array('cate'=>1))?>'">
					<center>

						<h1>Se ofrecen</h1>

					</center>
				</div>

				</td>

				<td>
				<div class="hero-unit opcion" onclick="javascript: location.href='<?php echo Yii::app()->createUrl('portafolio/filtrar', array('cate'=>2))?>'">
					<center>

						<h1>Se necesitan</h1>

					</center>
				</div>

				</td>
			</tr>
		</thead>
	</table>
</div>