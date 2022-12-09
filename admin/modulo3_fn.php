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
    $a = new Modulo3();
    $a->modulo3_nome = addslashes($_POST['modulo3_nome']);
    $a->modulo3_descricao = addslashes($_POST['modulo3_descricao']);
    $a->modulo3_status = intval($_POST['modulo3_status']);
    $a->modulo3_id = intval($_POST['modulo3_id']);
    if (isset($_FILES['modulo3_imagem']['name']) && !empty($_FILES['modulo3_imagem']['name'])) {
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

