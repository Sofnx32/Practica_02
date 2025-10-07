<?php
require_once __DIR__ . "/../../config.php";
require_once __DIR__ . "/../../models/Docente.php";

$docenteModel = new Docente($conn);
$docentes = $docenteModel->all();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Docentes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Lista de Docentes</h2>
    <a href="crear.php" class="btn btn-success mb-3">Crear Docente</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Especialidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($d = $docentes->fetch_assoc()): ?>
            <tr>
                <td><?= $d['id'] ?></td>
                <td><?= htmlspecialchars($d['nombre']) ?></td>
                <td><?= htmlspecialchars($d['especialidad']) ?></td>
                <td>
                    <a href="editar.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="../../controllers/DocenteController.php?delete=<?= $d['id'] ?>" 
                       class="btn btn-sm btn-danger" 
                       onclick="return confirm('¿Eliminar al docente <?= htmlspecialchars($d['nombre']) ?>?')">
                       Eliminar
                    </a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="../../index.php" class="btn btn-secondary mt-3">Volver al Dashboard</a>
</div>
</body>
</html>
