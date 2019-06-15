<?php

class DB{
  private $dbHost="localhost";
  private $dbUsername="arturo";
  private $dbPassword="root";
  private $dbName="coox";

  public $db_con;

  public function __construct(){
    if(!isset($this->db)){
      try{
        $pdo=new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUsername, $this->dbPassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db_con=$pdo;
      }catch(PDOEXCEPTION $e){
        die("Failed to connect with mysql :".$e->getMessage());
      
      }
    }
  }

  public function userLogin($username, $password)
  {
    $stmt=$this->db_con->prepare("SELECT * FROM tutor WHERE correo=:username");
    $stmt->execute(array(":username"=>$username));
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $count=$stmt->rowCount();
    if($row['contrasena']==$password){
      return $count;
    }else{
      return false;
    }
  }

  public function registerUser($username, $ape1, $ape2, $correo, $contra)
  {
    $sql="INSERT into tutor (nombre, apellido1, apellido2, correo, contrasena) VALUES (:nombre, :apellido1, :apelllido2, :correo , :contrasena)";
    $stmt=$this->db_con->prepare($sql);
    $stmt->bindParam(":nombre", $username);
    $stmt->bindParam(":apellido1", $ape1);
    $stmt->bindParam(":apelllido2", $ape2);
    $stmt->bindParam(":correo", $correo);
    $stmt->bindParam(":contrasena", $contra);
    $stmt->execute();
    $newId=$this->db_con->lastInsertId();
    return $newId;
  }
}
