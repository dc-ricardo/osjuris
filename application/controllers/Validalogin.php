<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validalogin extends CI_Controller {

public function index()	{
  $this->load->model('musuarios');
  $this->load->library('form_validation');

  $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
  $this->form_validation->set_rules('senha', 'Senha', 'required|trim|callback_check_database');

  if ($this->form_validation->run() == TRUE) {
    redirect('dashboard', 'auto');
  }
  else {
    $this->load->view('vlogon');
  }
}

function check_database($senha) {
  $email = $this->input->post('email');
  $this->load->model('musuarios');
  $result = $this->musuarios->login($email, $senha);

  if ($result) {
    if ($result[0]->habilitado == 0) {
      $this->form_validation->set_message('check_database', 'Usuário desabilitado.');
      return FALSE;
    }
    else {
      $sess_array = array(
        'id_usuarios' => $result[0]->id_usuarios,
        'email' => $result[0]->email,
        'nome' => $result[0]->nome,
        'nivel' => $result[0]->nivel);
        $this->session->set_userdata('logged_in', $sess_array);
        $this->session->set_userdata('stemp', ($result[0]->stemp == 1));
        return TRUE;
    }
  }
  else {
    $this->form_validation->set_message('check_database', 'E-mail/Senha inválidos.');
    return FALSE;
  }
}

public function enviaemailnovasenha($email, $senha) {
	$this->load->library('email');
	$this->email->set_mailtype('html');

	$this->email->from('noreply@osjuris.com.br', 'OSJuris');
	$this->email->to($email);
	$this->email->subject('Recuperar Senha OSJuris');

	$url = base_url();
	$msg = '<p>Olá.<p>Uma nova senha no sistema OSJuris foi criada para este endereço de '.
	  'E-mail: '.$senha.'.'.
		'<p>Siga o link abaixo para redefinir esse valor.'.
		'<p><a href="'.$url.'">'.$url.'</a>'.
		'<p>--'.
		'<br>OSJuris'
		;
	$this->email->message($msg);

	$this->email->send();
}

public function recuperasenha() {
  $email = $this->session->flashdata('emailrecsenha');
  if (isset($email)) {
    $senha = rand(100000, 999999);

		$data['email'] = $email;
    $data['senha'] = MD5($senha.CSALT);

    $this->load->model('musuarios');
    $this->musuarios->alterasenha($data);

    $this->enviaemailnovasenha($email, $senha);

    $this->load->view('vlogonrecuperado', $data);
  }
  else {
    redirect(base_url());
  }
}

}
