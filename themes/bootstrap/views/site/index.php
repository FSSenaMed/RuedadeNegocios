<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>'Bienvenidos a '.CHtml::encode(Yii::app()->name),
)); ?>

<p>hola desde yiibootstrap</p>
<?php $this->endWidget(); ?>

<div class="row">
	<div class="span9">
		<div class="hero-unit">
			<h4>Consigue nuevos clientes, Crea alianzas estratégicas, Conoce nuevos proveedores.</h4>
			<h6>La Rueda de Negocios TecnoParque es un innovador y efectivo espacio para que las empresas generen sinergias y obtengan increíbles resultados en una formato diseñado para promover su crecimiento.</h6>
		</div>	
	</div>
	
	<div class="span3">
		<div class="hero-unit",class="span3"><h3>
			<?php echo CHtml::Link(CHtml::button('Registrarse', array('class'=>'btn btn-primary btn-large')),
				array('TblParticipante/create')
			);?>
		</h3></div>
	</div>	
</div>

<div id="myCarousel" class="carousel slide">
	<div class="carousel-inner">
		<div class="item">
			<center>
			<img src="images/eafitlog.png" alt="">
			</center>
		</div>
		<div class="item">
			<center>
				<img src="images/brupoeafit.png" alt="">
				
			</center>			
		</div>
		<div class="item">
			<center>
				<img src="images/confenalco.jpg" alt="">
				
			</center>			
		</div>
		<div class="item">
			<center>
				<img src="images/LogoSenaTPC-300px.jpg" alt="">
				<!--<div class="carousel-caption">
					<h4>Second Thumbnail label</h4>
					<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div> -->
			</center>			
		</div>  
		<div class="item active">
			<center>
			<img src="images/FENALCO.png" alt="">
		</center>
		<!--
			<div class="carousel-caption">
				<h4>el titulo aquel Third Thumbnail label</h4>
				<p>En esta area podras distribuir distribuir a tu antojo distintos elementos.</p>
			</div> 
		-->
		</div>
	</div>
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
</div>



