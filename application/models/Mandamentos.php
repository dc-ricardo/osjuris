<?php
class Mandamentos extends CI_Model {

public function __construct() {
  parent::__construct();
}

function seleciona($idprocesso) {
  $this->db->select('andamentos.*');
  $this->db->from('andamentos');
  $this->db->where('id_processos =', $idprocesso);
  $this->db->order_by('data_andamento, id_andamentos', 'DESC');
  $query = $this->db->get();
  return $query->result();
}

function insere($registro) {
  $this->db->insert('andamentos', $registro);
}

function remove($id) {
  $this->db->where('id_andamentos', $id);
  $this->db->delete('andamentos');
}

}
