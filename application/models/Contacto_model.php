<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");


class Contacto_model extends MY_Model{

    public function __construct(){

        parent::__construct();

        $this->table = "tbl_contacto";
        $this->table_id = "id";

    }

}
