<?php
    if( isset($_POST["username"]) &&  isset($_POST["password"]) ) {
        include 'db/conection.php';
        $query = "SELECT id,nombre FROM usuario WHERE correo='{$_POST["username"]}' AND contrasenia='".sha1($_POST["password"])."'";
        $result = $mysqli->query($query);
        
        if($result->num_rows > 0){
            session_start();
            $message = "OK";
            //Get id user
            $row = $result->fetch_assoc();
            //save sesion var id_user
            $_SESSION["user"] = $row['id'];
        }
        else
            $message = "Datos de accesso incorrectos";
    }else 
        $message = "Usuario o contraseña incorrecta";

    $response=[ "msg" => $message ];

    echo json_encode($response);
?>