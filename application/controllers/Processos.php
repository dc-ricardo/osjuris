<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Processos extends MY_Controller {

public function index()	{
	$this->load->model('mprocessos');
	$data['processos'] = $this->mprocessos->seleciona();
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
	$this->load->view('vprocessos_novo', $data);
	$this->load->view('includes/vfooter');
}

function vpostados() {
	$data =	array(
		'numero_processo' => $this->input->post('numero_processo'),
		'numero_interno' => $this->input->post('numero_interno'),
		'data_abertura' => $this->input->post('data_abertura'),
		'id_localizacoes' => $this->input->post('localizacao')
	);
	return $data;
}

function validadata($pdata) {
  $day = (int) substr($pdata, 0, 2);
  $month = (int) substr($pdata, 3, 2);
  $year = (int) substr($pdata, 6, 4);

  $dvalida = checkdate($month, $day, $year);

	if (!$dvalida) {
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
	$this->load->view('includes/vheader');
	$this->load->view('vprocessos_consulta', $data);
	$this->load->view('includes/vfooter');
}

public function edita($id) {
	$this->load->model('mprocessos');
	$data['processo'] = $this->mprocessos->consulta($id);
	$data['localizacoes'] = $this->lelocalizacoes();
	$this->load->view('includes/vheader');
	$this->load->view('vprocessos_edita', $data);
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

public function partes() {
	$this->load->view('includes/vheader');
	$this->load->view('vprocessospartes');
	$this->load->view('includes/vfooter');
}

}
