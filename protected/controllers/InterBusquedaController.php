<?php 
class InterBusquedaController extends Controller
{

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionList($cate)
	{
		echo $cate;
		$model=new TblProducto();
		$this->render('list',array('category'=>$cate,'model'=>$model));
	}

	public function actionAjax()
{
   $this->renderPartial('list', array(), false, true);
}
}
 ?>