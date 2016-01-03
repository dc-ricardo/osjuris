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
	$this->form_validation->set_rules('nome_razao','Nome/Razão Social','required|is_unique[pessoas.nome_razao]|max_length[80]|trim');
	$this->form_validation->set_rules('codigo','Código','required|is_unique[pessoas.codigo]|exact_length[6]');
	$this->form_validation->set_rules('cpf_cnpj','CPF/CNPJ','required|is_unique[pessoas.cpf_cnpj]|max_length[20]|alpha_numeric');
	$this->form_validation->set_rules('rg_ie','RG/Inscrição','max_length[20]|alpha_numeric|trim');
	$this->form_validation->set_rules('endereco','Endereço','max_length[80]|trim');
	$this->form_validation->set_rules('complemento','Complemento','max_length[20]|trim');
	$this->form_validation->set_rules('bairro','Bairro','max_length[60]|trim');
	$this->form_validation->set_rules('cidade','Cidade','max_length[60]|trim');
	$this->form_validation->set_rules('estado','Estado','max_length[2]');
	$this->form_validation->set_rules('cep','CEP','max_length[8]');
	$this->form_validation->set_rules('telefone','Telefone','max_length[20]|trim');
	$this->form_validation->set_rules('celular','Celular','max_length[20]|trim');
	$this->form_validation->set_rules('email','E-mail','valid_email|max_length[60]|trim');
	$this->form_validation->set_rules('numero','Número','integer');

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
	$this->form_validation->set_rules('nome_razao','Nome/Razão Social','required|max_length[80]|trim');

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
		$this->mpessoas->atualiza($id, $data);
		redirect('/pessoas/consulta/'.$id);
	}
	else {
		$this->edita($id);
	}

}

}
