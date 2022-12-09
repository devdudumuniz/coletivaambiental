<?php
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}


function incluir() {
    $area1_nome = $_POST['area1_nome'];
    $cad = new Area1();
    $cad->area1_nome = addslashes($area1_nome);
    $cad->incluir();
    Filter:: redirect("categoria/portfolio/?success");
}

function atualizar() {
    $area1_id = intval($_POST['area1_id']);
    $area1_nome = addslashes($_POST['area1_nome']);
    $a = new Area1();
    $a->area1_nome = $area1_nome;
    $a->area1_id = $area1_id;
    $a->atualizar();
    Filter :: redirect("categoria/portfolio/?success");
}

function remover() {
    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        $remover = new Area1();
        $remover->area1_id = $id;
        $remover->deletar();
        Filter :: redirect("categoria/portfolio/?success");
    }
}

function Json() {
    if (isset($_REQUEST['area1_id'])) {
        $area1_id = intval($_REQUEST['area1_id']);
        $j = new Area1();
        $j->area1_id = $area1_id;
        echo $j->getJason();
    }
}

function posicao() {
    $posicao = new area1();
    $posicao->updatePos();
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}

