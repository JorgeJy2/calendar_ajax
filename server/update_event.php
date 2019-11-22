<?php
    
    session_start();
    $id         = $_POST["id"];
    $start_date = $_POST["start_date"];
    $end_hour   = $_POST["end_hour"];

    $response = array();

    if(isset($_SESSION["user"] )) { 
        $id_user = $_SESSION["user"];
        if($end_hour == "e")
            $query  = "UPDATE evento SET fecha_inicio ='$start_date' WHERE id = $id";
        else {
            $start_hour = $_POST["start_hour"];
            $end_date   = $_POST["end_date"];
            $query  = "UPDATE evento SET fecha_inicio ='$start_date',hora_inicio='$start_hour',fecha_fin='$end_date',hora_fin='$end_hour' WHERE id = $id";
        }
        include 'db/conection.php';
        $message = ($mysqli->query($query)) ? "OK": $query;
    }else 
        $message= "El usuario no existe";

    $response["msg"] = $message;
    echo json_encode($response);

?>