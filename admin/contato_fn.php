<?php
require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}


function atualizar() {
    $a = new Contato();
    $a->contato_email = $_POST['contato_email'];
    $a->contato_telefone1 = $_POST['contato_telefone1'];
    $a->contato_telefone2 = $_POST['contato_telefone2'];
    $a->contato_telefone3 = $_POST['contato_telefone3'];
    $a->contato_telefone4 = $_POST['contato_telefone4'];
    $a->contato_telefone5 = $_POST['contato_telefone5'];
    $a->contato_telefone6 = $_POST['contato_telefone6'];
    $a->contato_endereco = $_POST['contato_endereco'];
    $a->contato_long_lat = Format::LongitudeLatitude($_POST['contato_endereco']);
    $a->contato_id = $_POST['contato_id'];
    $a->atualizar();
    Filter::redirect("contato/?success");
}
if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}

