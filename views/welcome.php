<?php
session_start();
echo "Bienvenido". $_SESSION['cliente'];
?>
<?php
function listarPersonas()
{
    $conexion=pg_connect("user=itb password=itb host=localhost dbname=banco")or die("Error al conectar: ".pg_last_error());
    $sql = "SELECT * FROM cliente";
    $ok = true;
    $rs = pg_query( $conexion, $sql );
    if( $rs )
    {
        if( pg_num_rows($rs) > 0 )
        {
            echo "<p/>LISTADO DE PERSONAS<br/>";
            echo "===================<p />";
            while( $obj = pg_fetch_object($rs) )
                echo $obj->id." - ".$obj->nombre."<br />";
        }
        else
            echo "<p>No se encontraron personas</p>";
    }
    else
        $ok = false;
    return $ok;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<title><?php echo _("Welcome");?></title>
<body>
</br>
<a href="profile.php">Profile</a></br>
<a href="logout.php">Logout</a></br>
<a href="transfer.php">Transfer</a></br>
<a href="query.php">Query</a></br>

<h2>Añadir:</br></h2>
<form action="../controller/controller.php" method="post">
    <input name="submit" type="submit" value="Crear cuenta"/>
    <input name="control" type="hidden" value="create"/>
</form>

<h2>Prueba de query</h2>
<?php
listarPersonas();
?>
<h2>Cuentas:</h2>
<form action="../controller/controller.php" method="post">
    <select name="cuentas">
        <?php
        require_once('../model/CuentaModel.php');
        $accounts=getAccounts($_SESSION['cliente']);
        for ($i=0; $i<sizeof($accounts) ;$i++){?>
            <option><?php echo $accounts[$i]['id']; ?></option>
        <?php }?>
    </select>
    <input name="submit" type="submit" value="Seleccionar"/>
    <input name="control" type="hidden" value="select_account"/>
</form>
</body>
</html>
