<?php
$host = 'localhost';
$dbname = 'bddocentes'; // Ajusta esto al nombre de tu base de datos
$username = 'root';
$password = ''; // Tu contraseña si tienes una configurada

// Crear conexión
$con = new mysqli($host, $username, $password, $dbname);

// Verificar conexión
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}