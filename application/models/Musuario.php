<?php
Class Musuario extends CI_Model {

public function __construct() {
  parent::__construct();
}

function login($email, $senha) {
  $this->db->select('id_usuarios, email, senha');
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

}
