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
    $a = new Modulo6();
    $a->modulo6_nome = addslashes($_POST['modulo6_nome']);
    $a->modulo6_descricao = addslashes($_POST['modulo6_descricao']);
    $a->modulo6_nome1 = addslashes($_POST['modulo6_nome1']);
    $a->modulo6_descricao1 = addslashes($_POST['modulo6_descricao1']);
    $a->modulo6_status = intval($_POST['modulo6_status']);
    $a->modulo6_id = intval($_POST['modulo6_id']);
    if (isset($_FILES['modulo6_imagem']['name']) && !empty($_FILES['modulo6_imagem']['name'])) {
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

