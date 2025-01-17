<?php
include __DIR__ . '/../../database/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'];

    if($accion == 'crear' || $accion == 'actualizar') {
        $facu = $_POST['facultad'];
        
        if($accion == 'crear') {
            $stmt = $con->prepare('INSERT INTO facultad (nomfac) VALUES (?)');
            $stmt->bind_param("s", $facu);
        } else {
            $id = $_POST['id'];
            $stmt = $con->prepare('UPDATE facultad SET nomfac=? WHERE idfacultad=?');
            $stmt->bind_param("si", $facu, $id);
        }
        
        if($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Operación exitosa']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error en la operación']);
        }
    } elseif ($accion == 'leer') {
        $result = $con->query('SELECT * FROM facultad ORDER BY idfacultad');
        $facultades = [];
        while($row = $result->fetch_assoc()) {
            $facultades[] = $row;
        }
        echo json_encode($facultades);
    } elseif($accion == 'eliminar') {
        $id = $_POST['id'];
        $stmt = $con->prepare('DELETE FROM facultad WHERE idfacultad=?');
        $stmt->bind_param("i", $id);
        
        if($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Facultad eliminada']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al eliminar']);
        }
    }
}