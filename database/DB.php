<?php

class DB {

    private $database;
    public $query;
    public $data;
    public $data_all;
    public $result;
    public $rows;
    public $page = 0;
    public $perpage = 10;
    public $paginacao = '';
    public $current = 1;
    public $url = null;
    public $pages = '';
    public $total = '';
    public $pagination = false;
    private $host;
    private $port;
    private $user;
    private $pass;
    public $dbname;
    public $link;







    public function __construct() {
        try {
            $this->dbname = 'coletiva_coleta';
            $this->host = 'localhost';
            $this->user = 'coletiva_coletivaambiental';
            $this->pass = 'dude1512';
            # instancia e retorna objeto
            $this->link = mysqli_connect("$this->host", "$this->user", "$this->pass", "$this->dbname") or die(@mysqli_connect_error($this->link));
            $this->url = $_SERVER['SCRIPT_NAME'];
            return $this->link;

    $resultado=mysqli_query($this->link,"SET NAMES 'utf8'");
    $resultado=mysqli_query($this->link,'SET character_set_connection=utf8');
    $resultado=mysqli_query($this->link,'SET character_set_client=utf8');
    $resultado=mysqli_query($this->link,'SET character_set_results=utf8');

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function getid() {
        return mysqli_insert_id($this->link);
    }

    public function query($query = '') {
        try {
            if ($query != '') {
                $this->query = $query;
            }
            if (is_null($this->query)) {
                throw new Exception('mysqli_query: A query deve ser informada como parâmetro do método.');
            } else {
                if ($this->pagination == true) {
                    $this->result = mysqli_query($this->link, $this->query);
                    $this->rows = mysqli_num_rows($this->result);
                    $this->paginateLink();
                    $this->query .= " LIMIT $this->page, $this->perpage";
                    $this->pagination = false;
                }
                $this->result = mysqli_query($this->link, $this->query);
                if (!$this->result) {
                    throw new Exception(mysqli_error($this->link));
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        return $this;
    }

    public function find($c = null) {
        try {
            $this->data = "";
            $this->rows = 0;
            if (empty($c)) {
                throw new Exception('');
            }
            $table = (is_array($c) && isset($c[0])) ? $c[0] : $c;
            $this->query = "SELECT * FROM " . $table;
            if (is_array($c) && isset($c[1])) {
                $this->query .= " WHERE " . $c[1];
            }
            $this->query($this->query);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        return $this->fetch(true);
    }

    public function fetch($type = false) {
        $this->data = ($type) ? mysqli_fetch_object($this->result) : mysqli_fetch_array($this->result, MYSQL_ASSOC);
        $this->rows = mysqli_num_rows($this->result);
        return $this->data;
    }

    public function fetchAll($type = true) {
        $this->data_all = "";
        $this->rows = 0;
        while ($row = $this->fetch($type)) {
            $this->data_all[] = $row;
        }
        $this->rows = mysqli_num_rows($this->result);
        mysqli_free_result($this->result);
        $this->data = $this->data_all;
        return $this->data;
    }

    public function fetchAllObj() {
        return $this->fetchAll(true);
    }

    public function last_insert_id() {
        return mysqli_insert_id();
    }

    public function rowCount() {
        return @mysqli_affected_rows($this->result);
    }

    public function numRows() {
        return $this->rows;
    }

    public function paginate($perpage) {
        $this->pagination = true;
        $this->perpage = $perpage;
        return $this;
    }

    protected function paginateLink() {
        if ($this->url != null) {
            $this->url .= "/";
        }
        $this->route = explode("/", $_SERVER['REQUEST_URI']);
        if (in_array('page', $this->route)) {
            $pagenum = explode("page", $_SERVER['REQUEST_URI']);
            $this->pagenum = preg_replace('/\//', '', end($pagenum));
            $this->current = $this->pagenum;
            $this->page = $this->perpage * $this->pagenum - $this->perpage;
            if ($this->pagenum == 1) {
                $this->page = 0;
            }
        }
        if ($this->rows > $this->perpage) {
            $this->pages = "<ul class=\"pagination\">\n";
            //primeira
            $this->pages .= "<li><a href=\"" . $this->url . "page/1/\" class=\"tip\" title=\"primeira\">&laquo;&laquo;</a></li>\n";
            $prox = "javascript:void(0)";
            $ant = "javascript:void(0)";
            if ($this->current >= 2) {
                $ant = $this->url . "page/" . ($this->current - 1) . "/";
            }
            if ($this->current >= 1 && $this->current < ($this->rows / $this->perpage)) {
                $prox = $this->url . "page/" . ($this->current + 1) . "/";
            }
            $this->pages .= "<li><a href=\"$ant\" class=\"tip\" title=\"anterior\">&laquo;</a></li>\n";
            $from = ceil($this->rows / $this->perpage);
            if ($from == 1) {
                $from++;
            }

            //$this->pages .= "<li><a href=\"javascript:void(0);\"><span class=\"tip\" title=\"página atual $this->current\"> $this->current de $from</span></a></li>\n";
            for ($i = 1; $i <= $from; $i++) {
                if ($this->current == $i) {
                    $this->pages .= "<li class=\"active\"><a>$i</a></li>\n";
                } else {
                    $this->pages .= "<li><a href=\"" . $this->url . "page/$i/\">$i</a></li>\n";
                    //$this->salt .= "<li><a href=\"" . $this->url . "page/$i/\">$i</a></li>\n";
                }
            }
            $this->pages .= "<li><a href=\"$prox\" class=\"tip\" title=\"próxima\">&raquo;</a></li>\n";
            $this->pages .= "<li><a href=\"" . $this->url . "page/$from/\" class=\"tip\" title=\"última\">&raquo;&raquo;</a></li>\n";
            $this->pages .= "</ul>\n";
            $this->pages .= "\n";
        }

        $this->paginacao = $this->pages;
        return $this;
    }

    public function __destruct() {
        if (isset($this->link) && $this->link == true) {
            @mysqli_close($this->link);
            unset($this->link);
        }
    }

    public function destroy() {
        if ($this->link == true) {
            @mysqli_close($this->link);
            unset($this->link);
        }
    }

    public function limit($limit, $offset) {
        return "LIMIT " . (int) $limit . "," . (int) $offset;
    }

    public function map($arr = array()) {
        try {
            if (!is_array($arr) && empty($arr)) {
                throw new Exception('ArrayMapNull');
            } else {
                foreach ($arr as $k => $v) {
                    if (!isset($this->$k)) {
                        $this->$k = "";
                    }
                    $this->$k = $v;
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        return $this;
    }

    public function factory($arr = array()) {
        try {
            if (!is_array($arr) && empty($arr)) {
                throw new Exception('ArrayFactoryNull');
            } else {
                $arr = $this->find($arr);
                if (isset($arr[0])) {
                    $this->map($arr[0]);
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        return $this;
    }

    /**
     * Utilizado para função preg_replace
     * @name preg
     * @param String $key
     * @param String $pattern
     * @param String $replace
     * @example $obj->preg('/./','-','key_data_cad');
     *
     */
    public function preg($pattern, $replace, $key) {
        try {
            if (!empty($this->data)) {
                foreach ($this->data as $idx => $item) {
                    if (isset($item[trim($key)])) {
                        if (strlen($this->data[$idx][trim($key)]) <= 0) {
                            $this->data[$idx][trim($key)] = "NULL";
                        }
                        $this->data[$idx][trim($key)] = preg_replace($pattern, $replace, $this->data[$idx][trim($key)]);
                    }
                }
            } else {
                $this->response = "preg: O array de origem está vazio.";
                //throw  new Exception("preg: O array de origem está vazio.");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        return $this;
    }

    /**
     * Incrementa determinado campo da tabela
     *
     * @name increment
     * @param String $table Nome da tabela
     * @param String $field Nome do campo
     * @param Int $value valor a ser incrementado
     * @example $obj->increment('visitas','count',1,'id = 1');
     */
    public function increment($table = null, $field = null, $value = null, $cond = null) {
        try {
            if ($table == null || $field == null || $value == null) {
                throw new Exception('increment: O nome da tabela,campo e valor devem ser informados!');
            } else {
                $this->query = "UPDATE $table SET $field = $field+$value where $cond";
                $this->query($this->query);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        return $this;
    }

    /**
     * Decrementa determinado campo da tabela
     *
     * @name decrement
     * @param String $table Nome da tabela
     * @param String $field Nome do campo
     * @param Int $value valor a ser incrementado
     * @example $obj->decrement('visitas','count',1,'id=1');
     */
    public function decrement($table = null, $field = null, $value = null, $cond = null) {
        try {
            if ($table == null || $field == null || $value == null) {
                throw new Exception('decrement: O nome da tabela,campo e valor devem ser informados!');
            } else {
                $this->query = "UPDATE $table SET $field = $field-$value where $cond";
                $this->query($this->query);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        return $this;
    }

    public function clonekey($new, $keys, $sep = " ") {
        try {
            if (!empty($this->data)) {
                foreach ($this->data as $idx => $item) {
                    $t = array();
                    foreach ($keys as $key) {
                        if (isset($this->data[$idx][$key])) {
                            $t[] = $this->data[$idx][$key];
                        } else {
                            $t[] = $key;
                        }
                    }
                    $this->data[$idx][$new] = implode($sep, $t);
                }
            } else {
                $this->response = "clonekey: O array de origem está vazio.";
                //throw  new Exception("concat: O array de origem está vazio.");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        return $this;
    }

    function safe($value) {
        $secureString = mysqli_real_escape_string($this->link, $value);
        return $secureString;
    }

}

/* end file */