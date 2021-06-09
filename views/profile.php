<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo _("Profile");?></title>
</head>
<body>
<h1>Profile:</h1>
</br>
<a href="welcome.php">Welcome</a>

<?php require_once('header.php');?>
<form action="../controller/controller.php" method="post" enctype="multipart/form-data">
    Email:
    <input type="text" name="correo" required><br/>
    Telefono:
    <input type="text" name="telefono"  required><br/>
    Contraseña vieja:
    <input type="password" name="oldpassword" required><br/>
    Nueva contraseña:
    <input type="password" name="newpassword" required><br/>
    Vuelve a escribir la nueva contraseña:
    <input type="password" name="rnewpassword" required><br/>
    <input type="file" name="upload" id="upload"><br/>
    <input type="hidden" value="profile" name="control">
    <input type="submit" value="submit" name="submit"><br/>
</form>
<?php

if (isset($_POST['error']))
    echo $_POST['error'];

?>
</body>
</html>
