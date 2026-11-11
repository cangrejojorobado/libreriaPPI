<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <?php include 'navbar.php'; ?>

    <main class="container my-auto py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg rounded-3 p-4 p-md-5 text-center bg-white">
                    <div class="card-body">
                        <h1 class="display-5 fw-bold text-dark mb-3">Bienvenido a la Librería</h1>
                        <p class="lead text-secondary mb-4">
                            Sistema de gestión de libros, registre uno nuevo o consulte disponibilidad.
                        </p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                            <a href="registro.php" class="btn btn-primary btn-lg px-4">Registrar Nuevo Libro</a>
                            <a href="consulta.php" class="btn btn-outline-dark btn-lg px-4">Consultar Catálogo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>