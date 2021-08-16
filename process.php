<?php

    session_start();

    $dbuser = 'pmauser';
    $dbsenha = 'Senhanaoesquecer12345@';
    $db = 'telefonia';

    $mysqli = new mysqli('localhost', $dbuser, $dbsenha, $db) or die(mysqli_error($mysqli));
    
    $update= false;
    $cidade = '';
    $regiao = '';
    $estado = '';


if (isset($_POST['save'])){
    $cidade = $_POST['cidade'];
    $regiao = $_POST['regiao'];
    $estado = $_POST['estado'];

    $mysqli->query("INSERT INTO BASE (cidade, regiao, estado) VALUES('$cidade', '$regiao', '$estado')") or
            die($mysqli->error);

    $_SESSION['message'] = "Os dados foram salvos.";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM BASE WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Os dados foram apagados.";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}
//
//if (isset($_GET['edit']));{
//    $id = $_GET['edit'];
//    $update = true;
//    $result = $mysqli->query("SELECT * FROM BASE WHERE id=$id") or die($mysqli->error);
//    if (count($result)==1) {
//        $row = $result->fetch_array();
//        $cidade = $row['name'];
//        $regiao = $row['regiao'];
//        $estado = $row['estado'];
//    }
//}