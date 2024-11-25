<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $stmt = $pdo->prepare("INSERT INTO clientes (nombre, email, telefono) VALUES (?, ?, ?)");
    $stmt->execute([$nombre, $email, $telefono]);

    echo "Cliente registrado con éxito";
}
?>
