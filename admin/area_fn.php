<?php
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}

function incluir() {
    $nome = addslashes($_POST['area_nome']);
    $cad = new Area();
    $cad->area_nome = $nome;
    $cad->incluir();
    Filter :: redirect("categoria/post/?success");
}

function atualizar() {
    $area_id = intval($_POST['area_id']);
    $area_nome = addslashes($_POST['area_nome']);
    $a = new Area();
    $a->area_nome = $area_nome;
    $a->area_id = $area_id;
    $a->atualizar();
    Filter :: redirect("categoria/post/?success");
}

function remover() {
    $pagina = new Pagina;
    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        $remover = new Area();
        $remover->area_id = $id;
        $remover->deletar();
        $pagina->removerArquivo();
        Filter :: redirect("categoria/post/?success");
    }
}

function Json() {
    if (isset($_REQUEST['area_id'])) {
        $area_id = intval($_REQUEST['area_id']);
        $j = new Area();
        $j->area_id = $area_id;
        echo $j->getJason();
    }
}

function posicao() {
    $posicao = new area();
    $posicao->updatePos();
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}

