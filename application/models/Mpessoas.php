<?php
class Mpessoas extends CI_Model {

function insere($registro) {
  $this->db->insert('pessoas', $registro);
}

}
