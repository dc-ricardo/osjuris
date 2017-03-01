<?php
Class Musuarios extends CI_Model {

public function __construct() {
  parent::__construct();
}

function login($email, $senha) {
  $this->db->select('*');
  $this->db->from('usuarios');
  $this->db->where('email', $email);
  $this->db->where('senha', MD5($senha . config_item('salt')));
  $this->db->limit(1);

  $query = $this->db->get();

  if($query->num_rows() == 1) {
    return $query->result();
  }
  else {
    return false;
  }
}

function consulta($id) {
  $this->db->select('*');
  $this->db->from('usuarios');
  $this->db->where('id_usuarios', $id);
  $query = $this->db->get();
  return $query->result();
}

function atualizasenha($id, $novasenha) {
  $this->db->set('senha', MD5($novasenha.config_item('salt')));
  $this->db->set('stemp', '0');
  $this->db->where('id_usuarios', $id);
  $this->db->update('usuarios');
}

function seleciona($categoria, $maximo, $inicio, $conteudo) {
  $this->db->select('id_usuarios, nome, email, habilitado, nivel');

  // filtra por categoria
  if ($categoria == 'habilitados') {
    $condcol = 'habilitado =';
    $condval = '1';
  }
  if ($categoria == 'desabilitados') {
    $condcol = 'habilitado =';
    $condval = '0';
  }
  if ($categoria != 'todos') {
    $this->db->where($condcol, $condval);
  }

  // filtra conteúdo
  if ($conteudo <> '') {
    $this->db->like('lower(nome)', strtolower($conteudo));
    $this->db->or_like('lower(email)', strtolower($conteudo));
  }

  // ordenação
  $this->db->order_by('id_usuarios', 'DESC');

  // obtém registros
  $query = $this->db->get('usuarios', $maximo, $inicio);
  return $query->result();
}

function contahabilitados() {
  $this->db->where('habilitado', 1);
  $this->db->from('usuarios');
  $total = $this->db->count_all_results();
  return $total;
}

function contadesabilitados() {
  $this->db->where('habilitado', 0);
  $this->db->from('usuarios');
  $total = $this->db->count_all_results();
  return $total;
}

function contatodos() {
  $total = $this->db->count_all_results('usuarios');
  return $total;
}

function insere($registro) {
  $this->db->insert('usuarios', $registro);
}

function altera($id, $data) {
  $this->db->where('id_usuarios', $id);
  $this->db->update('usuarios', $data);
}

// procura um usuário com o mesmo nome de outro id
function consultachavenome($id, $nome) {
  $this->db->select('id_usuarios');
  $this->db->from('usuarios');
  $this->db->where('nome =', $nome);
  $this->db->where('id_usuarios !=', $id);
  $query = $this->db->get();
  return $query->result();
}

// procura um usuário com o mesmo email de outro id
function consultachaveemail($id, $email) {
  $this->db->select('id_usuarios');
  $this->db->from('usuarios');
  $this->db->where('email =', $email);
  $this->db->where('id_usuarios !=', $id);
  $query = $this->db->get();
  return $query->result();
}

function alterasenha($data) {
  $this->db->set('senha', $data['senha']);
  $this->db->set('stemp', '1');
  $this->db->where('email', $data['email']);
  $this->db->update('usuarios');
}

function alterapaginacao($qtd) {
  $this->db->set('registros_pagina', $qtd);
  $this->db->where('id_usuarios', $this->session->userdata['logged_in']['id_usuarios']);
  $this->db->update('usuarios');
}

}
