<?php

class TblParticipanteController extends Controller
{
	
	public $layout='//layouts/column2';

	
                
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','Seleccion', 'Intermediary'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
$model=new TblParticipante;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblParticipante']))
		{	
			$Urlimage="no cayo";

			if(isset($_FILES) and $_FILES['TblParticipante']['error']['foto']==0){
			//if(isset($_POST['tbl-participante-form'])){

				$uf = CUploadedFile::getInstance($model, 'foto');
				$model->attributes=$_POST['TblParticipante'];

				

				$nombre=$model->parti_nombreempresa;
				$Urlimage="/images/".$nombre;

				$uf->saveAs(Yii::getPathOfAlias('webroot').'/images/'.$nombre);
				Yii::app()->user->setFlash('imagen','/images/'.$uf->getName());
			
				
			}else{
				$Urlimage="/images/nologo.jpg";
				Yii::app()->user->setFlash('imagen','/images/nologo.jpg');
			}

	
			$model->attributes=$_POST['TblParticipante'];
			$model->parti_imagen=$Urlimage;

			if($model->save())

				$registro = new TblRegistro;
				
				$registro->rueda_id = '1';
				$registro->parti_id = $model->part_id;
				$registro->save();

				$this->redirect(array('Portafolio/Intermediario','id'=>$model->part_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
			$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblParticipante']))
		{


			if(isset($_FILES) and $_FILES['TblParticipante']['error']['foto']==0){
			//if(isset($_POST['tbl-participante-form'])){

				$uf = CUploadedFile::getInstance($model, 'foto');
				$model->attributes=$_POST['TblParticipante'];

				

				$nombre=$model->parti_nombreempresa;
				$Urlimage="/images/".$nombre;

				$uf->saveAs(Yii::getPathOfAlias('webroot').'/images/'.$nombre);
				Yii::app()->user->setFlash('imagen','/images/'.$uf->getName());
			
				
			}else{
				$model->attributes=$_POST['TblParticipante'];
				$Urlimage=$model->parti_imagen;
				Yii::app()->user->setFlash('imagen',$model->parti_imagen);
			}

			$model->attributes=$_POST['TblParticipante'];
			$model->parti_imagen=$Urlimage;

			if($model->save())
				$this->redirect(array('view','id'=>$model->part_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	
        	private function selectdb(){
                DemoSetup::usar("combodependiente");}
                
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TblParticipante');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
        
        
   

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblParticipante('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblParticipante']))
			$model->attributes=$_GET['TblParticipante'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TblParticipante the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TblParticipante::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TblParticipante $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-participante-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        
 public function actionSeleccion()
 {
                    
         $id = $_POST['TblParticipante']['parti_departamento'];
          $lista = TblMunicipio::model()->findAll('dep_codigo = :id',array(':id'=>$id));
          $lista = CHtml::ListData($lista,'mun_id','mun_nombre');

          foreach($lista as $valor => $nombre)
          {
        	 echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($nombre), true);
          } 
     
 }

}
