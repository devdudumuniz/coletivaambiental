<?php
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}

function incluir() {
    $portfolio_nome = addslashes($_POST['portfolio_nome']);
    $portfolio_cliente = addslashes($_POST['portfolio_cliente']);
    $portfolio_descricao = addslashes($_POST['portfolio_descricao']);
    $portfolio_area1 = $_POST['portfolio_area1'];
    $portfolio_url = $_POST['portfolio_url'];
    $portfolio_data = $_POST['portfolio_data'];

    $portfolio = new Portfolio();
    $portfolio->portfolio_nome = $portfolio_nome;
    $portfolio->portfolio_cliente = $portfolio_cliente;
    $portfolio->portfolio_data = $portfolio_data;
    $portfolio->portfolio_descricao = $portfolio_descricao;
    $portfolio->portfolio_area1 = $portfolio_area1;
    $portfolio->portfolio_url = $portfolio_url;
    if (isset($_FILES['portfolio_imagem']['name']) && !empty($_FILES['portfolio_imagem']['name'])) {
        $portfolio->enviar();
    }
    $portfolio->incluir();

    $id = $portfolio->db->getId();
    Filter :: redirect("portfolio/editar/$id/");
}

function atualizar() {
    $a = new Portfolio();
    $a->portfolio_nome = addslashes($_POST['portfolio_nome']);
    $a->portfolio_cliente = addslashes($_POST['portfolio_cliente']);
    $a->portfolio_data = $_POST['portfolio_data'];
    $a->portfolio_descricao = addslashes($_POST['portfolio_descricao']);
    $a->portfolio_area1 = $_POST['portfolio_area1'];
    $a->portfolio_url = $_POST['portfolio_url'];
    $a->portfolio_id = intval($_POST['portfolio_id']);
    if (isset($_FILES['portfolio_imagem']['name']) && !empty($_FILES['portfolio_imagem']['name'])) {
        $a->removerArquivo();
        $a->enviar();
    }
    $a->atualizar();
    Filter :: redirect("portfolio/?success");
}

function remover() {
    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        $r = new Portfolio();
        $r->portfolio_id = $id;
        $r->removerArquivo();
        $r->remover();
        Filter :: redirect("portfolio/?success");
    }
}

function removerFoto() {
    $portfolio_id = $_REQUEST['portfolio_id'];
    foreach ($_POST['fotos'] as $foto_id) {
        $foto = new Foto();
        $foto->foto_id = "$foto_id";
        $foto->removerImagem();
        $foto->remover();
    }
    Filter:: redirect("portfolio_editar.php?id=$portfolio_id&removido");
}

function Json() {
    if (isset($_REQUEST['portfolio_id'])) {
        $portfolio_id = intval($_REQUEST['portfolio_id']);
        $j = new Portfolio();
        $j->portfolio_id = $portfolio_id;
        echo $j->JSON();
    }
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}

