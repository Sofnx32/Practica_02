<?php
require_once __DIR__ . "/../../config.php";
require_once __DIR__ . "/../../models/Docente.php";

$docenteModel = new Docente($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Docente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Crear Docente</h2>
    <form method="POST" action="../../controllers/DocenteController.php">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Especialidad</label>
            <input type="text" name="especialidad" class="form-control" placeholder="Especialidad" required>
        </div>
        <button type="submit" name="crear" class="btn btn-primary">Crear Docente</button>
        <a href="listar.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
