<?php

  session_start();

  $id_user =  $_SESSION["user"];
  
  $response = array();

  if( isset($_POST["titulo"]) && isset($_POST["start_date"]) && isset($_POST["allDay"])){

    $titulo     =   $_POST["titulo"];
    $start_date =   $_POST["start_date"];
    $allDay     =   $_POST["allDay"];

    if ( $titulo != "" &&  $start_date != "") {
      include 'db/conection.php';
      if($allDay == "true") //??
        $query ="INSERT INTO evento (id_usuario,titulo,fecha_inicio,dia_completo) 
        VALUES ($id_user,'$titulo','$start_date',TRUE)";
      else {
        $end_date   = $_POST["end_date"]; 
        $end_hour   = $_POST["end_hour"]; 
        $start_hour = $_POST["start_hour"]; 
        
        $query ="INSERT INTO evento (id_usuario,titulo,fecha_inicio,hora_inicio,fecha_fin,hora_fin,dia_completo) 
        VALUES ($id_user,'$titulo','$start_date','$start_hour','$end_date','$end_hour',FALSE)";
      }
      if ($mysqli->query($query)) {
        $response['msg'] =   "OK" ;
        $response['id'] = $mysqli->insert_id;
      }else 
        $response['msg'] = "No se pudo agregar..";
    }else 
      $response['msg'] = "Es necesario el nombre del evento asi como la fecha de inicio.";
  }else 
    $response['msg'] = "Los datos no están completos.";

  echo json_encode($response);
?>