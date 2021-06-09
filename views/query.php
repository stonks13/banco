<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<?php session_start();
if (isset($_SESSION['cliente'])){
?>
<h1>Query:</h1>
<h2>Transacciones:</h2></br>

<a href="welcome.php">Welcome</a></br>
<a href="transfer.php">Transfer</a></br>
<a href="profile.php">Profile</a></br>
<a href="logout.php">Logout</a></br>
<form action="../controller/controller.php" method="post">
<select name="cuentas">
    <?php
    require_once('../model/CuentaModel.php');
    $accounts=getAccounts($_SESSION['cliente']);
    for ($i=0; $i<sizeof($accounts) ;$i++){?>
        <option value="<?php echo $accounts[$i]["id"]?>"><?php echo $accounts[$i]["id"] ?></option>
    <?php }
    ?>
</select>
    <input name="submit" type="submit" value="Seleccionar"/>
    <input name="control" type="hidden" value="query"/>
    </form>
    <?php
    require_once('../model/MovimientoModel.php');
    if (isset($_SESSION['saldo'])) {
        echo "Saldo: " . $_SESSION['saldo'] . '<br/>';
    }
    //if (isset($_SESSION['lista']))
        $movimientos=$_SESSION['lista'];
        echo '<table class="default"  rules="all" frame="border">';
        echo '<tr>';
        echo '<th>origen</th>';
        echo '<th>destino</th>';
        echo '<th>hora</th>';
        echo '<th>cantidad</th>';
        echo '</tr>';
        for ($i=0;$i<count($movimientos);$i++){
            echo '<tr>';
            echo '<td>'.$movimientos[$i]['id_origen'].'</td>';
            echo '<td>'.$movimientos[$i]['id_destino'].'</td>';
            echo '<td>'.$movimientos[$i]['fecha'].'</td>';
            echo '<td>'.$movimientos[$i]['cantidad'].'</td>';
            echo '</tr>';
        }
        echo '</table>';

    //}

    ?>

<?php }else{
    header('Location: ../views/login.php');

}?>
</body>

