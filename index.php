<?php
require_once __DIR__ . "/config.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Práctica 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>📚</text></svg>">
    <style>
        body { background-color: #6f93b8ff; }
        .card { transition: transform 0.2s, box-shadow 0.2s; }
        .card:hover { transform: translateY(-5px); box-shadow: 0 4px 12px rgba(0,0,0,0.15); }
        .btn-dashboard { padding: 1.25rem; font-size: 1.1rem; font-weight: 600; }
    </style>
</head>
<body>
<div class="container mt-5">
    <?php if (isset($error_bd) || !$conexion_exitosa): ?>
        <div class="alert alert-danger text-center">
            <h4>⚠️ Advertencia</h4>
            <p>No se pudo conectar a la base de datos. La app se muestra en modo de solo lectura.</p>
            <?php if (isset($error_bd)): ?>
                <small>Error: <?= htmlspecialchars($error_bd) ?></small>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold text-primary">📚 Dashboard - Práctica 2</h1>
        <p class="lead text-muted">Gestión de Cursos y Docentes</p>
    </div>


    <!-- Tus tarjetas aquí (sin cambios) -->
    <div class="row g-4 justify-content-center">
        <div class="col-md-5">
            <div class="card border-primary h-100 shadow-sm">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px; font-size: 1.5rem;">
                            📖
                        </div>
                    </div>
                    <h3 class="card-title text-primary">Cursos</h3>
                    <p class="card-text text-muted">Administra los cursos disponibles en el sistema.</p>
                    <a href="views/cursos/listar.php" class="btn btn-primary btn-dashboard w-100 mt-3">
                        Ver / Registrar Cursos
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card border-success h-100 shadow-sm">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px; font-size: 1.5rem;">
                            👩‍🏫
                        </div>
                    </div>
                    <h3 class="card-title text-success">Docentes</h3>
                    <p class="card-text text-muted">Gestiona la información de los docentes.</p>
                    <a href="views/docentes/listar.php" class="btn btn-success btn-dashboard w-100 mt-3">
                        Ver / Registrar Docentes
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5 text-muted">
        <small>Práctica 2 - Sistema de Gestión Académica</small>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
