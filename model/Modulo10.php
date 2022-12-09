<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';
class Modulo10 extends Controle {

    public $db;
    public $modulo10_id;
    public $modulo10_nome;
    public $modulo10_subtitulo;
    public $modulo10_icon;
    public $modulo10_button;
    public $modulo10_button1;
    public $modulo10_status;
    public $modulo10_paginacao;
    public $modulo10_imagem;
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
        if ($this->modulo10_imagem != "") {
            $this->update("modulo10", "modulo10_nome  = '$this->modulo10_nome', modulo10_subtitulo = '$this->modulo10_subtitulo', modulo10_icon = '$this->modulo10_icon',"
                    . " modulo10_button = '$this->modulo10_button', modulo10_button1 = '$this->modulo10_button1',"
                    . " modulo10_status = '$this->modulo10_status', modulo10_imagem = '$this->modulo10_imagem', modulo10_paginacao = '$this->modulo10_paginacao'", "modulo10_id = '$this->modulo10_id'");
        } else {
            $this->update("modulo10", "modulo10_nome  = '$this->modulo10_nome', modulo10_subtitulo = '$this->modulo10_subtitulo', modulo10_icon = '$this->modulo10_icon',"
                    . " modulo10_button = '$this->modulo10_button', modulo10_button1 = '$this->modulo10_button1',"
                    . " modulo10_status = '$this->modulo10_status', modulo10_paginacao = '$this->modulo10_paginacao'", "modulo10_id = '$this->modulo10_id'");
        }
    }

    public function removerArquivo() {
        $this->deleteArquivo("modulo10", "modulo10_id = '$this->modulo10_id'", "modulo10_imagem", "../images/");
    }

    public function enviar() {
        $this->upload("../images/", "modulo10_imagem", "soft_circles.jpg");
    }

    public function getModulo10() {
        $this->select("modulo10", "", "*", "", "WHERE modulo10_id = 1", "");
    }

}
