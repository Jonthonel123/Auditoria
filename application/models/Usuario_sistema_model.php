<?php
/**
 * Created by PhpStorm.
 * User: Mediabyte
 * Date: 23/05/2016
 * Time: 12:15 PM
 */

if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Usuario_sistema_model extends MY_Model{

    public function __construct(){

        parent::__construct();

        $this->table = "tbl_usuario_sistema";
        $this->table_id = "Id";

    }

}