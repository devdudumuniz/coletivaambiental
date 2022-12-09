<?php
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}

function incluir() {
    $depoimento_nome = addslashes($_POST['depoimento_nome']);
    $depoimento_cargo = addslashes($_POST['depoimento_cargo']);
    $depoimento_sobre = addslashes($_POST['depoimento_sobre']);

    $depoimento = new Depoimento();
    $depoimento->depoimento_nome = $depoimento_nome;
    $depoimento->depoimento_cargo = $depoimento_cargo;
    $depoimento->depoimento_sobre = $depoimento_sobre;
    if (isset($_FILES['depoimento_imagem']['name']) && !empty($_FILES['depoimento_imagem']['name'])) {
        $depoimento->enviar();
    }
    $depoimento->incluir();
    Filter :: redirect("depoimentos/?success");
}

function atualizar() {
    $atualizar = new Depoimento();
    $atualizar->depoimento_nome = addslashes($_POST['depoimento_nome']);
    $atualizar->depoimento_cargo = addslashes($_POST['depoimento_cargo']);
    $atualizar->depoimento_sobre = addslashes($_POST['depoimento_sobre']);
    $atualizar->depoimento_id  = intval($_POST['depoimento_id']);
    if (isset($_FILES['depoimento_imagem']['name']) && !empty($_FILES['depoimento_imagem']['name'])) {
        $atualizar->removerArquivo();
        $atualizar->enviar();
    }
    $atualizar->atualizar();
    Filter :: redirect("depoimentos/?success");
}

function remover() {
    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        $remover = new Depoimento();
        $remover->depoimento_id = $id;
        $remover->removerArquivo();
        $remover->remover();
        Filter :: redirect("depoimentos/?success");
    }
}

function Json() {
    if (intval($_REQUEST['depoimento_id'])) {
        $depoimento_id = intval($_REQUEST['depoimento_id']);
        $j = new Depoimento();
        $j->depoimento_id =  $depoimento_id;
        echo $j->JSON();
    }
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}

