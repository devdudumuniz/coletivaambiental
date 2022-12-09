<?php
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}

function atualizar() {
    $social_url = ($_POST['social_url']);
    $social_id = ($_REQUEST['social_id']);
    $update = new Social();
    $update->social_url = $social_url;
    $update->social_id = $social_id;
    $update->atualizar();
    Filter :: redirect("social/?success");
}


function moderar() {
    $moderar = new Social();
    $social_id = $_REQUEST['id'];
    $social_status = $_REQUEST['status'];
    $moderar->mudarStatus($social_id, $social_status);
    Filter :: redirect("social/?success");
}

function Json() {
    if (isset($_REQUEST['social_id'])) {
        $social_id = intval($_REQUEST['social_id']);
        $jason = new Social();
        $jason->social_id = $social_id;
        echo $jason->JSON();
    }
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}

