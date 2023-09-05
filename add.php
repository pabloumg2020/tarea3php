<?php
$message = ""; 


?>
<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
  <form method="POST" action="crud_estudiantes.php">
    <?php echo $message; ?>
    <section>

      <input type="hidden" name="id_estudiante" id="id_estudiante">
      <div class="row mb-1">
        <label class="col-sm-4 col-form-label" for="carne">Carne:</label>
        <div class="col-sm-8">
          <input class="form-control" type="text" name="carne" pattern="E\d{3}" required><br>
        </div>
      </div>

      <div class="row mb-1">
        <label class="col-sm-4 col-form-label" for="nombres">Nombres:</label>
        <div class="col-sm-8">
          <input class="form-control" type="text" name="nombres" required><br>
        </div>
      </div>

      <div class="row mb-1">
        <label class="col-sm-4 col-form-label" for="apellidos">Apellidos:</label>
        <div class="col-sm-8">
          <input class="form-control" type="text" name="apellidos" required><br>
        </div>
      </div>

      <div class="row mb-1">
        <label class="col-sm-4 col-form-label" for="direccion">Direccion:</label>
        <div class="col-sm-8">
          <input class="form-control" type="text" name="direccion"><br>
        </div>
      </div>

      <div class="row mb-1">
        <label class="col-sm-4 col-form-label" for="telefono">Telefono:</label>
        <div class="col-sm-8">
          <input class="form-control" type="text" name="telefono"><br>
        </div>
      </div>

      <div class="row mb-1">
        <label class="col-sm-4 col-form-label" for="correo_electronico">Correo Electronico:</label>
        <div class="col-sm-8">
          <input class="form-control" type="email" name="correo_electronico"><br>
        </div>
      </div>

      <div class="row mb-1">
        <label class="col-sm-4 col-form-label" for="id_tipo_sangre">Tipo de Sangre:</label>
        <div class="col-sm-8">
          <select class="form-control" name="id_tipo_sangre">
            <?php
            include 'datos_conexion.php';

            $conexion = mysqli_connect($hostname, $userName, $userpass, $dbName);

            if (!$conexion) {
              die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM universidad.tipos_sangre";
            $result = mysqli_query($conexion, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
              echo '<option value="' . $row['id_tipo_sangre'] . '">' . $row['sangre'] . '</option>';
            }

            mysqli_close($conexion);
            ?>
          </select><br>
        </div>
      </div>

      <div class="row mb-1">
        <label class="col-sm-4 col-form-label" for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <div class="col-sm-8">
          <input class="form-control" type="date" name="fecha_nacimiento" required><br>
        </div>
      </div>

      <div id="space-for-button">
        <div class="d-grid gap-2">
          <button class="btn btn-primary" type="submit" name="create" value="true">Agregar</button>
        </div>
      </div>
    </section>
  </form>
</body>

</html>