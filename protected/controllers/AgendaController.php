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
//Este es el criterial para las citas del participante
	$cp = new CDbCriteria;
	$cp->condition="registro_idEmp1= :a or registro_idEmp2  = :a ";
	$cp->params=array(":a"=>3);//buscar metodo para capturar el id del registro que pertenece al usuario que tiene la seccion

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
	$horaini;
	$horafin;
	$duracion;
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
//Este es el criterial para las citas del participante

	
	$cp = new CDbCriteria;
	$cp->condition="registro_idEmp1= :a or registro_idEmp2  = :a or registro_idEmp1= :b or registro_idEmp2  = :b";
	$cp->params=array(":a"=>$id,":b"=>1);//buscar metodo para capturar el id del registro del usuario y la empresa a citar

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
	$horaini;
	$horafin;
	$duracion;
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

/*
 foreach ($tabla as $i) {
 	print_r("<br>");
 	print($i['rueda_descripcion']);
	 }
	print_r("<br>");
	echo "<br />".date("Y-m-d ", time());

*/
//$a=A::model->findAll($c);


		
	$this->render('consulta',array('horario'=>$horario,'hDiponible'=>$hDiponible,'id'=>$id));

}
public function actionCitar($mensaje,$id){

print_r($mensaje);
print_r("<br>");
print_r($id);
$criteriohisto = new CDbCriteria;

$criteriohisto->condition="histo_horainic= :a";
$criteriohisto->params=array(":a"=>$mensaje);


$historia=TblHistorico::model()->findAll($criteriohisto);

$nodisponible=array();
	 foreach($historia as $re){
        array_push($nodisponible,$re->attributes["mesa_id"]);
	
	}
	
	print_r("<br>");
//print_r(implode(",", $nodisponible));
	

$criteriomesa = new CDbCriteria;
$criteriomesa->condition='mesa_id  not  IN ('.implode(",",$nodisponible).')';
$mesas=TblMesa::model()->findAll($criteriomesa);

//print_r($mesas);
$mesadisponible=array();
foreach($mesas as $re){
        array_push($mesadisponible,$re->attributes["mesa_id"]);
	
	}
print_r($mesadisponible);

}

}

 ?>