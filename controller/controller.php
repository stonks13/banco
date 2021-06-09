<?php
require('../model/cliente.php');
require('../model/clienteModel.php');
require('../model/CuentaModel.php');
require('../model/MovimientoModel.php');
require ('../helper/validations.php');

error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors',true);
ini_set('display_startup_errors',true);

if ( isset($_POST['submit']) ) {
    if ($_POST['control'] == 'register') {
        
        if (validationRegister()) {
            $cliente = new Cliente($_POST['nombre'], $_POST['apellidos'], $_POST['nacimiento'], $_POST['sexo'], $_POST['phone'], $_POST['dni'], $_POST['email'], $_POST['password'],null);
            insertCliente($cliente);
            header('Location: ../views/login.php');
        } else {
            require_once('../views/register.php');
        }


    }
    if ($_POST['control'] == 'login') {
        $hash = getUserHash($_POST['dni']);
        error_log($hash);
        if (password_verify($_POST['password'], $hash)) {
            session_start();
            $_SESSION['cliente'] = $_POST['dni'];
            header('Location: ../views/welcome.php');
        } else {
            require_once('../views/login.php');
        }
    }
    if ($_POST['control'] == 'profile') {
        $pass=$_POST['rnewpassword'];
        if (validationProfile()) {
            $check = getimagesize($_FILES['upload']['tmp_name']);
            $filename = $_FILES['upload']['name'];
            $fileSize = $_FILES['upload']['size'];
            $fileType = $_FILES['upload']['type'];
            $image = file_get_contents($_FILES['upload']['tmp_name']);

            if ($check !== false) {
                updateCliente($image,$pass);
                $data = getImage();
                ob_start();
                fpassthru($data);
                $im = ob_get_contents();
                ob_end_clean();
                echo "</br><img src='data:/image/*;base64," . base64_encode($im) . "'/>";

            }
        } else {
            require_once ('../views/profile.php');
        }
    }


    if ($_POST['control'] == 'create') {
        session_start();
        createAccount($_SESSION['cliente']);
        header("Location: ../views/welcome.php");
    }
    if ($_POST['control'] == 'transfer') {

        if (existeCuenta($_POST['cuentas']) && existeCuenta($_POST['cuenta_destino'])) {
            transfer($_POST['cuentas'], $_POST['cuenta_destino'], $_POST['cantidad']);
        }
        header("Location: ../views/query.php");
    }
    if ($_POST['control'] == 'query') {
        session_start();
        $_SESSION['saldo'] = getSaldo($_POST['cuentas']);
        $_SESSION['lista'] = getMovimientos($_POST['cuentas']);
        header("Location: ../views/query.php");
    }
    if ($_POST['control'] == 'select_account') {
        session_start();
        $saldo = getSaldo($_POST['cuentas']);
        $_SESSION['saldo'] = $saldo;
        $_SESSION['lista'] = getMovimientos($_POST['cuentas']);
        header("Location: ../views/query.php");
    }
}
?>
