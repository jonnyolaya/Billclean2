<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventario";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
} else {
  echo "Conectado";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Obtener datos del formulario
  $cliente = $_POST['cliente'];
  $telefono = $_POST['telefono'];
  $producto1 = $_POST['producto1'];
  $cantidad1 = $_POST['cantidad1'];
  $producto2 = $_POST['producto2'];
  $cantidad2 = $_POST['cantidad2'];
  $producto3 = $_POST['producto3'];
  $cantidad3 = $_POST['cantidad3'];
  $producto4 = $_POST['producto4'];
  $cantidad4 = $_POST['cantidad4'];
  $direccion = $_POST['direccion'];
  $email = $_POST['email'];
  $idcliente = $_POST['idcliente'];
  $precio1 = $_POST['precio1'];
  $precio2 = $_POST['precio2'];
  $precio3 = $_POST['precio3'];
  $precio4 = $_POST['precio4'];
  $fecha = $_POST['fecha'];
  $resultado1 = $_POST['resultado1'];
  $resultado2 = $_POST['resultado2'];
  $resultado3 = $_POST['resultado3'];
  $resultado4 = $_POST['resultado4'];
  $resultado5 = $_POST['resultado5'];

  // Insertar datos en la tabla
  $sql = "INSERT INTO facturacion2
  (cliente, telefono, producto1, cantidad1, producto2, cantidad2, producto3, cantidad3, producto4, cantidad4, direccion, email, idcliente, precio1, precio2, precio3, precio4, fecha, resultado1, resultado2, resultado3, resultado4, resultado5) 
  VALUES 
  ('$cliente', '$telefono', '$producto1', '$cantidad1', '$producto2', '$cantidad2', '$producto3', '$cantidad3', '$producto4', '$cantidad4', '$direccion', '$email', '$idcliente', '$precio1', '$precio2', '$precio3', '$precio4', '$fecha', '$resultado1', '$resultado2', '$resultado3', '$resultado4', '$resultado5')";

  if ($conn->query($sql) === TRUE) {
    echo "Factura creada exitosamente";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$sql = "SELECT * FROM facturacion2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table border='1'>
          <tr>
            <th>Cliente</th>
            <th>Teléfono</th>
            <th>Producto 1</th>
            <th>Cantidad 1</th>
            <th>Producto 2</th>
            <th>Cantidad 2</th>
            <th>Producto 3</th>
            <th>Cantidad 3</th>
            <th>Producto 4</th>
            <th>Cantidad 4</th>
            <th>Dirección</th>
            <th>Email</th>
            <th>ID Cliente</th>
            <th>Precio 1</th>
            <th>Precio 2</th>
            <th>Precio 3</th>
            <th>Precio 4</th>
            <th>Fecha</th>
            <th>Resultado 1</th>
            <th>Resultado 2</th>
            <th>Resultado 3</th>
            <th>Resultado 4</th>
            <th>Resultado 5</th>
          </tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . $row["cliente"] . "</td>
            <td>" . $row["telefono"] . "</td>
            <td>" . $row["producto1"] . "</td>
            <td>" . $row["cantidad1"] . "</td>
            <td>" . $row["producto2"] . "</td>
            <td>" . $row["cantidad2"] . "</td>
            <td>" . $row["producto3"] . "</td>
            <td>" . $row["cantidad3"] . "</td>
            <td>" . $row["producto4"] . "</td>
            <td>" . $row["cantidad4"] . "</td>
            <td>" . $row["direccion"] . "</td>
            <td>" . $row["email"] . "</td>
            <td>" . $row["idcliente"] . "</td>
            <td>" . $row["precio1"] . "</td>
            <td>" . $row["precio2"] . "</td>
            <td>" . $row["precio3"] . "</td>
            <td>" . $row["precio4"] . "</td>
            <td>" . $row["fecha"] . "</td>
            <td>" . $row["resultado1"] . "</td>
            <td>" . $row["resultado2"] . "</td>
            <td>" . $row["resultado3"] . "</td>
            <td>" . $row["resultado4"] . "</td>
            <td>" . $row["resultado5"] . "</td>
          </tr>";
  }
  echo "</table>";
} else {
  echo "No se encontraron resultados.";
}

$conn->close();
?>