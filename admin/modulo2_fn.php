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
    $a = new Modulo2();
    $a->modulo2_nome = addslashes($_POST['modulo2_nome']);
    $a->modulo2_nome1 = addslashes($_POST['modulo2_nome1']);
    $a->modulo2_nome2 = addslashes($_POST['modulo2_nome2']);
    $a->modulo2_nome3 = addslashes($_POST['modulo2_nome3']);
    $a->modulo2_nome4 = addslashes($_POST['modulo2_nome4']);
    $a->modulo2_nome5  = addslashes($_POST['modulo2_nome5']);
    $a->modulo2_nome6  = addslashes($_POST['modulo2_nome6']);
    $a->modulo2_nome7  = addslashes($_POST['modulo2_nome7']);
    $a->modulo2_nome8  = addslashes($_POST['modulo2_nome8']);
    $a->modulo2_status  = intval($_POST['modulo2_status']);
    $a->modulo2_id  = intval($_POST['modulo2_id']);
    $a->atualizar();
    Filter :: redirect("frontend/?success");
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}

