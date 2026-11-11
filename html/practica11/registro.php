<?php include 'conexion.php';

$mensaje = "";
$tipoAlerta = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $autor  = trim($_POST['autor'] ?? '');
    $titulo = trim($_POST['titulo'] ?? '');
    $fecha  = $_POST['fecha'] ?? '';

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagenBinaria = file_get_contents($_FILES['imagen']['tmp_name']);

        $stmt = $conn->prepare("INSERT INTO libros (autor, titulo, fecha, imagen) VALUES (?, ?, ?, ?)");
        $null = NULL;
        $stmt->bind_param("sssb", $autor, $titulo, $fecha, $null);
        $stmt->send_long_data(3, $imagenBinaria);

        if ($stmt->execute()) {
            $mensaje = "El libro se registró correctamente en la base de datos.";
            $tipoAlerta = "success";
        } else {
            $mensaje = "Error al guardar el libro: " . $stmt->error;
            $tipoAlerta = "danger";
        }
        $stmt->close();
    } else {
        $mensaje = "Selecciona una imagen de portada válida.";
        $tipoAlerta = "warning";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería - Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <?php include 'navbar.php'; ?>

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0 shadow rounded-3">
                    <div class="card-header bg-primary text-white py-3">
                        <h4 class="mb-0 fw-bold">Registrar Nuevo Libro</h4>
                    </div>
                    <div class="card-body p-4">

                        <?php if ($mensaje !== ""): ?>
                            <div class="alert alert-<?= $tipoAlerta ?> alert-dismissible fade show" role="alert">
                                <?= htmlspecialchars($mensaje) ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                            </div>
                        <?php endif; ?>

                        <form action="registro.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="titulo" class="form-label fw-semibold">Título del Libro</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" required>
                            </div>

                            <div class="mb-3">
                                <label for="autor" class="form-label fw-semibold">Autor</label>
                                <input type="text" class="form-control" id="autor" name="autor" required>
                            </div>

                            <div class="mb-3">
                                <label for="fecha" class="form-label fw-semibold">Fecha de Publicación</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" required>
                            </div>

                            <div class="mb-4">
                                <label for="imagen" class="form-label fw-semibold">Imagen de Portada</label>
                                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">Guardar Libro</button>
                                <a href="consulta.php" class="btn btn-outline-secondary">Ver Libros Registrados</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>