<?php


class Cliente
{
    private $nombre;
    private $apellido;
    private $fecha_nacimiento;
    private $sexo;
    private $telefono;
    private $dni;
    private $email;
    private $password;
    private $image;

    public function __construct($nombre, $apellido, $fecha_nacimiento, $sexo, $telefono, $dni, $email, $password, $image)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->sexo = $sexo;
        $this->telefono = $telefono;
        $this->dni = $dni;
        $this->email = $email;
        $this->password = $password;
        $this->image = $image;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    public function setFechaNacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }
}