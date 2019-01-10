<?php
// Include config file
require("connect.php");
 
// Define variables and initialize with empty values
$USUARIO = $PASSWORD = "";
$USUARIO_err = $PASSWORD_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if USUARIO is empty
    if(empty(trim($_POST["USUARIO"]))){
        $USUARIO_err = 'Por favor ingrese USUARIO.';
    } else{
        $USUARIO = trim($_POST["USUARIO"]);
    }
    
    // Check if PASSWORD is empty
    if(empty(trim($_POST['PASSWORD']))){
        $PASSWORD_err = 'Por favor ingrese contraseña.';
    } else{
        $PASSWORD = trim($_POST['PASSWORD']);
    }
    
    // Validate credentials
    if(empty($USUARIO_err) && empty($PASSWORD_err)){
        $sql = "SELECT * FROM PERSONA WHERE USUARIO = '$USUARIO' AND PASSWORD = '$PASSWORD' ";
        //mysqli_query($con,$sql);
        
        $result = mysqli_query($con,$sql);;
        $numrows = mysqli_num_rows($result);
        if($numrows > 0)
           {
            session_start();
            $_SESSION['USUARIO'] = $USUARIO;      
            
            $row=mysqli_fetch_array($result);
            $_SESSION['nombre'] = $row['NOMBRE1'];
                        if ($row['ID_ROL']=="1"){
                        header("location:https://streetlightdata.000webhostapp.com/project/admin.php");
                        }
                        elseif ($row['ID_ROL']=="2") {
                        header("location:https://streetlightdata.000webhostapp.com/project/user.php");
                        }

                       }
            
           
        else
           {
            echo "Algo salio mal. Intente nuevamente.";;
           }
        
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
        

</style>
</head>
 
<body>
<div id = "wrapper">
  <header>
  </header>
    <div class="header">
    <div class="topnav">  
      <left><h1>Mapa de Iluminancia</h1></left>
      <a href="https://streetlightdata.000webhostapp.com/project/index.php">Inicio</a>
      <a href="#info">Informacion</a>
      <a href="#contacto">Contacto</a>
      <a href="#acerca">Acerca de nosotros</a>
      <a  class="active" style="float:right" href="https://streetlightdata.000webhostapp.com/project/login.php">Ingresar</a>
     
    </div>
    </div>
    
    <div class="contenidologin"><!--aqui se abre el contenido-->
    
			 <div class="loginbox">
        
                  <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                      <div class="form-group <?php echo (!empty($USUARIO_err)) ? 'has-error' : ''; ?>">
                          <label>USUARIO</label>
                          <input type="text" name="USUARIO"class="form-control" value="<?php echo $USUARIO; ?>">
                          <span class="help-block"><?php echo $USUARIO_err; ?></span>
                      </div>    
                      <div class="form-group <?php echo (!empty($PASSWORD_err)) ? 'has-error' : ''; ?>">
                          <label>PASSWORD</label>
                          <input type="PASSWORD" name="PASSWORD" class="form-control">
                          <span class="help-block"><?php echo $PASSWORD_err; ?></span>
                      </div>
                      <div class="form-group">
                          <input type="submit" class="btn btn-primary" value="Ingresar">
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
