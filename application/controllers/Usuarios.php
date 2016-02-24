<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends MY_Controller {

public function index()	{
	$this->consultapaginada('habilitados', '');
}

public function consultapaginada($categoria, $conteudo) {
	// select
	$this->load->model('musuarios');
  $data['habilitados'] = $this->musuarios->contahabilitados();

  // paginação
	$this->load->library('pagination');
	$inicio = ($this->uri->segment("3") != '') ? $this->uri->segment("3") : 0;
	$purl = base_url('usuarios/consulta'.$categoria);
	$ptotalrec = $data[$categoria];
  $pdata = $this->libosjuris->fpaginacao($purl, $ptotalrec);
	$this->pagination->initialize($pdata);
	$data['paginacao'] = $this->pagination->create_links();

	$data['usuarios'] = $this->musuarios->seleciona($categoria, $ptotalrec, $inicio, $conteudo);

	$this->load->view('includes/vheader');
	$this->load->view('vusuarios', $data);
	$this->load->view('includes/vfooter');
}

public function novo()	{
}

}
