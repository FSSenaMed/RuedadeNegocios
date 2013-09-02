<?php 
class AgendaController extends Controller{

	public function actionIndex(){
	$model= new TblRuedaNegocios;
		
	//$post=TblRuedaNegocios::model()->find('=:postID', array(':postID'=>10)
	
//Este es el criterial para el horario
	$c = new CDbCriteria;
	$c->condition="rueda_diaEvento=:a";
	$c->params=array(":a"=>"2013-08-28");//esta fecha varia dependiendo de dia del evento (cambiar a futuro)

	$registro=TblRuedaNegocios::model()->findAll($c);
//el siguiente criterial es para hallar el id del participante dependiendo de la sesion
$nit_user=Yii::app()->user->username;
	$cparti_id = new CDbCriteria;
	$cparti_id->select='part_id';
	$cparti_id->condition="parti_nit = :a";
	$cparti_id->params=array(":a"=>$nit_user);
	$id_parti=TblParticipante::model()->find($cparti_id);


	$cRegistro_id= new CDbCriteria;
	$cRegistro_id->select='registro_id';
	$cRegistro_id->condition="parti_id = :b";
	$cRegistro_id->params=array(":b"=>$id_parti['part_id']);
	$id_Registro=TblRegistro::model()->find($cRegistro_id);

//Este es el criterial para las citas del participante

	$cp = new CDbCriteria;
	$cp->condition="registro_idEmp1= :a or registro_idEmp2  = :a ";
	$cp->params=array(":a"=>$id_Registro['registro_id']);//buscar metodo para capturar el id del registro que pertenece al usuario que tiene la seccion

	$miAgenda=TblCita::model()->findAll($cp);
	$agendaMia=array();
 
	 foreach($miAgenda as $Age){
        array_push($agendaMia,$Age->attributes);
	}

	$hDiponible=array();
	$cont2=0;

	foreach ($agendaMia as $y) {

		$hDiponible[$cont2]=$y['cita_hora'];
		$cont2++;
		}

	$tabla=array();
	foreach($registro as $regis){
        array_push($tabla,$regis->attributes);
	}
	$horaini=0;
	$horafin=0;
	$duracion=0;
	foreach ($tabla as $i) {
	
		$horaini=$i['rueda_horinicio'];
		$horafin=$i['rueda_horfin'];
		$duracion=$i['rueda_tiempocita'];
		$introduccion=$i['rueda_tiempoinduccion'];
	}

	$fecini = explode(' ', $horaini);
	$yearini = explode('-', $fecini[0]);
	$hourini = explode(':', $fecini[1]);
	$timeini = mktime($hourini[0],$hourini[1],$hourini[2],$yearini[1],$yearini[2],$yearini[0]);
	//bloque de codigo para pasa a timestamp la variable fin
	$fecfin = explode(' ', $horafin);
	$yearfin = explode('-', $fecfin[0]);
	$hourfin = explode(':', $fecfin[1]);
	$timefin = mktime($hourfin[0],$hourfin[1],$hourfin[2],$yearfin[1],$yearfin[2],$yearfin[0]);

	//bloque de codigo para pasa a timestamp la variable fin
	$fecinduccion = explode(' ', $introduccion);
	$yearinduc = explode('-', $fecinduccion[0]);
	$hourinduc = explode(':', $fecinduccion[1]);
	$timeinduc = mktime($hourinduc[0],$hourinduc[1],$hourinduc[2]);

	

	$tiempo=explode(':',$duracion);
	$times=$tiempo[1]*60;
	$timeini=$timeini+(date('i',$timeinduc)*60);
	$dia=$timefin -$timeini;
	
	//$cant_cit=$dia/$times;
	$horario=array();
	$cont=0;
	while ($timeini<$timefin)
        {
            $horario[$cont]=$timeini;
            $timeini+=$times;
            $cont++;

        }


  /*  $cMesa = new TblHistorico;
    $cMesa->condition="mesa_id = :a";
    $cMesa->params=array(":a"=>'1');
*/
/*
 foreach ($tabla as $i) {
 	print_r("<br>");
 	print($i['rueda_descripcion']);
	 }
	print_r("<br>");
	echo "<br />".date("Y-m-d ", time());

*/
//$a=A::model->findAll($c);


		
	$this->render('index',array('horario'=>$horario,'hDiponible'=>$hDiponible));

	


	}
public function actionConsulta($id){
$model= new TblRuedaNegocios;
		
	//$post=TblRuedaNegocios::model()->find('=:postID', array(':postID'=>10)
	
//Este es el criterial para el horario
	$c = new CDbCriteria;
	$c->condition="rueda_diaEvento=:a";
	$c->params=array(":a"=>'2013-08-28');//esta fecha varia dependiendo de dia del evento (cambiar a futuro)

	$registro=TblRuedaNegocios::model()->findAll($c);

//el siguiente criterial es para hallar el id del participante dependiendo de la sesion
$nit_user=Yii::app()->user->username;
	$cparti_id = new CDbCriteria;
	$cparti_id->select='part_id';
	$cparti_id->condition="parti_nit = :a";
	$cparti_id->params=array(":a"=>$nit_user);
	$id_parti=TblParticipante::model()->find($cparti_id);


	$cRegistro_id= new CDbCriteria;
	$cRegistro_id->select='registro_id';
	$cRegistro_id->condition="parti_id = :b";
	$cRegistro_id->params=array(":b"=>$id_parti['part_id']);
	$id_Registro=TblRegistro::model()->find($cRegistro_id);

//Este es el criterial para las citas del participante


	
	$cp = new CDbCriteria;
	$cp->condition="registro_idEmp1= :a or registro_idEmp2  = :a or registro_idEmp1= :b or registro_idEmp2  = :b";
	$cp->params=array(":a"=>$id,":b"=>$id_Registro['registro_id']);//buscar metodo para capturar el id del registro del usuario y la empresa a citar

	$miAgenda=TblCita::model()->findAll($cp);
	$agendaMia=array();
 
	 foreach($miAgenda as $Age){
        array_push($agendaMia,$Age->attributes);
	}

	$hDiponible=array();
	$cont2=0;

	foreach ($agendaMia as $y) {

		$hDiponible[$cont2]=$y['cita_hora'];
		$cont2++;
		}

	$tabla=array();
	foreach($registro as $regis){
        array_push($tabla,$regis->attributes);
	}
	$horaini=0;
	$horafin=0;
	$duracion=0;
	foreach ($tabla as $i) {
	
		$horaini=$i['rueda_horinicio'];

		$horafin=$i['rueda_horfin'];
		$duracion=$i['rueda_tiempocita'];
		$introduccion=$i['rueda_tiempoinduccion'];
	}

	$fecini = explode(' ', $horaini);
	$yearini = explode('-', $fecini[0]);
	$hourini = explode(':', $fecini[1]);
	$timeini = mktime($hourini[0],$hourini[1],$hourini[2],$yearini[1],$yearini[2],$yearini[0]);
	//bloque de codigo para pasa a timestamp la variable fin
	$fecfin = explode(' ', $horafin);
	$yearfin = explode('-', $fecfin[0]);
	$hourfin = explode(':', $fecfin[1]);
	$timefin = mktime($hourfin[0],$hourfin[1],$hourfin[2],$yearfin[1],$yearfin[2],$yearfin[0]);

	//bloque de codigo para pasa a timestamp la variable fin
	$fecinduccion = explode(' ', $introduccion);
	$yearinduc = explode('-', $fecinduccion[0]);
	$hourinduc = explode(':', $fecinduccion[1]);
	$timeinduc = mktime($hourinduc[0],$hourinduc[1],$hourinduc[2]);

	

	$tiempo=explode(':',$duracion);
	$times=$tiempo[1]*60;
	$timeini=$timeini+(date('i',$timeinduc)*60);
	$dia=$timefin -$timeini;
	
	//$cant_cit=$dia/$times;
	$horario=array();
	$cont=0;
	while ($timeini<$timefin)
    {
     	$horario[$cont]=$timeini;
    	$timeini+=$times;
    	$cont++;
    
    }


		
	$this->render('consulta',array('horario'=>$horario,'hDiponible'=>$hDiponible,'id'=>$id));

}
public function actionCitar($mensaje,$id){

$nit_user=Yii::app()->user->username;
	$cparti_id = new CDbCriteria;
	$cparti_id->select='part_id';
	$cparti_id->condition="parti_nit = :a";
	$cparti_id->params=array(":a"=>$nit_user);
	$id_parti=TblParticipante::model()->find($cparti_id);
	
	$cparti_id_citado = new CDbCriteria;
	$cparti_id_citado->select='parti_id';
	$cparti_id_citado->condition="registro_id = :a";
	$cparti_id_citado->params=array(":a"=>$id);
	$id_parti_citado=TblRegistro::model()->find($cparti_id_citado);


	$cRegistro_id= new CDbCriteria;
	$cRegistro_id->select='registro_id';
	$cRegistro_id->condition="parti_id = :b";
	$cRegistro_id->params=array(":b"=>$id_parti['part_id']);
	$id_Registro=TblRegistro::model()->find($cRegistro_id);


$mesa_user = $this->findTable($id_parti['part_id']);
$mesa_citado = $this->findTable($id_parti_citado['parti_id']);
/*
echo "mesa1:".$mesa_user;
echo "<br>";
echo "mesa2:" .$mesa_citado;
*/

if($mesa_user!="0"  &&  $mesa_citado !="0")
{

Yii::app()->user->setFlash('Mesa fija',' ambos participantes tiene mesa fija');
$this->redirect(Yii::app()->createUrl('Agenda/consulta',array('id'=>$id)));
 

}



if($mesa_user=="0"  &&  $mesa_citado =="0")
{
	$nodisponible=$this->findNotAvailable($mensaje);
	$mesasNoDisponibles= null;

        echo $mesasNoDisponibles;

	if($nodisponible == null)
	{
		$mesasNoDisponibles = $this->findStaticTable();
	}else{
		$mesasNoDisponibles = $nodisponible.",".$this->findStaticTable();
	}

	$criteriomesa = new CDbCriteria;
	$criteriomesa->condition='mesa_id  not  IN ('.$mesasNoDisponibles.')';
	$mesas=TblMesa::model()->findAll($criteriomesa);
	//print_r($mesas);
	$mesadisponible=array();
	foreach($mesas as $re){
	      array_push($mesadisponible,$re->attributes["mesa_id"]);
		
	}

if(count($mesadisponible)== 0)
{
Yii::app()->user->setFlash('Mesas','Este flash es para la mesas ocupadas');

$this->redirect(Yii::app()->createUrl('Agenda/consulta',array('id'=>$id)));
}
else
{


$modelo = new TblHistorico();
$modelo->histo_horainic = $mensaje;
$modelo->mesa_id = $mesadisponible[0];


		if($modelo->save())
			{
				//echo "si";
				//echo '<br>'.$modelo->histo_id.' id del registro';
				$modelCitas = new TblCita();
				$modelCitas->cita_hora = $mensaje;
				$modelCitas->registro_idEmp1 = $id_Registro['registro_id'];
				$modelCitas->registro_idEmp2 = $id;
				$modelCitas->historico = $modelo->histo_id;
				$modelCitas->save();

			Yii::app()->user->setFlash('Cita Exitosa','Este flash es para la cita satisfactoria');
		
			$this->redirect(Yii::app()->createUrl('portafolio/index'));

							}
}


}


// tercera condicion

if($mesa_user == "0" && $mesa_citado != '0')
{

	$criterial_m = new CDbCriteria;
	$criterial_m->select='mesa_id';
	$criterial_m->condition = 'mesa_numero = :a';
	$criterial_m->params = array(':a'=>$mesa_citado);
	$criterios_m=TblMesa::model()->find($criterial_m);

	$criterial_h = new CDbCriteria;
	$criterial_h->select='histo_id';
	$criterial_h->condition = 'mesa_id = :a and histo_horainic= :b';
	$criterial_h->params = array(':a'=>$criterios_m['mesa_id'],':b'=>$mensaje);
	$criterios_h=TblHistorico::model()->findAll($criterial_h);
	
	$mesadisponible=array();
	foreach($criterios_h as $re){
	      array_push($mesadisponible,$re->attributes['histo_id']);
		
	}
	if(count($mesadisponible)==0)
	{
		
		$modelo = new TblHistorico();
$modelo->histo_horainic = $mensaje;
$modelo->mesa_id = $mesa_citado;


		if($modelo->save())
			{
				//echo "si";
				//echo '<br>'.$modelo->histo_id.' id del registro';
				$modelCitas = new TblCita();
				$modelCitas->cita_hora = $mensaje;
				$modelCitas->registro_idEmp1 = $id_Registro['registro_id'];
				$modelCitas->registro_idEmp2 = $id;
				$modelCitas->historico = $modelo->histo_id;
				$modelCitas->save();

			Yii::app()->user->setFlash('Cita Exitosa','Este flash es para la cita satisfactoria');
		
			$this->redirect(Yii::app()->createUrl('portafolio/index'));

							}

	
	}else
	{
		Yii::app()->user->setFlash('Mesas','Este flash es para la mesas ocupadas');

$this->redirect(Yii::app()->createUrl('Agenda/consulta',array('id'=>$id)));
		
	}



}
// cuarta condicion
if($mesa_user != "0" && $mesa_citado == '0')
{



$criterial_m = new CDbCriteria;
	$criterial_m->select='mesa_id';
	$criterial_m->condition = 'mesa_numero = :a';
	$criterial_m->params = array(':a'=>$mesa_user);
	$criterios_m=TblMesa::model()->find($criterial_m);

	$criterial_h = new CDbCriteria;
	$criterial_h->select='histo_id';
	$criterial_h->condition = 'mesa_id = :a and histo_horainic= :b';
	$criterial_h->params = array(':a'=>$criterios_m['mesa_id'],':b'=>$mensaje);
	$criterios_h=TblHistorico::model()->findAll($criterial_h);
	
	$mesadisponible=array();
	foreach($criterios_h as $re){
	      array_push($mesadisponible,$re->attributes['histo_id']);
		
	}
	if(count($mesadisponible)==0)
	{
		
		$modelo = new TblHistorico();
$modelo->histo_horainic = $mensaje;
$modelo->mesa_id = $mesa_user;


		if($modelo->save())
			{
				//echo "si";
				//echo '<br>'.$modelo->histo_id.' id del registro';
				$modelCitas = new TblCita();
				$modelCitas->cita_hora = $mensaje;
				$modelCitas->registro_idEmp1 = $id_Registro['registro_id'];
				$modelCitas->registro_idEmp2 = $id;
				$modelCitas->historico = $modelo->histo_id;
				$modelCitas->save();

			Yii::app()->user->setFlash('Cita Exitosa','Este flash es para la cita satisfactoria');
		
			$this->redirect(Yii::app()->createUrl('portafolio/index'));

							}

	
	}else
	{
		Yii::app()->user->setFlash('Mesas','Este flash es para la mesas ocupadas');

$this->redirect(Yii::app()->createUrl('Agenda/consulta',array('id'=>$id)));
		
	}



}




}




public function findTable($id)
{
	$criterial = new CDbCriteria;
	$criterial->select='mesa';
	$criterial->condition="part_id = :a";
	$criterial->params=array(":a"=>$id);
	$mesa=TblParticipante::model()->find($criterial);

	return $mesa['mesa'];
}

//encontrar mesas no disponibles a un hora (explotado)
public function findNotAvailable($hora)
{
	$criteriohisto = new CDbCriteria;

	$criteriohisto->condition="histo_horainic= :a";
	$criteriohisto->params=array(":a"=>$hora);


	$historia=TblHistorico::model()->findAll($criteriohisto);

	$nodisponible=array();
	 foreach($historia as $re){
        array_push($nodisponible,$re->attributes["mesa_id"]);
	
	}

	$explotado=implode(",",$nodisponible);
	return $explotado;

	
}

//encontrar mesas fijas
public function findStaticTable()
{
$criterial = new CDbCriteria;
$criterial->select='mesa';
$criterial->condition='mesa !=0';
$mesa=TblParticipante::model()->findAll($criterial);


$nodisponible=array();
	 foreach($mesa as $re){
        array_push($nodisponible,$re->attributes["mesa"]);
	
	}

	$explotado=implode(",",$nodisponible);
	return $explotado;

}
public static function nombreMesa($hora)
{

$nit_user=Yii::app()->user->username;
	$cparti_id = new CDbCriteria;
	$cparti_id->select='part_id';
	$cparti_id->condition="parti_nit = :a";
	$cparti_id->params=array(":a"=>$nit_user);
	$id_parti=TblParticipante::model()->find($cparti_id);


	$cRegistro_id= new CDbCriteria;
	$cRegistro_id->select='registro_id';
	$cRegistro_id->condition="parti_id = :b";
	$cRegistro_id->params=array(":b"=>$id_parti['part_id']);
	$id_Registro=TblRegistro::model()->find($cRegistro_id);

	$cHistorico_id = new CDbCriteria;
	$cHistorico_id ->select='historico';
	$cHistorico_id ->condition="cita_hora = :a and (registro_idEmp1 = :b or registro_idEmp2= :b)";
	$cHistorico_id ->params=array(":a"=>$hora,":b"=>$id_Registro['registro_id']);
	$id_Historico=TblCita::model()->find($cHistorico_id);

	$cMesa_id = new CDbCriteria;
	$cMesa_id->select='mesa_id';
	$cMesa_id->condition="histo_id= :a";
	$cMesa_id->params=array(":a"=>$id_Historico['historico']);
	$id_Mesa=TblHistorico::model()->find($cMesa_id);

	$cMesa_numero = new CDbCriteria;
	$cMesa_numero->select='mesa_numero';
	$cMesa_numero->condition='mesa_id = :a';
	$cMesa_numero->params=array(":a"=>$id_Mesa['mesa_id']);
	$Numero_mesa=TblMesa::model()->find($cMesa_numero);
	return $Numero_mesa['mesa_numero'];


}

public function nombreEmpresa($hora)
{
$nit_user=Yii::app()->user->username;
	$cparti_id = new CDbCriteria;
	$cparti_id->select='part_id';
	$cparti_id->condition="parti_nit = :a";
	$cparti_id->params=array(":a"=>$nit_user);
	$id_parti=TblParticipante::model()->find($cparti_id);


	$cRegistro_id= new CDbCriteria;
	$cRegistro_id->select='registro_id';
	$cRegistro_id->condition="parti_id = :b";
	$cRegistro_id->params=array(":b"=>$id_parti['part_id']);
	$id_Registro=TblRegistro::model()->find($cRegistro_id);

	$cHistorico_id = new CDbCriteria;
	$cHistorico_id ->select='historico';
	$cHistorico_id ->condition="cita_hora = :a and (registro_idEmp1 = :b or registro_idEmp2= :b)";
	$cHistorico_id ->params=array(":a"=>$hora,":b"=>$id_Registro['registro_id']);
	$id_Historico=TblCita::model()->find($cHistorico_id);



	$cEmpleado1_id = new CDbCriteria;
	$cEmpleado1_id ->select='registro_idEmp1';
	$cEmpleado1_id ->condition="cita_hora = :a and registro_idEmp1 = :b";
	$cEmpleado1_id ->params=array(":a"=>$hora,":b"=>$id_Registro['registro_id']);
	$Empleado1=TblCita::model()->find($cEmpleado1_id);
	$empleado;
if($Empleado1['registro_idEmp1']==null){
	$cEmpleado1_id = new CDbCriteria;
	$cEmpleado1_id ->select='registro_idEmp1';
	$cEmpleado1_id ->condition="cita_hora = :a and historico= :b";
	$cEmpleado1_id ->params=array(":a"=>$hora,":b"=>$id_Historico['historico']);
	$Empleado1=TblCita::model()->find($cEmpleado1_id);

 $empleado=$Empleado1['registro_idEmp1'];
	}
	
else{
	$cEmpleado2_id = new CDbCriteria;
	$cEmpleado2_id ->select='registro_idEmp2';
	$cEmpleado2_id ->condition="cita_hora = :a  and  historico = :b";
	$cEmpleado2_id ->params=array(":a"=>$hora,":b"=>$id_Historico['historico']);
	$Empleado2=TblCita::model()->find($cEmpleado2_id);
	$empleado=$Empleado2['registro_idEmp2'];
	}

	$cParticipante_id= new CDbCriteria;
	$cParticipante_id ->select='parti_id';
	$cParticipante_id->condition='registro_id = :a';
	$cParticipante_id->params=array(":a"=>$empleado);
	$Participante_citado=TblRegistro::model()->find($cParticipante_id); 


	$cParticipante_nombre = new CDbCriteria;
	$cParticipante_nombre->select="parti_nombreempresa";
	$cParticipante_nombre->condition="part_id = :a";
	$cParticipante_nombre->params=array(":a"=>$Participante_citado['parti_id']);
	$nombre_Emplesarial=TblParticipante::model()->find($cParticipante_nombre);


	return 	$nombre_Emplesarial['parti_nombreempresa'];
	
	





}




}

 ?>