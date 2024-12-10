<?php
    $id=$_GET['id'];
    include("conexion.php");

    $sql="delete from modelo where id='".$id."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resueltado){
        echo  "<script lenguage='JavaScript'> alert('Los datos fueron ingresados correctamente a la BD');
            location.assign('index.php');
            </script>";
    }else{
        echo "<script lenguage='JavaScript'> alert('ERROR: Los datos NO fueron ingresados correctamente a la BD');
            location.assign('index.php');
            </script>";

    }
    ?>