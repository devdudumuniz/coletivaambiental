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
    $a = new Modulo4();
    $a->modulo4_descricao = addslashes($_POST['modulo4_descricao']);
    $a->modulo4_status = intval($_POST['modulo4_status']);
    $a->modulo4_id = intval($_POST['modulo4_id']);
    if (isset($_FILES['modulo4_imagem']['name']) && !empty($_FILES['modulo4_imagem']['name'])) {
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

