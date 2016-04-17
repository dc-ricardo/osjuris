<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends MY_Controller {

public function index()	{
	$this->load->model('mprocessos');
	$data['processos'] = $this->mprocessos->processoscomalertas();
	$data['prazos'] = $this->mprocessos->prazos();
	$data['parados'] = $this->mprocessos->processosparados();

	$this->load->view('includes/vheader');
	if (ENVIRONMENT == 'development') {
		$this->load->view('vinicio', $data);
	}
	$this->load->view('includes/vfooter');
}

}
