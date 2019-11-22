<?php

    include 'db/conection.php';
    
    $new_users = [
        "jorge"=> [
            "name"  => "Antonio Jacobo",
            "email" => "jacobo@gmail.com",
            "birth" => "1998-10-31",
            "pass"  => "secret" ],
        "amanda"=> [
            "name"  => "Amanda Franco Uribe",
            "email" => "amanda@gmail.com",
            "birth" => "1998-06-13",
            "pass"  => "secret" ],
        "alma"=> [
            "name"  => "Alma resendiz",
            "email" => "alama@gmail.com",
            "birth" => "1998-10-10",
            "pass"  => "secret" ]
    ];

    foreach ($new_users as $user) {
        
        $query = "INSERT INTO usuario(correo,nombre,contrasenia,fecha_nacimiento) 
            VALUES ('{$user["email"]}',
                '{$user["name"]}', 
                '".sha1($user["pass"])."',
                '{$user["birth"]}')";
        
        if( $mysqli->query($query) ) 
            echo "Se agregó a: {$user["email"]} <br>";
        else 
            echo "No se pudo agregar a: {$user["email"]} <br>";        
    }
?>