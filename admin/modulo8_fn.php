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
    $a = new Modulo8();
    $a->modulo8_nome = addslashes($_POST['modulo8_nome']);
    $a->modulo8_descricao = addslashes($_POST['modulo8_descricao']);
    $a->modulo8_status = intval($_POST['modulo8_status']);
    $a->modulo8_id = intval($_POST['modulo8_id']);
    $a->atualizar();
    Filter :: redirect("frontend/?success");
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}

