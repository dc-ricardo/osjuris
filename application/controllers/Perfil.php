<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends MY_Controller {

public function index()	{
  $id = $this->session->userdata['logged_in']['id_usuarios'];

  $this->load->model('musuarios');
	$data['usuario'] = $this->musuarios->consulta($id);

	$this->load->view('includes/vheader');
	$this->load->view('vperfil', $data);
	$this->load->view('includes/vfooter');
}

public function trocasenha($id) {
  $this->load->model('musuarios');
	$data['usuario'] = $this->musuarios->consulta($id);

  $this->load->view('includes/vheader');
	$this->load->view('vtrocasenha', $data);
	$this->load->view('includes/vfooter');
}

function senhavalida($senha) {
  $email = $this->session->userdata['logged_in']['email'];;
  $this->load->model('musuarios');
  $result = $this->musuarios->login($email, $senha);

  if ($result) {
    return true;
  }
  else {
    $this->form_validation->set_message('senhavalida', 'Senha atual inválida.');
    return false;
  }
}

function regras() {
  $vrules = array(
		array(
			'field' => 'senhaatual',
			'label' => 'Senha Atual',
			'rules' => 'required|max_length[40]|alpha_numeric|trim|callback_senhavalida'
		),
		array(
			'field' => 'novasenha',
			'label' => 'Nova Senha',
			'rules' => 'required|max_length[40]|alpha_numeric|trim|differs[senhaatual]'
		),
		array(
			'field' => 'senhaconfirmada',
			'label' => 'Nova Senha (confirmação)',
			'rules' => 'required|max_length[40]|alpha_numeric|trim|matches[novasenha]'
		)
  );
	return $vrules;
}

function vpostados() {
	$data =	array(
		'senhaatual' => $this->input->post('senhaatual'),
		'novasenha' => $this->input->post('novasenha'),
		'senhaconfirmada' => $this->input->post('senhaconfirmada')
	);
	return $data;
}

public function atualizasenha($id) {
	$this->load->library('form_validation');
	$this->form_validation->set_rules($this->regras());

	if ($this->form_validation->run() == TRUE) {
		$data = $this->vpostados();
		$this->load->model('musuarios');
		$this->musuarios->atualizasenha($id, $data['novasenha']);
    $this->session->set_flashdata('senhaalterada', 'TRUE');
		redirect('/perfil');
	}
	else {
		$this->trocasenha($id);
	}
}

}
