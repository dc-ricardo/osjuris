<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

public function index()	{
	$this->load->model('mprocessos');
	$data['processos'] = $this->mprocessos->dashprocessoscomalertas();
	$data['prazos'] = $this->mprocessos->dashprazos();
	$data['parados'] = $this->mprocessos->dashprocessosparados();

	$this->load->view('includes/vheader');
	$this->load->view('vdashboard', $data);
	$this->load->view('includes/vfooter');
}

}
