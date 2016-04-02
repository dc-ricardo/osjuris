<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends MY_Controller {

public function index()	{
	$this->consultapaginada('habilitados', '');
}

public function consultahabilitados()	{
	$this->consultapaginada('habilitados', '');
}

public function consultadesabilitados()	{
	$this->consultapaginada('desabilitados', '');
}

public function consultatodos()	{
	$this->consultapaginada('todos', '');
}

public function consultapaginada($categoria, $conteudo) {
	// select
	$this->load->model('musuarios');
  $data['habilitados'] = $this->musuarios->contahabilitados();
  $data['desabilitados'] = $this->musuarios->contadesabilitados();
  $data['todos'] = $this->musuarios->contatodos();

  // paginação
	$this->load->library('pagination');
	$inicio = ($this->uri->segment("3") != '') ? $this->uri->segment("3") : 0;
	$purl = base_url('usuarios/consulta'.$categoria);
	$ptotalrec = $data[$categoria];
  $pdata = $this->libosjuris->fpaginacao($purl, $ptotalrec);
	$this->pagination->initialize($pdata);
	$data['paginacao'] = $this->pagination->create_links();

	$data['usuarios'] = $this->musuarios->seleciona($categoria, $ptotalrec, $inicio, $conteudo);

	$this->load->view('includes/vheader');
	$this->load->view('vusuarios', $data);
	$this->load->view('includes/vfooter');
}

public function novo()	{
	$this->load->view('includes/vheader');
	$this->load->view('vusuariosnovo');
	$this->load->view('includes/vfooter');
}

function vpostados() {
	$data =	array(
		'nome' => $this->input->post('nome'),
		'email' => $this->input->post('email'),
		'nivel' => $this->input->post('nivel'),
		'habilitado' => ($this->input->post('habilitado') == 1) ? 1 : 0
	);
	return $data;
}

function validachavenome($pnome) {
	$this->load->model('musuarios');

  $id = $this->uri->segment(3);
	$data = $this->musuarios->consultachavenome($id, $pnome);

	if (!empty($data)) {
		$this->form_validation->set_message('validachavenome', 'O campo {field} deve conter um valor único.');
		return FALSE;
	}
	else {
		return TRUE;
	}
}

function validachaveemail($pemail) {
	$this->load->model('musuarios');

  $id = $this->uri->segment(3);
	$data = $this->musuarios->consultachavenome($id, $pemail);

	if (!empty($data)) {
		$this->form_validation->set_message('validachaveemail', 'O campo {field} deve conter um valor único.');
		return FALSE;
	}
	else {
		return TRUE;
	}
}

function regras($operacao) {
  $vrules['insercao'] = array(
		array(
			'field' => 'nome',
			'label' => 'Nome',
			'rules' => 'required|max_length[80]|trim'
		),
		array(
			'field' => 'email',
			'label' => 'E-mail',
			'rules' => 'required|max_length[80]|trim|valid_email|is_unique[usuarios.email]'
		)
	);

  $vrules['edicao'] = array(
		array(
			'field' => 'nome',
			'label' => 'Nome',
			'rules' => 'required|max_length[80]|trim|callback_validachavenome'
		),
		array(
			'field' => 'email',
			'label' => 'E-mail',
			'rules' => 'required|max_length[80]|trim|valid_email|callback_validachaveemail'
		)
	);

	$vrules = $vrules[$operacao];

	return $vrules;
}

public function insere()	{
	$this->load->library('form_validation');
	$this->form_validation->set_rules($this->regras('insercao'));

	if ($this->form_validation->run() == TRUE) {
	  $data = $this->vpostados();
		$data['habilitado'] = '1';
		$senha = rand(100000, 999999);
		$data['senha'] = MD5($senha.config_item('salt'));

		$this->load->model('musuarios');
		$this->musuarios->insere($data);
		$this->enviaemailsenha($data['email'], $senha);
		redirect('/usuarios');
	}
	else {
		$this->novo();
	}
}

public function localiza() {
  $conteudo = $this->input->post('conteudo');
	$this->consultapaginada('todos', $conteudo);
}

public function edita($id) {
	$this->load->model('musuarios');
	$data['usuario'] = $this->musuarios->consulta($id);

	$this->load->view('includes/vheader');
	$this->load->view('vusuariosedita', $data);
	$this->load->view('includes/vfooter');
}

public function altera($id) {
	$this->load->library('form_validation');
	$this->form_validation->set_rules($this->regras('edicao'));

	if ($this->form_validation->run() == TRUE) {
	  $data = $this->vpostados();

		$this->load->model('musuarios');
		$this->musuarios->altera($id, $data);
		redirect('/usuarios');
	}
	else {
		$this->edita($id);
	}
}

public function enviaemailsenha($email, $senha) {
	$this->load->library('email');
	$this->email->set_mailtype('html');

	$this->email->from('noreply@osjuris.com.br', 'OSJuris');
	$this->email->to($email);
	$this->email->subject('Novo Usuário/Senha OSJuris');

	$url = base_url();
	$msg = '<p>Olá.<p>Um usuário/senha no sistema OSJuris foi criado para este endereço de '.
	  'E-mail com a senha temporária '.$senha.'.'.
		'<p>Siga o link abaixo para trocar sua senha.'.
		'<p><a href="'.$url.'">'.$url.'</a>'.
		'<p>--'.
		'<br>OSJuris'
		;
	$this->email->message($msg);

	$this->email->send();
}

}
