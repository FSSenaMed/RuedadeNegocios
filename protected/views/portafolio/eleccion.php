<?php $this->breadcrumbs=array(
	'eleccion',
); ?>

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


<h1>Busque producos en oferta o demanda</h1><br><br>

<div class="container">
	<table class="table table-striped">
		<thead>
			<tr>
				<td>
			
				<div class="hero-unit box-button" onclick="javascript: location.href='<?php echo Yii::app()->createUrl('portafolio/buscar', array('cate'=>1))?>'">
					<center>

						<h1>Se ofrecen</h1>

					</center>
				</div>

				</td>

				<td>
				<div class="hero-unit box-button" onclick="javascript: location.href='<?php echo Yii::app()->createUrl('portafolio/buscar', array('cate'=>2))?>'">
					<center>

						<h1>Se necesitan</h1>

					</center>
				</div>

				</td>
			</tr>
		</thead>
	</table>
</div>