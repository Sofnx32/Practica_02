<?php
require_once __DIR__ . "/../config.php";

class Curso {
    private $conn;
    private $table = "cursos";

    public function __construct($conn){
        $this->conn = $conn;
    }

    // Obtener todos los cursos junto con el nombre del docente
    public function all(){
        $res = $this->conn->query(
            "SELECT c.*, d.nombre AS docente_nombre 
            FROM {$this->table} c 
            JOIN docentes d ON c.id_docente=d.id"
        );

        $cursos = [];
        while($row = $res->fetch_assoc()){
            $cursos[] = $row;
        }

        return $cursos;
    }

    // Obtener un curso por ID
    public function find($id){
        $res = $this->conn->query("SELECT * FROM {$this->table} WHERE id=$id");
        return $res->fetch_assoc();
    }

    // Crear un nuevo curso
    public function create($data){
        $nombre = $this->conn->real_escape_string($data['nombre']);
        $descripcion = $this->conn->real_escape_string($data['descripcion']);
        $id_docente = (int)$data['id_docente'];
        $imagen = isset($data['imagen']) ? $this->conn->real_escape_string($data['imagen']) : '';

        $this->conn->query(
            "INSERT INTO {$this->table} (nombre, descripcion, imagen, id_docente) 
             VALUES ('$nombre','$descripcion','$imagen',$id_docente)"
        );
    }

    // Actualizar un curso existente
    public function update($id, $data){
        $nombre = $this->conn->real_escape_string($data['nombre']);
        $descripcion = $this->conn->real_escape_string($data['descripcion']);
        $id_docente = (int)$data['id_docente'];

        $sql = "UPDATE {$this->table} SET nombre='$nombre', descripcion='$descripcion', id_docente=$id_docente";

        if(isset($data['imagen']) && $data['imagen'] != ''){
            $imagen = $this->conn->real_escape_string($data['imagen']);
            $sql .= ", imagen='$imagen'";
        }

        $sql .= " WHERE id=$id";
        $this->conn->query($sql);
    }

    // Eliminar un curso y su imagen
    public function delete($id){
        $res = $this->conn->query("SELECT imagen FROM {$this->table} WHERE id=$id");
        if($res && $row = $res->fetch_assoc()){
            if(!empty($row['imagen']) && file_exists($row['imagen'])){
                unlink($row['imagen']);
            }
        }
        $this->conn->query("DELETE FROM {$this->table} WHERE id=$id");
    }
}
