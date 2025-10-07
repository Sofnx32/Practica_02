<?php
require_once __DIR__ . "/../config.php";

class Docente {
    private $conn;
    private $table = "docentes";

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function all(){
        return $this->conn->query("SELECT * FROM {$this->table}");
    }

    public function find($id){
        $res = $this->conn->query("SELECT * FROM {$this->table} WHERE id=$id");
        return $res->fetch_assoc();
    }

    public function create($data){
        $nombre = $this->conn->real_escape_string($data['nombre']);
        $especialidad = $this->conn->real_escape_string($data['especialidad']);
        $this->conn->query("INSERT INTO {$this->table} (nombre, especialidad) VALUES ('$nombre','$especialidad')");
    }

    public function update($id, $data){
        $nombre = $this->conn->real_escape_string($data['nombre']);
        $especialidad = $this->conn->real_escape_string($data['especialidad']);
        $this->conn->query("UPDATE {$this->table} SET nombre='$nombre', especialidad='$especialidad' WHERE id=$id");
    }

    public function delete($id){
        $this->conn->query("DELETE FROM {$this->table} WHERE id=$id");
    }
}
