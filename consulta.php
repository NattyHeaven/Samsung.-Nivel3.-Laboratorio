<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cursoSQL";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM form";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>":
    echo "<tr><th>Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>Email</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["nombre"]. "</td>";
        echo "<td>" . $row["apellido_uno"]. "</td>";
        echo "<td>" . $row["apellido_dos"]. "</td>";
        echo "<td>" . $row["email"]. "</td>";
        echo "</tr>";
    }
    echo "</table>";

} else {
    echo "No hay ningun registro.";
}

$conn->close();
?>

<a href="index.html">Volver al registro</a>