<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';
class Modulo1 extends Controle {

    public $modulo1_id;
    public $modulo1_nome;
    public $modulo1_subtitulo1;
    public $modulo1_status;

    public function __construct() {
        parent::__construct();      
    }

    public function atualizar() {
        $query = "modulo1_nome = '$this->modulo1_nome', modulo1_subtitulo1  = '$this->modulo1_subtitulo1', modulo1_status = '$this->modulo1_status'";
        $this->update("modulo1", "$query", "modulo1_id = '$this->modulo1_id'");
    }

    public function removerArquivo() {
        $this->deleteArquivo("modulo1", "modulo1_id = '$this->modulo1_id'", "modulo1_imagem", "../images/");
    }

    public function enviar() {
        $this->upload("../images/", "modulo1_imagem", "");
    }

    public function removerFavicon() {
        $this->deleteArquivo("modulo1", "modulo1_id = '$this->modulo1_id'", "modulo1_favicon", "./assets/img/ico/");
    }

    public function enviarFavicon() {
        $this->upload("./assets/img/ico/", "modulo1_favicon", "favicon.ico");
    }

    public function getModulo1() {
        $this->select("modulo1", "", "*", "", "WHERE modulo1_id = 1", "");
    }

}
