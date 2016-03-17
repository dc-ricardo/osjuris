<?php
class Mpessoas extends CI_Model {

public function __construct() {
  parent::__construct();
}

function insere($registro) {
  $this->db->insert('pessoas', $registro);
}

function seleciona($categoria, $maximo, $inicio, $conteudo) {
  $this->db->select('id_pessoas, nome_razao, codigo, cpf_cnpj');

  // filtra por categoria
  if ($categoria == 'advogados') {
    $condcol = 'tipo =';
    $condval = CTIPOADVOGADO;
  }
  if ($categoria == 'fisicas') {
    $condcol = 'tipo =';
    $condval = CTIPOFISICA;
  }
  if ($categoria == 'juridicas') {
    $condcol = 'tipo =';
    $condval = CTIPOJURIDICA;
  }
  if ($categoria != 'cadastradas') {
    $this->db->where($condcol, $condval);
  }

  // filtra conteúdo
  if ($conteudo <> '') {
    $this->db->like('lower(nome_razao)', strtolower($conteudo));
    $this->db->or_like('lower(codigo)', strtolower($conteudo));
    $this->db->or_like('lower(cpf_cnpj)', strtolower($conteudo));
  }

  // ordenação
  $this->db->order_by('id_pessoas', 'DESC');

  // obtém registros
  $query = $this->db->get('pessoas', $maximo, $inicio);
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

function contaadvogados() {
  $this->db->where('tipo', CTIPOADVOGADO);
  $this->db->from('pessoas');
  $total = $this->db->count_all_results();
  return $total;
}

function contafisicas() {
  $this->db->where('tipo', CTIPOFISICA);
  $this->db->from('pessoas');
  $total = $this->db->count_all_results();
  return $total;
}

function contajuridicas() {
  $this->db->where('tipo', CTIPOJURIDICA);
  $this->db->from('pessoas');
  $total = $this->db->count_all_results();
  return $total;
}

function contacadastradas() {
  $total = $this->db->count_all('pessoas');
  return $total;
}

function localiza($conteudo) {
  $this->db->select('*');
  $this->db->from('pessoas');
  $this->db->like('nome_razao', $conteudo);
  $query = $this->db->get();
  return $query->result();
}

}
