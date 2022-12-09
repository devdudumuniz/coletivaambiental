<?php

require_once '../loader.php';
@session_start();
if ($_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}

function moderar() {
    $pagina_id = intval($_REQUEST['pagina_id']);
    $comment = new Comment;
    $comment_id = intval($_REQUEST['id']);
    $comment_status = intval($_REQUEST['status']);
    $comment->mudarStatus($comment_id, $comment_status);
    Filter :: redirect("post/comentarios/$pagina_id/?success");
}

function remover() {
    $pagina_id = intval($_REQUEST['pagina_id']);
    if (isset($_REQUEST['id'])) {
        $comentario_id = intval($_REQUEST['id']);
        $r = new Comment();
        $r->comentario_id = $comentario_id;
        $r->remover();
        Filter :: redirect("post/comentarios/$pagina_id/?success");
    }
}

function atualizar() {
    $pagina_id = intval($_REQUEST['pagina_id']);
    $comentario_id = intval($_POST['comentario_id']);
    $comentario_mensagem = addslashes($_POST['comentario_mensagem']);
    $a = new Comment();
    $a->comentario_mensagem = $comentario_mensagem;
    $a->comentario_id = $comentario_id;
    $a->atualizar();
    Filter :: redirect("post/comentarios/$pagina_id/?success");
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}

