<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventosnovo extends CI_Controller {

public function index()	{
	$this->load->view('includes/vheader');
	$this->load->view('veventos_novo');
	$this->load->view('includes/vfooter');
}

}
