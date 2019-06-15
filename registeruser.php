<?php

include "config/db.php";

$db= new DB();

echo "antes if ";
if(isset($_POST['registeruser']) && $_POST['registeruser']=="true"){
	echo "1 if ";
  if(!empty($_POST['nombre']) && !empty($_POST['apellido1']) && !empty($_POST['apellido2']) 
  	&& !empty($_POST['correo']) && !empty($_POST['contrasena']) )  {
    echo "2 if ";
    $result=$db->registerUser($_POST['nombre'], $_POST['apellido1'], $_POST['apellido2'], $_POST['correo'], $_POST['contrasena']);
    echo "result  if ";
    if($result>0){
      echo "success";
    }else{
      echo "error";
    }
  }
}