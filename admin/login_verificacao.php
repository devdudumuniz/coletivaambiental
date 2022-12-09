<?php
require_once '../loader.php';
@session_start();
require_once '../database/DB.php';
$db = new DB();
if (isset($_POST['usuario_login']) && isset($_POST['usuario_senha'])) {
    $login = addslashes(trim($_POST['usuario_login']));
    $senha = md5(addslashes(trim($_POST['usuario_senha'])));
    $db->str = "SELECT * FROM usuario WHERE usuario_login = '$login' AND usuario_senha = '$senha'";
    $db->query("$db->str")->fetchAll();
    if ($db->rows >= 1) {
        $_SESSION['LOGADO'] = TRUE;
        $_SESSION['USER']['EMAIL'] = $db->data->usuario_email;
        $_SESSION['USER']['NOME'] = $db->data[0]->usuario_nome;
        $_SESSION['USER']['IMAGEM'] = $db->data[0]->usuario_imagem;
        $_SESSION['USER']['ID'] = $db->data->usuario_id;
        $_SESSION['USER']['login'] = $login;
        Filter:: redirect("index.php/");
    } else {
        Filter:: redirect("logar/?erro");
    }
}