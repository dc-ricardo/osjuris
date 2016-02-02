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

function localizapessoa($pessoa, $tipo) {
  if ($tipo == CPARTEADVOGADO) {
    $this->db->select('id_pessoas')->from('pessoas')
      ->group_start()
        ->where('codigo', $pessoa)
        ->or_where('cpf_cnpj', $pessoa)
        ->or_like('lower(nome_razao)', strtolower($pessoa))
      ->group_end()
      ->where('tipo', CPARTEADVOGADO);
  }
  else {
    $this->db->select('id_pessoas');
    $this->db->from('pessoas');
    $this->db->where('codigo =', $pessoa);
    $this->db->or_where('cpf_cnpj =', $pessoa);
    $this->db->or_like('lower(nome_razao)', strtolower($pessoa));
  }

  $query = $this->db->get();
  return $query->result();
}

function insereparte($processo, $tipo, $parte) {
  $data = array(
    'id_processos' => (int)$processo,
    'id_pessoas' => (int)$parte,
    'tipo_parte' => (int)$tipo
  );
  $this->db->insert('partes', $data);
}

function consultapartes($id, $tparte) {
  $this->db->select('partes.*, pessoas.nome_razao');
  $this->db->from('partes');
  $this->db->join('pessoas', 'partes.id_pessoas = pessoas.id_pessoas');
  $this->db->where('partes.id_processos =', $id);
  $this->db->where('partes.tipo_parte =', $tparte);
  $this->db->order_by('pessoas.nome_razao', 'ASC');
  $query = $this->db->get();
  return $query->result();
}

function pessoanoprocesso($processo, $pessoa, $tipoparte) {
  $this->db->select('partes.id_partes, pessoas.nome_razao');
  $this->db->from('partes');
  $this->db->join('pessoas', 'partes.id_pessoas = pessoas.id_pessoas');
  $this->db->where('id_processos', $processo);
  $this->db->where('partes.id_pessoas', $pessoa);
  $this->db->where('partes.tipo_parte', $tipoparte);
  $query = $this->db->get();
  return $query->result();
}

function removeparte($idparte) {
  $this->db->where('id_partes', $idparte);
  $this->db->delete('partes');
}

}
