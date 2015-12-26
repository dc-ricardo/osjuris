<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Processos extends CI_Controller {

public function index()	{
	$this->load->view('includes/vheader');
	$this->load->view('vprocessos');
	$this->load->view('includes/vfooter');
}

public function novo()	{
	$this->load->view('includes/vheader');
	$this->load->view('vprocessos_novo');
	$this->load->view('includes/vfooter');
}

}
