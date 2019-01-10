<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
require("connect.php");
$con = new mysqli($servername, $username, $password, $database);

if (isset($_POST['action'])) {
        $id=$_POST['action'];
        $result = mysqli_query($con,"DELETE FROM sensor WHERE id=' $id'");
        header("location:https://streetlightdata.000webhostapp.com/project/admin.php");
        exit;
        
}
   



?>