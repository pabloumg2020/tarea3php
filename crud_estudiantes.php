<?php
include 'datos_conexion.php';
$conexion = mysqli_connect($hostname, $userName, $userpass, $dbName);

if (!$conexion) {
  die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
}
$id_estudiante = $_POST['id_estudiante'];
$carne = $_POST['carne'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo_electronico = $_POST['correo_electronico'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$id_tipo_sangre = $_POST['id_tipo_sangre'];

if (isset($_POST['create'])) {
  $consulta =
    "INSERT INTO 
    estudiantes (
      carne, 
      nombres, 
      apellidos, 
      direccion, 
      telefono, 
      correo_electronico,
      id_tipo_sangre, 
      fecha_nacimiento
    ) VALUES (
      '$carne', 
      '$nombres',
      '$apellidos',
      '$direccion',
      '$telefono',
      '$correo_electronico',
      '$id_tipo_sangre', 
      '$fecha_nacimiento'
    )";

} elseif (isset($_POST['update'])) {
  $consulta =
    "UPDATE 
    estudiantes 
  SET 
    carne='$carne', 
    nombres='$nombres', 
    apellidos='$apellidos', 
    direccion='$direccion', 
    telefono='$telefono', 
    correo_electronico='$correo_electronico',
    id_tipo_sangre=$id_tipo_sangre, 
    fecha_nacimiento='$fecha_nacimiento' 
  WHERE 
    id_estudiante=$id_estudiante";

 
} elseif (isset($_POST['delete'])) {
  $consulta = "DELETE FROM  estudiantes WHERE id_estudiante=$id_estudiante";
}

if (mysqli_query($conexion, $consulta)) {

  header("Location: index.php");
  exit();
} else {

  echo "Error al guardar estudiante: " . mysqli_error($conexion);
}

?>