<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cursoSQL";

// Obtener los datos del formulario
$nombre = $_POST['nombre'] ?? '';
$apellido_uno = $_POST['apellido_uno'] ?? '';
$apellido_dos = $_POST['apellido_dos'] ?? '';
$email = $_POST['email'] ?? '';
$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';

// Saber si el email ya existe
$emailExists = false;
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de la conexión: " . $conn->connect_error);
}

$checkEmailQuery = "SELECT * FROM form WHERE email='" . mysqli_real_escape_string($conn, $email) . "'";
$checkEmailResult = $conn->query($checkEmailQuery);
if ($checkEmailResult->num_rows > 0) {
    $emailExists = true;
}

if ($emailExists) {
    echo "El email ya está registrado. Debe intentar con otro.";
} elseif (empty($nombre) || empty($apellido_uno) || empty($apellido_dos) || empty($email) || empty($login) || empty($password)) {
    echo "Por favor, complete todos los campos.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "El email no es válido.";
} elseif (strlen($password) < 4 || strlen($password) > 8) {
    echo "La contraseña debe tener entre 4 y 8 caracteres.";
} else {
    // Insertar los datos en la base de datos
    $insertQuery = "INSERT INTO form (nombre, apellido_uno, apellido_dos, email, login, password) 
    VALUES ('" . mysqli_real_escape_string($conn, $nombre) . "', '" . mysqli_real_escape_string($conn, $apellido_uno) . "', '" . mysqli_real_escape_string($conn, $apellido_dos) . "', '" . mysqli_real_escape_string($conn, $email) . "', '" . mysqli_real_escape_string($conn, $login) . "', '" . mysqli_real_escape_string($conn, $password) . "')";

    if ($conn->query($insertQuery) === true) {
        echo "El registro ha sido completado con éxito.";
    } else {
        echo "Error al registrar los datos: " . $insertQuery . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
