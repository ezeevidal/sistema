<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

// Manejo de errores en la conexión
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);

// Sentencia SQL preparada para evitar la inyección de SQL
$stmt = $conn->prepare("INSERT INTO eventos (nombre_evento, fecha_evento, hora_evento, recordatorio1, recordatorio2) VALUES (?, ?, ?, ?, ?)");
if ($stmt) {
    $stmt->bind_param("sssss", $data['eventName'], $data['dateTime'], $data['eventTime'], $data['reminder1'], $data['reminder2']);

    if ($stmt->execute()) {
        echo "Evento guardado exitosamente";
    } else {
        echo "Error al guardar el evento: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error en la preparación de la declaración SQL";
}

$conn->close();
?>
