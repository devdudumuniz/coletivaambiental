<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';
class Site extends Controle {

    public $db;
    public $site_id;
    public $site_meta_titulo;
    public $site_meta_autor;
    public $site_meta_palavra;
    public $site_meta_desc;
    public $site_logo;
    public $site_imagem;
    public $site_analytics;
    public $result;

    public function __construct() {
        parent:: __construct();
    }

    public function atualizar() {
        if ($this->site_logo != "" or $this->site_imagem != "") {
            $this->update("site", "site_meta_titulo  = '$this->site_meta_titulo', site_meta_autor = '$this->site_meta_autor', site_meta_palavra = '$this->site_meta_palavra',"
                    . "site_meta_desc    = '$this->site_meta_desc', site_analytics    = '$this->site_analytics',"
                    . " site_logo = '$this->site_logo', site_imagem = '$this->site_imagem'", "site_id = $this->site_id");
        } else {
            $this->update("site", "site_meta_titulo  = '$this->site_meta_titulo', site_meta_autor = '$this->site_meta_autor', site_meta_palavra = '$this->site_meta_palavra',"
                    . "site_meta_desc    = '$this->site_meta_desc', site_analytics    = '$this->site_analytics'", "site_id = $this->site_id");
        }
    }

    public function getMeta() {
        $this->select("site");
    }

    public function removerArquivo() {
        $this->deleteArquivo('site', "$this->site_logo", "../images/");
    }

    public function removerLogin() {
        $this->deleteArquivo("site", "$this->site_imagem", "./img/");
    }

    public function uploadLogin() {
        $this->upload("../images/", "login-img.jpg", "site_imagem");
    }

    public function Count($tabela) {
        $this->getCount($tabela);
    }

}
