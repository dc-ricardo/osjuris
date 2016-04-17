<?php
class Mprocessos extends CI_Model {

public function __construct() {
  parent::__construct();
}

function insere($registro) {
  $this->db->insert('processos', $registro);
}

function seleciona($categoria, $maximo, $inicio, $conteudo) {
  $this->db->select('processos.*, localizacoes.descricao localizacao');
  $this->db->join('localizacoes', 'processos.id_localizacoes = localizacoes.id_localizacoes');

  // filtra por categoria
  if ($categoria == 'abertos') {
    $condcol = 'posicao =';
    $condval = CPOSPROABERTO;
  }
  if ($categoria == 'ativos') {
    $condcol = 'posicao =';
    $condval = CPOSPROATIVO;
  }
  if ($categoria == 'apensados') {
    $condcol = 'posicao =';
    $condval = CPOSPROAPENSADO;
  }
  if ($categoria == 'encerrados') {
    $condcol = 'posicao =';
    $condval = CPOSPROENCERRADO;
  }
  if ($categoria != 'todos') {
    $this->db->where($condcol, $condval);
  }

  // filtra conteúdo
  if ($conteudo <> '') {
    $this->db->like('lower(numero_processo)', strtolower($conteudo));
    $this->db->or_like('lower(numero_interno)', strtolower($conteudo));
  }

  $this->db->order_by('id_processos', 'DESC');
  $query = $this->db->get('processos', $maximo, $inicio);
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
  $this->db->select('partes.*, pessoas.nome_razao, pessoas.cpf_cnpj');
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

function processostodos() {
  $total = $this->db->count_all('processos');
  return $total;
}

function contaprocessos($posicao) {
  $this->db->where('posicao', $posicao);
  $this->db->from('processos');
  $total = $this->db->count_all_results();
  return $total;
}

function encerraprocesso($id) {
  $this->db->set('posicao', CPOSPROENCERRADO);
  $this->db->where('id_processos', $id);
  $this->db->update('processos');
}

function reposiciona($id) {
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

  // abre processo
  $this->db->set('posicao', '0');
  $this->db->where('id_processos', $id);
  $this->db->update('processos');

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

function processoscomalertas() {
  $this->db->select('*');
  $this->db->from('processos');
  $this->db->where('posicao !=', CPOSPROENCERRADO);
  $this->db->limit('6');
  $query = $this->db->get();
  return $query->result();
}

function prazos() {
  $this->db->select('processos.id_processos, data_prazo, prazos.descricao prazos_descricao, numero_interno');
  $this->db->from('prazos');
  $this->db->join('processos', 'prazos.id_processos = processos.id_processos');
  $this->db->where('posicao !=', CPOSPROENCERRADO);
  $this->db->limit('6');
  $query = $this->db->get();
  return $query->result();
}

function processosparados() {
  $this->db->select('*');
  $this->db->from('processos');
  $this->db->where('posicao !=', CPOSPROENCERRADO);
  $this->db->limit('6');
  $query = $this->db->get();
  return $query->result();
}

}
