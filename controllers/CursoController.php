<?php
require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../models/Curso.php";

$cursoModel = new Curso($conn);

// CREAR CURSO
if(isset($_POST['crear'])){
    $imagen = "";
    if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0){
        if(!is_dir("../uploads")) mkdir("../uploads", 0777);
        $imagen = "../uploads/" . time() . "_" . $_FILES['imagen']['name'];
        move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen);
    }

    $cursoModel->create([
        'nombre' => $_POST['nombre'],         // <-- CORREGIDO
        'descripcion' => $_POST['descripcion'],
        'id_docente' => $_POST['id_docente'],
        'imagen' => $imagen
    ]);

    header("Location: ../views/cursos/listar.php");
    exit;
}

// EDITAR CURSO
if(isset($_POST['editar'])){
    $id = $_POST['id'];
    $data = [
        'nombre' => $_POST['nombre'],         // <-- CORREGIDO
        'descripcion' => $_POST['descripcion'],
        'id_docente' => $_POST['id_docente']
    ];

    if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0){
        $imagen = "../uploads/" . time() . "_" . $_FILES['imagen']['name'];
        move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen);
        $data['imagen'] = $imagen;
    }

    $cursoModel->update($id, $data);
    header("Location: ../views/cursos/listar.php");
    exit;
}

// ELIMINAR CURSO
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $cursoModel->delete($id);
    header("Location: ../views/cursos/listar.php");
    exit;
}
?>
