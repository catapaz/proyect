<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<style>
table {
    font-family: arial, sans-serif;
    
    width: 80%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
    
    <?php
    // Include config file
    require("connect.php");
    // Opens a connection to a MySQL server
    
    $con = new mysqli($servername, $username, $password, $database);
    
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } 
    
    $sql = "SELECT * FROM sensor WHERE id=15";
    $result = $con->query($sql);
    
    
    
    if ($result->num_rows > 0) {
       
            
            echo "<table><tbody>
            <tr>
            <td colspan='5'>MEDIDA DE NIVELES DE ILUMINANCIA MÉTODO DE LOS NUEVE PUNTOS Y PROMEDIO HORIZONTAL</thead>
            </tr>
            <tr>
            <td>RESPONSABLE</td>
            <td>FECHA Y HORA</td>
            <td>CLASE DE ILUMINACION VEHICULAR </td>
            <td>TRAMO</td>
            <td>BARRIO</td>
            </tr>
            ";
            
            // output data of each row
            while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>". $row["RESPONSABLE"]. "</td>
                    <td>" . $row["date"]. "</td> 
                    <td>" . $row["CLASE DE ILUMINACION VEHICULAR"]. "</td>
                    <td>". $row["direccion"]. "</td>
                    <td>" . $row["BARRIO"]. "</td> 
                    </tr>";
                    echo "<tr>
                    <td>DIRECCION L1</td>
                    <td>DIRECCION L2</td>
                    <td colspan='2'>CONDICIONES ATMOSFERICAS DE LA NOCHE</td>
                    <td>LUXOMETRO (Referencia)</td>
                    </tr>
                    ";
                    echo "<tr>
                    <td>". $row["DIRECCION L1"]. "</td>
                    <td>" . $row["DIRECCION L2"]. "</td> 
                    <td colspan='2'>" . $row["CONDICIONES ATMOSFERICAS DE LA NOCHE"]. "</td>
                    <td>" . $row["LUXOMETRO(Referencia)"]. "</td>
                    </tr>";
                   
                    echo "
                    <tr>
                    <td colspan='5' >LUMINARIA L1</thead>
                    </tr>
                    <tr>
                    <tr>
                    <td>ORIENTACION </td>
                    <td>POTENCIA BOMBILLA</td>
                    <td>FUENTE BOMBILLA </td>
                    <td>TIPO DE APOYO</td>
                    <td>LONGITUD DEL POSTE</td>
                    </tr>
                    ";
                    echo "<tr>
                    <td>". $row["LUMINARIA L1"]. "</td>
                    <td>" . $row["POTENCIA BOMBILLA L1"]. "</td> 
                    <td>" . $row["FUENTE BOMBILLA L1"]. "</td>
                    <td>". $row["TIPO DE APOYO L1"]. "</td>
                    <td>" . $row["LONGITUD DEL POSTE L1"]. "</td> 
                    </tr>";
                    echo "
                    <tr>
                    
                    <td>AVANCE DE LA LUMINARIA SOBRE LA CALZADA</td>
                    <td>DISTANCIA DEL POSTE AL BORDE DE LA CALZADA (m)</td>
                    <td>ALTURA DEL MONTAJE DE LA LUMINARIA (m)</td>
                    <td colspan='2'>ANGULO DE INCLINACION DE LA LUMINARIA</td>
                    </tr>
                    ";
                    echo "<tr>
                    
                    <td>" . $row["AVANCE DE LA LUMINARIA SOBRE LA CALZADA L1"]. "</td>
                    <td>". $row["DISTANCIA DEL POSTE AL BORDE DE LA CALZADA EN METROS L1"]. "</td>
                    <td>" . $row["ALTURA DEL MONTAJE DE LA LUMINARIA EN METROS L1"]. "</td> 
                    <td colspan='2'>" . $row["ANGULO DE INCLINACION DE LA LUMINARIA L1"]. "</td>
                    </tr>";
                   
                    echo "
                    <tr>
                    <td colspan='2'>TENSION NOMINAL DE LA LUMINARIA</td>
                    <td>TENSION MEDIDA EN LA RED</td>
                    <td colspan='2'>ESTADO DE LA LUMINARIA POR POLUSION</td>
                    </tr>
                    ";
                    echo "<tr>
                    <td colspan='2'>". $row["TENSION NOMINAL DE LA LUMINARIA L1"]. "</td>
                    <td>" . $row["TENSION MEDIDA EN LA RED L1"]. "</td> 
                    <td colspan='2'>" . $row["ESTADO DE LA LUMINARIA POR POLUCION L1"]. "</td>
                    </tr>";
                    
                    echo "
                    <tr>
                    <td colspan='5' >LUMINARIA L2</thead>
                    </tr>
                    <tr>
                    <tr>
                    <td>ORIENTACION </td>
                    <td>POTENCIA BOMBILLA</td>
                    <td>FUENTE BOMBILLA </td>
                    <td>TIPO DE APOYO</td>
                    <td>LONGITUD DEL POSTE</td>
                    </tr>
                    ";
                    echo "<tr>
                    <td>". $row["LUMINARIA L2"]. "</td>
                    <td>" . $row["POTENCIA BOMBILLA L2"]. "</td> 
                    <td>" . $row["FUENTE BOMBILLA L2"]. "</td>
                    <td>". $row["TIPO DE APOYO L2"]. "</td>
                    <td>" . $row["LONGITUD DEL POSTE L2"]. "</td> 
                    </tr>";
                    echo "
                    <tr>
                    
                    <td>AVANCE DE LA LUMINARIA SOBRE LA CALZADA</td>
                    <td>DISTANCIA DEL POSTE AL BORDE DE LA CALZADA (m)</td>
                    <td>ALTURA DEL MONTAJE DE LA LUMINARIA (m)</td>
                    <td colspan='2'>ANGULO DE INCLINACION DE LA LUMINARIA</td>
                    </tr>
                    ";
                    echo "<tr>
                    
                    <td>" . $row["AVANCE DE LA LUMINARIA SOBRE LA CALZADA L2"]. "</td>
                    <td>". $row["DISTANCIA DEL POSTE AL BORDE DE LA CALZADA EN METROS L2"]. "</td>
                    
                    <td>" . $row["ALTURA DEL MONTAJE DE LA LUMINARIA EN METROS L2"]. "</td> 
                    <td colspan='2'>" . $row["ANGULO DE INCLINACION DE LA LUMINARIA L2"]. "</td>
                    </tr>";
                   
                    echo "
                    <tr>
                    <td colspan='2'>TENSION NOMINAL DE LA LUMINARIA</td>
                    <td>TENSION MEDIDA EN LA RED</td>
                    <td colspan='2'>ESTADO DE LA LUMINARIA POR POLUSION</td>
                    </tr>
                    ";
                    echo "<tr>
                    <td colspan='2'>". $row["TENSION NOMINAL DE LA LUMINARIA L2"]. "</td>
                    <td>" . $row["TENSION MEDIDA EN LA RED L2"]. "</td> 
                    <td colspan='2'>" . $row["ESTADO DE LA LUMINARIA POR POLUCION L2"]. "</td>
                    </tr>";
                    
                    
                
            }
            echo "</tbody></table>";
        }
     else {
        echo "0 results";
    }
    
    $con->close();
    ?>
    
    
    
    
    

</body>
</html>
