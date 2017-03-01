<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logon extends CI_Controller {

public function index()	{
	$this->load->view('vlogon');
}

function logout() {
	$this->session->sess_destroy();
	redirect('logon');
}

}
