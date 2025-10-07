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
    <title>Crear Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Crear Curso</h2>
    <form method="POST" enctype="multipart/form-data" action="../../controllers/CursoController.php">
        <div class="mb-3">
            <label class="form-label">Nombre del Curso</label>
            <input type="text" name="nombre" class="form-control" placeholder="Nombre del curso" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" placeholder="Descripción del curso"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Docente</label>
            <select name="id_docente" class="form-select" required>
                <option value="">Seleccione docente</option>
                <?php while($d = $docentes->fetch_assoc()): ?>
                    <option value="<?= $d['id'] ?>"><?= $d['nombre'] ?> - <?= $d['especialidad'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagen</label>
            <input type="file" name="imagen" class="form-control">
        </div>

        <button type="submit" name="crear" class="btn btn-primary">Crear Curso</button>
        <a href="listar.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
