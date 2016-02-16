<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prazos extends MY_Controller {

public function index()	{
}

public function consulta($idprocesso)	{
  $this->load->model('mprocessos');
  $datainclude['processo'] = $this->mprocessos->consulta($idprocesso);
  $dataview['dadosdoprocesso'] = $this->load->view('vdadosdoprocesso', $datainclude, TRUE);

  $this->load->model('mprazos');
	$dataview['prazos'] = $this->mprazos->seleciona($idprocesso);

	$this->load->view('includes/vheader');
	$this->load->view('vprazos', $dataview);
	$this->load->view('includes/vfooter');
}

public function novo($idprocesso) {
  $this->load->model('mprocessos');
  $datainclude['processo'] = $this->mprocessos->consulta($idprocesso);
  $dataview['dadosdoprocesso'] = $this->load->view('vdadosdoprocesso', $datainclude, TRUE);

	$this->load->view('includes/vheader');
	$this->load->view('vprazosnovo', $dataview);
	$this->load->view('includes/vfooter');
}

function vpostados($idprocesso) {
	$data =	array(
		'id_processos' => $idprocesso,
		'data_prazo' => $this->input->post('data_prazo'),
		'descricao' => $this->input->post('descricao')
	);
	return $data;
}

function validadata($pdata) {
  $dvalida = $this->libosjuris->validadata($pdata);
  $this->load->library('form_validation');
  if (!$dvalida) {
    $this->form_validation->set_message('validadata', 'Data inválida.');
	}
  else {
    $phoje = strtotime(date('Y-m-d'));
    $pprazo = strtotime(nice_date($pdata, 'Y-m-d'));
    if ($pprazo < $phoje) {
      $this->form_validation->set_message('validadata', 'Data no passado.');
      $dvalida = FALSE;
    }
  }
  return $dvalida;
}

function regras() {
  $vrules = array(
		array(
			'field' => 'data_prazo',
			'label' => 'Data',
			'rules' => 'required|callback_validadata'
    ),
		array(
			'field' => 'descricao',
			'label' => 'Descrição',
			'rules' => 'required'
		)
	);

	return $vrules;
}

public function insere($idprocesso) {
  $this->load->library('form_validation');
	$this->form_validation->set_rules($this->regras());

  if ($this->form_validation->run() == TRUE) {
	  $data = $this->vpostados($idprocesso);

		$this->load->model('mprazos');
	  $this->mprazos->insere($data);
		redirect('/prazos/consulta/'.$idprocesso);
	}
	else {
		$this->novo($idprocesso);
	}
}

public function edita($idprocesso, $idprazo) {
  $this->load->model('mprocessos');
  $datainclude['processo'] = $this->mprocessos->consulta($idprocesso);
  $dataview['dadosdoprocesso'] = $this->load->view('vdadosdoprocesso', $datainclude, TRUE);

  $this->load->model('mprazos');
  $dataview['prazo'] = $this->mprazos->consulta($idprazo);

	$this->load->view('includes/vheader');
	$this->load->view('vprazosedita', $dataview);
	$this->load->view('includes/vfooter');
}

public function exclui($idprocesso, $idprazo) {
  $this->load->model('mprazos');
	$this->mprazos->remove($idprazo);

  redirect('/prazos/consulta/'.$idprocesso);
}

public function altera($idprocesso, $idprazo) {
  $this->load->library('form_validation');
  $this->form_validation->set_rules($this->regras());

  if ($this->form_validation->run() == TRUE) {
    $data = $this->vpostados($idprocesso);
    $this->load->model('mprazos');
    $this->mprazos->altera($idprazo, $data);

		redirect('/prazos/consulta/'.$idprocesso);
	}
	else {
		$this->edita($idprocesso, $idprazo);
	}
}

}
