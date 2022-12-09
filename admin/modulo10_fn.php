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
    $a = new Modulo10();
    $a->modulo10_nome = addslashes($_POST['modulo10_nome']);
    $a->modulo10_subtitulo = addslashes($_POST['modulo10_subtitulo']);
    $a->modulo10_icon = addslashes($_POST['modulo10_icon']);
    $a->modulo10_button = addslashes($_POST['modulo10_button']);
    $a->modulo10_button1 = addslashes($_POST['modulo10_button1']);
    $a->modulo10_status = intval($_POST['modulo10_status']);
    $a->modulo10_paginacao = intval($_POST['modulo10_paginacao']);
    $a->modulo10_id = intval($_POST['modulo10_id']);
    if (isset($_FILES['modulo10_imagem']['name']) && !empty($_FILES['modulo10_imagem']['name'])) {
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

