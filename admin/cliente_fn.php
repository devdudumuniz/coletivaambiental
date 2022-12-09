<?php
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}

function incluir() {
    $cliente_nome = addslashes($_POST['cliente_nome']);
    $cliente_subtitulo = addslashes($_POST['cliente_subtitulo']);
    $cliente_descricao = addslashes($_POST['cliente_descricao']);

    $cliente = new Cliente();
    $cliente->cliente_nome = $cliente_nome;
    $cliente->cliente_subtitulo = $cliente_subtitulo;
    $cliente->cliente_descricao = $cliente_descricao;
    if (isset($_FILES['cliente_imagem']['name']) && !empty($_FILES['cliente_imagem']['name'])) {
        $cliente->enviar();
    }
    $cliente->incluir();
    Filter :: redirect("equipe/");
}

function atualizar() {
    $atualizar = new Cliente();
    $atualizar->cliente_nome = addslashes($_POST['cliente_nome']);
    $atualizar->cliente_subtitulo = addslashes($_POST['cliente_subtitulo']);
    $atualizar->cliente_descricao = addslashes($_POST['cliente_descricao']);
    $atualizar->cliente_id  = intval($_POST['cliente_id']);
    if (isset($_FILES['cliente_imagem']['name']) && !empty($_FILES['cliente_imagem']['name'])) {
        $atualizar->removerArquivo();
        $atualizar->enviar();
    }
    $atualizar->atualizar();
    Filter :: redirect("equipe/?success");
}

function remover() {
    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        $remover = new Cliente();
        $remover->cliente_id = "$id";
        $remover->removerArquivo();
        $remover->remover();
        Filter :: redirect("equipe/?success");
    }
}

function Json() {
    if (isset($_REQUEST['cliente_id'])) {
        $cliente_id = intval($_REQUEST['cliente_id']);
        $j = new Cliente();
        $j->cliente_id =  $cliente_id;
        echo $j->JSON();
    }
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}

