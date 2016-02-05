<?php
class Mapensos extends CI_Model {

public function __construct() {
  parent::__construct();
}

function seleciona($idprocesso) {
  $this->db->select('apensos.*, localizacoes.descricao localizacao');
  $this->db->from('apensos');
  $this->db->join('localizacoes', 'apensos.id_localizacoes = localizacoes.id_localizacoes');
  $this->db->where('id_processos =', $idprocesso);
  $this->db->order_by('data_apenso, id_apensos', 'DESC');
  $query = $this->db->get();
  return $query->result();
}

function insere($registro) {
  $this->db->insert('apensos', $registro);
}

function remove($id) {
  $this->db->where('id_apensos', $id);
  $this->db->delete('apensos');
}

function consulta($id) {
  $this->db->select('apensos.*');
  $this->db->from('apensos');
  $this->db->where('id_apensos =', $id);
  $query = $this->db->get();
  return $query->result();
}

function altera($id, $registro) {
  $this->db->where('id_apensos', $id);
  $this->db->update('apensos', $registro);
}

}
