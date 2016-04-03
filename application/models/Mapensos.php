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
  $this->db->select('apensos.*, localizacoes.descricao localizacao');
  $this->db->from('apensos');
  $this->db->join('localizacoes', 'apensos.id_localizacoes = localizacoes.id_localizacoes');
  $this->db->where('id_apensos =', $id);
  $query = $this->db->get();
  return $query->result();
}

function altera($id, $registro) {
  $this->db->where('id_apensos', $id);
  $this->db->update('apensos', $registro);
}

// procura um número de apenso com o mesmo número em outro id
function consultachavenapenso($id, $ninterno) {
  $this->db->select('id_apensos');
  $this->db->from('apensos');
  $this->db->where('numero_apenso =', $ninterno);
  $this->db->where('id_apensos !=', $id);
  $query = $this->db->get();
  return $query->result();
}

function andamentos($id) {
  $this->db->select('apensosand.*');
  $this->db->from('apensosand');
  $this->db->where('id_apensos =', $id);
  $this->db->order_by('data_andamento, id_apensosand', 'DESC');
  $query = $this->db->get();
  return $query->result();
}

function insereandamento($registro) {
  $this->db->insert('apensosand', $registro);
  $this->posicionaprocesso($registro['id_processos']);
}

function consultaandamento($id) {
  $this->db->select('apensosand.*');
  $this->db->from('apensosand');
  $this->db->where('id_apensosand =', $id);
  $query = $this->db->get();
  return $query->result();
}

function alteraandamento($id, $registro) {
  $this->db->where('id_apensosand', $id);
  $this->db->update('apensosand', $registro);
}

function excluiandamento($idandamento, $idprocesso) {
  $this->db->where('id_apensosand =', $idandamento);
  $this->db->delete('apensosand');
  $this->posicionaprocesso($idprocesso);
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
