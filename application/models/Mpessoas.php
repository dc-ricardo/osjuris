<?php
class Mpessoas extends CI_Model {

public function __construct() {
  parent::__construct();
}

function insere($registro) {
  $this->db->insert('pessoas', $registro);
}

function seleciona() {
  $this->db->select('id_pessoas, nome_razao, codigo, cpf_cnpj');
  $this->db->from('pessoas');
  $this->db->order_by('id_pessoas', 'DESC');
  $query = $this->db->get();
  return $query->result();
}

function consulta($id) {
  $this->db->select('*');
  $this->db->from('pessoas');
  $this->db->where('id_pessoas', $id);
  $query = $this->db->get();
  return $query->result();
}

function atualiza($id, $data) {
  $this->db->where('id_pessoas', $id);
  $this->db->update('pessoas', $data);
}

// verifica se o codigo gerado nao existe no banco de dados
function codigogeradoexistente($data) {
  $this->db->select('codigo');
  $this->db->from('pessoas');
  $codigo = $data[0]->codigo;
  $this->db->where('codigo', $codigo);
  $query = $this->db->get();
  return $query->num_rows();
}

function sorteiacodigo() {
  $this->db->select('trunc(random()*(999999-100000)+100000) as codigo;');
  $query = $this->db->get();
  return $query->result();
}

function geracodigo() {
  $consulta = 1;
  while ($consulta == 1) {
    $codigo = $this->sorteiacodigo();
    $consulta = $this->codigogeradoexistente($codigo);
  }
  return $codigo;
}

}
