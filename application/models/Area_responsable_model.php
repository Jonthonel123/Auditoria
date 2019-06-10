<?php if (!defined("BASEPATH")) exit("No direct script access allowed");


class Area_responsable_model extends MY_Model
{

    public function __construct()
    {

        parent::__construct();

        $this->table = "tbl_area_persona";
        $this->table_id = "id";
    }
}
