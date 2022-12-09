<?php
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}

function atualizar() {
    $update = new Site();
    $update->site_meta_titulo = addslashes($_POST['site_meta_titulo']);
    $update->site_meta_autor = addslashes($_POST['site_meta_autor']);
    $update->site_meta_palavra = addslashes($_POST['site_meta_palavra']);
    $update->site_meta_desc = addslashes($_POST['site_meta_desc']);
    $update->site_analytics = $_POST['site_analytics'];
    $update->site_id = intval($_POST['site_id']);
    $update->atualizar();
    Filter :: redirect("seo/?success");
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}

