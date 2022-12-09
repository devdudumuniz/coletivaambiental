<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';
class Modulo5 extends Controle {
    public $db;
    public $modulo5_id;
    public $modulo5_nome;
    public $modulo5_decrcricao;
    public $modulo5_imagem;
    public $modulo5_status;
    public $modulo5_limite;
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
        if ($this->modulo5_imagem != "") {
            $this->update("modulo5", "modulo5_nome  = '$this->modulo5_nome', modulo5_descricao = '$this->modulo5_descricao',"
                    . " modulo5_status = '$this->modulo5_status', modulo5_imagem = '$this->modulo5_imagem', modulo5_limite = '$this->modulo5_limite'", "modulo5_id = '$this->modulo5_id'");
        } else {
            $this->update("modulo5", "modulo5_nome  = '$this->modulo5_nome', modulo5_descricao = '$this->modulo5_descricao',"
                    . " modulo5_status = '$this->modulo5_status',modulo5_limite = '$this->modulo5_limite'", "modulo5_id = '$this->modulo5_id'");
        }
    }

    public function removerArquivo() {
        $this->deleteArquivo("modulo5", "modulo5_id = '$this->modulo5_id'", "modulo5_imagem", "../images/");
    }

    public function enviar() {
        $this->upload("../images/", "modulo5_imagem", "i3.jpg");
    }

    public function getModulo5() {
        $this->select("modulo5", "", "*", "", "WHERE modulo5_id = 1", "");
    }

}
