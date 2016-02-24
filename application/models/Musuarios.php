<?php
Class Musuarios extends CI_Model {

public function __construct() {
  parent::__construct();
}

function login($email, $senha) {
  $this->db->select('id_usuarios, email, senha, nome, nivel');
  $this->db->from('usuarios');
  $this->db->where('email', $email);
  $this->db->where('senha', MD5($senha . CSALT));
  $this->db->limit(1);

  $query = $this->db->get();

  if($query->num_rows() == 1) {
    return $query->result();
  }
  else {
    return false;
  }
}

function seleciona($id) {
  $this->db->select('*');
  $this->db->from('usuarios');
  $this->db->where('id_usuarios', $id);
  $query = $this->db->get();
  return $query->result();
}

function atualizasenha($id, $novasenha) {
  $this->db->set('senha', MD5($novasenha . CSALT));
  $this->db->where('id_usuarios', $id);
  $this->db->update('usuarios');
}

}
