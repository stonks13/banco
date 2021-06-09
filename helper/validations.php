<?php
function validationRegister(){
    if ( !CompruebaNombre($_POST['nombre'])){
        $_POST['error'].= $_POST['nombre'] . " no es válido, sólo se admiten carácteres y espacios</br>";
        $_POST['nombre'] = '';
        return false;
    }
    if(!CompruebaApellidos($_POST['apellidos'])){
        $_POST['error'].=$_POST['apellidos']. "no es valido, sólo se admiten carácteres y espacios</br>";
        $_POST['apellidos']= '';
        return false;
    }
    if(!ComprobarDNI($_POST['dni'])){
        $_POST['error'].=$_POST['dni']. "no es valido</br>";
        $_POST['dni']= '';
        return false;
    }
    if(!ComprobarEdad($_POST['nacimiento'])){
        $_POST['error'].=$_POST['nacimiento']. "no es valido</br>";
        $_POST['nacimiento']= '';
        return false;
    }
    if(!ComprobarPhone($_POST['phone'])){
        $_POST['error'].=$_POST['phone']. "no es valido</br>";
        $_POST['phone']= '';
        return false;
    }if(!ComprobarEmail($_POST['email'])){
        $_POST['error'].=$_POST['email']. "no es valido</br>";
        $_POST['email']= '';
        return false;
    }
    if(!ComprobarPassword($_POST['password'])){
        $_POST['error'].=$_POST['password']. "no es valido,debe contener una minuscula, una mayuscula, un numero, ser mayor de 8 caracteres y un caracter especial</br>";
        $_POST['password']= '';
        return false;
    }
    return true;
}

function CompruebaNombre()
{
    if ( preg_match("/[a-zA-Z ]+/",$_POST['nombre'])){
        return true;
    }
    return false;
}
function CompruebaApellidos()
{
    if ( preg_match("/[a-zA-Z ]+/",$_POST['apellidos'])){
        return true;
    }
    return false;
}

function ComprobarDNI(){
    $letra = substr($_POST['dni'], -1);
    error_log($letra );
    $numeros = substr($_POST['dni'], 0, -1);
    error_log(substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1));
    if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
        return true;
    }else{
        return false;
    }
}

function ComprobarEdad(){
    $mayor=18;

    $nacio = DateTime::createFromFormat('Y-m-d', $_POST['nacimiento']);
    $calculo = $nacio->diff(new DateTime());

    $edad=  $calculo->y;

    if ($edad < $mayor) {
        return false;
    }else{
        return true;
    }
}

;
function ComprobarPhone(){
    if(strlen($_POST['phone'])==9){
        if($_POST['phone'][0]==6 || $_POST['phone'][0]==7){
            return true;
        }
    }else{
        return false;
    }
}
function ComprobarEmail(){
    return (false !== strpos($_POST['email'], "@") && false !== strpos($_POST['email'], "."));
}
function ComprobarPassword(){
    if(strlen($_POST['password']) < 8){
        return false;
    }
    if (!preg_match('`[a-z]`',$_POST['password'])){
        return false;
    }
    if (!preg_match('`[A-Z]`',$_POST['password'])){
        return false;
    }
    if (!preg_match('`[0-9]`',$_POST['password'])){
        return false;
    }if (!preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/',$_POST['password'])){
        return false;
    }
    return true;
}


function ComprobarTelf(){
    if(strlen($_POST['telefono'])==9){
        if($_POST['telefono'][0]==6 || $_POST['telefono'][0]==7){
            return true;
        }
    }else{
        return false;
    }
}
function ComprobarCorreo(){
    return (false !== strpos($_POST['correo'], "@") && false !== strpos($_POST['correo'], "."));
}
function ComprobarPAsswordNueva(){
    if(strlen($_POST['newpassword']) < 8){
        error_log("entra 1\n");
        return false;
    }
    if (!preg_match('`[a-z]`',$_POST['newpassword'])){
        error_log("entra 2\n");
        return false;
    }
    if (!preg_match('`[A-Z]`',$_POST['newpassword'])){
        error_log("entra 3\n");
        return false;
    }
    if (!preg_match('`[0-9]`',$_POST['newpassword'])){
        error_log("entra 4\n");
        return false;
    }if (!preg_match('[!]',$_POST['newpassword'])){
        error_log("entra 5\n");
   // }if (!preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/',$_POST['newpassword'])){
        return false;
    }
    if($_POST['newpassword']!=$_POST['rnewpassword']){
        error_log("entra 6\n");
        return false;
    }/*if($_POST['password']!=$_POST['newpassword']){
        error_log("entra 7\n");
        return false;
    }*/
    return true;
}
function validationProfile(){

    if(!ComprobarTelf($_POST['telefono'])){
        $_POST['error'].=$_POST['telefono']. "no es valido</br>";
        $_POST['telefono']= '';
        return false;
    }if(!ComprobarCorreo($_POST['correo'])){
        $_POST['error'].=$_POST['correo']. "no es valido</br>";
        $_POST['correo']= '';
        return false;
    }
    if(!ComprobarPasswordNueva($_POST['rnewpassword'])){
        $_POST['error'].=$_POST['rnewpassword']. "no es valido,debe contener una minuscula, una mayuscula, un numero, ser mayor de 8 caracteres y un caracter especial y deben ser ambas contraseñas iguales</br>";
        $_POST['rnewpassword']= '';
        return false;
    }
    return true;
}

?>