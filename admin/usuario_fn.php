<?php
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}


function insert() {
    $usuario_nome = addslashes($_POST['usuario_nome']);
    $usuario_email = $_POST['usuario_email'];
    $usuario_login = addslashes($_POST['usuario_login']);
    $usuario_senha = md5($_POST['usuario_senha']);

    $usuario = new Usuario();
    $usuario->usuario_nome = $usuario_nome;
    $usuario->usuario_email = $usuario_email;
    $usuario->usuario_login = $usuario_login;
    $usuario->usuario_senha = $usuario_senha;
    if (isset($_FILES['usuario_imagem']['name']) && !empty($_FILES['usuario_imagem']['name'])) {
        $usuario->enviar();
    }
    $usuario->gravar();
    Filter :: redirect("usuario/?success");
}

function atualizar() {
    $a = new Usuario();
    if (isset($_REQUEST['usuario_senha']) && !empty($_REQUEST['usuario_senha'])) {
        $senha = md5($_REQUEST['usuario_senha']);
        $a->usuario_senha = ("$senha");
    }
    $a->usuario_nome = addslashes($_POST['usuario_nome']);
    $a->usuario_email = $_POST['usuario_email'];
    $a->usuario_login = addslashes($_POST['usuario_login']);
    $a->usuario_id = intval($_REQUEST['usuario_id']);
    if (isset($_FILES['usuario_imagem']['name']) && !empty($_FILES['usuario_imagem']['name'])) {
        $a->removerArquivo();
        $a->enviar();
    }
    $a->atualizar();
    Filter :: redirect("usuario/?success");
}

function remover() {
    if (isset($_REQUEST['id'])) {
        $usuario_id = intval($_REQUEST['id']);
        $r = new Usuario();
        $r->usuario_id = $usuario_id;
        $r->removerArquivo();
        $r->remover();
        Filter :: redirect("usuario/?success");
    }
}

function Json() {
    if (isset($_REQUEST['usuario_id'])) {
        $usuario_id = intval($_REQUEST['usuario_id']);
        $j = new Usuario();
        $j->usuario_id = $usuario_id;
        echo $j->getJason();
    }
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}

