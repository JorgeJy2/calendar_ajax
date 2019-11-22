<?php
    $mysqli  = new mysqli('localhost','root','','agenda');

    if($mysqli -> connect_error) 
        die('Existe un error connect_errno:  '.$mysqli->connect_errno.' - '. $mysqli->connection_error);
    
    if(mysqli_connect_error())
        die('Existe un error mysqli_connect_error: '.$mysqli->connect_errno().' - '. $mysqli->connection_error());  
?>