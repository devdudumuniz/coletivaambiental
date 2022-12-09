<?php
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:logar/');
    exit;
}

function incluir() {
    $slide = new Slide();
    $slide->slide_nome = addslashes($_POST['slide_nome']);
    $slide->slide_subtitulo = addslashes($_POST['slide_subtitulo']);
    $slide->slide_subtitulo1 = addslashes($_POST['slide_subtitulo1']);
    if (isset($_FILES['slide_imagem']['name']) && !empty($_FILES['slide_imagem']['name'])) {
        $slide->enviar();
    }
    $slide->incluir();
    Filter::redirect("slide/?success");
}

function Json() {
        $j = new Slide();
        $j->slide_id =  intval($_REQUEST['slide_id']);
        echo $j->JSON();
}

function atualizar() {
    $a = new Slide();
    $a->slide_nome = addslashes($_POST['slide_nome']);
    $a->slide_subtitulo = addslashes($_POST['slide_subtitulo']);
    $a->slide_subtitulo1 = addslashes($_POST['slide_subtitulo1']);
    $a->slide_id  = intval($_POST['slide_id']);
    if (isset($_FILES['slide_imagem']['name']) && !empty($_FILES['slide_imagem']['name'])) {
        $a->removerArquivo();
        $a->enviar();
    }
    $a->atualizar();
    Filter :: redirect("slide/?success");
}

function remover() {
    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        $r = new Slide();
        $r->slide_id = $id;
        $r->removerArquivo();
        $r->remover();
        Filter::redirect("slide/?success");
    }
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}
