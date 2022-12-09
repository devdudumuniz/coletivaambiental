<?php
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}

function incluir() {
    $servico_nome = addslashes($_POST['servico_nome']);
    $servico_icon = $_POST['servico_icon'];
    $servico_descricao = addslashes($_POST['servico_descricao']);
    $servico = new Servico();
    $servico->db = new DB;
    $servico->servico_nome = $servico_nome;
    $servico->servico_icon = $servico_icon;
    $servico->servico_descricao = $servico_descricao;
    $servico->gravar();
    Filter :: redirect("servico/?success");
}

function atualizar() {
    $servico = new Servico();
    $servico->db = new DB;
    $servico->servico_nome = addslashes($_POST['servico_nome']);
    $servico->servico_icon = $_POST['servico_icon'];
    $servico->servico_descricao = addslashes($_POST['servico_descricao']);
    $servico->servico_id = intval($_REQUEST['servico_id']);
    $servico->atualizar();
    Filter :: redirect("servico/?success");
}

function remover() {
    if (isset($_REQUEST['id'])) {
        $servico_id = intval($_REQUEST['id']);
        $r = new Servico();
        $r->servico_id = $servico_id;
        $r->remover();
        Filter :: redirect("servico/?success");
    }
}

function Json() {
    if (isset($_REQUEST['servico_id'])) {
        $servico_id = intval($_REQUEST['servico_id']);
        $j = new Servico();
        $j->servico_id = $servico_id;
        echo $j->getJason();
    }
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}



