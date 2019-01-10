<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<style>
table, th, td {
    border: 1px solid black;
}
.colorcell {   background: #dddddd; } 
.colorresultado{ background: #99ff8c;}
.colornotificacion{background: #f2b67b;}
</style>
</head>
<body>

	<?php
            
                //$id = $_GET['id'];
                
               
                
                require("connect.php");
                //header('Access-Control-Allow-Origin', '*');
                
                
                // Opens a connection to a MySQL server
                $con = new mysqli($servername, $username, $password, $database);
                   
                // Consulta a la DB
                $result = mysqli_query($con,"SELECT * FROM sensor where id=15");
                
                
                
                
                
                // Iterate through the rows, printing XML nodes for each
                while ($row = @mysqli_fetch_assoc($result)){

                	echo 
                	"<table><tbody>
					<tr>
					<td colspan='12'> MEDIDA DE NIVELES DE ILUMINANCIA METODO DE LOS NUEVE PUNTOS Y PROMEDIO HORIZONTAL </td>
					</tr>
					<tr>
					<td colspan='1' class= 'colorcell'>RESPONSABLE</td> 
					<td colspan='6'>".$row['RESPONSABLE']."</td>
					<td colspan='1' class= 'colorcell'>FECHA Y HORA</td>
					<td colspan='2'>".$row['date']."</td>
					<td colspan='1' class= 'colorcell'>CLASE DE ILUMINACION VEHICULAR</td>
					<td colspan='1'>".$row['CLASE DE ILUMINACION VEHICULAR']."</td>
					</tr>
					<tr>
					
					<td class= 'colorcell'>TRAMO</td>
					<td colspan='3'>".$row['direccion']."</td>
					<td class= 'colorcell'>DIRECCION L1</td>
					<td colspan='3'>".$row['DIRECCION L1']."</td>
					<td class= 'colorcell'>DIRECCION L2</td>
					<td colspan='3'>".$row['DIRECCION L2']."</td>
					
					</tr>
					<tr>
					
					
					</tr>
					<tr>
					<td class= 'colorcell'>BARRIO</td>
					<td colspan='4'>".$row['BARRIO']."</td>
					<td class= 'colorcell'>LUXMETRO</td>
					<td colspan='2'>".$row['LUXOMETRO(Referencia)']."</td>
					<td colspan='1' class= 'colorcell'>CONDICIONES ATMOSFERICAS DE LA NOCHE</td>
					<td colspan='3'>".$row['CONDICIONES ATMOSFERICAS DE LA NOCHE']."</td>
					
					</tr>
					<tr>
					
					</tr>
					
					<tr>
					<td class= 'colorcell'>LUMINARIA L1</td>
					<td >".$row['LUMINARIA L1']."</td>
					<td class= 'colorcell'>BOMBILLA (POTENCIA)</td>
					<td >".$row['POTENCIA BOMBILLA L1']."</td>
					<td class= 'colorcell'>BOMBILLA (FUENTE)</td>
					<td >".$row['FUENTE BOMBILLA L1']."</td>
					<td class= 'colorcell'>TIPO DE APOYO</td>
					<td >".$row['TIPO DE APOYO L1']."</td>
					<td class= 'colorcell'>LONGITUD DE POSTE (m)</td>
					<td >".$row['LONGITUD DEL POSTE L1']."</td>
					<td class= 'colorcell'>AVANCE LUMINARIA SOBRE LA CALZADA(m)</td>
					<td >".$row['AVANCE DE LA LUMINARIA SOBRE LA CALZADA L1']."</td>
					</tr>
					<tr>
					
					</tr>
					<tr>
					
					
					
					</tr>
					<tr>
					
					<td class= 'colorcell'>DISTANCIA DEL POSTE AL BORDE DE LA CALZADA(m)</td>
					<td >".$row['DISTANCIA DEL POSTE AL BORDE DE LA CALZADA EN METROS L1']."</td>
					<td class= 'colorcell'>ALTURA DEL MONTAJE DE LA LUMINARIA (m)</td>
					<td >".$row['ALTURA DEL MONTAJE DE LA LUMINARIA EN METROS L1']."</td>
					<td class= 'colorcell'>ANGULO DE INCLINACION DE LA LUMINARIA</td>
					<td >".$row['ANGULO DE INCLINACION DE LA LUMINARIA L1']."</td>
					<td class= 'colorcell'>TENSION NOMINAL DE LA LUMINARIA</td>
					<td >".$row['TENSION NOMINAL DE LA LUMINARIA L1']."</td>
					<td class= 'colorcell'>TENSION MEDIDA EN LA RED</td>
					<td >".$row['TENSION MEDIDA EN LA RED L1']."</td>
					<td class= 'colorcell'>ESTADO DE LA LUMINARIA POR POLUCION</td>
					<td >".$row['ESTADO DE LA LUMINARIA POR POLUCION L1']."</td>
					</tr>
					
					<tr>
					
					</tr>
					
					<tr>
					
					
					</tr>
					
					
					<tr>
					<td class= 'colorcell'>LUMINARIA L2</td>
					<td >".$row['LUMINARIA L2']."</td>
					<td class= 'colorcell'>BOMBILLA (POTENCIA)</td>
					<td >".$row['POTENCIA BOMBILLA L2']."</td>
					<td class= 'colorcell'>BOMBILLA (FUENTE)</td>
					<td >".$row['FUENTE BOMBILLA L2']."</td>
					<td class= 'colorcell'>TIPO DE APOYO</td>
					<td >".$row['TIPO DE APOYO L2']."</td>
					<td class= 'colorcell'>LONGITUD DE POSTE (m)</td>
					<td >".$row['LONGITUD DEL POSTE L2']."</td>
					<td class= 'colorcell'>AVANCE LUMINARIA SOBRE LA CALZADA(m)</td>
					<td >".$row['AVANCE DE LA LUMINARIA SOBRE LA CALZADA L2']."</td>
					</tr>
					<tr>
					
					</tr>
					<tr>
					
					
					
					</tr>
					<tr>
					
					<td class= 'colorcell'>DISTANCIA DEL POSTE AL BORDE DE LA CALZADA(m)</td>
					<td >".$row['DISTANCIA DEL POSTE AL BORDE DE LA CALZADA EN METROS L2']."</td>
					<td class= 'colorcell'>ALTURA DEL MONTAJE DE LA LUMINARIA (m)</td>
					<td >".$row['ALTURA DEL MONTAJE DE LA LUMINARIA EN METROS L2']."</td>
					<td class= 'colorcell'>ANGULO DE INCLINACION DE LA LUMINARIA</td>
					<td >".$row['ANGULO DE INCLINACION DE LA LUMINARIA L2']."</td>
					<td class= 'colorcell'>TENSION NOMINAL DE LA LUMINARIA</td>
					<td >".$row['TENSION NOMINAL DE LA LUMINARIA L2']."</td>
					<td class= 'colorcell'>TENSION MEDIDA EN LA RED</td>
					<td >".$row['TENSION MEDIDA EN LA RED L2']."</td>
					<td class= 'colorcell'>ESTADO DE LA LUMINARIA POR POLUCION</td>
					<td >".$row['ESTADO DE LA LUMINARIA POR POLUCION L2']."</td>
					</tr>
					


					</tbody>
					</table>
					<table>
					<tbody>
					
					<tr>
					<th colspan='3' rowspan='2' class= 'colorcell'>METODO NUEVE PUNTOS</th>
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
					<th colspan='2' class= 'colorcell'>ANDEN ADYACENTE</th>
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
					<th colspan='2' class= 'colorcell'>ANDEN OPUESTO</th>
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
					<th colspan='1' rowspan='2'>ILUMINANCIA</th>
					<th colspan='2'>VALOR PROMEDIO</th>
					<th colspan='1'>UNIFORMIDAD</th>
					<th colspan='2'>VALOR</th>
					<th colspan='2'>VALOR</th>
					<th colspan='2'>VALOR</th>
					<th colspan='2'>VALOR</th>
					</tr>
					<tr>
					<th colspan='2'>Eprom</th>
					<td colspan='1'>GENERAL (Uo)</td>
					<td colspan='2'>MINIMO</td>
					<td colspan='2'>MAXIMO</td>
					<td colspan='2'>MIN/MAX</td>
					<td colspan='2'>PROMEDIO/MAX</td>
					</tr>
					<tr>
					<th colspan='1' class='colorresultado'>CALZADA</th>
					<td colspan='2'>".$row['ILUMINANCIA PROMEDIO CALZADA']."</td>
					<td colspan='1'>".$row['UNIFORMIDAD GENERAL CALZADA']."</td>
					<td colspan='2'>".$row['VALOR MINIMO CALZADA']."</td>
					<td colspan='2'>".$row['VALOR MAXIMO CALZADA']."</td>
					<td colspan='2'>".$row['VALOR MIN/MAX CALZADA']."</td>
					<td colspan='2'>".$row['VALOR PROMEDIO/MAX CALZADA']."</td>
					</tr>
					<tr>
					<th colspan='1' class='colorresultado'>ANDEN ADYACENTE</th>
					<td colspan='2'>".$row['ILUMINANCIA PROMEDIO ANDEN ADYACENTE']."</td>
					<td colspan='1'>".$row['UNIFORMIDAD GENERAL ANDEN ADYACENTE']."</td>
					<td colspan='2'>".$row['VALOR MINIMO ANDEN ADYACENTE']."</td>
					<td colspan='2'>".$row['VALOR MAXIMO ANDEN ADYACENTE']."</td>
					<td colspan='2'>".$row['VALOR MIN/MAX ANDEN ADYACENTE']."</td>
					<td colspan='2'>".$row['VALOR PROMEDIO/MAX ANDEN ADYACENTE']."</td>
					</tr>
					<tr>
					<th colspan='1' class='colorresultado'>ANDEN OPUESTO</th>
					<td colspan='2'>".$row['ILUMINANCIA PROMEDIO ANDEN OPUESTO']."</td>
					<td colspan='1'>".$row['UNIFORMIDAD GENERAL ANDEN OPUESTO']."</td>
					<td colspan='2'>".$row['VALOR MINIMO ANDEN OPUESTO']."</td>
					<td colspan='2'>".$row['VALOR MAXIMO ANDEN OPUESTO']."</td>
					<td colspan='2'>".$row['VALOR MIN/MAX ANDEN OPUESTO']."</td>
					<td colspan='2'>".$row['VALOR PROMEDIO/MAX ANDEN OPUESTO']."</td>
					</tr>
					
					<tr>
					<th  class='colornotificacion'>OBSERVACIONES</th>
					<td colspan='11'>".$row['OBSERVACIONES']."</td>
					</tr>
					 <tr>
					<th  class='colornotificacion'>CUMPLIMIENTO</th>
					<td colspan='11'>".$row['CUMPLIMIENTO']."</td>
					</tr> 
					   <tr>
					<th  class='colornotificacion'>POSIBLE SOLUCION</th>
					<td colspan='11'>".$row['POSIBLE SOLUCION']."</td>
					</tr>
					</tbody>
					</table>";

                }
                              
              $con->close(); 
            ?> 




</body>
</html>
