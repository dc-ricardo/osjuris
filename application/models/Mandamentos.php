<?php
class Mandamentos extends CI_Model {

public function __construct() {
  parent::__construct();
}

function seleciona($idprocesso, $ordem) {
  $this->db->select('andamentos.*');
  $this->db->from('andamentos');
  $this->db->where('id_processos =', $idprocesso);
  $this->db->order_by('data_andamento, id_andamentos', $ordem);
  $query = $this->db->get();
  return $query->result();
}

function insere($registro) {
  $this->db->insert('andamentos', $registro);
}

function remove($idandamento, $idprocesso) {
  $this->db->where('id_andamentos', $idandamento);
  $this->db->delete('andamentos');
}

function consulta($id) {
  $this->db->select('andamentos.*');
  $this->db->from('andamentos');
  $this->db->where('id_andamentos =', $id);
  $query = $this->db->get();
  return $query->result();
}

function altera($id, $registro) {
  $this->db->where('id_andamentos', $id);
  $this->db->update('andamentos', $registro);
}

}
