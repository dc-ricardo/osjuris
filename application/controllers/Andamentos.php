<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Andamentos extends MY_Controller {

public function index()	{
}

public function consulta($idprocesso)	{
  $this->load->model('mandamentos');
	$data['andamentos'] = $this->mandamentos->seleciona($idprocesso);

  $this->load->model('mprocessos');
  $data['processo'] = $this->mprocessos->consulta($idprocesso);

	$this->load->view('includes/vheader');
	$this->load->view('vandamentos', $data);
	$this->load->view('includes/vfooter');
}

public function novo($idprocesso) {
  $this->load->model('mprocessos');
  $data['processo'] = $this->mprocessos->consulta($idprocesso);
	$this->load->view('includes/vheader');
	$this->load->view('vandamentosnovo', $data);
	$this->load->view('includes/vfooter');
}

function vpostados($idprocesso) {
	$data =	array(
		'id_processos' => $idprocesso,
		'data_andamento' => $this->input->post('data_andamento'),
		'descricao' => $this->input->post('descricao'),
		'interesse' => $this->input->post('interesse')
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

function regras() {
  $vrules = array(
		array(
			'field' => 'data_andamento',
			'label' => 'Data do Andamento',
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

public function insere($idprocesso) {
  $this->load->library('form_validation');
	$this->form_validation->set_rules($this->regras());

  if ($this->form_validation->run() == TRUE) {
	  $data = $this->vpostados($idprocesso);

		$this->load->model('mandamentos');
	  $this->mandamentos->insere($data);
		redirect('/andamentos/consulta/'.$idprocesso);
	}
	else {
		$this->novo($idprocesso);
	}
}

public function edita() {

}

public function exclui($idandamento) {
  $this->load->model('mandamentos');
	$this->mandamentos->remove($idandamento);
	// $this->partes($idprocesso);
}

}
