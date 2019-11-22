<?php
    $response = array() ;

    if(isset($_POST['id'])) {
        include 'db/conection.php';
        $id = $_POST['id'];
        $query = "DELETE FROM evento WHERE id =".$id;
        $response["msg"]  = ($mysqli->query($query)) ? "OK" : "No se pudo eliminar el evento.";
    }else 
        $response["msg"] = "El identificador de evento no fué recibido.";

    echo json_encode($response);

?>