<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';
class Depoimento extends Controle {

    public $db;
    public $depoimento_id;
    public $depoimento_nome;
    public $depoimento_cargo;
    public $depoimento_sobre;
    public $depoimento_imagem;
    public $result;

    public function __construct() {
        parent::__construct();      
        $this->data = date('d/m/Y');
        
    }

    public function incluir() {
        $this->insert("depoimento", "depoimento_nome, depoimento_cargo, depoimento_sobre, depoimento_data, depoimento_imagem", "'$this->depoimento_nome','$this->depoimento_cargo', '$this->depoimento_sobre', '$this->data', '$this->depoimento_imagem'");
    }

    public function atualizar() {
        if ($this->depoimento_imagem != "") {
            $this->update("depoimento", "depoimento_nome = '$this->depoimento_nome', depoimento_cargo = '$this->depoimento_cargo', depoimento_sobre = '$this->depoimento_sobre',"
                    . "depoimento_imagem = '$this->depoimento_imagem'", "depoimento_id = '$this->depoimento_id'");
        } else {
            $this->update("depoimento", "depoimento_nome = '$this->depoimento_nome', depoimento_cargo = '$this->depoimento_cargo', depoimento_sobre = '$this->depoimento_sobre'", "depoimento_id = '$this->depoimento_id'");
        }
    }

    public function remover() {
        $this->delete("depoimento", "depoimento_id = '$this->depoimento_id'");
    }

    public function removerArquivo() {
        $this->deleteArquivo("depoimento", "depoimento_id = '$this->depoimento_id'", "depoimento_imagem", "../images/team/");
    }

    public function enviar() {
        $this->upload("../images/team/", "depoimento_imagem", "");
    }

    public function getDepoimento() {
        $this->select("depoimento", "", "*", "", "WHERE depoimento_id = $this->depoimento_id", "");
    }

    public function getDepoimentos() {
        $this->select("depoimento");
    }

    public function getHome() {
        require_once 'Modulo5.php';
        $limite = new Modulo5();
        $limite->getModulo5();
        $this->select("depoimento", "", "*", "", "order by depoimento_id DESC LIMIT 0,$limite->modulo5_limite", "");
    }

    public function JSON() {
        $this->getJSON("depoimento", "depoimento_id = '$this->depoimento_id'");
    }

}
