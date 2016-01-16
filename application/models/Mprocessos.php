<?php
class Mprocessos extends CI_Model {

public function __construct() {
  parent::__construct();
}

function insere($registro) {
  $this->db->insert('processos', $registro);
}

}
