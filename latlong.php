<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

require("connect.php");
//header('Access-Control-Allow-Origin', '*');
function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Opens a connection to a MySQL server
$con = new mysqli($servername, $username, $password, $database);
   
// Consulta a la DB
$result = mysqli_query($con,'SELECT * FROM sensor WHERE id=15');


// Start XML file, echo parent node


// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  
  $latitud=  $row['latitud']. '  ';
  $longitud=  $row['longitud']. '  ';
  echo $latitud;
  echo $longitud;
  
  $geolocation = $latitud.','.$longitud;

  // be sure to replace API key
  $request = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$geolocation.'&sensor=false'.'key=AIzaSyBM5EpVdaFl_wI41QUW2DRdG5vMgbdOICE'; 

  $file_contents = file_get_contents($request);
  $json_decode = json_decode($file_contents);

  // return the json object of the first record, navigate to the address from here
  var_dump($json_decode);
  
 

 
}

// End XML file


?>