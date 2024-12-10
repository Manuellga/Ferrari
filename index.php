<?php
   include("conexion.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Autos</title>
    <script type="text/javascript">
        function confirmar(){
            return confirm('¿Estás seguro? Se eliminarán los datos.');
        }
    </script>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <tr>
                <th colspan="5"><h1>Lista de Autos</h1></th>
            </tr>
            <tr>
                <td>
                    <label>Modelo:</label>
                    <input type="text" name="nombre">
                </td>
                <td>
                    <label>No. Control:</label>
                    <input type="text" name="nocontrol">
                </td>
                <td>
                    <input type="submit" name="enviar" value="BUSCAR">
                </td>
                <td>
                    <a href="index.php">Mostrar Todos los Modelos</a>
                </td>
                <td>
                    <a href="agregar.php">Nuevo Modelo</a>
                </td>
            </tr>
        </table>
    </form>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nombre</th>
                <th>No. Control</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_POST['enviar'])) {
                
            $nombre = $_POST['nombre'];
            $nocontrol = $_POST['nocontrol'];

            if(empty($nombre) && empty($nocontrol)){
                echo "<script language='JavaScript'> 
                        alert('Ingresar el modelo o el número de control');
                        location.assign('index.php');
                     </script>";
            } else {
                if(empty($nombre)){
                  $sql = "SELECT * FROM autos WHERE nocontrol = '$nocontrol'";
                }
                if(empty($nocontrol)){
                    $sql = "SELECT * FROM autos WHERE modelo LIKE '%$nombre%'";
                }
                if(!empty($nombre) && !empty($nocontrol)){
                    $sql = "SELECT * FROM autos WHERE nocontrol = '$nocontrol' AND modelo LIKE '%$nombre%'";
                }
            }

            $resultado = mysqli_query($conexion, $sql);
            while ($filas = mysqli_fetch_assoc($resultado)){
            ?>
             <tr>
                <td><?php echo $filas['id']; ?></td>
                <td><?php echo $filas['modelo']; ?></td>
                <td><?php echo $filas['nocontrol']; ?></td>
                <td>
                    <?php echo "<a href='editar.php?id=" . $filas['id'] . "'>EDITAR</a>"; ?> -
                    <?php echo "<a href='eliminar.php?id=" . $filas['id'] . "' onclick='return confirmar()'>ELIMINAR</a>"; ?>
                </td>
            </tr>

            <?php
                }

            } else {
                $sql = "SELECT * FROM autos";
                $resultado = mysqli_query($conexion, $sql);
                while ($filas = mysqli_fetch_assoc($resultado)) {
            ?>
            <tr>
                <td><?php echo $filas['id']; ?></td>
                <td><?php echo $filas['modelo']; ?></td>
                <td><?php echo $filas['nocontrol']; ?></td>
                <td>
                    <?php echo "<a href='editar.php?id=" . $filas['id'] . "'>EDITAR</a>"; ?> -
                    <?php echo "<a href='eliminar.php?id=" . $filas['id'] . "' onclick='return confirmar()'>ELIMINAR</a>"; ?>
                </td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</body>
</html>