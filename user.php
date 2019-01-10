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
        table, th, td 
        {     
          border: 1px solid black;
         width:100%;
        }
        .login
        {  
          
          height: auto;
          float: left;
          border: 1px solid black;
        }
        .contenido
        {border: 1px solid black;}
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
      
      <a class="active" href="#home">Inicio</a>
      <a href="#info">Informacion</a>
      <a href="#contacto">Contacto</a>
      <a href="#acerca">Acerca de nosotros</a>
      
      <a style="float:right" href="https://streetlightdata.000webhostapp.com/project/logout.php">Cerrar sesión</a>
     
    </div>
    </div>
    
    <div class="contenido">
        <div class="leftpanel">
         <div class="tabla"><!--/* aqui se abre la tabla */-->
                            <table >
                              <tr>
                                  <td >NIVEL DE ILUMINANCIA</td>    
                              </tr>
                              <tr>
                                  <td bgcolor="#17a300">Aceptable</td>    
                              </tr>
                              <tr>
                                  <td bgcolor="#ff8100">Medio</td>    
                              </tr>
                              <tr>
                                  <td bgcolor="#787878">Bajo</td>
                              </tr>
                            </table>
                            <h1></h1>
                      <p>Los niveles de iluminancia son presentados teniendo como base el Reglamento Técnico                  de Iluminación y Alumbrado Público - RETILAP.</p>
                      <p>Click izquierdo sobre el marcador mas información.</p>
        </div><!--/* aqui se cierra la tabla */-->
        
        
        
        
        
        
        </div><!--/* aqui se cierra el panel derecho */-->
        <div class="rightpanel"></div>
        
        <div ><!--/* aqui se abre el mapa */-->
       <div id= "map"></div>
        <script >
      
           var customLabel = {
              Aceptable: {
                label: 'A',
                color:'#17a300'
              },
              Medio: {
                label: 'M',
                color:'#ff8100'
              },
              Bajo: {
                label: 'B',
                color:'#787878'
              }
            };                                      

          function loadMap()
          {
            var pyn = {lat:2.441807, lng:  -76.606224};
            
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                styles: [{
                    featureType: "poi",
                    stylers: [{
                        visibility: "off"
                    }]
                }],
                center: pyn
            });                 
            
            var infoWindow = new google.maps.InfoWindow;
            downloadUrl('https://streetlightdata.000webhostapp.com/project/marcadores.php', function(data) {
              var xml = data.responseXML;
              var markers = xml.documentElement.getElementsByTagName('marker');
              Array.prototype.forEach.call(markers, function(markerElem) {
                var id = markerElem.getAttribute('id');
                var date = markerElem.getAttribute('date');
                var value = markerElem.getAttribute('value');
                var parseLat = parseFloat(markerElem.getAttribute('lat'));
                var parseLng = parseFloat(markerElem.getAttribute('lng'));
                var state = markerElem.getAttribute('state');
                var parseValue=parseFloat(value);
                var infowincontent = document.createElement('div');
                var strong = document.createElement('strong');
                strong.textContent = "Iluminancia: "+parseValue+" lux. Nivel: "+state+".";
                infowincontent.appendChild(strong);
                infowincontent.appendChild(document.createElement('br'));
                var text = document.createElement('text');
                text.textContent = "Registrado el (a/m/d): " + date;
                infowincontent.appendChild(text);
                
                var icono = customLabel[state] || {};
                
                var pin = new google.maps.MarkerImage(
                "http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld="+icono.label+"|"+icono.color,
                null, /* size is determined at runtime */
                null, /* origin is 0,0 */
                null, /* anchor is bottom center of the scaled image */
                new google.maps.Size(20, 30));  /* Size given in CSS Length units */
                
                var punto = {
                      path: 'M 100 100 a 50 50 0 1 0 0.00001 0',
                      fillColor: 'black',
                      fillOpacity: 0.8,
                      scale: 0.0000001,              
                      strokeColor: "#"+icono.color,        
                      strokeWeight: 15
      
                };
                
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(parseLat,parseLng), 
                    map: map,
                    icon:{
                      path: google.maps.SymbolPath.CIRCLE,
                        fillColor: icono.color,
                        fillOpacity: 0.6,
                        strokeColor: '#000000',
                        strokeOpacity: 0.9,
                        strokeWeight: 1,
                        scale: 5
                    },
                    label: icono.label
                });     
                marker.addListener('click', function() {
                              infoWindow.setContent(infowincontent);
                              infoWindow.open(map, marker);
                              });
              });
            });
          }   

          function downloadUrl(url, callback)
          {
            var request = window.ActiveXObject ?
                new ActiveXObject('Microsoft.XMLHTTP') :
                new XMLHttpRequest;
    
            request.onreadystatechange = function() {
              if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
              }
            };

            request.open('GET', url, true);
            request.send(null);
          }

          function doNothing() {}
      
        </script>
     
     
      </div><!--/* aqui se cierra el mapa*/-->
        
        <script async defer
              src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqpEU987KXWoLzRi26g6YcS9297KOly4I&callback=loadMap">
            </script>
        
        
    </div>
    <div class="footer">
          <p><b>INFO AQUI</b></p>
  	</div>
</div>



</body>
</html>
