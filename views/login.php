<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<form action="../controller/controller.php" method="post">
    <p>DNI</p>
    <input name="dni" type="text" />
    <p>Password</p>
    <input name="password" type="password"/>
    <input name="control" value="login" type="hidden"/>
    <input name="submit" value="submit" type="submit">
</form>
<?php
/*
session_start();
if (isset($_SESSION['a']))
    echo $_SESSION['a'];
session_destroy();
*/
?>

</body>
</html>
