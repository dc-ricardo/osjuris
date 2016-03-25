<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Processos extends MY_Controller {

public function index()	{
	$this->consultapaginada('todos', '');
}

public function consultatodos() {
	$this->consultapaginada('todos', '');
}

public function consultaabertos() {
	$this->consultapaginada('abertos', '');
}

public function consultaativos() {
	$this->consultapaginada('ativos', '');
}

public function consultaapensados() {
	$this->consultapaginada('apensados', '');
}

public function consultaencerrados() {
	$this->consultapaginada('encerrados', '');
}

public function consultapaginada($categoria, $conteudo) {
	// select
	$this->load->model('mprocessos');
	$data['todos'] = $this->mprocessos->processostodos();
	$data['abertos'] = $this->mprocessos->contaprocessos(CPOSPROABERTO);
	$data['ativos'] = $this->mprocessos->contaprocessos(CPOSPROATIVO);
	$data['apensados'] = $this->mprocessos->contaprocessos(CPOSPROAPENSADO);
	$data['encerrados'] = $this->mprocessos->contaprocessos(CPOSPROENCERRADO);

	// paginação
	$this->load->library('pagination');
	$inicio = ($this->uri->segment("3") != '') ? $this->uri->segment("3") : 0;
	$purl = base_url('processos/consulta'.$categoria);
	$ptotalrec = $data[$categoria];
  $pdata = $this->libosjuris->fpaginacao($purl, $ptotalrec);
	$this->pagination->initialize($pdata);
	$data['paginacao'] = $this->pagination->create_links();

	$data['processos'] = $this->mprocessos->seleciona($categoria, $ptotalrec, $inicio, $conteudo);

	$this->load->view('includes/vheader');
	$this->load->view('vprocessos', $data);
	$this->load->view('includes/vfooter');
}

function lelocalizacoes() {
	// captura localizações em ordem alfabética crescente para escolha no combobox
	$this->load->model('mlocalizacoes');
	$data = $this->mlocalizacoes->seleciona('descricao', 'ASC');
  return $data;
}

public function novo() {
	$data['localizacoes'] = $this->lelocalizacoes();
	$this->load->view('includes/vheader');
	$this->load->view('vprocessosnovo', $data);
	$this->load->view('includes/vfooter');
}

function vpostados() {
	$data =	array(
		'numero_processo' => $this->input->post('numero_processo'),
		'numero_interno' => $this->input->post('numero_interno'),
		'data_abertura' => $this->input->post('data_abertura'),
		'id_localizacoes' => $this->input->post('localizacao'),
		'valor_causa' => $this->input->post('valor_causa'),
		'descricao' => $this->input->post('descricao')
	);
	return $data;
}

function validadata($pdata) {
  $dvalida = $this->libosjuris->fvalidadata($pdata);
  if (!$dvalida) {
    $this->load->library('form_validation');
    $this->form_validation->set_message('validadata', 'Data inválida.');
	}
  return $dvalida;
}

function validachavenprocesso($pvalor) {
	$this->load->model('mprocessos');

  $id = $this->uri->segment(3);
	$data = $this->mprocessos->consultachavenprocesso($id, $pvalor);

	if (!empty($data)) {
		$this->form_validation->set_message('validachavenprocesso', 'O campo {field} deve conter um valor único.');
		return FALSE;
	}
	else {
		return TRUE;
	}
}

function validachaveninterno($pvalor) {
	$this->load->model('mprocessos');

  $id = $this->uri->segment(3);
	$data = $this->mprocessos->consultachaveninterno($id, $pvalor);

	if (!empty($data)) {
		$this->form_validation->set_message('validachaveninterno', 'O campo {field} deve conter um valor único.');
		return FALSE;
	}
	else {
		return TRUE;
	}
}

function regras($operacao) {
  $vrules['padrao'] = array(
		array(
			'field' => 'data_abertura',
			'label' => 'Data',
			'rules' => 'required|callback_validadata'
		),
		array(
			'field' => 'valor_causa',
			'label' => 'Valor da Causa',
			'rules' => 'required|numeric|greater_than[0]'
		)
	);

	$vrules['insercao'] = array(
		array(
			'field' => 'numero_processo',
			'label' => 'Número do Processo',
			'rules' => 'required|is_unique[processos.numero_processo]|max_length[80]|trim'
		),
		array(
			'field' => 'numero_interno',
			'label' => 'Número Interno',
			'rules' => 'required|is_unique[processos.numero_interno]|max_length[80]|trim'
		)
	);

	$vrules['alteracao'] = array(
		array(
			'field' => 'numero_processo',
			'label' => 'Número do Processo',
			'rules' => 'required|max_length[80]|trim|callback_validachavenprocesso'
		),
		array(
			'field' => 'numero_interno',
			'label' => 'Número Interno',
			'rules' => 'required|max_length[80]|trim|callback_validachaveninterno'
		)
	);

	$vrules = array_merge($vrules['padrao'], $vrules[$operacao]);

	return $vrules;
}

public function insere() {
	$this->load->library('form_validation');
	$this->form_validation->set_rules($this->regras('insercao'));

  if ($this->form_validation->run() == TRUE) {
	  $data = $this->vpostados();

		$this->load->model('mprocessos');
	  $this->mprocessos->insere($data);
		redirect('/processos');
	}
	else {
		$this->novo();
	}
}

public function consulta($id) {
	$this->load->model('mprocessos');
	$data['processo'] = $this->mprocessos->consulta($id);
	$data['autores'] = $this->mprocessos->consultapartes($id, CPARTEAUTOR);
	$data['reus'] = $this->mprocessos->consultapartes($id, CPARTEREU);
	$data['advogados'] = $this->mprocessos->consultapartes($id, CPARTEADVOGADO);
	$data['interessados'] = $this->mprocessos->consultapartes($id, CPARTEINTERESSADO);
	$this->load->view('includes/vheader');
	$this->load->view('vprocessosconsulta', $data);
	$this->load->view('includes/vfooter');
}

public function edita($id) {
	$this->load->model('mprocessos');
	$data['processo'] = $this->mprocessos->consulta($id);
	$data['localizacoes'] = $this->lelocalizacoes();
	$this->load->view('includes/vheader');
	$this->load->view('vprocessosedita', $data);
	$this->load->view('includes/vfooter');
}

public function altera($id) {
	$this->load->library('form_validation');
	$this->form_validation->set_rules($this->regras('alteracao'));

  if ($this->form_validation->run() == TRUE) {
		$data = $this->vpostados();
		$this->load->model('mprocessos');
	  $this->mprocessos->atualiza($id, $data);
		redirect('/processos');
	}
	else {
		$this->edita($id);
	}
}

public function partes($id) {
	$this->load->model('mprocessos');
  $datainclude['processo'] = $this->mprocessos->consulta($id);
  $dataview['dadosdoprocesso'] = $this->load->view('vdadosdoprocesso', $datainclude, TRUE);

	$dataview['processo'] = $this->mprocessos->consulta($id);
	$dataview['autores'] = $this->mprocessos->consultapartes($id, CPARTEAUTOR);
	$dataview['reus'] = $this->mprocessos->consultapartes($id, CPARTEREU);
	$dataview['advogados'] = $this->mprocessos->consultapartes($id, CPARTEADVOGADO);
	$dataview['interessados'] = $this->mprocessos->consultapartes($id, CPARTEINTERESSADO);

	$this->load->view('includes/vheader');
	$this->load->view('vpartes', $dataview);
	$this->load->view('includes/vfooter');
}

function idparte($parte, $tipo) {
	$this->load->model('mprocessos');
	$id = $this->mprocessos->localizapessoa($parte, $tipo);
	return $id;
}

function validapessoa() {
	if ($this->input->post('submit') == 'autor') {
		$nparte = $this->input->post('autor');
		$tparte = CPARTEAUTOR;
	}
	if ($this->input->post('submit') == 'reu') {
		$nparte = $this->input->post('reu');
		$tparte = CPARTEREU;
	}
	if ($this->input->post('submit') == 'advogado') {
		$nparte = $this->input->post('advogado');
		$tparte = CPARTEADVOGADO;
	}
	if ($this->input->post('submit') == 'interessado') {
		$nparte = $this->input->post('interessado');
		$tparte = CPARTEINTERESSADO;
	}

	$idpessoa = $this->idparte($nparte, $tparte);

	if (!empty($idpessoa)) {
		// verifica se pessoa já é autor
		$this->load->model('mprocessos');
		$idprocesso = $this->uri->segment(3);
		$janoprocesso = $this->mprocessos->pessoanoprocesso($idprocesso, $idpessoa[0]->id_pessoas, $tparte);
		if (!empty($janoprocesso)) {
			$this->form_validation->set_message('validapessoa',
			  'Pessoa já definida como essa Parte nesse Processo: '.$janoprocesso[0]->nome_razao);
			return FALSE;
		}
		return TRUE;
	}
	else {
		$this->form_validation->set_message('validapessoa', 'Pessoa não localizada: '.$nparte);
		return FALSE;
	}
}

public function insereparte($id) {
	if ($this->input->post('submit') == 'autor') {
		$titulo = 'Autor';
		$tipo = 'autor';
		$cparte = CPARTEAUTOR;
	}
	if ($this->input->post('submit') == 'reu') {
		$titulo = 'Réu';
		$tipo = 'reu';
		$cparte = CPARTEREU;
	}
	if ($this->input->post('submit') == 'advogado') {
		$titulo = 'Advogado';
		$tipo = 'advogado';
		$cparte = CPARTEADVOGADO;
	}
	if ($this->input->post('submit') == 'interessado') {
		$titulo = 'Interessado';
		$tipo = 'interessado';
		$cparte = CPARTEINTERESSADO;
	}

	$this->load->library('form_validation');
	$this->form_validation->set_rules($tipo, $titulo,
	  'required|trim|max_length[80]|callback_validapessoa');

	if ($this->form_validation->run() == TRUE) {
		$this->load->model('mprocessos');
		$parte = $this->input->post($tipo);
		$idparte = $this->idparte($parte, $cparte);
		$this->mprocessos->insereparte($id, $cparte, $idparte[0]->id_pessoas);
	}

	$this->partes($id);
}

public function removeparte($idprocesso, $idparte) {
	$this->load->model('mprocessos');
	$this->mprocessos->removeparte($idparte);
	$this->partes($idprocesso);
}

public function localiza() {
  $conteudo = $this->input->post('conteudo');
	$this->consultapaginada('todos', $conteudo);
}

}
