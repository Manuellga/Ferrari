<!DOCTYPE html>
<html>
<head>
    <title>Login de Admin</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>

<?php
if (isset($_POST['enviar'])) {
    if (empty($_POST['nombre']) || empty($_POST['nocontrol'])) {
        echo "<script language='JavaScript'>
        alert('El nombre o el número de control no han sido ingresados');
        location.assign('login.php');
        </script>";
    } else {
        include("conexion.php");
        $nombre = $_POST['nombre'];
        $nocontrol = $_POST['nocontrol'];
        $sql = "SELECT * FROM autos WHERE nombre='$nombre' AND nocontrol='$nocontrol'";
        $resultado = mysqli_query($conexion, $sql);
        if ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<script language='JavaScript'>
            alert('Bienvenido');
            location.assign('index.php');
            </script>";
        } else {
            echo "<script language='JavaScript'>
            alert('El nombre o número de control son erróneos');
            location.assign('login.php');
            </script>";
        }
    }
} else {
?>

<center>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <br>
        <label>Nombre:</label>
        <input type="text" name="nombre"/>
        <br>
        <label>No. Control:</label>
        <input type="text" name="nocontrol"/>
        <br>
        <input type="submit" name="enviar" value="INGRESAR"/>
    </form>
</center>

<?php
}
?>

</body>
</html>
