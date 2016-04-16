<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoas extends MY_Controller {

public function index()	{
	$this->consultapaginada('cadastradas', '');
}

public function consultacadastradas() {
	$this->consultapaginada('cadastradas', '');
}

public function consultaadvogados() {
	$this->consultapaginada('advogados', '');
}

public function consultafisicas() {
	$this->consultapaginada('fisicas', '');
}

public function consultajuridicas() {
	$this->consultapaginada('juridicas', '');
}

public function consultapaginada($categoria, $conteudo) {
	// select
	$this->load->model('mpessoas');
	$data['cadastradas'] = $this->mpessoas->contacadastradas();
	$data['advogados'] = $this->mpessoas->contapessoas(CTIPOADVOGADO);
	$data['fisicas'] = $this->mpessoas->contapessoas(CTIPOFISICA);
	$data['juridicas'] = $this->mpessoas->contapessoas(CTIPOJURIDICA);

  // paginação
	$this->load->library('pagination');
	$inicio = ($this->uri->segment("3") != '') ? $this->uri->segment("3") : 0;
	$purl = base_url('pessoas/consulta'.$categoria);
	$ptotalrec = $data[$categoria];
	$perpage = $this->session->userdata['logged_in']['registros_pagina'];
  $pdata = $this->libosjuris->fpaginacao($purl, $ptotalrec, $perpage);
	$this->pagination->initialize($pdata);

	$data['paginacao'] = $this->pagination->create_links();
	$data['pessoas'] = $this->mpessoas->seleciona($categoria, $perpage, $inicio, $conteudo);

	$this->load->view('includes/vheader');
	$this->load->view('vpessoas', $data);
	$this->load->view('includes/vfooter');
}

public function novo() {
	$this->load->view('includes/vheader');
	$this->load->view('vpessoasnovo');
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
			'rules' => 'alpha|max_length[2]|trim'
		),
		array(
			'field' => 'cep',
			'label' => 'CEP',
			'rules' => 'integer|max_length[8]|trim'
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
			'rules' => 'valid_email|max_length[60]|trim'
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
			'rules' => 'required|is_unique[pessoas.codigo]|min_length[2]|max_length[20]'
		),
		array(
			'field' => 'cpf_cnpj',
			'label' => 'CPF/CNPJ',
			'rules' => 'required|is_unique[pessoas.cpf_cnpj]|max_length[20]|integer'
		)
	);

	$vrules['alteracao'] = array(
		array(
			'field' => 'nome_razao',
			'label' => 'Nome/Razão Social',
			'rules' => 'required|max_length[80]|trim|callback_validachavenome'
		),
		array(
			'field' => 'codigo',
			'label' => 'Código',
			'rules' => 'required|min_length[2]|max_length[20]|callback_validachavecodigo'
		),
		array(
			'field' => 'cpf_cnpj',
			'label' => 'CPF/CNPJ',
			'rules' => 'required|max_length[20]|integer|callback_validachavecpf'
		)
	);

	$vrules = array_merge($vrules['padrao'], $vrules[$operacao]);

	return $vrules;
}

public function validachavenome($pvalor) {
	$this->load->model('mpessoas');

  $id = $this->uri->segment(3);
	$data = $this->mpessoas->consultachavenome($id, $pvalor);

	if (!empty($data)) {
		$this->form_validation->set_message('validachavenome', 'O campo {field} deve conter um valor único.');
		return FALSE;
	}
	else {
		return TRUE;
	}
}

public function validachavecodigo($pvalor) {
	$this->load->model('mpessoas');

  $id = $this->uri->segment(3);
	$data = $this->mpessoas->consultachavecodigo($id, $pvalor);

	if (!empty($data)) {
		$this->form_validation->set_message('validachavecodigo', 'O campo {field} deve conter um valor único.');
		return FALSE;
	}
	else {
		return TRUE;
	}
}

public function validachavecpf($pvalor) {
	$this->load->model('mpessoas');

  $id = $this->uri->segment(3);
	$data = $this->mpessoas->consultachavecpf($id, $pvalor);

	if (!empty($data)) {
		$this->form_validation->set_message('validachavecpf', 'O campo {field} deve conter um valor único.');
		return FALSE;
	}
	else {
		return TRUE;
	}
}

// retorna vetor com valores do endereço
// ex: Array ( [resultado] => 1 [resultado_txt] => sucesso - cep completo [uf] =>
//   SP [cidade] => São Paulo [bairro] => Vila Mariana [tipo_logradouro] => Rua [logradouro] => Acarapé )
public function buscacep($cep) {
	if (strstr($cep, '_') || strlen($cep) < 8 )	{
		$cep = '0';
	}
	$this->load->helper('cepcorreios');
	return json_decode(buscar_endereco($cep), TRUE);
}

public function insere() {
	if ($this->input->post('submit') == 'gravar') {
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
			$this->load->view('vpessoasnovo');
			$this->load->view('includes/vfooter');
		}
	}
	else {
		if ($this->input->post('submit') == 'gerar') {
			$this->load->model('mpessoas');
			$data['codigogerado'] = $this->mpessoas->geracodigo();
			$this->load->view('includes/vheader');
	  	$this->load->view('vpessoasnovo', $data);
			$this->load->view('includes/vfooter');
		}
		else {
			if ($this->input->post('submit') == 'buscarcep') {
				$cep = $this->input->post('cep');
				$endereco = $this->buscacep($cep);
  			$data['ceplocalizado'] = $endereco;
				$this->load->view('includes/vheader');
	  		$this->load->view('vpessoasnovo', $data);
				$this->load->view('includes/vfooter');
			}
		}
	}
}

public function consulta($id) {
	$this->load->model('mpessoas');
	$data['pessoa'] = $this->mpessoas->consulta($id);
	$data['processos'] = $this->mpessoas->processoscomoparte($id);

	$this->load->view('includes/vheader');
	$this->load->view('vpessoasconsulta', $data);
	$this->load->view('includes/vfooter');
}

public function edita($id) {
	$this->load->model('mpessoas');
	$data['pessoa'] = $this->mpessoas->consulta($id);

	$this->load->view('includes/vheader');
	$this->load->view('vpessoasedita', $data);
	$this->load->view('includes/vfooter');
}

public function atualiza($id) {
	if ($this->input->post('submit') == 'gravar') {
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
	else {
		if ($this->input->post('submit') == 'gerar') {
			$this->load->model('mpessoas');
			$data['pessoa'] = $this->mpessoas->consulta($id);
			$data['codigogerado'] = $this->mpessoas->geracodigo();

			$this->load->view('includes/vheader');
	  	$this->load->view('vpessoasedita', $data);
			$this->load->view('includes/vfooter');
		}
		else {
			if ($this->input->post('submit') == 'buscarcep') {
				$this->load->model('mpessoas');
				$data['pessoa'] = $this->mpessoas->consulta($id);

				$cep = $this->input->post('cep');
				$endereco = $this->buscacep($cep);
				$data['ceplocalizado'] = $endereco;

				$this->load->view('includes/vheader');
				$this->load->view('vpessoasedita', $data);
				$this->load->view('includes/vfooter');
			}
		}
	}
}

public function localiza() {
  $conteudo = $this->input->post('conteudo');
	$this->consultapaginada('cadastradas', $conteudo);
}

public function imprime($idpessoa) {
	$this->load->model('mpessoas');
	$data['pessoa'] = $this->mpessoas->consulta($idpessoa);
	$data['processos'] = $this->mpessoas->processoscomoparte($idpessoa);

	$this->load->view('vpessoasimpressao', $data);
}

}
