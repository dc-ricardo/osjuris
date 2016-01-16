<?php
class Mprocessos extends CI_Model {

public function __construct() {
  parent::__construct();
}

function insere($registro) {
  $this->db->insert('processos', $registro);
}

function seleciona() {
  $this->db->select('processos.*, localizacoes.descricao localizacao');
  $this->db->from('processos');
  $this->db->join('localizacoes', 'processos.id_localizacoes = localizacoes.id_localizacoes');
  $query = $this->db->get();
  return $query->result();
}

function consulta($id) {
  $this->db->select('processos.*, localizacoes.descricao localizacao');
  $this->db->from('processos');
  $this->db->join('localizacoes', 'processos.id_localizacoes = localizacoes.id_localizacoes');
  $this->db->where('id_processos =', $id);
  $query = $this->db->get();
  return $query->result();
}

}
