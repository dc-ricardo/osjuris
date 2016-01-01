<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoas extends MY_Controller {

public function index()	{
	$this->load->model('mpessoas');
	$data['pessoas'] = $this->mpessoas->seleciona();

	$this->load->view('includes/vheader');
	$this->load->view('vpessoas', $data);
	$this->load->view('includes/vfooter');
}

public function novo() {
	$this->load->view('includes/vheader');
	$this->load->view('vpessoas_novo');
	$this->load->view('includes/vfooter');
}

public function insere() {

	$this->load->library('form_validation');
	$this->form_validation->set_rules('codigo','Código','required');
	$this->form_validation->set_rules('cpf_cnpj','CPF/CNPJ','required');
	$this->form_validation->set_rules('nome_razao','Nome/Razão Social','required');

  if ($this->form_validation->run() == TRUE) {
	  $data = array(
				'codigo' => $this->input->post('codigo'),
				'tipo' => $this->input->post('tipo'),
				'cpf_cnpj' => $this->input->post('cpf_cnpj'),
				'rg_ie' => $this->input->post('rg_ie'),
				'nome_razao' => $this->input->post('nome_razao'),
				'endereco' => $this->input->post('endereco'),
				'numero' => $this->input->post('numero'),
				'complemento' => $this->input->post('complemento'),
				'bairro' => $this->input->post('bairro'),
				'cidade' => $this->input->post('cidade'),
				'estado' => $this->input->post('estado'),
				'cep' => $this->input->post('cep'),
				'telefone' => $this->input->post('telefone'),
				'celular' => $this->input->post('celular'),
				'email' => $this->input->post('email'),
				'observacoes' => $this->input->post('observacoes')
		);

		$this->load->model('mpessoas');
	  $this->mpessoas->insere($data);
	}
	else {
		$this->load->view('includes/vheader');
		$this->load->view('vpessoas_novo');
		$this->load->view('includes/vfooter');
	}
}

public function consulta($id) {
	$this->load->model('mpessoas');
	$data['pessoa'] = $this->mpessoas->consulta($id);

	$this->load->view('includes/vheader');
	$this->load->view('vpessoas_consulta', $data);
	$this->load->view('includes/vfooter');
}

}
