<?php
require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../models/Docente.php";

$docenteModel = new Docente($conn);

// CREAR DOCENTE
if(isset($_POST['crear'])){
    $docenteModel->create([
        'nombre' => $_POST['nombre'],      
        'especialidad' => $_POST['especialidad']
    ]);
    header("Location: ../views/docentes/listar.php");
    exit;
}

// EDITAR DOCENTE
if(isset($_POST['editar'])){
    $id = $_POST['id'];
    $docenteModel->update($id, [
        'nombre' => $_POST['nombre'],      
        'especialidad' => $_POST['especialidad']
    ]);
    header("Location: ../views/docentes/listar.php");
    exit;
}

// ELIMINAR DOCENTE
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $docenteModel->delete($id);
    header("Location: ../views/docentes/listar.php");
    exit;
}
?>
