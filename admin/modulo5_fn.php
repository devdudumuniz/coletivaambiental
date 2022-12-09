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
    $a = new Modulo5();
    $a->modulo5_nome = addslashes($_POST['modulo5_nome']);
    $a->modulo5_descricao = addslashes($_POST['modulo5_descricao']);
    $a->modulo5_imagem = $_POST['modulo5_imagem'];
    $a->modulo5_status = intval($_POST['modulo5_status']);
    $a->modulo5_limite = intval($_POST['modulo5_limite']);
    $a->modulo5_id = intval($_POST['modulo5_id']);
    if (isset($_FILES['modulo5_imagem']['name']) && !empty($_FILES['modulo5_imagem']['name'])) {
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

