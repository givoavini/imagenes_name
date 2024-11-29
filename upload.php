<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreBase = $_POST['nombre'];

    // Obtener el año y el mes actual
    $anio = date('Y');
    $mes = date('F');
    $targetDir = "uploads/$anio/$mes/";

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $imagenes = $_FILES['imagenes'];

    foreach ($imagenes['name'] as $key => $nombreImagen) {
        if ($imagenes['error'][$key] !== UPLOAD_ERR_OK) {
            die("Error en la subida del archivo: " . $imagenes['error'][$key]);
        }

        $ext = pathinfo($nombreImagen, PATHINFO_EXTENSION);
        $contador = 1;
        $nuevoNombre = $nombreBase . "($contador)." . $ext;

        while (file_exists($targetDir . $nuevoNombre)) {
            $contador++;
            $nuevoNombre = $nombreBase . "($contador)." . $ext;
        }

        if (!move_uploaded_file($imagenes['tmp_name'][$key], $targetDir . $nuevoNombre)) {
            die("Error al mover el archivo.");
        }
    }

    // Redirigir a index.php con un parámetro de éxito
    header("Location: index.php?success=1");
    exit();
}
?>
