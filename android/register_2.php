<?php
    
    $username = "id4071426_javargas";  // enter database username, I used "arduino" in step 2.2
    $password = "06101026";  // enter database password, I used "arduinotest" in step 2.2
    $servername = "localhost"; // IMPORTANT: if you are using XAMPP enter "localhost", but if you have an online website enter its address, ie."www.yourwebsite.com"
    
    
    // Create connection
    @$conn = new mysqli($servername, $username, $password, $id4071426_mydb);
    // Check connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    } 
    $_name = $_POST['name'];
    $_email = $_POST['email'];
    $_pass = $_POST['password'];
    $_gender=$_POST['gender'];
    $_age=$_POST['age'];
    
    date_default_timezone_set('America/Bogota');
    
    $current_date = date("Y-m-d H:i:s");
    
    
    $Sql_Query = "insert into id4071426_mydb.tecnico (name, email, encrypted_password, gender, age) values ('$_name','$_email','$_pass','$_gender', '$_age')";
 
	
    if(mysqli_query($conn,$Sql_Query)){
 
    echo 'Data Inserted Successfully';
 
    }
    else{
 
    echo 'Try Again';
    
     }
    mysqli_close($conn);
?>