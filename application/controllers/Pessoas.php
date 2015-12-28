<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoas extends MY_Controller {

public function index()	{
	$this->load->view('includes/vheader');
	$this->load->view('vpessoas');
	$this->load->view('includes/vfooter');
}

public function novo()	{
	$this->load->view('includes/vheader');
	$this->load->view('vpessoas_novo');
	$this->load->view('includes/vfooter');
}

}
