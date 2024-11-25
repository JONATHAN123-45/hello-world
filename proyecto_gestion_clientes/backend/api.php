<?php
header("Content-Type: application/json");
require 'conexion.php';

// Verifica el método de la solicitud
$method = $_SERVER['REQUEST_METHOD'];

// Rutas básicas de la API
switch ($method) {
    case 'GET':
        obtenerClientes();
        break;
    case 'POST':
        registrarCliente();
        break;
    case 'DELETE':
        eliminarCliente();
        break;
    default:
        echo json_encode(["mensaje" => "Método no soportado"]);
        http_response_code(405); // Método no permitido
        break;
}

// Función para obtener todos los clientes
function obtenerClientes() {
    global $conn;
    $sql = "SELECT * FROM clientes";
    $result = $conn->query($sql);
    $clientes = [];

    while ($row = $result->fetch_assoc()) {
        $clientes[] = $row;
    }

    echo json_encode($clientes);
}

// Función para registrar un nuevo cliente
function registrarCliente() {
    global $conn;

    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['nombre']) && isset($data['email'])) {
        $nombre = $conn->real_escape_string($data['nombre']);
        $email = $conn->real_escape_string($data['email']);
        $telefono = isset($data['telefono']) ? $conn->real_escape_string($data['telefono']) : null;

        $sql = "INSERT INTO clientes (nombre, email, telefono) VALUES ('$nombre', '$email', '$telefono')";
        if ($conn->query($sql)) {
            echo json_encode(["mensaje" => "Cliente registrado con éxito"]);
        } else {
            echo json_encode(["mensaje" => "Error al registrar cliente"]);
        }
    } else {
        echo json_encode(["mensaje" => "Datos incompletos"]);
        http_response_code(400); // Solicitud incorrecta
    }
}

// Función para eliminar un cliente
function eliminarCliente() {
    global $conn;

    if (isset($_GET['id'])) {
        $id = $conn->real_escape_string($_GET['id']);
        $sql = "DELETE FROM clientes WHERE id = $id";

        if ($conn->query($sql)) {
            echo json_encode(["mensaje" => "Cliente eliminado con éxito"]);
        } else {
            echo json_encode(["mensaje" => "Error al eliminar cliente"]);
        }
    } else {
        echo json_encode(["mensaje" => "ID no especificado"]);
        http_response_code(400); // Solicitud incorrecta
    }
}
?>
