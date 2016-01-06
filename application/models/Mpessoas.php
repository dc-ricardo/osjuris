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

// procura uma pessoa com o mesmo nome de outro id
function consultachavenome($id, $nome) {
  $this->db->select('id_pessoas');
  $this->db->from('pessoas');
  $this->db->where('nome_razao =', $nome);
  $this->db->where('id_pessoas !=', $id);
  $query = $this->db->get();
  return $query->result();
}

// procura uma pessoa com o mesmo codigo de outro id
function consultachavecodigo($id, $codigo) {
  $this->db->select('id_pessoas');
  $this->db->from('pessoas');
  $this->db->where('codigo =', $codigo);
  $this->db->where('id_pessoas !=', $id);
  $query = $this->db->get();
  return $query->result();
}

// procura uma pessoa com o mesmo cpf de outro id
function consultachavecpf($id, $cpf) {
  $this->db->select('id_pessoas');
  $this->db->from('pessoas');
  $this->db->where('cpf_cnpj =', $cpf);
  $this->db->where('id_pessoas !=', $id);
  $query = $this->db->get();
  return $query->result();
}

}
