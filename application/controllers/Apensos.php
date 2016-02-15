<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apensos extends MY_Controller {

public function index()	{
}

public function consulta($idprocesso)	{
  $this->load->model('mprocessos');
  $datainclude['processo'] = $this->mprocessos->consulta($idprocesso);
  $dataview['dadosdoprocesso'] = $this->load->view('vdadosdoprocesso', $datainclude, TRUE);

  $this->load->model('mapensos');
	$dataview['apensos'] = $this->mapensos->seleciona($idprocesso);

	$this->load->view('includes/vheader');
	$this->load->view('vapensos', $dataview);
	$this->load->view('includes/vfooter');
}

function lelocalizacoes() {
	// captura localizações em ordem alfabética crescente para escolha no combobox
	$this->load->model('mlocalizacoes');
	$data = $this->mlocalizacoes->seleciona('descricao', 'ASC');
  return $data;
}

public function novo($idprocesso) {
  $this->load->model('mprocessos');
  $datainclude['processo'] = $this->mprocessos->consulta($idprocesso);

  $dataview['dadosdoprocesso'] = $this->load->view('vdadosdoprocesso', $datainclude, TRUE);
  $dataview['processo'] = $this->mprocessos->consulta($idprocesso);
  $dataview['localizacoes'] = $this->lelocalizacoes();

	$this->load->view('includes/vheader');
	$this->load->view('vapensosnovo', $dataview);
	$this->load->view('includes/vfooter');
}

function vpostados($idprocesso) {
	$data =	array(
		'id_processos' => $idprocesso,
		'numero_apenso' => $this->input->post('numero_apenso'),
		'data_apenso' => $this->input->post('data_apenso'),
		'id_localizacoes' => $this->input->post('localizacao'),
		'descricao' => $this->input->post('descricao')
	);
	return $data;
}

function validadata($pdata) {
  $dvalida = $this->libosjuris->validadata($pdata);
  if (!$dvalida) {
    $this->load->library('form_validation');
    $this->form_validation->set_message('validadata', 'Data inválida.');
	}
  return $dvalida;
}

function validachavenapenso($pvalor) {
	$this->load->model('mapensos');

  $id = $this->uri->segment(4);
	$data = $this->mapensos->consultachavenapenso($id, $pvalor);

	if (!empty($data)) {
		$this->form_validation->set_message('validachavenapenso', 'O campo {field} deve conter um valor único.');
		return FALSE;
	}
	else {
		return TRUE;
	}
}

function regras($operacao) {
  $vrules['padrao'] = array(
		array(
			'field' => 'data_apenso',
			'label' => 'Data',
			'rules' => 'required|callback_validadata'
		)
	);

	$vrules['insercao'] = array(
		array(
			'field' => 'numero_apenso',
			'label' => 'Número do Apenso',
			'rules' => 'required|is_unique[apensos.numero_apenso]|max_length[80]|trim'
		)
	);

	$vrules['alteracao'] = array(
		array(
			'field' => 'numero_apenso',
			'label' => 'Número do Apenso',
			'rules' => 'required|max_length[80]|trim|callback_validachavenapenso'
		)
	);

	$vrules = array_merge($vrules['padrao'], $vrules[$operacao]);

	return $vrules;
}

public function insere($idprocesso) {
	$this->load->library('form_validation');
	$this->form_validation->set_rules($this->regras('insercao'));

  if ($this->form_validation->run() == TRUE) {
	  $data = $this->vpostados($idprocesso);

		$this->load->model('mapensos');
	  $this->mapensos->insere($data);
		redirect('/apensos/consulta/'.$idprocesso);
	}
	else {
		$this->novo($idprocesso);
	}
}

public function edita($idprocesso, $idapenso) {
  $this->load->model('mprocessos');
  $datainclude['processo'] = $this->mprocessos->consulta($idprocesso);

  $dataview['dadosdoprocesso'] = $this->load->view('vdadosdoprocesso', $datainclude, TRUE);
  $dataview['processo'] = $this->mprocessos->consulta($idprocesso);
  $dataview['localizacoes'] = $this->lelocalizacoes();
  $this->load->model('mapensos');
  $dataview['apenso'] = $this->mapensos->consulta($idapenso);

	$this->load->view('includes/vheader');
	$this->load->view('vapensosedita', $dataview);
	$this->load->view('includes/vfooter');
}

public function altera($idprocesso, $idapenso) {
	$this->load->library('form_validation');
	$this->form_validation->set_rules($this->regras('alteracao'));

  if ($this->form_validation->run() == TRUE) {
		$data = $this->vpostados($idprocesso);
		$this->load->model('mapensos');
	  $this->mapensos->altera($idapenso, $data);
		redirect('/apensos/consulta/'.$idprocesso);
	}
	else {
		$this->edita($idprocesso, $idapenso);
	}
}

public function consultaap($idprocesso, $idapenso) {
  $this->load->model('mprocessos');
  $datainclude['processo'] = $this->mprocessos->consulta($idprocesso);
  $dataview['dadosdoprocesso'] = $this->load->view('vdadosdoprocesso', $datainclude, TRUE);
  $dataview['processo'] = $this->mprocessos->consulta($idprocesso);

  $this->load->model('mapensos');
  $datainclude['apenso'] = $this->mapensos->consulta($idapenso);
  $dataview['dadosdoapenso'] = $this->load->view('vdadosdoapenso', $datainclude, TRUE);
  $dataview['apenso'] = $this->mapensos->consulta($idprocesso);

  $this->load->view('includes/vheader');
	$this->load->view('vapensosconsulta', $dataview);
	$this->load->view('includes/vfooter');
}

public function andamentos($idprocesso, $idapenso) {
  $this->load->model('mprocessos');
  $datainclude['processo'] = $this->mprocessos->consulta($idprocesso);
  $dataview['dadosdoprocesso'] = $this->load->view('vdadosdoprocesso', $datainclude, TRUE);
  $dataview['processo'] = $this->mprocessos->consulta($idprocesso);

  $this->load->model('mapensos');
  $datainclude['apenso'] = $this->mapensos->consulta($idapenso);
  $dataview['dadosdoapenso'] = $this->load->view('vdadosdoapenso', $datainclude, TRUE);
  $dataview['apenso'] = $this->mapensos->consulta($idprocesso);
  $dataview['andamentos'] = $this->mapensos->andamentos($idapenso);

  $this->load->view('includes/vheader');
	$this->load->view('vapensosandamentos', $dataview);
	$this->load->view('includes/vfooter');
}

public function novoandamento($idprocesso, $idapenso) {
  $this->load->model('mprocessos');
  $datainclude['processo'] = $this->mprocessos->consulta($idprocesso);
  $dataview['dadosdoprocesso'] = $this->load->view('vdadosdoprocesso', $datainclude, TRUE);
  $dataview['processo'] = $this->mprocessos->consulta($idprocesso);

  $this->load->model('mapensos');
  $datainclude['apenso'] = $this->mapensos->consulta($idapenso);
  $dataview['dadosdoapenso'] = $this->load->view('vdadosdoapenso', $datainclude, TRUE);
  $dataview['apenso'] = $this->mapensos->consulta($idprocesso);

  $this->load->view('includes/vheader');
	$this->load->view('vapensosnovoandamento', $dataview);
	$this->load->view('includes/vfooter');
}

function vpostadosandamento($idapenso) {
	$data =	array(
		'id_apensos' => $idapenso,
		'data_andamento' => $this->input->post('data_andamento'),
		'descricao' => $this->input->post('descricao'),
		'interesse' => $this->input->post('interesse')
	);
	return $data;
}

function regrasandamento() {
  $vrules = array(
		array(
			'field' => 'data_andamento',
			'label' => 'Data',
			'rules' => 'required|callback_validadata'
		),
		array(
			'field' => 'descricao',
			'label' => 'Descrição',
			'rules' => 'required'
		)
	);
	return $vrules;
}

public function insereandamento($idprocesso, $idapenso) {
  $this->load->library('form_validation');
	$this->form_validation->set_rules($this->regrasandamento());

  if ($this->form_validation->run() == TRUE) {
	  $data = $this->vpostadosandamento($idapenso);

		$this->load->model('mapensos');
	  $this->mapensos->insereandamento($data);
		redirect('/apensos/andamentos/'.$idprocesso.'/'.$idapenso);
	}
	else {
		$this->novoandamento($idprocesso, $idapenso);
	}
}

public function editaandamento($idprocesso, $idapenso, $idandamento) {
  $this->load->model('mprocessos');
  $datainclude['processo'] = $this->mprocessos->consulta($idprocesso);
  $dataview['dadosdoprocesso'] = $this->load->view('vdadosdoprocesso', $datainclude, TRUE);
  $dataview['processo'] = $this->mprocessos->consulta($idprocesso);

  $this->load->model('mapensos');
  $datainclude['apenso'] = $this->mapensos->consulta($idapenso);
  $dataview['dadosdoapenso'] = $this->load->view('vdadosdoapenso', $datainclude, TRUE);
  $dataview['apenso'] = $this->mapensos->consulta($idprocesso);
  $dataview['andamento'] = $this->mapensos->consultaandamento($idandamento);

  $this->load->view('includes/vheader');
	$this->load->view('vapensoseditaandamento', $dataview);
	$this->load->view('includes/vfooter');
}

public function alteraandamento($idprocesso, $idapenso, $idandamento) {
  $this->load->library('form_validation');
	$this->form_validation->set_rules($this->regrasandamento());

  if ($this->form_validation->run() == TRUE) {
	  $data = $this->vpostadosandamento($idapenso);

		$this->load->model('mapensos');
	  $this->mapensos->alteraandamento($idandamento, $data);
		redirect('/apensos/andamentos/'.$idprocesso.'/'.$idapenso);
	}
	else {
		$this->editaandamento($idprocesso, $idapenso, $idandamento);
	}
}

public function excluiandamento($idprocesso, $idapenso, $idandamento) {
  $this->load->model('mapensos');
  $this->mapensos->excluiandamento($idandamento);
  redirect('/apensos/andamentos/'.$idprocesso.'/'.$idapenso);
}

}
