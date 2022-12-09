<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';
class Modulo6 extends Controle {

    public $bd;
    public $modulo6_id;
    public $modulo6_nome;
    public $modulo6_descricao;
    public $modulo6_nome1;
    public $modulo6_descricao1;
    public $modulo6_status;
    public $modulo6_imagem;
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
        if ($this->modulo6_imagem != "") {
            $this->update("modulo6", "modulo6_nome  = '$this->modulo6_nome', modulo6_descricao = '$this->modulo6_descricao',"
                    . "modulo6_nome1 = '$this->modulo6_nome1', modulo6_descricao1 = '$this->modulo6_descricao1', modulo6_imagem = '$this->modulo6_imagem', modulo6_status = '$this->modulo6_status'", "modulo6_id = '$this->modulo6_id'");
        } else {
            $this->update("modulo6", "modulo6_nome  = '$this->modulo6_nome', modulo6_descricao = '$this->modulo6_descricao',"
                    . " modulo6_nome1 = '$this->modulo6_nome1', modulo6_descricao1 = '$this->modulo6_descricao1', modulo6_status = '$this->modulo6_status'", "modulo6_id = '$this->modulo6_id'");
        }
    }

    public function removerArquivo() {
        $this->deleteArquivo("modulo6", "modulo6_id = '$this->modulo6_id'", "modulo6_imagem", "../images/");
    }

    public function enviar() {
        $this->upload("../images/", "modulo6_imagem", "i1.jpg");
    }

    public function getModulo6() {
        $this->select("modulo6", "", "*", "", "WHERE modulo6_id = 1", "");
    }

}
