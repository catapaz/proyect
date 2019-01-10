<?php


// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['USUARIO']) || empty($_SESSION['USUARIO'])){
  header("location: https://streetlightdata.000webhostapp.com/project/login.php");
  exit;
}



// Include config file
require("connect.php");
// Opens a connection to a MySQL server
$con = new mysqli($servername, $username, $password, $database);
 
// Define variables and initialize with empty values
$NOMBRE1= $NOMBRE2 =$APELLIDO1= $APELLIDO2=$ID_ROL= $USUARIO = $PASSWORD = $confirm_PASSWORD = "";
$NOMBRE1_err=$NOMBRE2_err=$APELLIDO1_err=$APELLIDO2_err = $ID_ROL_err=$USUARIO_err = $PASSWORD_err = $confirm_PASSWORD_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){


    // Validate PASSWORD
    if(empty(trim($_POST['NOMBRE1']))){
        $NOMBRE1_err = "Please enter a PASSWORD.";     
    } 
    else{
        $NOMBRE1 = trim($_POST['NOMBRE1']);
    }

    // Validate PASSWORD
    if(empty(trim($_POST['NOMBRE2']))){
         $NOMBRE2="";    
    } 
    else{
        $NOMBRE2 = trim($_POST['NOMBRE2']);
    }

    // Validate PASSWORD
    if(empty(trim($_POST['APELLIDO1']))){
        $APELLIDO1_err = "Please enter a PASSWORD.";     
    } 
    else{
        $APELLIDO1 = trim($_POST['APELLIDO1']);
    }

    // Validate PASSWORD
    if(empty(trim($_POST['APELLIDO2']))){
        $APELLIDO2_err = "Please enter a PASSWORD.";     
    } 
    else{
        $APELLIDO2 = trim($_POST['APELLIDO2']);
    }
    
     // Validate PASSWORD
    if(empty(trim($_POST['ID_ROL']))){
        $ID_ROL_err = "Seleccione un ID_ROL";     
    } 
    else{
        $ID_ROL = trim($_POST['ID_ROL']);
    }
 
    // Validate USUARIO
    if(empty(trim($_POST["USUARIO"]))){
        $USUARIO_err = "Please enter a USUARIO.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM admin WHERE USUARIO = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_USUARIO);
            
            // Set parameters
            $param_USUARIO = trim($_POST["USUARIO"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $USUARIO_err = "This USUARIO is already taken.";
                } else{
                    $USUARIO = trim($_POST["USUARIO"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate PASSWORD
    if(empty(trim($_POST['PASSWORD']))){
        $PASSWORD_err = "Please enter a PASSWORD.";     
    } elseif(strlen(trim($_POST['PASSWORD'])) < 6){
        $PASSWORD_err = "PASSWORD must have atleast 6 characters.";
    } else{
        $PASSWORD = trim($_POST['PASSWORD']);
    }
    
    // Validate confirm PASSWORD
    if(empty(trim($_POST["confirm_PASSWORD"]))){
        $confirm_PASSWORD_err = 'Please confirm PASSWORD.';     
    } else{
        $confirm_PASSWORD = trim($_POST['confirm_PASSWORD']);
        if($PASSWORD != $confirm_PASSWORD){
            $confirm_PASSWORD_err = 'PASSWORD did not match.';
        }
    }
    
    // Check input errors before inserting in database
    if(empty($USUARIO_err) && empty($PASSWORD_err) && empty($confirm_PASSWORD_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO PERSONA (NOMBRE1, NOMBRE2, APELLIDO1, APELLIDO2, ID_ROL, USUARIO, PASSWORD) VALUES (?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_NOMBRE1, $param_NOMBRE2, $param_APELLIDO1, $param_APELLIDO2, $param_ID_ROL, $param_USUARIO, $param_PASSWORD);
            
            // Set parameters
            $param_NOMBRE1 = $NOMBRE1;
            $param_NOMBRE2 = $NOMBRE2;
            $param_APELLIDO1 = $APELLIDO1;
            $param_APELLIDO2 = $APELLIDO2;
            $param_ID_ROL = $ID_ROL;
            $param_USUARIO = $USUARIO;
            //$param_PASSWORD = PASSWORD_hash($PASSWORD, PASSWORD_DEFAULT); // Creates a PASSWORD hash
            $param_PASSWORD = $PASSWORD;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location:https://streetlightdata.000webhostapp.com/project/admin.php");
            } else{
                echo "Algo salio mal. Intente nuevamente";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($con);
}
?>
 
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style>
 body{
	margin:0;
	color:#6a6f8c;
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
        .contenidologin
        {border: 3px solid black;}
        #map
        {
          width: auto;
          height: 100%;
          border: 1px solid black;
        }
        
        .loginbox
        {
        	 max-width: 500px;
              margin: auto;
              background: white;
              padding: 10px;
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
      <a class="active" href="https://streetlightdata.000webhostapp.com/project/register.php">Registrar</a>
      <a href="https://streetlightdata.000webhostapp.com/project/reportes.php">Reportes</a>
      <a style="float:right" href="https://streetlightdata.000webhostapp.com/project/logout.php">Cerrar sesión</a>
     
    </div>
    </div>
    
    <div class="contenidologin"><!--aqui se abre el contenido-->
    
			 <div class="loginbox">
        
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group <?php echo (!empty($NOMBRE1_err)) ? 'has-error' : ''; ?>">
                <label>Primer Nombre</label>
                <input type="text" name="NOMBRE1"class="form-control" value="<?php echo $NOMBRE1; ?>">
                <span class="help-block"><?php echo $NOMBRE1_err; ?></span>
            </div>   

            <div class="form-group <?php echo (!empty($NOMBRE2_err)) ? 'has-error' : ''; ?>">
                <label>Segundo Nombre</label>
                <input type="text" name="NOMBRE2"class="form-control" value="<?php echo $NOMBRE2; ?>">
                <span class="help-block"><?php echo $NOMBRE2_err; ?></span>
            </div>
            
            <div class="form-group <?php echo (!empty($APELLIDO1_err)) ? 'has-error' : ''; ?>">
                <label>Primer Apellido</label>
                <input type="text" name="APELLIDO1"class="form-control" value="<?php echo $APELLIDO1; ?>">
                <span class="help-block"><?php echo $APELLIDO1_err; ?></span>
            </div>   
            
            <div class="form-group <?php echo (!empty($APELLIDO2_err)) ? 'has-error' : ''; ?>">
                <label>Segundo Apellido</label>
                <input type="text" name="APELLIDO2"class="form-control" value="<?php echo $APELLIDO2; ?>">
                <span class="help-block"><?php echo $APELLIDO2_err; ?></span>
            </div>    
            
            
            <div class="form-group <?php echo (!empty($ID_ROL_err)) ? 'has-error' : ''; ?>">
                <label>Rol (seleccione uno)</label>
                <select name="ID_ROL" >
    				<option value=""></option>
    				<option value="<?php echo $ID_ROL=1; ?>">Admin</option>
    				<option value="<?php echo $ID_ROL=2; ?>">User</option>
			    </select>
                
                <span class="help-block"><?php echo $ID_ROL_err; ?></span>
            </div>  
            
            <div class="form-group <?php echo (!empty($USUARIO_err)) ? 'has-error' : ''; ?>">
                <label>Usuario</label>
                <input type="text" name="USUARIO"class="form-control" value="<?php echo $USUARIO; ?>">
                <span class="help-block"><?php echo $USUARIO_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($PASSWORD_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña</label>
                <input type="PASSWORD" name="PASSWORD" class="form-control" value="<?php echo $PASSWORD; ?>">
                <span class="help-block"><?php echo $PASSWORD_err; ?></span>
            </div>
            
            <div class="form-group <?php echo (!empty($confirm_PASSWORD_err)) ? 'has-error' : ''; ?>">
                <label>Confirmar contraseña</label>
                <input type="PASSWORD" name="confirm_PASSWORD" class="form-control" value="<?php echo $confirm_PASSWORD; ?>">
                <span class="help-block"><?php echo $confirm_PASSWORD_err; ?></span>
            </div>
                                
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Registrar">
                <input type="reset" class="btn btn-default" value="Limpiar datos">
            </div>
           
        </form>
         
       
   		 </div> <!--aqui se cierra el loginbox-->
        
    </div><!--aqui se cierra el contenido-->
    <div class="footer">
          <p><b>INFO AQUI</b></p>
  	</div>
</div>



</body>
</html>
