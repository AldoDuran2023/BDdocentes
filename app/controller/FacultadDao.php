<?php
require_once __DIR__ . '/../models/Facultad.php';
require_once __DIR__ . '/../../database/conexion.php';

class FacultadController {
    private $modelo;

    public function __construct() {
        global $con;
        $this->modelo = new Facultad($con);
    }

    public function procesar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accion = $_POST['accion'];
            
            switch($accion) {
                case 'crear':
                    $this->crear();
                    break;
                case 'actualizar':
                    $this->actualizar();
                    break;
                case 'leer':
                    $this->listar();
                    break;
                case 'eliminar':
                    $this->eliminar();
                    break;
            }
        }
    }

    private function crear() {
        $this->modelo->setNombre($_POST['facultad']);
        $resultado = $this->modelo->crear();
        echo json_encode([
            'status' => $resultado ? 'success' : 'error',
            'message' => $resultado ? 'Operación exitosa' : 'Error en la operación'
        ]);
    }

    private function actualizar() {
        $this->modelo->setId($_POST['id']);
        $this->modelo->setNombre($_POST['facultad']);
        $resultado = $this->modelo->actualizar();
        echo json_encode([
            'status' => $resultado ? 'success' : 'error',
            'message' => $resultado ? 'Operación exitosa' : 'Error en la operación'
        ]);
    }

    private function eliminar() {
        $this->modelo->setId($_POST['id']);
        $resultado = $this->modelo->eliminar();
        echo json_encode([
            'status' => $resultado ? 'success' : 'error',
            'message' => $resultado ? 'Facultad eliminada' : 'Error al eliminar'
        ]);
    }

    private function listar() {
        $facultades = $this->modelo->listar();
        echo json_encode($facultades);
    }
}