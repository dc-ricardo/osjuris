<?php
class Mprazos extends CI_Model {

public function __construct() {
  parent::__construct();
}

function seleciona($idprocesso) {
  $this->db->select('prazos.*');
  $this->db->from('prazos');
  $this->db->where('id_processos =', $idprocesso);
  $this->db->order_by('data_prazo, id_prazos', 'DESC');
  $query = $this->db->get();
  return $query->result();
}

function insere($registro) {
  $this->db->insert('prazos', $registro);
}

function remove($id) {
  $this->db->where('id_prazos', $id);
  $this->db->delete('prazos');
}

function consulta($id) {
  $this->db->select('prazos.*');
  $this->db->from('prazos');
  $this->db->where('id_prazos =', $id);
  $query = $this->db->get();
  return $query->result();
}

function altera($id, $registro) {
  $this->db->where('id_prazos', $id);
  $this->db->update('prazos', $registro);
}

}
