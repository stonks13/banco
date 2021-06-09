<?php
require_once ('../db/DBManager.php');
require_once ('../model/cliente.php');
require_once ('../model/cuenta.php');
use DBManager;

function getImage(){

    $manager=new DBManager();
    try{
        $sql='SELECT imagen FROM cliente WHERE id=4';
        $stmt=$manager->getConexion()->prepare($sql);
        
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]['imagen'];
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
function updateCliente($image,$pass){
    $manager=new DBManager();
    try{
        $sql='UPDATE cliente SET imagen=:img,email=:email,telefono=:telefono,password=:password  WHERE id=:id';
        session_start();
        $id=getUserId($_SESSION['cliente']);
        $email=$_POST['correo'];
        $telefono=$_POST['telefono'];
        $pass=password_hash($pass,PASSWORD_DEFAULT,['cost'=>10]);

        $stmt=$manager->getConexion()->prepare($sql);
        $stmt->bindValue(':img',$image,PDO::PARAM_LOB);
        $stmt->bindValue(':id',$id);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$pass);
        $stmt->bindParam(':telefono',$telefono);
        if($stmt->execute()){
            echo "todo OK";
        }else{
            echo "MAL";
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
function insertCliente($cliente){
    $manager = new DBManager();
    try{
        $sql="INSERT INTO cliente(nombre,apellidos,fecha_nacimiento,sexo,telefono,dni,email,password)VALUES(:nombre,:apellidos,:fecha_nacimiento,:sexo,:telefono,:dni,:email,:password)";
        $password=password_hash($cliente->getPassword(),PASSWORD_DEFAULT,['cost'=>10]);

        $stmt=$manager->getConexion()->prepare($sql);
        $stmt->bindParam(':nombre',$cliente->getNombre());
        $stmt->bindParam(':apellidos',$cliente->getApellido());
        $stmt->bindParam(':fecha_nacimiento',$cliente->getFechaNacimiento());
        $stmt->bindParam(':sexo',$cliente->getSexo());
        $stmt->bindParam(':telefono',$cliente->getTelefono());
        $stmt->bindParam(':dni',$cliente->getDni());
        $stmt->bindParam(':email',$cliente->getEmail());
        $stmt->bindParam(':password',$password);
        if($stmt->execute()){
            echo "OK";
        }else{
            echo "MAL";
        }
        if(password_verify('123456','$2y$10$xA/vyZ8Yn8hmpPyHnLwNe.GfZxj8bc.ZchHW6PwL9EzFb0AW0wUYS')){
            echo ' Iguales<br/>';
        }else{
            echo' Desiguales</br>';
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }

}

function getUserHash($dni){
    $conexion= new DBManager();
    try{
        $sql="SELECT * FROM cliente WHERE dni=:dni";
        $stmt=$conexion->getConexion()->prepare($sql);
        $stmt->bindParam(':dni',$dni);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]['password'];
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}


?>
