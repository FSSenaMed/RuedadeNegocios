<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl . '/css/customs.css'; ?>">

<!--
<?php
$this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading' => 'Bienvenidos a',
));
?>
<div class="span8">
<center>
<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/icons/logoCompleto.png', "", array('width' => 250)); ?>
</center>
<?php $this->endWidget(); ?>
-->
</center>
</div>
<div clsss="container">
    <div class="row">
        <div class="span8" >
            <div class="hero-unit shadows">
                <center>
                    <h1>Bienvenido </h1>
                    <br>
<?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/icons/logoCompleto.png', "", array('width' => 188)); ?>
                    </div>
                </center>
            </div>
            <div class="span4 ">
                <center>
                    <div class="hero-unit shadows"><h3>
                            <div class="row">
                                <div>
                                    <h4><p align="justify">Regístrate del 16 al 26 de Agosto<br><br>Agéndate del 27 de Agosto al 3 de Septiembre<br><br>Asiste a la Rueda de Negocios el 5 de Septiembre</p></h4>
                                </div>

                                <div >

                                    <?php
                                    echo CHtml::Link(CHtml::button('Registrarse', array('class' => 'btn btn-primary btn-large')), array('site/validar')
                                    );
                                    ?>
                                </div>
                                <div >

                                    <?php
                                    echo "ó <br>";
                                    echo CHtml::Link(CHtml::button('Iniciar Sesión', array('class' => 'btn btn-success btn-large')), array('user/login')
                                    );
                                    ?>	
                                </div>
                            </div>
                            </center>
                        </h3></div>
                    <div class="span8" >
                        <div class="hero-unit shadows">
                            <h2>Lugar del evento </h2><p> Carrera 65 #18 -49 Medellín - Antioquia, Colombia </p> 
                            <center>
                                <div class="row">
                                    <iframe width="705" height="325" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.es/maps?f=q&amp;source=s_q&amp;hl=es-419&amp;geocode=&amp;q=Carrera+65+%23+18+-49,+Medell%C3%ADn+-+Antioquia,+Colombia&amp;aq=0&amp;oq=Carrera+65+%2318+-49+Medell%C3%ADn+-+Antioquia,+Colombia&amp;sll=6.22562,-75.58267&amp;sspn=0.030162,0.043344&amp;t=h&amp;g=Calle+24,+Medell%C3%ADn+-+Antioquia,+Colombia&amp;ie=UTF8&amp;hq=&amp;hnear=Carrera+65+%23+18-49,+Medell%C3%ADn,+Antioquia,+Colombia&amp;z=14&amp;ll=6.222259,-75.58468&amp;output=embed"></iframe><br/><small target="_blank"><a href="https://maps.google.es/maps?f=q&amp;source=embed&amp;hl=es-419&amp;geocode=&amp;q=Carrera+65+%23+18+-49,+Medell%C3%ADn+-+Antioquia,+Colombia&amp;aq=0&amp;oq=Carrera+65+%2318+-49+Medell%C3%ADn+-+Antioquia,+Colombia&amp;sll=6.22562,-75.58267&amp;sspn=0.030162,0.043344&amp;t=h&amp;g=Calle+24,+Medell%C3%ADn+-+Antioquia,+Colombia&amp;ie=UTF8&amp;hq=&amp;hnear=Carrera+65+%23+18-49,+Medell%C3%ADn,+Antioquia,+Colombia&amp;z=14&amp;ll=6.222259,-75.58468" TARGET="_blank" style="color:#0000FF;text-align:left ">Ver mapa más grande</a></small>  

                                </div>
                        </div>

                    </div>
                    <div class="span4">
                        <div class="hero-unit shadows">
                            <h2>Ayuda</h2>
                            <p align="justify">Si necesitas más información acerca de cómo agendarte, haz click en la siguiente imagen para ver el manual de agendamiento. </p>
                            <!--<?php
                            echo CHtml::Link(CHtml::button('Ver Mas >>', array('class' => 'btn btn-primary btn-large')), array('site/metodologia')
                            );
                            ?>-->
                            <center>

                                <!--
                                <a  target="_blank" href="<?php //echo Yii::app()->request->baseUrl."/download/Registrodeparticipantes.pdf";  ?>">
                                        <IMG  src="<?php //echo Yii::app()->request->baseUrl."/images/icons/bajar.png";  ?> " width='60' height='60' > 
                                <br>
                        
                                 Manual de inscripción
                                
                                </a>
                                </center>
                                -->

                                <center>
                                    <br>
                                    <br>
                                    <a  target="_blank" href="<?php echo Yii::app()->request->baseUrl . "/download/AsignacióndeCitas.pdf"; ?>">
                                        <IMG  src="<?php echo Yii::app()->request->baseUrl . "/images/icons/bajar.png"; ?> " width='60' height='60' > 
                                        <br>

                                        Manual de agendamiento
                                        <!--Pr&oacute;ximamente...-->
                                    </a>
                                </center>

                                <br><br><br>
                                </div>
                                </div>
                                </div>	
                                </div>
                                </div>
                                </div>

                                <div class="container">
                                    <!-- Main hero unit for a primary marketing message or call to action -->


                                    <!-- Example row of columns -->
                                    <div class="row">
                                        <div class="span6">
                                            <div class="hero-unit shadows">
                                                <h3>Descripción:</h3>
                                                <p align="justify">La Rueda de Negocios, es una iniciativa de la Unidad de Emprendimiento del SENA, Tecnoparque, Comfenalco y Fenalco Antioquia , con el fin de crear una red de contactos que posibilite a los empresarios de la micro y pequeña empresa, realizar encuentros personales, para desarrollar negocios y alianzas, con la finalidad de obtener beneficios conjuntos.</p>

                                            </div>
                                        </div>
                                        <div class="span6">
                                            <div class="hero-unit shadows">
                                                <h2>Objetivos</h2>
                                                <p align="justify">Contribuir a la generación de contactos facilitando oportunidades de negocios a empresarios que son atendidos por los diferentes programas de Fortalecimiento empresarial de los Aliados</p>
                                                <!--<?php
                                                echo CHtml::Link(CHtml::button('Ver Mas >>', array('class' => 'btn btn-primary btn-large')), array('site/metodologia')
                                                );
                                                ?>-->
                                                <br>
                                                <br>
                                                <br>

                                            </div>
                                        </div>

                                    </div>
                                    <br><br>
                                    <div class="container">



                                        <div class="row"> 



                                            <div class="span3"><h2> Organiza</h2><?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/icons/logo_emprendimiento.jpg', "", array('width' => 250));
                                                ;?></div>
                                                <div class="span3"><h2>Aliados</h2> <br><br><?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/icons/tecnoParq.png', "", array('width' => 250));
                                                echo "&nbsp;&nbsp;&nbsp;";
                                                ?></div>
                                                <div class="span3"> <br><br><br><?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/icons/confenalco.png', "", array('width' => 150));
                                                    echo "&nbsp;&nbsp;&nbsp;";
                                                ?></div>
                                                <div class="span3"><br><br><?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/icons/FENALCO.png', "", array('width' => 150)); ?></div>


                                         		

                                        </div>
                                         <div class="row">
                                    

                                    		
                                        <div class="span6"><h2>Desarrolla</h2><br><a href="http://factorymed.hol.es/" TARGET="_blank" style="color:#0000FF;text-align:left "><?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/icons/logo fabrica de software.png', "", array('width' => 250));
                                                    echo "&nbsp;";
                                                ?></a>	</div>


                                   

                                 

                                    
                                        <div class="span3"><h3>Apoyo Tecnológico</h3><br><a href="http://www.alternativascreativas.com/" TARGET="_blank" style="color:#0000FF;text-align:left "><?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/icons/alternativascreativas.png', "Su aliado Tecnológico", array('width' => 250));
                                                    echo "&nbsp;&nbsp;&nbsp;";
                                                ?></div>

                                    
                                </div><br><br>

                                    </div>
                                    
                               
                                </div>
     
                              
                      



                  