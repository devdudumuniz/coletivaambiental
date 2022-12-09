<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';
class Foto extends Controle {

    public $db;
    public $foto_id;
    public $foto_url;
    public $foto_pos;
    public $foto_portfolio;
    public $result;

    public function __construct() {
        parent::__construct();
    }

    public function incluir() {
        $this->insert("foto", "foto_url, foto_portfolio", "'$this->foto_url', '$this->foto_portfolio'");
    }

    public function getfoto() {
        $sql = "SELECT * FROM  produto_foto WHERE foto_id = $this->foto_id";
        $this->result = mysql_query($sql);
        if ($this->result) {
            while ($retorna = mysql_fetch_object($this->result)) {
                $this->setId($retorna->foto_id);
                $this->setUrl($retorna->foto_url);
                $this->setFotoProduto($retorna->foto_produto);
            }
        }
    }

    public function getFotos() {
        $this->select("foto", "", "*", "", " INNER JOIN portfolio on (foto_portfolio = portfolio_id) where foto_portfolio = $this->foto_portfolio ORDER BY foto_pos ASC", "");
    }

    public function getProjetos() {
        $this->select("foto");
    }

    public function getFotoCapa($album_id) {
        $sql = "SELECT * FROM  produto_fotos where foto_produto = $album_id order by foto_id desc limit 0,1";
        $this->result = mysql_query($sql);
        if ($this->result) {
            while ($linha = mysql_fetch_object($this->result)) {
                $this->foto_url = $linha;
            }
            return $this->foto_url;
        }
    }

    public function remover() {
        $this->delete("foto", "foto_id = '$this->foto_id'");
    }

    public function removerImagem() {
        $this->deleteArquivo("foto", "foto_id = '$this->foto_id'", "foto_url", "../images/portfolio/");
    }

    public function atualizar() {
        $sql = "UPDATE produto_fotos SET ";
        $sql .= " foto_legenda = '$this->foto_legenda' ";
        $sql .= " WHERE foto_id = '$this->foto_id'";
        $this->result = mysql_query($sql);
    }

    public function updatePos() {
        $item = $_POST['item'];
        foreach ($item as $pos => $foto_id) {
            $foto_id = preg_replace('/li_/', '', $foto_id);
            $sql = "UPDATE produto_fotos SET ";
            $sql .= "foto_pos = $pos ";
            $sql .= "WHERE foto_id = $foto_id";
            $this->result = mysql_query($sql);
            echo $this->result;
        }
    }

}
