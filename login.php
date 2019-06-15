<?php

include "config/db.php";

$db= new DB();

$loginuser = $_POST['loginuser'];	
$username = $_POST['username'];
$userpassword = $_POST['userpassword'];

if(isset($loginuser) && ($loginuser)=="true"){
	//echo "primer if";

  if(!empty($username) && !empty($userpassword)){
  	//echo "segunfi if";

    $result=$db->userLogin($username , $userpassword);
    if($result>0){
      echo "success";
    }else{
      echo "error";
    }
  }
}