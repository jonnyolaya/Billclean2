<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventario";
$conexion = new mysqli($servername, $username, $password, $dbname);

if ($conexion->connect_errno) {
               die("Conexión fallida: " . $conexion->connect_errno);
} else {
               echo "Conectado";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
               $nombreempleado = $_POST['name'];
               $idempleado = $_POST['idempleado'];
               $descripcionproducto = $_POST['descripcionproducto'];
               $idproducto = $_POST['idproducto'];
               $fecha = $_POST['fecha'];
               $Cantidadproducto = $_POST['Cantidadproducto'];
               $valorunitario = $_POST['valorunitario'];

               $sql = "INSERT INTO almacen 
               (nombreempleado, 
               idempleado, 
               descripcionproducto, 
               idproducto, fecha, 
               Cantidadproducto,
               valorunitario) 
               VALUES ('$nombreempleado', 
               '$idempleado', 
               '$descripcionproducto', 
               '$idproducto', 
               '$fecha', 
               '$Cantidadproducto',
               '$valorunitario' )";

               if (!empty($nombreempleado) && !empty($idempleado)) {
                              if (!empty($descripcionproducto) && !empty($idproducto)) {
                                             if (!empty($fecha) && !empty($Cantidadproducto)) {
                                                            if ($conexion->query($sql) === TRUE) {

                                                                           echo "Nuevo registro creado exitosamente";
                                                            } else {
                                                                           echo "Error: " . $sql . "<br>" . $conexion->error;
                                                            }
                                             }
                              }
               }
               echo "Datos guardados correctamente.";
} else {
               echo "Por favor, completa todos los campos.";
}
if (isset($_POST['delete'])) {

               $id = $_POST['nuevo_valor'];

               $sql = "DELETE FROM almacen WHERE id=$id";

               if ($conexion->query($sql) === TRUE) {


                              echo "Registro eliminado exitosamente";
               } else {
                              echo "Error eliminando el registro: " . $conexion->error;
               }
}
echo "<style>
               table {
               width: 100%;
               border-collapse: collapse;
               margin: 25px 0;
               font-size: 18px;
               text-align: left;
               }
               th, td {
               padding: 12px;
               border-bottom: 1px solid #ddd;
               }
               th {
               background-color: #f2f2f2;
               }
               tr:hover {
               background-color: #f5f5f5;
               }
</style>";

echo "<table>";

echo "<tr>
                              <th>ID</th>
                              <th>Nombre Empleado</th>
                              <th>ID Empleado</th>
                              <th>Descripción Producto</th>
                              <th>ID Producto</th>
                              <th>Fecha</th>
                              <th>Cantidad Producto</th>
                              <th>Valor Unitario</th>
               </tr>";
echo "<tr>
               <td>$nombreempleado</td>
               <td>$idempleado</td>
               <td>$descripcionproducto</td>
               <td>$idproducto</td>
               <td>$fecha</td>
               <td>$Cantidadproducto</td>
               <td>$valorunitario</td>
               </tr>";
echo "</table>";

echo '<form><input type="button" value="Volver" onClick="javascript:history.go(-1)"></form>';

$sql = "SELECT * FROM almacen";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
               echo "<table>
               <tr>
               <th>ID</th>
               <th>Nombre Empleado</th>
               <th>ID Empleado</th>
               <th>Descripción Producto</th>
               <th>ID Producto</th>
               <th>Fecha</th>
               <th>Cantidad Producto</th>
               <th>Valor Unitario</th>
               </tr>";
               while ($row = $result->fetch_assoc()) {
                              echo "<tr>
                              <td>" . $row["id"] . "</td>
                              <td>" . $row["nombreempleado"] . "</td>
                              <td>" . $row["idempleado"] . "</td>
                              <td>" . $row["descripcionproducto"] . "</td>
                              <td>" . $row["idproducto"] . "</td>
                              <td>" . $row["fecha"] . "</td>
                              <td>" . $row["Cantidadproducto"] . "</td>
                              <td>" . $row["valorunitario"] . "</td>
                              </tr>";
               }
               echo "</table>";
} else {
               echo "0 resultados";
}

$conexion->close();

?>