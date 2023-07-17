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
if(isset($_GET['id'])){

    $id=$_GET['id'];
    $sql="DELETE FROM tareas WHERE id=?";
    $sentencia=$conn->prepare($sql);
    $sentencia->execute([$id]);

}


$sql="SELECT * FROM tareas";
$registros=$conn->query($sql);



?>