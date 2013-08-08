<?php 

class PortafolioController extends Controller
{
	public function actionIndex()
	{
		$this->render('eleccion');
	}



   public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('agregar','id'=>$id, 'cate'=>$cate));
	}



	// renderizamos el intermediario
	public function actionIntermediario($id)
	{
		$this->render('intermediario',array('id'=>$id));
	}


	// recibe el id del usuario actual y guarda un nuevo producto relacionado con este usuario
	public function actionAgregar($id, $cate)
	{
            
             $criteria = new CDbCriteria();
                    $criteria->with = array(
                        'idCategoria' => array(
                            'select' => 'cate_nombre',
                            
                            
                        ),
//                        'condition'=>'idCategoria='.$cate,
//                        'partiSector' => array(
//                            'select'=> 'sec_nombre'
//                            NomSector
//                        ),
                            
                    );
                     $criteria->with = array(
                        'prodSector' => array(
                            'select' => 'sec_nombre',
                            
                            
                        ),
//                        'condition'=>'idCategoria='.$cate,
//                        'partiSector' => array(
//                            'select'=> 'sec_nombre'
//                            NomSector
//                        ),
                            
                    );
                    
                    $criteria->compare('parti_id', $id);
                      $criteria->compare('id_categoria', $cate);
            
            
            
		$categoria="";
		$model = new TblProducto;

		if($cate == '1')
		{
			$categoryId=TblCategoria::model()->findAll('cate_nombre = :nombre',array(':nombre'=>'Lo que vendo'));
			foreach ($categoryId as $c) 
			{
				$categoria=$c->cate_id;

			}

		}
		if($cate == '2')
		{
			$categoryId=TblCategoria::model()->findAll('cate_nombre = :nombre',array(':nombre'=>'Lo que compro'));
			foreach ($categoryId as $c) 
			{
				$categoria=$c->cate_id;
			}

		}

		// si no hay modelo por post renderiza a agregar
		if(!isset($_POST['TblProducto'])){
			
			$this->render('agregar',array('id'=>$id,'categoria'=>$categoria,'model'=>$model,  'dataProvider' => new CActiveDataProvider('TblProducto', array('criteria' => $criteria))));
			
		}
                
                
		if(isset($_POST['TblProducto']))
		{
                    echo 'nada';
				if($cate=='1')
				{
					$model = new TblProducto;
					$sectorParti = TblParticipante::model()->findByPk($id);
					$sector = $sectorParti->parti_sector;

					$model->attributes=$_POST['TblProducto'];
					$model->prod_sector=$sector;
					$model->parti_id=$id;
					$model->id_categoria=$categoria;
					
					if($model->save()){
					
					$this->redirect(array('agregar','id'=>$id, 'cate'=>$cate));
                                        }else{
                                            $this->render('agregar',array('id'=>$id,'categoria'=>$categoria,'model'=>$model,  'dataProvider' => new CActiveDataProvider('TblProducto', array('criteria' => $criteria))));
                                        }	
				}
				if($cate == '2')
				{

					$model = new TblProducto;

					$model->attributes=$_POST['TblProducto'];
					$model->parti_id=$id;
					$model->id_categoria=$categoria;
					
					if($model->save()){
					
					$this->redirect(array('agregar','id'=>$id, 'cate'=>$cate));
                                        
					}else{
                        $this->render('agregar',array('id'=>$id,'categoria'=>$categoria,'model'=>$model,  'dataProvider' => new CActiveDataProvider('TblProducto', array('criteria' => $criteria))));
                         }
				}		
		}


	}







	public function actionBuscar($cate)
	{
		// creo un modelo de producto para hacer el filtro con el campo prod_sector
		//y un criterio que va a cambiar dependiendo de los datos que se reciba por POST.
		$model = new TblProducto;
		$criteria = new CDbCriteria();
		
		// estos valores del criterio no cambian, aqui realizo la consulta con join
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
	    // verifico si hay datos por Post
		if(isset($_POST['TblProducto'])){
			
			$model->attributes=$_POST['TblProducto'];

			if($model->prod_sector != null){

		// si hay datos por POST  y el campo prod_sector es diferente de null, significa que 
		// selecciono un sector para buscar, entonces creo un criterio de busqueda						
					
			        $criteria->compare('prod_sector',$model->prod_sector);

				}			
		}

		$dataProvider=new CActiveDataProvider('TblProducto',array('criteria'=>$criteria));

		$this->render('index',array(
			'dataProvider'=>$dataProvider, 'model'=>$model,'cate'=>$cate,
		));

	}



	public function loadModel($id)
	{
		$model=TblProducto::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function loadParticipante($id)
	{
		$model = TblParticipante::model()->findByPk($id);
		if($model===null)
		throw new CHttpException(404,'No se pudo cargar participantes');
		return $model;
	}

	// consulta en la base de datos con el id del usuario actual y si no encuentra un registro no permite que este salga
	public function actionSalir($id)
	{
		$sql = 'select parti_id from tbl_producto WHERE parti_id='.$id;
		$lista = Yii::app()->db->createCommand($sql)->queryAll();

		if(count($lista)> 0)
		{
			$this->redirect(array('TblParticipante/view', 'id'=>$id));
		}else{
				Yii::app()->user->setFlash('salir','no puede salir sin ingresar al menos un producto');
				$this->redirect(array('intermediario','id'=>$id));
			}
	}

	public function actionConsultar($id)
	{
		$regis_id = null;

		$criterio = new CDbCriteria();
		$criterio->condition="rueda_id =:a and parti_id=:b";
		$criterio->params=array(':a'=>'1', ':b'=>$id);

		$model = TblRegistro::model()->findAll($criterio);

		$arr =  array();

		foreach ($model as $key) {

			array_push($arr, $key->attributes);

		}
		foreach ($arr as $key) {

			$regis_id = $key['registro_id'];
		}

		if($regis_id != null)
		{
			//echo $regis_id;
			$this->redirect(array('Agenda/consulta','id'=>$regis_id));
		}else
		{
			echo "no existe";
		}

	}


	public function actionView($id, $cate)
	{

		$this->render('view',array(
			'model'=>$this->loadParticipante($id), 'cate'=>$cate,
		));
		
	}

}
 ?>