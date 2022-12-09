<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';
class Modulo9 extends Controle {

    public $bd;
    public $modulo9_id;
    public $modulo9_nome;
    public $modulo9_subtitulo;
    public $modulo9_button;
    public $modulo9_imagem;
    public $modulo9_status;
    public $result;

    public function __construct() {
        parent::__construct();
        require_once 'Registry.php';
        $registry = Registry::getInstance();
        if( $registry->get('db') == false ) {
            $registry->set('db', new DB);
        }
        $this->db = $registry->get('db');           
    }

    public function atualizar() {
        if ($this->modulo1_imagem != "") {
            $this->update("modulo1", "modulo9", "modulo9_nome  = '$this->modulo9_nome', modulo9_subtitulo = '$this->modulo9_subtitulo',"
                    . "modulo9_button = '$this->modulo9_button', modulo9_imagem = '$this->modulo9_imagem', modulo9_status = '$this->modulo9_status'", "modulo9_id = '$this->modulo9_id'");
        } else {
            $this->update("modulo9", "modulo9_nome  = '$this->modulo9_nome', modulo9_subtitulo = '$this->modulo9_subtitulo',"
                    . "modulo9_button = '$this->modulo9_button', modulo9_status = '$this->modulo9_status'", "modulo9_id = '$this->modulo9_id'");
        }
    }

    public function removerArquivo() {
        $this->deleteArquivo("modulo9", "modulo9_id = '$this->modulo9_id'", "modulo9_imagem", "../images/");
    }

    public function enviar() {
        $this->upload("../images/", "modulo9_imagem", "i5.jpg");
    }

    public function getModulo9() {
        $this->select("modulo9", "", "*", "", "WHERE modulo9_id = 1", "");
    }

}
