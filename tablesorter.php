<!DOCTYPE html>
<html>
<head>
<style>
table, th {
    border: 1px solid black;
    width: 100%;
     table-layout: fixed;
    
}

tr:nth-child(even){background-color: #f2f2f2}
th {
    border: 1px solid black;
    height: 50px;
    width: 50%;
    background-color: #4CAF50;
    color: white;
}
td {
    border: 1px solid black;
   
}

th, td {
    padding: 15px;
    text-align: left;
}
</style>
<script type="text/javascript" src="https://streetlightdata.000webhostapp.com/project/jquery-latest.js"></script>
<script type="text/javascript" src="https://streetlightdata.000webhostapp.com/project/jquery.tablesorter.js"></script>
<script>
$(document).ready(function() {
  //cuando la página se cargue convertimos la tabla con id "simple" en una tabla ordenable
	$("table").tableSorter();
});
</script>
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

$sql = "SELECT * FROM sensor";
$result = $con->query($sql);
$rows = $result->num_rows;
echo $rows;

if ($result->num_rows > 0) {
    $row_number = 0;
    if (count($rows)) {
        
        echo "<table id='table' class='tablesorter'>
        <thead>
        <tr>
        <th>Count</th>
        <th>ID</th>
        <th>Fecha (a/m/d) Hora </th>
        <th>Valor (Lux)</th>
        <th>Ubicacion</th>
        <th>Estado</th>
        </tr>
        </thead><tbody>";
        
        // output data of each row
        while($row = $result->fetch_assoc()) {
            
                
                echo "<tr>
                <td>". ++$row_number. "</td>
                <td>". $row["id"]. "</td>
                <td>" . $row["date"]. "</td> 
                <td>" . $row["value"]. "</td>
                <td>" . $row["latitud"].  $row["longitud"]. "</td> 
                <td>" . $row["Estado"]. "</td>
                </tr>";
            
        }
    echo "</tbody></table>";
    }
} else {
    echo "0 results";
}

$con->close();
?> 

</body>
</html>

