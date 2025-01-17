<?php
class Facultad {
    private $con;
    private $id;
    private $nombre;

    public function __construct($db) {
        $this->con = $db;
    }

    // Getters y Setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Métodos del modelo
    public function getAll() {
        $query = "SELECT * FROM facultad ORDER BY idfacultad";
        $result = $this->con->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function create() {
        $stmt = $this->con->prepare("INSERT INTO facultad (nomfac) VALUES (?)");
        $stmt->bind_param("s", $this->nombre);
        return $stmt->execute();
    }

    public function update() {
        $stmt = $this->con->prepare("UPDATE facultad SET nomfac = ? WHERE idfacultad = ?");
        $stmt->bind_param("si", $this->nombre, $this->id);
        return $stmt->execute();
    }

    public function delete() {
        $stmt = $this->con->prepare("DELETE FROM facultad WHERE idfacultad = ?");
        $stmt->bind_param("i", $this->id);
        return $stmt->execute();
    }
}