<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends MY_Controller {

public function index()	{
	$this->consultapaginada('habilitados', '');
}

public function habilitados()	{
	$this->consultapaginada('habilitados', '');
}

public function desabilitados()	{
	$this->consultapaginada('desabilitados', '');
}

public function consultapaginada($categoria, $conteudo) {
	// select
	$this->load->model('musuarios');
  $data['habilitados'] = $this->musuarios->contahabilitados();
  $data['desabilitados'] = $this->musuarios->contadesabilitados();

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
		'habilitado' => ($this->input->post('habilitado') == 1) ? 1 : 0,
		'senha' => rand(100000, 999999)
	);
	return $data;
}

function regras() {
  $vrules = array(
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
	return $vrules;
}

public function insere()	{
	$this->load->library('form_validation');
	$this->form_validation->set_rules($this->regras());

	if ($this->form_validation->run() == TRUE) {
	  $data = $this->vpostados();

		$this->load->model('musuarios');
		$this->musuarios->insere($data);
		redirect('/usuarios');
	}
	else {
		$this->novo();
	}
}

}
