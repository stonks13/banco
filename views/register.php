<?php require_once('../helper/i18n.php');
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors',true);
ini_set('display_startup_errors',true);
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo _("Registro");?></title>
</head>
<body>
<?php require_once('header.php');?>
<form  name="formulario" method="post" action="../controller/controller.php">
    Nombre:<input name="nombre" type="text" value="<?php if (isset($_POST['nombre'])) echo $_POST['nombre'];?>"/></br>
    Apellidos:<input name="apellidos" type="text" value="<?php if (isset($_POST['apellidos'])) echo $_POST['apellidos'];?>"/></br>
    Sexo:<select name="sexo">
        <option value="h">Hembra</option>
        <option value="m">Macho</option>
    </select></br>
    Nacimiento:<input name="nacimiento" type="date" value="<?php if (isset($_POST['nacimiento'])) echo $_POST['nacimiento'];?>"/></br>
    DNI:<input name="dni" type="text" value="<?php if (isset($_POST['dni'])) echo $_POST['dni'];?>"/></br>
    Phone:<input name="phone" type="text" value="<?php if (isset($_POST['phone'])) echo $_POST['phone'];?>"/></br>
    Email:<input name="email" type="text" value="<?php if (isset($_POST['email'])) echo $_POST['email'];?>"/></br>
    Password:<input name="password" type="password" /></br>
    <input name="control" value="register" type="hidden"></br>
    <input name="submit" value="submit" type="submit"></br>
</form>
<?php

if (isset($_POST['error']))
    echo $_POST['error'];

?>

</body>
</html>
