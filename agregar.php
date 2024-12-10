<html>
<head>
    <title>AGREGAR</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <?php
       if (isset($_POST['enviar'])) {
           $nombre = $_POST['modelo'];
           $nocontrol = $_POST['nocontrol'];

           include("conexion.php");
           $sql = "INSERT INTO autos(modelo, nocontrol) VALUES('$nombre', '$nocontrol')";
           $resultado = mysqli_query($conexion, $sql);

           if ($resultado) {
               echo "<script language='JavaScript'> 
                        alert('Los datos fueron ingresados correctamente a la BD');
                        location.assign('index.php');
                     </script>";
           } else {
               echo "<script language='JavaScript'> 
                        alert('ERROR: Los datos NO fueron ingresados correctamente a la BD');
                        location.assign('index.php');
                     </script>";
           }
           mysqli_close($conexion);

       } else {
    ?>
    <h1>Agregar Nuevo Modelo</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label>Modelo:</label>
        <input type="text" name="modelo"> <br>
        <label>No. Control:</label>
        <input type="text" name="nocontrol"> <br>
        <input type="submit" name="enviar" value="AGREGAR">
        <a href="index.php">Regresar</a>
    </form>
    <?php
       }
    ?>
</body>
</html>