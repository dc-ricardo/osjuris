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

function vpostados() {
	$data =	array(
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
	return $data;
}

function regras($operacao) {
  $vrules['padrao'] = array(
		array(
			'field' => 'rg_ie',
			'label' => 'RG/Inscrição',
			'rules' => 'max_length[20]|alpha_numeric|trim'
		),
		array(
			'field' => 'endereco',
			'label' => 'Endereço',
			'rules' => 'max_length[80]|trim'
		),
		array(
			'field' => 'complemento',
			'label' => 'Complemento',
			'rules' => 'max_length[20]|trim'
		),
		array(
			'field' => 'bairro',
			'label' => 'Bairro',
			'rules' => 'max_length[60]|trim'
		),
		array(
			'field' => 'cidade',
			'label' => 'Cidade',
			'rules' => 'max_length[60]|trim'
		),
		array(
			'field' => 'estado',
			'label' => 'Estado',
			'rules' => 'max_length[2]|trim'
		),
		array(
			'field' => 'cep',
			'label' => 'CEP',
			'rules' => 'max_length[8]|trim'
		),
		array(
			'field' => 'telefone',
			'label' => 'Telefone',
			'rules' => 'max_length[20]|trim'
		),
		array(
			'field' => 'celular',
			'label' => 'Celular',
			'rules' => 'max_length[20]|trim'
		),
		array(
			'field' => 'email',
			'label' => 'E-mail',
			'rules' => 'max_length[60]|trim'
		),
		array(
			'field' => 'numero',
			'label' => 'Número',
			'rules' => 'integer'
		)
	);

	$vrules['insercao'] = array(
		array(
			'field' => 'nome_razao',
			'label' => 'Nome/Razão Social',
			'rules' => 'required|is_unique[pessoas.nome_razao]|max_length[80]|trim'
		),
		array(
			'field' => 'codigo',
			'label' => 'Código',
			'rules' => 'required|is_unique[pessoas.codigo]|exact_length[6]'
		),
		array(
			'field' => 'cpf_cnpj',
			'label' => 'CPF/CNPJ',
			'rules' => 'required|is_unique[pessoas.cpf_cnpj]|max_length[20]|alpha_numeric'
		)
	);

	$vrules['alteracao'] = array(
		array(
			'field' => 'nome_razao',
			'label' => 'Nome/Razão Social',
			'rules' => 'required|max_length[80]|trim'
		),
		array(
			'field' => 'codigo',
			'label' => 'Código',
			'rules' => 'required|exact_length[6]'
		),
		array(
			'field' => 'cpf_cnpj',
			'label' => 'CPF/CNPJ',
			'rules' => 'required|max_length[20]|alpha_numeric'
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

		$this->load->model('mpessoas');
	  $this->mpessoas->insere($data);
		redirect('/pessoas');
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

public function edita($id) {
	$this->load->model('mpessoas');
	$data['pessoa'] = $this->mpessoas->consulta($id);

	$this->load->view('includes/vheader');
	$this->load->view('vpessoas_edita', $data);
	$this->load->view('includes/vfooter');
}

public function atualiza($id) {
	$this->load->library('form_validation');
	$this->form_validation->set_rules($this->regras('alteracao'));

  if ($this->form_validation->run() == TRUE) {
	  $data = $this->vpostados();
		$this->load->model('mpessoas');
		$this->mpessoas->atualiza($id, $data);
		redirect('/pessoas/consulta/'.$id);
	}
	else {
		$this->edita($id);
	}
}

}
