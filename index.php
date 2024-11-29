<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Imágenes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            background-color: #f8f9fa; /* Color de fondo suave */
        }
        .container {
            margin-top: 50px; /* Espaciado en la parte superior */
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: white; /* Fondo blanco para el formulario */
        }
        h1 {
            margin-bottom: 30px; /* Espaciado debajo del título */
        }
        .alert {
            position: relative;
            top: 20px; /* Eleva la alerta un poco */
            z-index: 1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Subir Imágenes</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre Base:</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="imagenes">Seleccionar Imágenes:</label>
                <input type="file" class="form-control-file" name="imagenes[]" multiple required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Subir Imágenes</button>
        </form>

        <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
            <div class="alert alert-success mt-3" id="alert">
                Imágenes subidas exitosamente.
            </div>
        <?php endif; ?>
    </div>
    
    <script src="js/scripts.js"></script>
    <script>
        // Cerrar la alerta después de 5 segundos
        setTimeout(function() {
            var alert = document.getElementById('alert');
            if (alert) {
                alert.style.display = 'none';
            }
        }, 5000);
    </script>
</body>
</html>
