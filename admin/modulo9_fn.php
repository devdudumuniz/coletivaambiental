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
    $a = new Modulo9();
    $a->modulo9_nome = addslashes($_POST['modulo9_nome']);
    $a->modulo9_subtitulo = addslashes($_POST['modulo9_subtitulo']);
    $a->modulo9_button = addslashes($_POST['modulo9_button']);
    $a->modulo9_status = intval($_POST['modulo9_status']);
    $a->modulo9_id = intval($_POST['modulo9_id']);
    if (isset($_FILES['modulo9_imagem']['name']) && !empty($_FILES['modulo9_imagem']['name'])) {
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

