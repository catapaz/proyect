<?php

$id = $_GET['id'];

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
$result = mysqli_query($con,"SELECT * FROM sensor where id='$id'");





// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
     foreach($row as $key => $val){
        //generate output
        echo $key . ": " . $val . "<BR />";
    }
  
}

// End XML file


?>