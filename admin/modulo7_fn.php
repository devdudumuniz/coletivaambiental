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
    $a = new Modulo7();
    $a->modulo7_nome = addslashes($_POST['modulo7_nome']);
    $a->modulo7_descricao = addslashes($_POST['modulo7_descricao']);
    $a->modulo7_status = intval($_POST['modulo7_status']);
    $a->modulo7_id = intval($_POST['modulo7_id']);
    $a->atualizar();
    Filter :: redirect("frontend/?success");
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}

