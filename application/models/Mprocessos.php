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
  $this->db->order_by('id_processos', 'DESC');
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

function atualiza($id, $data) {
  $this->db->where('id_processos', $id);
  $this->db->update('processos', $data);
}

// procura um número de processo com o mesmo número de outro id
function consultachavenprocesso($id, $nprocesso) {
  $this->db->select('id_processos');
  $this->db->from('processos');
  $this->db->where('numero_processo =', $nprocesso);
  $this->db->where('id_processos !=', $id);
  $query = $this->db->get();
  return $query->result();
}

// procura um número interno com o mesmo número de outro id
function consultachaveninterno($id, $ninterno) {
  $this->db->select('id_processos');
  $this->db->from('processos');
  $this->db->where('numero_interno =', $ninterno);
  $this->db->where('id_processos !=', $id);
  $query = $this->db->get();
  return $query->result();
}

}
