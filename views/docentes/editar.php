<?php
require_once __DIR__ . "/../../config.php";
require_once __DIR__ . "/../../models/Docente.php";

$docenteModel = new Docente($conn);

$id = $_GET['id'];
$docente = $docenteModel->find($id);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Docente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Editar Docente</h2>
    <form method="POST" action="../../controllers/DocenteController.php">
        <input type="hidden" name="id" value="<?= $docente['id'] ?>">

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required value="<?= $docente['nombre'] ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Especialidad</label>
            <input type="text" name="especialidad" class="form-control" required value="<?= $docente['especialidad'] ?>">
        </div>

        <button type="submit" name="editar" class="btn btn-primary">Actualizar Docente</button>
        <a href="listar.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
