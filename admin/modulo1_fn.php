<?php
/*
 * @author Dudu Muniz
 */
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}

function atualizar() {
    $a = new Modulo1();
    $a->modulo1_nome = addslashes($_POST['modulo1_nome']);
    $a->modulo1_subtitulo1 = addslashes($_POST['modulo1_subtitulo1']);
    $a->modulo1_status  = intval($_POST['modulo1_status']);
    $a->modulo1_id  = intval($_POST['modulo1_id']);
    if (isset($_FILES['modulo1_favicon']['name']) && !empty($_FILES['modulo1_favicon']['name'])) {
        $a->removerFavicon();
        $a->enviarFavicon();
    }
    if (isset($_FILES['modulo1_imagem']['name']) && !empty($_FILES['modulo1_imagem']['name'])) {
        $a->removerArquivo();
        $a->enviar();
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

