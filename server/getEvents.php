<?php
    session_start();
    if(isset($_SESSION["user"] )) {
        include 'db/conection.php';
        
        $user =  $_SESSION["user"];
        
        $message = "OK";
        $query = "SELECT id,titulo,fecha_inicio,hora_inicio,fecha_fin,hora_fin,dia_completo FROM evento WHERE id_usuario=$user";
        $result = $mysqli->query($query);
         
        $response=array();
        $response["eventos"]=array();
        while($row = $result->fetch_assoc()) {
            $event = [
                // this object will be "parsed" into an Event Object
                "title"      => $row["titulo"], // a property!
                "id"         => $row["id"],
                "start"      => $row["fecha_inicio"]." ".$row["hora_inicio"], // a property!,
                "end"        => $row["fecha_fin"]." ".$row["hora_fin"],
                "allDay"     => ($row["dia_completo"] == 1) ? true: false
            ];
            array_push($response["eventos"], $event);
        }
    }else 
        $message =  "Usuario no encontrado";        
    
    $response['msg'] = $message;
    echo json_encode($response);

?>