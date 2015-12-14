<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

public function index()	{
	$this->load->view('includes/vheader');
	$this->load->view('includes/vmenu');
	$this->load->view('vperfil');
	$this->load->view('includes/vfooter');
}

}
