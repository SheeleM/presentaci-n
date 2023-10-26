
<?php
  $host ="localhost";
  $user ="root";
  $password="";
  $db="mejoraaglis";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
  $conection = @mysqli_connect ($host, $user, $password, $db);
  
  if(!$conection){
     echo "error en la conexon";
  }//else{
  // echo "conexion exitosa";
//}

?>