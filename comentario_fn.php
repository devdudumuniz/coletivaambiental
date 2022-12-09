<?php
/*
 * @author Dudu Muniz
 */
require_once './loader.php';

function incluir() {
    $pagina_nome = addslashes($_REQUEST['pagina_nome']);
    $comentario_nome = addslashes($_REQUEST['comentario_nome']);
    $comentario_email = addslashes($_REQUEST['comentario_email']);
    $comentario_mensagem = addslashes($_REQUEST['comentario_mensagem']);
    $comentario_pagina = $_REQUEST['comentario_pagina'];
    $comentario_website = $_REQUEST['comentario_website'];

    $comment = new Comment();
    $comment->comentario_nome = $comentario_nome;
    $comment->comentario_email = $comentario_email;
    $comment->comentario_mensagem = $comentario_mensagem;
    $comment->comentario_pagina = $comentario_pagina;
    $comment->comentario_website = $comentario_website;
    $comment->incluir();
    $url_redirect = "post/".Filter::slug2($pagina_nome)."/$comentario_pagina/?success#comentario";
    Filter:: redirect($url_redirect);
}

if (isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) {
    $acao = $_REQUEST['acao'];
    if (function_exists($acao)) {
        $acao();
    }
}

