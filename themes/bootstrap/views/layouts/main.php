<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php 
	if(isset(Yii::app()->user->username)){
		$nit_user=Yii::app()->user->username;
		$cparti_id = new CDbCriteria;
		$cparti_id->select='part_id';
		$cparti_id->condition="parti_nit = :a";
		$cparti_id->params=array(":a"=>$nit_user);
		$id_parti=TblParticipante::model()->find($cparti_id);
		$id_parti['part_id'];
		

		$cRegistro_id= new CDbCriteria;
		$cRegistro_id->select='registro_id';
		$cRegistro_id->condition="parti_id = :b";
		$cRegistro_id->params=array(":b"=>$id_parti['part_id']);
		$id_Registro=TblRegistro::model()->find($cRegistro_id);
 
 

	}else{
		$id_parti['part_id'] = -1;
		$id_Registro['registro_id']=null;
	}





$this->widget('bootstrap.widgets.TbNavbar',array(

'brand'=>"<img src = '".Yii::app()->request->baseUrl."/images/icons/logo.png'> Rueda de negocios", 

    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
				//array('label'=>'Home', 'url'=>array('/site/index')),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contáctenos', 'url'=>array('/site/contact')),
				array('label'=>'Participante', 'url'=>'#', 'visible'=>Yii::app()->getModule('user')->isAdmin(),'items'=>array(
array('label'=>'Administrar', 'url'=>Yii::app()->request->baseUrl."/index.php?r=tblParticipante/admin",'visible'=>Yii::app()->getModule('user')->isAdmin()),
    
                )),

 	array('label'=>'Usuario', 'url'=>'#', 'visible'=>Yii::app()->getModule('user')->isAdmin(),'items'=>array(
                    array('label'=>'Administrar', 'url'=>array('/user/admin'),'visible'=>Yii::app()->getModule('user')->isAdmin()),
    
                )),

               // array('label'=>'Portafolio','url'=>array('/portafolio/intermediario'),'visible'=>!Yii::app()->user->isGuest),
           
 array('label'=>'Portafolio','url'=>array('/portafolio/intermediario','id'=>$id_parti['part_id']),'visible'=>(!Yii::app()->user->isGuest && !(is_null($id_Registro['registro_id'])))),




//array('label'=>'Participante', 'url'=>array('/tblParticipante/index'), 'visible'=>Yii::app()->getModule('user')->isAdmin()),


array('label'=>'Mi Agenda', 'url'=>array('/Agenda/index'),'visible'=>(!Yii::app()->user->isGuest && !Yii::app()->getModule('user')->isAdmin() )),//'visible'=>!Yii::app()->user->isGuest--

array('label'=>'Buscar productos', 'url'=>array('/Portafolio/index'),'visible'=>(!Yii::app()->user->isGuest) && !(is_null($id_Registro['registro_id'])) ),                              
 array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
	   

  array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->getModule('user')->isAdmin()),
	            array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>(!Yii::app()->user->isGuest && Yii::app()->getModule('user')->isAdmin())),

	            

	            array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
				
				//array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				//array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>


</div><!-- page -->

</body>
</html>