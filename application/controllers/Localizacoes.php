<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Localizacoes extends MY_Controller {

public function index()	{
	$this->load->model('mlocalizacoes');
	$data['localizacoes'] = $this->mlocalizacoes->seleciona('id_localizacoes', 'DESC');

	$this->load->view('includes/vheader');
	$this->load->view('vlocalizacoes', $data);
	$this->load->view('includes/vfooter');
}

public function insere() {
	$this->load->model('mlocalizacoes');
	$this->load->library('form_validation');

	$this->form_validation->set_rules('descricao', 'Descrição',
	  'required|trim|max_length[80]|is_unique[localizacoes.descricao]');
	if ($this->form_validation->run() == TRUE) {
		$data =	array('descricao' => $this->input->post('descricao'));
		$this->mlocalizacoes->insere($data);
	}

	$data['localizacoes'] = $this->mlocalizacoes->seleciona('id_localizacoes', 'DESC');
	$this->load->view('includes/vheader');
	$this->load->view('vlocalizacoes', $data);
	$this->load->view('includes/vfooter');

}

public function edita($id) {
	$this->load->model('mlocalizacoes');
	$data['localizacao'] = $this->mlocalizacoes->consulta($id);

	$this->load->view('includes/vheader');
	$this->load->view('vlocalizacoes_edita', $data);
	$this->load->view('includes/vfooter');
}

public function altera($id) {
	$this->load->model('mlocalizacoes');
	$descricao = $this->input->post('descricao');

	$this->load->library('form_validation');
	$this->form_validation->set_rules('descricao', 'Descrição',
	  'required|trim|max_length[80]|callback_validachavedescricao');

	if ($this->form_validation->run() == TRUE) {
		$this->mlocalizacoes->atualiza($id, $descricao);
		redirect('localizacoes');
	}
	else {
		$this->edita($id);
	}

}

public function validachavedescricao($pdescricao) {
	$this->load->model('mlocalizacoes');

  $id = $this->uri->segment(3);
	$data = $this->mlocalizacoes->consultachavedescricao($id, $pdescricao);

	if (!empty($data)) {
		$this->form_validation->set_message('validachavedescricao',
		  'O campo {field} deve conter um valor único.');
		return FALSE;
	}
	else {
		return TRUE;
	}
}

}
