<?php if (!defined("BASEPATH")) exit("No direct script access allowed");


class Persona_model extends MY_Model
{

    public function __construct()
    {

        parent::__construct();

        $this->table = "tbl_persona";
        $this->table_id = "id";
    }
}
