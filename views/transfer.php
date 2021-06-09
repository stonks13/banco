<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo _("Login");?></title>
</head>
<body>
<h1>Transfer:</h1></br>


</br>
<a href="welcome.php">Welcome</a></br>
<a href="query.php">Busqueda</a></br>
<a href="profile.php">Profile</a></br>
<a href="logout.php">Logout</a></br>


<form action="../controller/controller.php" method="post">
    <select name="cuentas">

        <?php
        require_once('../model/CuentaModel.php');
        require('../model/MovimientoModel.php');
        session_start();
        $accounts=getAccounts($_SESSION['cliente']);
        for ($i=0; $i<sizeof($accounts) ;$i++){?>
            <option><?php echo $accounts[$i]["id"] ?></option>
        <?php }?>
    </select>
    Cuenta destino: <input name="cuenta_destino" type="text" />
    Cantidad: <input name="cantidad" type="text" />
    <input name="submit" type="submit" value="Seleccionar"/>
    <input name="control" type="hidden" value="transfer"/>
</form>


</body>
