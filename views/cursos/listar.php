<?php
require_once __DIR__ . "/../../config.php";
require_once __DIR__ . "/../../models/Curso.php";

$cursoModel = new Curso($conn);
$cursos = $cursoModel->all();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Lista de Cursos</h2>
    <a href="crear.php" class="btn btn-primary mb-3">Crear Curso</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre del Curso</th>
                <th>Descripción</th>
                <th>Docente</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($cursos as $c): ?>
            <tr>
                <td><?= $c['id'] ?></td>
                <td><?= htmlspecialchars($c['nombre']) ?></td>
                <td><?= htmlspecialchars($c['descripcion']) ?></td>
                <td><?= htmlspecialchars($c['docente_nombre']) ?></td>
                <td>
                    <?php 
                    
                    if (!empty($c['imagen'])) {
                        
                        $nombreArchivo = basename($c['imagen']);
                       
                        $rutaServidor = __DIR__ . "/../../uploads/" . $nombreArchivo;
                        
                        $rutaWeb = defined('UPLOADS_URL') 
                            ? UPLOADS_URL . $nombreArchivo 
                            : "../../uploads/" . $nombreArchivo;

                        if (file_exists($rutaServidor)) {
                            echo '<img src="' . htmlspecialchars($rutaWeb) . '" width="80" alt="Imagen del curso">';
                        } else {
                            echo "Sin imagen";
                        }
                    } else {
                        echo "Sin imagen";
                    }
                    ?>
                </td>
                <td>
                    <a href="editar.php?id=<?= $c['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="../../controllers/CursoController.php?delete=<?= $c['id'] ?>" 
                    class="btn btn-sm btn-danger" 
                    onclick="return confirm('¿Eliminar este curso?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
    <a href="../../index.php" class="btn btn-secondary mt-3">Volver al Dashboard</a>
</div>
</body>
</html>