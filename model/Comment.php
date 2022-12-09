<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';

class Comment extends Controle {

    public $db;
    public $comentario_id;
    public $comentario_nome;
    public $comentario_email;
    public $comentario_mensagem;
    public $comentario_data;
    public $comentario_status;
    public $comentario_pagina;

    public function __construct() {
        parent::__construct();
        $this->data = date('d/m/Y');
    }

    public function incluir() {
        $this->insert("comentario", "comentario_nome, comentario_email,  comentario_mensagem,  comentario_data, comentario_pagina", "'$this->comentario_nome','$this->comentario_email','$this->comentario_mensagem','$this->data',"
                . "'$this->comentario_pagina'");
    }
    
    public function atualizar() {
        $query = "comentario_mensagem  = '$this->comentario_mensagem'";
        $this->update("comentario", "$query", "comentario_id = '$this->comentario_id'");
    }

    public function getCommentPost($pagina_id) {
        $this->select("comentario", "", "*", "", " WHERE comentario_status = 1 AND comentario_pagina = $pagina_id", "");
    }

    public function getComments($id) {
        $this->select("comentario", "", "*", "", "INNER JOIN pagina ON (comentario_pagina = pagina_id)WHERE comentario_pagina = $id order by comentario_status = 0 ASC, comentario_id DESC", "");
    }

    public function remover() {
        $this->delete("comentario", "comentario_id = $this->comentario_id");
    }

    public function mudarStatus($comentario_id, $comentario_status) {
        $this->Moderar("comentario", "comentario_status", "comentario_id", "$comentario_id", "$comentario_status");
    }

    public function Contar($id) {
        $this->getCount("comentario", "INNER JOIN pagina ON (comentario_pagina = pagina_id) and comentario_status = 1 WHERE pagina_id = $id");
    }

    public function getComentarios() {
        $this->select("comentario", "", "*", "", "INNER JOIN pagina ON (comentario_pagina = pagina_id) WHERE comentario_status = 0", "");
    }



    public function Contarstatus0($tabela) {
        $this->getCount("$tabela", "WHERE comentario_status = 0");
    }

}
