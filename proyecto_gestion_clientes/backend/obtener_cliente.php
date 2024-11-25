<?php
require 'conexion.php';

$query = $pdo->query("SELECT * FROM clientes");
$clientes = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($clientes);
?>
