<?php

class TblProductoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
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


	// agregue la accion listar, categoria
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','Log','listar', 'categoria'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$model=new TblProducto;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblProducto']))
		{
			$model->attributes=$_POST['TblProducto'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->prod_id));
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

		if(isset($_POST['TblProducto']))
		{
			$model->attributes=$_POST['TblProducto'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->prod_id));
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

	/**
	 * Lists all models.
	 */

	public function actionIndex()
	{
		
		$dataProvider=new CActiveDataProvider('TblProducto');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblProducto('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblProducto']))
			$model->attributes=$_GET['TblProducto'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TblProducto the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TblProducto::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TblProducto $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-producto-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionLog()
	{
		$model =  new TblParticipante;

		$this->render('log',array('model'=>$model));

		if(isset($_POST['TblParticipante'])){

			$model->attributes=$_POST['TblParticipante'];
			$id=$model->part_id;

			$this->redirect(array('InterBusqueda/index','id'=>$model->part_id));
		}
	}

	public function actionListar($cate)
	{	
		// sql
		$sql = 'select prod_producto, prod_sector, prod_descripcion, cate_nombre, sec_nombre
                    from tbl_producto p join tbl_categoria c on p.id_categoria = c.cate_id join tbl_sectoremp s on p.prod_sector = s.sec_id
                    where cate_id ='.$cate;

		$lista = Yii::app()->db->createCommand($sql)->queryAll();


		// busqueda por todos al cargar la pagina primera vez
		if(! isset($_POST['TblProducto'])){
			Yii::app()->user->setFlash('todos', 'buscar todos');
		}


		// el modelo debe crearse aqui
		$model = new TblProducto;
		
		// busqueda por todos o sector dependiendo del combobox
		if(isset($_POST['TblProducto']))
		{
			$model->attributes=$_POST['TblProducto'];
			if($model->prod_sector==null)
			{
				Yii::app()->user->setFlash('todos', 'buscar todos'); 
			}
			else{
				Yii::app()->user->setFlash('sector', 'buscar por sector'); 			
				}
		}

		$this->render('listar', array('model'=>$model,'id'=>$model->prod_sector, 'lista'=>$lista));
			 			
		
	}


	public function actionCategoria()
	{
		Yii::app()->user->setFlash('categoria','busqueda por categoria');
		$this->redirect(array('listar'));
	}

	public function actionAll()
	{

	}
	public function actionPorCategoria()
	{
		
	}

}
