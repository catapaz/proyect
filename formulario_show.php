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

<style>
.colorcell {   background: #dddddd; } 
.colorresultado{ background: #99ff8c;}
.colornotificacion{background: #f2b67b;}
table, th {
    border: 1px solid black;
    background: "white";
    
   
    
}
tr {width:100%;}

th {
    border: 1px solid black;
   
    
}
td {
    border: 1px solid black;
   
}


</style>
<style>
 body{
	margin:0;
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
.reporte
{
    margin-top: 50px; 
    left: 25%; 
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
        <div class="reporte" align="center" >
        
        <?php
            
                $id = $_GET['id'];
                
               
                
                require("connect.php");
                //header('Access-Control-Allow-Origin', '*');
                
                
                // Opens a connection to a MySQL server
                $con = new mysqli($servername, $username, $password, $database);
                   
                // Consulta a la DB
                $result = mysqli_query($con,"SELECT * FROM sensor where id='$id'");
                
                // Iterate through the rows, printing XML nodes for each
                while ($row = @mysqli_fetch_assoc($result)){

                	echo 
                	"<table align='center'><tbody>
					<tr>
					<td colspan='15'> MEDIDA DE NIVELES DE ILUMINANCIA METODO DE LOS NUEVE PUNTOS Y PROMEDIO HORIZONTAL </td>
					</tr>
					<tr>
					<td colspan='1' class= 'colorcell'>RESPONSABLE</td> 
					<td colspan='8'>".$row['RESPONSABLE']."</td>
					<td colspan='3' class= 'colorcell'>FECHA Y HORA</td>
					<td colspan='3'>".$row['date']."</td>
					</tr>
					<tr>
					<td colspan='8' class= 'colorcell'>CLASE DE ILUMINACION VEHICULAR</td>
					<td colspan='7'>".$row['CLASE DE ILUMINACION VEHICULAR']."</td>
					</tr>
					<tr>
					<td class= 'colorcell'>TRAMO</td>
					<td colspan='5'>".$row['direccion']."</td>
					<td class= 'colorcell'>DIRECCION L1</td>
					<td colspan='4'>".$row['DIRECCION L1']."</td>
					<td class= 'colorcell'>DIRECCION L2</td>
					<td colspan='4'>".$row['DIRECCION L2']."</td>
					</tr>
					<tr>
					<td class= 'colorcell'>BARRIO</td>
					<td colspan='10'>".$row['BARRIO']."</td>
					<td class= 'colorcell'>LUXMETRO</td>
					<td colspan='3'>".$row['LUXOMETRO(Referencia)']."</td>
					</tr>
					<tr>
					<td colspan='8' class= 'colorcell'>CONDICIONES ATMOSFERICAS DE LA NOCHE</td>
					<td colspan='7'>".$row['CONDICIONES ATMOSFERICAS DE LA NOCHE']."</td>
					</tr>
					<tr>
					<td colspan='2' class= 'colorcell'>LUMINARIA L1</td>
					<td colspan= '3'>".$row['LUMINARIA L1']."</td>
					<td colspan= '2'class= 'colorcell'>BOMBILLA (POTENCIA)</td>
					<td colspan='3'>".$row['POTENCIA BOMBILLA L1']."</td>
					<td colspan='2' class= 'colorcell'>BOMBILLA (FUENTE)</td>
					<td colspan='3'>".$row['FUENTE BOMBILLA L1']."</td>
					</tr>
					<tr>
					
					<td colspan='2' class= 'colorcell'>TIPO DE APOYO</td>
					<td colspan='3'>".$row['TIPO DE APOYO L1']."</td>
					<td colspan='2' class= 'colorcell'>LONGITUD DE POSTE</td>
					<td colspan='3'>".$row['LONGITUD DEL POSTE L1']."</td>
					<td colspan='2'class= 'colorcell'>AVANCE LUMINARIA SOBRE LA CALZADA(m)</td>
					<td colspan='3' >".$row['AVANCE DE LA LUMINARIA SOBRE LA CALZADA L1']."</td>
					</tr>
					
					<tr>
					<td colspan='6' class= 'colorcell'>DISTANCIA DEL POSTE AL BORDE DE LA CALZADA(m)</td>
					<td colspan='2' >".$row['DISTANCIA DEL POSTE AL BORDE DE LA CALZADA EN METROS L1']."</td>
					<td colspan='5' class= 'colorcell'>ALTURA DEL MONTAJE DE LA LUMINARIA (m)</td>
					<td colspan='2' >".$row['ALTURA DEL MONTAJE DE LA LUMINARIA EN METROS L1']."</td>
					</tr>
					
					<tr>
					<td colspan='6' class= 'colorcell'>ANGULO DE INCLINACION DE LA LUMINARIA</td>
					<td colspan='2'>".$row['ANGULO DE INCLINACION DE LA LUMINARIA L1']."</td>
					<td colspan='5' class= 'colorcell'>TENSION NOMINAL DE LA LUMINARIA</td>
					<td colspan='2' >".$row['TENSION NOMINAL DE LA LUMINARIA L1']."</td>
					</tr>
					
					<tr>
					
					<td colspan='6' class= 'colorcell'>TENSION MEDIDA EN LA RED</td>
					<td colspan='2'>".$row['TENSION MEDIDA EN LA RED L1']."</td>
					<td colspan='5' class= 'colorcell'>ESTADO DE LA LUMINARIA POR POLUCION</td>
					<td colspan='2' >".$row['ESTADO DE LA LUMINARIA POR POLUCION L1']."</td>
					</tr>
					
					<tr>
					<td colspan='2' class= 'colorcell'>LUMINARIA L2</td>
					<td colspan= '3'>".$row['LUMINARIA L2']."</td>
					<td colspan= '2'class= 'colorcell'>BOMBILLA (POTENCIA)</td>
					<td colspan='3'>".$row['POTENCIA BOMBILLA L2']."</td>
					<td colspan='2' class= 'colorcell'>BOMBILLA (FUENTE)</td>
					<td colspan='3'>".$row['FUENTE BOMBILLA L2']."</td>
					</tr>
					<tr>
					
					<td colspan='2' class= 'colorcell'>TIPO DE APOYO</td>
					<td colspan='3'>".$row['TIPO DE APOYO L2']."</td>
					<td colspan='2' class= 'colorcell'>LONGITUD DE POSTE</td>
					<td colspan='3'>".$row['LONGITUD DEL POSTE L2']."</td>
					<td colspan='2'class= 'colorcell'>AVANCE LUMINARIA SOBRE LA CALZADA(m)</td>
					<td colspan='3' >".$row['AVANCE DE LA LUMINARIA SOBRE LA CALZADA L2']."</td>
					</tr>
					
					<tr>
					<td colspan='6' class= 'colorcell'>DISTANCIA DEL POSTE AL BORDE DE LA CALZADA(m)</td>
					<td colspan='2' >".$row['DISTANCIA DEL POSTE AL BORDE DE LA CALZADA EN METROS L2']."</td>
					<td colspan='5' class= 'colorcell'>ALTURA DEL MONTAJE DE LA LUMINARIA (m)</td>
					<td colspan='2' >".$row['ALTURA DEL MONTAJE DE LA LUMINARIA EN METROS L2']."</td>
					</tr>
					
					<tr>
					<td colspan='6' class= 'colorcell'>ANGULO DE INCLINACION DE LA LUMINARIA</td>
					<td colspan='2'>".$row['ANGULO DE INCLINACION DE LA LUMINARIA L2']."</td>
					<td colspan='5' class= 'colorcell'>TENSION NOMINAL DE LA LUMINARIA</td>
					<td colspan='2' >".$row['TENSION NOMINAL DE LA LUMINARIA L2']."</td>
					</tr>
					
					<tr>
					
					<td colspan='6' class= 'colorcell'>TENSION MEDIDA EN LA RED</td>
					<td colspan='2'>".$row['TENSION MEDIDA EN LA RED L2']."</td>
					<td colspan='5' class= 'colorcell'>ESTADO DE LA LUMINARIA POR POLUCION</td>
					<td colspan='2' >".$row['ESTADO DE LA LUMINARIA POR POLUCION L2']."</td>
					</tr>
					
					</tbody>
					</table>
					
				
					
					<table >
					<tbody>
					<tr>
					<th colspan='9' rowspan='2' class= 'colorcell'>METODO NUEVE PUNTOS</th>
					<th>1</th>
					<th>2</th>
					<th>3</th>
					<th>4</th>
					<th>5</th>
					<th>6</th>
					<th>7</th>
					<th>8</th>
					<th>9</th>
					</tr>
					<tr>
					<td >".$row['PUNTO 1']."</td>
					<td >".$row['PUNTO 2']."</td>
					<td >".$row['PUNTO 3']."</td>
					<td >".$row['PUNTO 4']."</td>
					<td >".$row['PUNTO 5']."</td>
					<td >".$row['PUNTO 6']."</td>
					<td >".$row['PUNTO 7']."</td>
					<td >".$row['PUNTO 8']."</td>
					<td >".$row['PUNTO 9']."</td>
					</tr>
					<tr>
					<th colspan='8' class= 'colorcell'>ANDEN ADYACENTE</th>
					<td >".$row['ANDEN ADYACENTE 1']."</td>
					<td >".$row['ANDEN ADYACENTE 2']."</td>
					<td >".$row['ANDEN ADYACENTE 3']."</td>
					<td >".$row['ANDEN ADYACENTE 4']."</td>
					<td >".$row['ANDEN ADYACENTE 5']."</td>
					<td >".$row['ANDEN ADYACENTE 6']."</td>
					<td >".$row['ANDEN ADYACENTE 7']."</td>
					<td >".$row['ANDEN ADYACENTE 8']."</td>
					<td >".$row['ANDEN ADYACENTE 9']."</td>
					<td >".$row['ANDEN ADYACENTE 10']."</td>
					</tr>
					<tr>
					<th colspan='8' class= 'colorcell'>ANDEN OPUESTO</th>
					<td >".$row['ANDEN OPUESTO 1']."</td>
					<td >".$row['ANDEN OPUESTO 2']."</td>
					<td >".$row['ANDEN OPUESTO 3']."</td>
					<td >".$row['ANDEN OPUESTO 4']."</td>
					<td >".$row['ANDEN OPUESTO 5']."</td>
					<td >".$row['ANDEN OPUESTO 6']."</td>
					<td >".$row['ANDEN OPUESTO 7']."</td>
					<td >".$row['ANDEN OPUESTO 8']."</td>
					<td >".$row['ANDEN OPUESTO 9']."</td>
					<td >".$row['ANDEN OPUESTO 10']."</td>
					</tr>
					<tr>
					<td colspan='18'></td>
					</tr>
					<tr>
					<th colspan='3' rowspan='2'>ILUMINANCIA</th>
					<th colspan='4'>VALOR PROMEDIO</th>
					<th colspan='3'>UNIFORMIDAD</th>
					<th colspan='2'>VALOR</th>
					<th colspan='2'>VALOR</th>
					<th colspan='2'>VALOR</th>
					<th colspan='2'>VALOR</th>
					</tr>
					<tr>
					<th colspan='4'>Eprom</th>
					<td colspan='3'>GENERAL (Uo)</td>
					<td colspan='2'>MINIMO</td>
					<td colspan='2'>MAXIMO</td>
					<td colspan='2'>MIN/MAX</td>
					<td colspan='2'>PROMEDIO/MAX</td>
					</tr>
					<tr>
					<th colspan='3' class='colorresultado'>CALZADA</th>
					<td colspan='4'>".$row['ILUMINANCIA PROMEDIO CALZADA']."</td>
					<td colspan='3'>".$row['UNIFORMIDAD GENERAL CALZADA']."</td>
					<td colspan='2'>".$row['VALOR MINIMO CALZADA']."</td>
					<td colspan='2'>".$row['VALOR MAXIMO CALZADA']."</td>
					<td colspan='2'>".$row['VALOR MIN/MAX CALZADA']."</td>
					<td colspan='2'>".$row['VALOR PROMEDIO/MAX CALZADA']."</td>
					</tr>
					<tr>
					<th colspan='3' class='colorresultado'>ANDEN ADYACENTE</th>
					<td colspan='4'>".$row['ILUMINANCIA PROMEDIO ANDEN ADYACENTE']."</td>
					<td colspan='3'>".$row['UNIFORMIDAD GENERAL ANDEN ADYACENTE']."</td>
					<td colspan='2'>".$row['VALOR MINIMO ANDEN ADYACENTE']."</td>
					<td colspan='2'>".$row['VALOR MAXIMO ANDEN ADYACENTE']."</td>
					<td colspan='2'>".$row['VALOR MIN/MAX ANDEN ADYACENTE']."</td>
					<td colspan='2'>".$row['VALOR PROMEDIO/MAX ANDEN ADYACENTE']."</td>
					</tr>
					<tr>
					<th colspan='3' class='colorresultado'>ANDEN OPUESTO</th>
					<td colspan='4'>".$row['ILUMINANCIA PROMEDIO ANDEN OPUESTO']."</td>
					<td colspan='3'>".$row['UNIFORMIDAD GENERAL ANDEN OPUESTO']."</td>
					<td colspan='2'>".$row['VALOR MINIMO ANDEN OPUESTO']."</td>
					<td colspan='2'>".$row['VALOR MAXIMO ANDEN OPUESTO']."</td>
					<td colspan='2'>".$row['VALOR MIN/MAX ANDEN OPUESTO']."</td>
					<td colspan='2'>".$row['VALOR PROMEDIO/MAX ANDEN OPUESTO']."</td>
					</tr>
					<tr>
					<td colspan='18'></td>
					</tr>
					<tr>
					<th colspan='3' class='colornotificacion'>OBSERVACIONES</th>
					<td colspan='15'>".$row['OBSERVACIONES']."</td>
					</tr>
					 <tr>
					<th colspan='3' class='colornotificacion'>CUMPLIMIENTO</th>
					<td colspan='15'>".$row['CUMPLIMIENTO']."</td>
					</tr> 
					   <tr>
					<th colspan='3' class='colornotificacion'>POSIBLE SOLUCION</th>
					<td colspan='15'>".$row['POSIBLE SOLUCION']."</td>
					</tr>
					</tbody>
					</table>";

                }
                              
              $con->close(); 
            ?>
        </div>
    </div>
    <div class="footer">
          <p><b>INFO AQUI</b></p>
  	</div>
</div>



</body>
</html>
