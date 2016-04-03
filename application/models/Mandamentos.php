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
  $this->posicionaprocesso($registro['id_processos']);
}

function remove($idandamento, $idprocesso) {
  $this->db->where('id_andamentos', $idandamento);
  $this->db->delete('andamentos');
  $this->posicionaprocesso($idprocesso);
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

function posicionaprocesso($id) {
  // processo com andamento(s) será Ativado
  $this->db->select('id_processos');
  $this->db->from('andamentos');
  $this->db->where('id_processos', $id);
  $andamentos = $this->db->get_compiled_select();

  // processo com apenso(s) será Apensado
  $this->db->select('id_processos');
  $this->db->from('apensos');
  $this->db->where('id_processos', $id);
  $apensos = $this->db->get_compiled_select();

  // ativa processo
  $this->db->set('posicao', '1');
  $this->db->where('id_processos', $id);
  $this->db->where_in('id_processos', $andamentos, FALSE);
  $this->db->where_not_in('id_processos', $apensos, FALSE);
  $this->db->update('processos');

  // apensa processo
  $this->db->set('posicao', '2');
  $this->db->where('id_processos', $id, FALSE);
  $this->db->where_in('id_processos', $apensos, FALSE);
  $this->db->update('processos');
}

}
