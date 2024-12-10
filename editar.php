<?php
    include("conexion.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>EDITAR</title>
</head>
<body>
    <?php
        if (isset($_POST['enviar'])) {
            // Aquí entra cuando se presiona el botón de enviar
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $nocontrol = $_POST['nocontrol'];

            // Actualizar autos
            $sql = "UPDATE autos SET modelo='$nombre', nocontrol='$nocontrol' WHERE id='$id'";
            $resultado = mysqli_query($conexion, $sql);

            if ($resultado) {
                echo "<script language='javascript'>
                        alert('Los datos se actualizaron correctamente');
                        location.assign('index.php');
                      </script>";
            } else {
                echo "<script language='javascript'>
                        alert('Los datos NO se actualizaron correctamente');
                        location.assign('index.php');
                      </script>";
            }
            mysqli_close($conexion);

        } else {
            // Aquí entra si no se ha presionado el botón enviar
            $id = $_GET['id'];
            $sql = "SELECT * FROM autos WHERE id='$id'";
            $resultado = mysqli_query($conexion, $sql);

            $fila = mysqli_fetch_assoc($resultado);
            $nombre = $fila["modelo"];
            $nocontrol = $fila["nocontrol"];

            mysqli_close($conexion);
    ?>
    <h1>Editar Auto</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>"> <br>
        
        <label>No. Control:</label>
        <input type="text" name="nocontrol" value="<?php echo $nocontrol; ?>"> <br>

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <input type="submit" name="enviar" value="ACTUALIZAR">
        <a href="index.php">Regresar</a>
    </form>
    <?php
        }
    ?>
</body>
</html>
