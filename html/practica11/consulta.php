<?php include 'conexion.php';

$sql = "SELECT id, autor, titulo, fecha, imagen FROM libros ORDER BY id DESC";
$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <?php include 'navbar.php'; ?>

    <main class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Catálogo de Libros</h2>
            <a href="registro.php" class="btn btn-primary">+ Nuevo Libro</a>
        </div>

        <?php if ($resultado && $resultado->num_rows > 0): ?>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php while ($libro = $resultado->fetch_assoc()): ?>
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="ratio ratio-4x3 bg-secondary bg-opacity-10">
                                <img src="data:image/jpeg;base64,<?= base64_encode($libro['imagen']) ?>" 
                                     class="card-img-top object-fit-contain p-2" 
                                     alt="<?= htmlspecialchars($libro['titulo']) ?>">
                            </div>
                            <div class="card-body">
                                <span class="badge bg-dark mb-2">ID #<?= $libro['id'] ?></span>
                                <h5 class="card-title fw-bold"><?= htmlspecialchars($libro['titulo']) ?></h5>
                                <p class="card-text text-secondary mb-1">
                                    <strong>Autor:</strong> <?= htmlspecialchars($libro['autor']) ?>
                                </p>
                                <p class="card-text text-secondary mb-0">
                                    <strong>Publicación:</strong> <?= htmlspecialchars($libro['fecha']) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-info text-center py-4 shadow-sm" role="alert">
                <h5 class="alert-heading fw-bold">No hay libros registrados</h5>
            </div>
        <?php endif; ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>