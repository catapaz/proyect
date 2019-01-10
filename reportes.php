<?php
// Initialize the session
session_start();

 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['USUARIO']) || empty($_SESSION['USUARIO'])){
  header("location: https://streetlightdata.000webhostapp.com/project/login.php");
  exit;
  

}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</style>
<script type="text/javascript" src="https://streetlightdata.000webhostapp.com/project/jquery-latest.js"></script>
<script type="text/javascript" src="https://streetlightdata.000webhostapp.com/project/jquery.tablesorter.js"></script>
<script>
$(document).ready(function() {
  //cuando la página se cargue convertimos la tabla con id "simple" en una tabla ordenable
	$("table").tableSorter();
});
</script>
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
<style>
 body{
	margin:0;
	
	background:#c8c8c8;
	font:600 16px/18px 'Open Sans',sans-serif;
}

  	header {
            background: url("https://streetlightdata.000webhostapp.com/images/Captura.JPG") no-repeat center; 
            /* Change back address of image */
            background-size: 100% 100%;
            height: 100px; 
            /* Change height back to 630px */
        }
		.topnav {
          overflow: hidden;
          background-color: #385eaf;
        }

        .topnav a {
          float: left;
          color: #f2f2f2;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
          font-size: 17px;
        }

        .topnav a:hover {
          background-color: #4CAF50;
          color: black;
        }

        .topnav a.active {
          background-color: #4CAF50;
          color: white;
        }
      
      * {
          margin: 0;
          padding: 0;
          border: 0;
      }

      html, body {
          height: 100%;
      }

      .header{
          background: #333;
          /*padding: 15px;*/
          /*text-align:center;*/
          font-size: 18px;
          font-family: sans-serif;
          color: #fff;
      }

      .leftpanel{
      border: 1px solid black;
          background: white;
      }

      .rightpanel{
          
      }

      #wrapper {
          height: 100%;
          display: -webkit-flex;
          display: flex;
          -webkit-flex-direction: column;
          flex-direction: column;
          outline: 1px solid red;
      }

      #wrapper > .header {
          -webkit-flex: 0 0 auto;
          flex: 0 0 auto;
      }

      #wrapper > .header + div {
          -webkit-flex: 1 1 auto;
          flex: 1 1 auto;
          display: -webkit-flex;
          display: flex;
          -webkit-flex-direction: row;
          flex-direction: row;
      }

      #wrapper > .header + div > div:first-of-type {
         width: 200px;
      }

      #wrapper > .header + div > div:last-of-type {
          -webkit-flex: 9 0 0;
          flex: 9 0 0;
      }
      .footer
        {
          left: 0;
          bottom: 0;
          width: 100%;
          background-color: #385eaf;
          color: white;
          text-align: center;
    
        }
       
        .login
        {  
          
          height: auto;
          float: left;
          border: 1px solid black;
        }
        .contenido
        {border: 1px solid black;
             overflow:auto;
        }
        #map
        {
          width: auto;
          height: 100%;
          border: 1px solid black;
        }
        .div1 {
    float: left;
}

.div2 {
    float:right;
     text-align: right;
}

</style>
</head>
 
<body>
<div id = "wrapper">
  <header>
  </header>
    <div class="header">
    <div class="topnav">  
    	<div>
            
            <div class="div2"><h1>Hola, <b><?php echo htmlspecialchars($_SESSION['nombre']); ?></b></h1></div>
        </div>
      <left><h1>Mapa de Iluminancia</h1></left>
      
      <a href="https://streetlightdata.000webhostapp.com/project/admin.php">Inicio</a>
      <a href="#info">Informacion</a>
      <a href="#contacto">Contacto</a>
      <a href="#acerca">Acerca de nosotros</a>
      <a href="https://streetlightdata.000webhostapp.com/project/register.php">Registrar</a>
      <a   class="active"  href="https://streetlightdata.000webhostapp.com/project/reportes.php">Reportes</a>
    <a style="float:right" href="https://streetlightdata.000webhostapp.com/project/logout.php">Cerrar sesión</a>
      
     
    </div>
    </div>
    
    <div class="contenido">
        
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
            
            if ($result->num_rows > 0) {
                $row_number = 0;
                if (count($rows)) {
                    
                    echo "<table id='table' class='tablesorter'>
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Fecha (a/m/d) Hora </th>
                    <th>Valor (Lux)</th>
                    <th>Ubicacion</th>
                    <th>Dirección</th>
                    <th>Barrio</th>
                    <th>Estado</th>
                    <th>Reporte</th>
                    </tr>
                    </thead><tbody>";
                    
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        
                            
                            echo "<tr>
                            <td>". ++$row_number. "</td>
                            <td>". $row["id"]. "</td>
                            <td>" . $row["date"]. "</td> 
                            <td>" . $row["value"]. "</td>
                            <td><a href='formulario_show.php?id=".$row["id"]."'>Mapa</a></td> 
                            <td>" . $row["direccion"]. "</td>
                            <td>" . $row["BARRIO"]. "</td>
                            <td>" . $row["Estado"]. "</td>
                            
                            <td><a href='formulario_show.php?id=".$row["id"]."'>Reporte</a></td>
                            </tr>";
                        
                    }
                echo "</tbody></table>";
                }
            } else {
                echo "0 results";
            }
            
            $con->close();
            ?> 
        
    </div>
    <div class="footer">
          <p><b>INFO AQUI</b></p>
  	</div>
</div>



</body>
</html>
