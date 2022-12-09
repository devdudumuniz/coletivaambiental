<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';
class Portfolio extends Controle {

    public $db;
    public $portfolio_id;
    public $portfolio_nome;
    public $portfolio_cliente;
    public $portfolio_descricao;
    public $portfolio_imagem;
    public $portfolio_area1;
    public $portfolio_url;
    public $portfolio_data;
    public $result;

    public function __construct() {
        parent::__construct();         
    }

    public function incluir() {
        $this->insert("portfolio", "portfolio_nome, portfolio_cliente,  portfolio_data,   portfolio_imagem, portfolio_descricao, portfolio_area1, portfolio_url", "'$this->portfolio_nome', '$this->portfolio_cliente','$this->portfolio_data',"
                . "  '$this->portfolio_imagem','$this->portfolio_descricao', '$this->portfolio_area1', '$this->portfolio_url'");
    }

    public function atualizar() {
        if ($this->portfolio_imagem != "") {
            $this->update("portfolio", "portfolio_nome = '$this->portfolio_nome', portfolio_cliente = '$this->portfolio_cliente', portfolio_data = '$this->portfolio_data', portfolio_imagem = '$this->portfolio_imagem', portfolio_descricao  = '$this->portfolio_descricao', portfolio_area1 = '$this->portfolio_area1',portfolio_url = '$this->portfolio_url'"
                    . ",portfolio_imagem = '$this->portfolio_imagem'", "portfolio_id = '$this->portfolio_id'");
        } else {
            $this->update("portfolio", "portfolio_nome = '$this->portfolio_nome', portfolio_cliente = '$this->portfolio_cliente', portfolio_data = '$this->portfolio_data', portfolio_descricao  = '$this->portfolio_descricao', portfolio_area1 = '$this->portfolio_area1',portfolio_url = '$this->portfolio_url'", "portfolio_id = '$this->portfolio_id'");
        }
    }

    public function remover() {
        $this->delete("portfolio", "portfolio_id = '$this->portfolio_id'");
    }

    public function removerArquivo() {
        $this->deleteArquivo("portfolio", "portfolio_id = '$this->portfolio_id'", "portfolio_imagem", "../images/portfolio/");
    }

    public function enviar() {
        $this->upload("../images/portfolio/", "portfolio_imagem", "");
    }

    public function getPortfolio() {
        $this->select("portfolio", "", "*", "", "INNER JOIN area1 ON(portfolio_area1 = area1_id)LEFT JOIN foto ON(foto_portfolio = portfolio_id) WHERE portfolio_id = $this->portfolio_id", "");
    }

    /* QUERY USADA NO PORTFOLIO FRONT */

    public function getBy() {
        $this->select("area1", "", "*", "", "INNER JOIN portfolio ON (portfolio_area1 = area1_id)LEFT JOIN foto ON(foto_portfolio = portfolio_id) WHERE portfolio_id = $this->portfolio_id", "");
    }

    /* QUERY USADA NO PORTFOLIO */

    public function getPortfolios() {
        $this->select("portfolio", "", "*", "portfolio_id DESC", "INNER JOIN area1 ON (portfolio_area1 = area1_id)", "");
    }

    /* PORTFOLIO ULTIMOS 6 RODAPE*/
    public function getUltimos() {
        $this->select("portfolio", "", "*", "", "ORDER BY portfolio_id DESC LIMIT 0,6", "");
    }
    /* PORTFOLIO ULTIMOS 6 RODAPE*/

    public function getWork($id) {
        $this->select("foto", "", "*", "", "where foto_portfolio = $id", "");
    }

    public function JSON() {
        $this->getJSON("portfolio", "portfolio_id = '$this->portfolio_id'");
    }

}
