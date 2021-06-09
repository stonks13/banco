<?php
include_once('../config/config.php');

class DBManager extends PDO{
    public $server=SERVER;
    public $user=USER;
    public $pass=PASS;
    public $db=DB;
    public $port=PORT;
    public $conexion;
    public $manager;

    public function __construct(){
        $this->conectar();
    }

    private final function conectar(){
        $conexion=null;
        try{
            if(is_array(PDO::getAvailableDrivers())){
                if(in_array("pgsql",PDO::getAvailableDrivers())){
                    $conexion= new PDO("pgsql:host=$this->server;port=$this->port;dbname=$this->db;user=$this->user;password=$this->pass");

                }else {
                    echo "error";
                    throw new PDOException('Error');
                }
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $this->setConexion($conexion);
    }
    public final function getConexion(){
        return $this->conexion;

    }
    public final function setConexion($conexion){
        $this->conexion=$conexion;

    }
    public final function cerrarConexion(){
        $this->conexion=null;

    }
}
?>