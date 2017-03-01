<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libosjuris {

public function fvalidadata($pdata) {
  $day = (int) substr($pdata, 0, 2);
  $month = (int) substr($pdata, 3, 2);
  $year = (int) substr($pdata, 6, 4);
  $dvalida = checkdate($month, $day, $year);
  return $dvalida;
}

public function fpaginacao($purl, $ptotalrec, $perpage) {
  $data['base_url'] = $purl;
	$data['total_rows'] = $ptotalrec;
  $data['uri_segment'] = 3;
	$data['per_page'] = $perpage;
  $data["num_links"] = 12;
	$data['full_tag_open'] = '<ul class="pagination">';
	$data['full_tag_close'] = '</ul>';
  $data['prev_link'] = '&laquo;';
  $data['prev_tag_open'] = '<li>';
  $data['prev_tag_close'] = '</li>';
  $data['next_link'] = '&raquo;';
  $data['next_tag_open'] = '<li>';
  $data['next_tag_close'] = '</li>';
  $data['cur_tag_open'] = '<li class="active"><a href="#">';
  $data['cur_tag_close'] = '</a></li>';
  $data['num_tag_open'] = '<li>';
  $data['num_tag_close'] = '</li>';
  // $data["num_links"] = round($data["total_rows"] / $data["per_page"]);
  return $data;
}

}
