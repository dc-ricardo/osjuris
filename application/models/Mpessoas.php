<?php
class Mpessoas extends CI_Model {

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

}
