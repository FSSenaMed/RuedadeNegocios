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
				'actions'=>array('index','view','Seleccion', 'Intermediary', 'Info', 'Inscripcion', 'Portafolio'),
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
	public function actionCreate($nit)
	{
		

		$model=new TblParticipante;
		$registrar = true;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblParticipante']))
		{	


			$model->attributes=$_POST['TblParticipante'];
			$Urlimage="error con url de la imagen";



			if(isset($_FILES) and $_FILES['TblParticipante']['error']['foto']==0){

				$uf = CUploadedFile::getInstance($model, 'foto');
                                
				$nombre=$model->parti_nombreempresa;

                ///$extencion = $uf->getExtensionName();

				$Urlimage="/images/".$nombre.".".$uf->getExtensionName();
				$uf->saveAs(Yii::getPathOfAlias('webroot').'/images/'.$nombre.".".$uf->getExtensionName());

				//Yii::app()->user->setFlash('imagen','/images/'.$uf->getName());
                                
                                $user = new RegistrationForm;
                                $profile=new Profile;
                                
                                $userinfo = array(                                    
                                    'RegistrationForm[username]username'=>$model->parti_nit,
                                    'RegistrationForm[password]'=>$model->password,
                                    'RegistrationForm[verifyPassword]'=>$model->canfir_passwor,
                                    'RegistrationForm[email]'=>$model->parti_email,
                                    'Profile[first_name]'=>$model->parti_nombreempresa,
                                    'Profile[last_name]'=>''
                                );
                                $user->attributes = $userinfo;
				
			}else{
				$Urlimage="/images/nologo.jpg";
				Yii::app()->user->setFlash('imagen','/images/nologo.jpg');
				}

	
			$model->attributes=$_POST['TblParticipante'];
			$model->parti_imagen=$Urlimage;

			      $message = null;
                        $numeroPartis = TblParticipante::model()->findAll();
                        
                        if(count($numeroPartis) + 1 > 113)
                        {
                                $model->parti_estado = 0;
                                 
                                $message = 'Inscripcion exitosa, pero lamentablemente para esta rueda de negocios los cupos se cerraron';
                                $message .= ', su usuario es '.$model->parti_nit;
                                $message .=' Su contraseña '.$model->password;

                                $registrar = false;

                        }       
                        else{
                                $model->parti_estado = 1;
                               
                                $message = 'Inscripcion exitosa, su usuario es '.$model->parti_nit;
                                $message .=' Su contraseña '.$model->password;
                                $message .=' Ingrese al siguiente enlace para para iniciar sesion  www.RuedadeNegocios.net/index.php?r=user/login';
                            }

		        if(!$this->Validar($model->parti_nombreempresa, $model->parti_email))
		        {

		        	//$model->mesa = 0;

	               if($model->save())
	               {
		                    $to=$model->parti_email;
		               	    $subject='Inscripción rueda de negocios';
                            
               	        if($registrar == true){
                           
	                    	  mail($to, $subject, $message);
							$registro = new TblRegistro;
					
							$registro->rueda_id = '1';
							$registro->parti_id = $model->part_id;
							$registro->save();

						$this->redirect(array('Portafolio/Intermediario','id'=>$model->part_id));
						} else
                                                          { 
                                                                  mail($to, $subject, $message);
                                                                  }
 
						$this->redirect(array('TblParticipante/Info'));
					
}
				}
			}
		$model->parti_nit = $nit;

		$this->render('create',array(
			'model'=>$model,
		));

		//$this->Validar('nombre'=>$model->parti_nombreempresa, 'correo'=>$model->parti_email);

	}

	public function Validar($nombre, $correo){
				$existe = false;

		$empresa = new CDbCriteria();
		$empresa->condition = 'parti_nombreempresa = :a';
		$empresa->params = array(':a' => $nombre);

		$mail = new CDbCriteria();
		$mail->condition = 'parti_email = :b';
		$mail->params = array(':b' => $correo);


		$emp = TblParticipante::model()->findAll($empresa);
		$mai = TblParticipante::model()->findAll($mail);

		if(count($emp) > 0){
			Yii::app()->user->setFlash('empresa', 'el nombre de empresa ya esta');
			$existe = true;
		}
		else if(count($emp) <= 0){

			$existe = false;

			if(count($mai) > 0){
				Yii::app()->user->setFlash('mail', 'el mail ya esta registrado');
				$existe = true;
			}
		}

		return $existe;		
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
			$Urlimage="/images/".$nombre.".".$uf->getExtensionName();
			$uf->saveAs(Yii::getPathOfAlias('webroot').'/images/'.$nombre.".".$uf->getExtensionName());

				Yii::app()->user->setFlash('imagen','/images/'.$uf->getName());
			
				
			}else{
				$model->attributes=$_POST['TblParticipante'];
				$Urlimage=$model->parti_imagen;
				Yii::app()->user->setFlash('imagen',$model->parti_imagen);
			}

			$model->attributes=$_POST['TblParticipante'];
			$model->parti_imagen=$Urlimage;

			//$model->mesa = '0';
                         $model->parti_estado = 0;
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
public function actionInfo(){
		$this->render('info');
	}


public function actionInscripcion(){
	$this->render('inscripcion');
}

public function actionPortafolio($cate, $id)
{
	$criteria = new CDbCriteria();
	$criteria->with= array(
	'idCategoria'=>array(
	'select' =>'cate_nombre',
		),
	);

	          $criteria->with = array(
	          'prodSector' => array(
	          'select' => 'sec_nombre', 
	 ), 
	);
	    		
	    		$criteria->compare('id_categoria', $cate);
	    		$criteria->compare('parti_id', $id);

	    $dataProvider=new CActiveDataProvider('TblProducto',array('criteria'=>$criteria));

	$this->render('partiPortafolio', array('dataProvider'=>$dataProvider, 'cate'=>$cate, 'id'=>$id));
}

}