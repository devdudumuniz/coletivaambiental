<?php
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}

function atualizar() {
    $a = new ModuloAparencia();
    $a->modulo_aparencia_cor  = $_POST['modulo_aparencia_cor'];
    $a->modulo_aparencia_id  = intval($_POST['modulo_aparencia_id']);
    if (isset($_FILES['modulo_aparencia_favicon']['name']) && !empty($_FILES['modulo_aparencia_favicon']['name'])) {
        $a->removerFavicon();
        $a->enviarFavicon();
    }
    if (isset($_FILES['modulo_aparencia_logo']['name']) && !empty($_FILES['modulo_aparencia_logo']['name'])) {
        $a->removerLogo();
        $a->enviarLogo();
    }
    $a->atualizar();
    Filter :: redirect("frontend/?success");
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}

