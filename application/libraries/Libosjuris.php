<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libosjuris {

public function validadata($pdata) {
  $day = (int) substr($pdata, 0, 2);
  $month = (int) substr($pdata, 3, 2);
  $year = (int) substr($pdata, 6, 4);
  $dvalida = checkdate($month, $day, $year);
  return $dvalida;
}

}
