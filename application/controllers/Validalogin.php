<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validalogin extends CI_Controller {

public function index()	{
  $this->load->model('musuario');
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

  $result = $this->musuario->login($email, $senha);

  if ($result) {
    $sess_array = array();
    foreach ($result as $row) {
      $sess_array = array(
        'id_usuarios' => $row->id_usuarios,
        'email'       => $row->email
      );
      $this->session->set_userdata('logged_in', $sess_array);
    }
    return true;
  }
  else {
    $this->form_validation->set_message('check_database', 'E-mail/Senha inválidos.');
    return false;
  }
}

}
