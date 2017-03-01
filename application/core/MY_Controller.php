<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

public function __construct() {
  parent::__construct();

  $logado = $this->session->userdata('logged_in');
  $stemp = $this->session->userdata('stemp');

  if ($logado == FALSE) {
    redirect('logon');
  }
  else {
    // redireciona para a troca de senha caso marcada como temporária pelo processo de recuperação
    if ($stemp == TRUE) {
      $this->session->set_userdata('stemp', FALSE);
      redirect('perfil/trocasenha/'.$this->session->userdata['logged_in']['id_usuarios']);
    }
  }
}

}
