
<?php
 $alert= '';
 session_start();

 if(!empty($_SESSION['active'])){
    header('location:sistema/');
 }else{

      if(!empty($_POST)){
         if(empty($_POST['usuario']) || empty($_POST['clave'])){
             $alert="ingrese su usuario y contraseña, por favor";
         }else{
             require_once "conexionSASHA.php";
             $user=$_POST['usuario'];
             $pass=$_POST['clave'];
  
             $query=mysqli_query($conection, "SELECT *FROM usuario WHERE elUsuario='$user' AND contrasena='$pass'");
             $result=mysqli_num_rows($query); //esto nos devuelve un numero

             if($result > 0){
                 $data = mysqli_fetch_array($query);
                 // print_r($data);
                 $_SESSION['active']=true;
                 $_SESSION['idUser']=$data['id_usuario'];
                 $_SESSION['nombre']=$data['nombre'];
                 $_SESSION['user']=  $data['elUsuario'];

                  header('location:sistema/');

             }else{
                 $alert ="EL USUARII O O LA CLAVE SON INCORRECTOS";
                 session_destroy();
             }
   }
}
}
?>
























<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssABEL/estilo.css">

    <title>Loguin</title>

</head>
<body>

      <section id="contenedor">
          <form action="" method="post">
              <h3> iniciar sesion</h3>
              <img src="imag/entrar.jpeg" alt="loguin">
              <input type="text" name="usuario" placeholder="usuario">
              <input type="password" name="clave" placeholder="contraseña">
              <div class="alert"><?php echo (isset($alert) ? $alert : '' ) ?></div>
              <input type="submit" value="INGRESAR">
          </form>
      </section>


    
</body>
</html>