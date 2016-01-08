<?php
class Mlocalizacoes extends CI_Model {

public function __construct() {
  parent::__construct();
}

function insere($registro) {
  $this->db->insert('localizacoes', $registro);
}

function seleciona() {
  $this->db->select('id_localizacoes, descricao');
  $this->db->from('localizacoes');
  $this->db->order_by('id_localizacoes', 'DESC');
  $query = $this->db->get();
  return $query->result();
}

function atualiza($id, $descricao) {
  $this->db->set('descricao', $descricao);
  $this->db->where('id_localizacoes', $id);
  $this->db->update('localizacoes');
}

function consulta($id) {
  $this->db->select('id_localizacoes, descricao');
  $this->db->from('localizacoes');
  $this->db->where('id_localizacoes', $id);
  $query = $this->db->get();
  return $query->result();
}

}
