<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Localizacoes extends MY_Controller {

public function index()	{
	$this->load->view('includes/vheader');
	$this->load->view('vlocalizacoes');
	$this->load->view('includes/vfooter');
}

public function novo()	{
	$this->load->view('includes/vheader');
	$this->load->view('vlocalizacoes_novo');
	$this->load->view('includes/vfooter');
}

}
