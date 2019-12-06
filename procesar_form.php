<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Procesar Formulario</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <!-- dependencias FontAwesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	


  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="css/estilos2.css">

</head>

<body>
    <div id="contenedor">
      <h1>AFA-FUTSAL</h1>
        <div>
<?php

    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];  
    $email=$_POST['email']; 
    $telefono=$_POST['telefono'];
    $mensaje=$_POST['mensaje'];

    $destinatario="gabriel.vieyra@hotmail.com";
    $asunto="Nuevo contacto desde el sitio";
    $cuerpoMensaje="​Nuevo correo de ".$nombre." <br>Apellido: ".$apellido." <br>Email: ".$email." <br>Telefono: ".$telefono." <br>Mensaje: ".$mensaje." <br>Enviado el ".date("d/m/Y h:m");
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $cabeceras .= 'From: '.$nombre.' <'.$email.'>' . "\r\n";

    $envio=mail($destinatario,$asunto,$cuerpoMensaje);

    if ($envio==true) {
  echo "El envío se realizó correctamente.<br>Gracias ".$nombre;

  //Conexion MySQL
  $host="localhost";//127.0.0.1
  $user="id8998255_gabrielvieyra";
  $pass="49520294";
  $bd="id8998255_proyectofutsal";
  @$conexion=mysqli_connect($host,$user,$pass,$bd) or die("hubo un error en la conexion");

  //Consulta de alta (INSERT)
  //mysqli_query(conexion,consulta)

  $query1="INSERT INTO datos VALUES ('','$nombre', '$apellido','$email','$telefono','$mensaje')";

  $consulta=mysqli_query($conexion,$query1) or die("error en la consulta");

  if($consulta==true){
    echo "contacto subido!";
  }else{
    echo "error en la subida :(";
  }

  //Cerrar la conexion
  mysqli_close($conexion);

}else{
  echo "Hubo un error en el envio. <br> Segui participando :(";
}

 ?>            
          
        </div>


    </div><!--cierre contenedor -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

     
</body>
</html>