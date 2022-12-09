<?php
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}


function incluir() {
    $pagina_nome = addslashes($_POST['pagina_nome']);
    $pagina_descricao = addslashes($_POST['pagina_descricao']);
    $pagina_area = intval($_POST['pagina_area']);
    $pagina_data = $_POST['pagina_data'];
    $pagina_autor = addslashes($_POST['pagina_autor']);
    $pagina_description = addslashes($_POST['pagina_description']);
    $pagina_keywords = addslashes($_POST['pagina_keywords']);

    $pagina = new Pagina();
    $pagina->pagina_nome = $pagina_nome;
    $pagina->pagina_descricao = $pagina_descricao;
    $pagina->pagina_area = $pagina_area;
    $pagina->pagina_data = $pagina_data;
    $pagina->pagina_autor = $pagina_autor;
    $pagina->pagina_description = $pagina_description;
    $pagina->pagina_keywords = $pagina_keywords;
    if (isset($_FILES['pagina_imagem']['name']) && !empty($_FILES['pagina_imagem']['name'])) {
        $pagina->enviar();
    }
    $pagina->incluir();
    Filter :: redirect("posts/?success");
}

function atualizar() {
    $a = new Pagina();
    $a->pagina_nome = addslashes($_POST['pagina_nome']);
    $a->pagina_descricao = addslashes($_POST['pagina_descricao']);
    $a->pagina_data = $_POST['pagina_data'];
    $a->pagina_autor = addslashes($_POST['pagina_autor']);
    $a->pagina_description = addslashes($_POST['pagina_description']);
    $a->pagina_keywords = addslashes($_POST['pagina_keywords']);
    $a->pagina_area  = $_POST['pagina_area'];
    $a->pagina_id  = intval($_POST['pagina_id']);
    if (isset($_FILES['pagina_imagem']['name']) && !empty($_FILES['pagina_imagem']['name'])) {
        $a->removerArquivo();
        $a->enviar();
    }
    $a->atualizar();
    Filter :: redirect("posts/?success");
}

function remover() {
    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        $r = new Pagina();
        $r->pagina_id = $id;
        $r->removerArquivo();
        $r->remover();
        Filter :: redirect("posts/?success");
    }
}

function Json() {
    if (isset($_REQUEST['pagina_id'])) {
        $pagina_id = intval($_REQUEST['pagina_id']);
        $j = new Pagina();
        $j->pagina_id =  $pagina_id;
        echo $j->JSON();
    }
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}

