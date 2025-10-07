<?php
require_once __DIR__ . "/../../config.php";
require_once __DIR__ . "/../../models/Curso.php";
require_once __DIR__ . "/../../models/Docente.php";

$cursoModel = new Curso($conn);
$docenteModel = new Docente($conn);

$id = $_GET['id'];
$curso = $cursoModel->find($id);
$docentes = $docenteModel->all();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Editar Curso</h2>
    <form method="POST" enctype="multipart/form-data" action="../../controllers/CursoController.php">
        <input type="hidden" name="id" value="<?= $curso['id'] ?>">

        <div class="mb-3">
            <label class="form-label">Nombre del Curso</label>
            <input type="text" name="nombre" class="form-control" required value="<?= $curso['nombre'] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control"><?= $curso['descripcion'] ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Docente</label>
            <select name="id_docente" class="form-select" required>
                <option value="">Seleccione docente</option>
                <?php while($d = $docentes->fetch_assoc()): ?>
                    <option value="<?= $d['id'] ?>" <?= $curso['id_docente'] == $d['id'] ? 'selected' : '' ?>>
                        <?= $d['nombre'] ?> - <?= $d['especialidad'] ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagen</label>
            <input type="file" name="imagen" class="f
