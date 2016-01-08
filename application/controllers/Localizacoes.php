<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Localizacoes extends MY_Controller {

public function index()	{
	$this->load->model('mlocalizacoes');
	$data['localizacoes'] = $this->mlocalizacoes->seleciona();

	$this->load->view('includes/vheader');
	$this->load->view('vlocalizacoes', $data);
	$this->load->view('includes/vfooter');
}

public function grava($id) {
	$this->load->model('mlocalizacoes');
	if (!isset($id)) {
		$data =	array('descricao' => $this->input->post('nlocalizacao'));
		$this->mlocalizacoes->insere($data);
	}
	else {
		$descricao = $this->input->post('elocalizacao');
		$this->mlocalizacoes->atualiza($id , $descricao);
	}

  redirect('/localizacoes');
}

public function edita($id) {
	$this->load->model('mlocalizacoes');
	$data['localizacoes'] = $this->mlocalizacoes->seleciona();
	$data['editar'] = $this->mlocalizacoes->consulta($id);

	$this->load->view('includes/vheader');
	$this->load->view('vlocalizacoes', $data);
	$this->load->view('includes/vfooter');
}

}
