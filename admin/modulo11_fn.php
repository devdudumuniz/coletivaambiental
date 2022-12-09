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
    $a = new Modulo11();
    $a->modulo11_nome = addslashes($_POST['modulo11_nome']);
    $a->modulo11_button = addslashes($_POST['modulo11_button']);
    $a->modulo11_id = intval($_POST['modulo11_id']);
    $a->atualizar();
    Filter :: redirect("frontend/?success");
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}

