<?php

try{
$conn= new PDO('mysql:host=localhost;dbname=apptodo','root','');
}catch(PDOException $e){
    echo "Error de coexión: ";
}

if(isset($_POST['agregar-tarea'])){

    $tarea=($_POST['tarea']);
    $sql='INSERT INTO tareas (tarea) VALUE(?)';
    $sentencia= $conn->prepare($sql);
    if ($sentencia->execute([$tarea])){
    }else{
        $errorInfo= $sentencia->errorInfo();
        echo "Error al insertar la tarea: " . $errorInfo[2];
    }
}

$sql="SELECT * FROM tareas";
$registros=$conn->query($sql);



?>