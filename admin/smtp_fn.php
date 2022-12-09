<?php
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}

function atualizar() {
    $a = new Smtpr();
    $a->smtp_port = $_POST['smtp_port'];
    $a->smtp_host = $_POST['smtp_host'];
    $a->smtp_username = $_POST['smtp_username'];
    $a->smtp_fromname = $_POST['smtp_fromname'];
    $a->smtp_bcc = $_POST['smtp_bcc'];
    $a->smtp_id = $_POST['smtp_id'];
    if (isset($_POST['smtp_password']) && !empty($_POST['smtp_password'])) {
        $a->smtp_password = $_POST['smtp_password'];
    }
    $a->atualizar();
    Filter :: redirect("config/email/?success");
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}
