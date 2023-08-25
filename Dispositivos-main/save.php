<?php

include('db.php');

if (isset($_POST['save'])){
    $dispositivo = $_POST['dispositivo'];
    $modelo = $_POST['modelo'];
    $serie = $_POST['serie'];

    $query = "INSERT INTO objetos( dispositivo, modelo, serie) VALUES ('$dispositivo', '$modelo', '$serie')";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("Query Failed");
    }

    $_SESSION['message'] = 'Dispositivo Save Succefully';
    $_SESSION['message_type'] = 'success';
    
    header("location: index.php");

}