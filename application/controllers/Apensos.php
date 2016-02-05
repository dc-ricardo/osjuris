<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apensos extends MY_Controller {

public function index()	{
}

public function consulta($idprocesso)	{
  $this->load->model('mprocessos');
  $datainclude['processo'] = $this->mprocessos->consulta($idprocesso);
  $dataview['dadosdoprocesso'] = $this->load->view('vdadosdoprocesso', $datainclude, TRUE);

  $this->load->model('mapensos');
	$dataview['apensos'] = $this->mapensos->seleciona($idprocesso);

	$this->load->view('includes/vheader');
	$this->load->view('vapensos', $dataview);
	$this->load->view('includes/vfooter');
}

function lelocalizacoes() {
	// captura localizações em ordem alfabética crescente para escolha no combobox
	$this->load->model('mlocalizacoes');
	$data = $this->mlocalizacoes->seleciona('descricao', 'ASC');
  return $data;
}

public function novo($idprocesso) {
  $this->load->model('mprocessos');
  $datainclude['processo'] = $this->mprocessos->consulta($idprocesso);

  $dataview['dadosdoprocesso'] = $this->load->view('vdadosdoprocesso', $datainclude, TRUE);
  $dataview['processo'] = $this->mprocessos->consulta($idprocesso);
  $dataview['localizacoes'] = $this->lelocalizacoes();

	$this->load->view('includes/vheader');
	$this->load->view('vapensosnovo', $dataview);
	$this->load->view('includes/vfooter');
}

function vpostados($idprocesso) {
	$data =	array(
		'id_processos' => $idprocesso,
		'numero_apenso' => $this->input->post('numero_apenso'),
		'data_apenso' => $this->input->post('data_apenso'),
		'id_localizacoes' => $this->input->post('localizacao'),
		'descricao' => $this->input->post('descricao')
	);
	return $data;
}

function validadata($pdata) {
  $dvalida = $this->libosjuris->validadata($pdata);
  if (!$dvalida) {
    $this->load->library('form_validation');
    $this->form_validation->set_message('validadata', 'Data inválida.');
	}
  return $dvalida;
}

function validachavenapenso($pvalor) {
	$this->load->model('mapensos');

  $id = $this->uri->segment(3);
	$data = $this->mapensos->consultachavenapenso($id, $pvalor);

	if (!empty($data)) {
		$this->form_validation->set_message('validachavenapenso', 'O campo {field} deve conter um valor único.');
		return FALSE;
	}
	else {
		return TRUE;
	}
}

function regras($operacao) {
  $vrules['padrao'] = array(
		array(
			'field' => 'data_apenso',
			'label' => 'Data',
			'rules' => 'required|callback_validadata'
		)
	);

	$vrules['insercao'] = array(
		array(
			'field' => 'numero_apenso',
			'label' => 'Número do Apenso',
			'rules' => 'required|is_unique[apensos.numero_apenso]|max_length[80]|trim'
		)
	);

	$vrules['alteracao'] = array(
		array(
			'field' => 'numero_apenso',
			'label' => 'Número do Apenso',
			'rules' => 'required|max_length[80]|trim|callback_validachavenapenso'
		)
	);

	$vrules = array_merge($vrules['padrao'], $vrules[$operacao]);

	return $vrules;
}

public function insere($idprocesso) {
	$this->load->library('form_validation');
	$this->form_validation->set_rules($this->regras('insercao'));

  if ($this->form_validation->run() == TRUE) {
	  $data = $this->vpostados($idprocesso);

		$this->load->model('mapensos');
	  $this->mapensos->insere($data);
		redirect('/apensos/consulta/'.$idprocesso);
	}
	else {
		$this->novo($idprocesso);
	}
}

}
