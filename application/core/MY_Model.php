<?php
/**
 * Created by PhpStorm.
 * User: hviveso
 * Date: 07/07/14
 * Time: 12:38 PM
 */

class MY_Model extends CI_Model{

    protected $table;
    protected $table_id;

    public function __construct() {
        $this->load->helper('utils_helper');
        $this->load->helper('text');
    }

    public function  log($data,$accion){
        $usuario =  $this->session->userdata('user');
        if($usuario != null ) {
            guardar_log_cms($data, $accion, $usuario);
        }
    }

    public function insert($data, $retornarId = TRUE){
        $arraytabla =array("tabla"=>$this->table);
        $arraydata=array_merge($arraytabla,$data);
        $this->log($arraydata,"insertar");
      foreach($data as &$value)
      {
        if($value == "")
            $value = null;
      }

      $this->db->insert($this->table, $data);

      if($retornarId)
        return $this->db->insert_id();
    }

    public function insert_lote($data){

        $arraytabla =array("tabla"=>$this->table);
        $arraydata=array_merge($arraytabla,$data);
        $this->log($arraydata,"insertar");
        $count = count($data);
        $this->db->insert_batch($this->table, $data);
        $first_id = $this->db->insert_id();
        $last_id = $first_id + ($count-1);
        $ids = array();
        for ($i=0;$i<$count;$i++){
            $ids[$i] = $first_id + $i;
        }
        return $ids;
    }

    public function update($pk, $data){
        $arraytabla =array("tabla"=>$this->table);
        $arrayid =array("id"=>$pk);
        $arrayupdate=array_merge($arraytabla,$arrayid);
        $arraydata=array_merge($arrayupdate,$data);
        $this->log($arraydata,"actualizar");
        foreach($data as &$value)
        {
            if($value == "")
                $value = null;
        }

        $this->db->where($this->table_id, $pk);
        $this->db->update($this->table, $data);

        return ($this->db->affected_rows() < 1) ? FALSE : TRUE;
    }


    public function update_where($string_where, $data){

        $arraytabla =array("tabla"=>$this->table);
        $arraywhere =array("where"=>$string_where);
        $arrayupdate=array_merge($arraytabla,$arraywhere);
        $arraydata=array_merge($arrayupdate,$data);
        $this->log($arraydata,"actualizar");

        foreach($data as &$value)
        {
            if($value == "")
                $value = null;
        }

        $this->db->where($string_where);
        $this->db->update($this->table, $data);
        return ($this->db->affected_rows() < 1) ? FALSE : TRUE;
    }

    public function delete($pk){

        $this->db->where($this->table_id, $pk);
        $this->db->delete($this->table);
        $arraytabla =array("tabla"=>$this->table);
        $arrayid =array("id"=>$pk);
        $arraydata=array_merge($arraytabla,$arrayid);
        $this->log($arraydata,"eliminar");
    }

    public function delete_where($where){
        $this->db->where($where);
        $this->db->delete($this->table);

        $arraytabla =array("tabla"=>$this->table);
        $arraywhere =array("where"=>$where);
        $arraydata=array_merge($arraytabla,$arraywhere);
        $this->log($arraydata,"eliminar");
    }

    public function get_search_row($data){
        if (isset($data["select"])&& $data["select"]!=""){$this->db->select($data["select"],false);}
        if (isset($data["where"]) && $data["where"]!=""){$this->db->where($data["where"]);}
        if (isset($data["order"]) && $data["order"]!=""){$this->db->order_by($data["order"]);}
        if (isset($data["group"]) && $data["group"]!=""){$this->db->group_by($data["group"]);}
        if (isset($data["join"])){if (count($data["join"])>0){ foreach ($data["join"] as $rowJoin){$split = explode(",",$rowJoin);$this->db->join($split[0],$split[1]);}}}
        if (isset($data["left"])){if (count($data["left"])>0){ foreach ($data["left"] as $rowJoin){$split = explode(",",$rowJoin);$this->db->join($split[0],$split[1],$split[2]);}}}
       $this->db->from($this->table);
       $query=  $this->db->get();
       return $query->row();
    }

    public function get_search_row_array($data){
        if (isset($data["select"])&& $data["select"]!=""){$this->db->select($data["select"],false);}
        if (isset($data["where"]) && $data["where"]!=""){$this->db->where($data["where"]);}
        if (isset($data["order"]) && $data["order"]!=""){$this->db->order_by($data["order"]);}
        if (isset($data["group"]) && $data["group"]!=""){$this->db->group_by($data["group"]);}
        if (isset($data["join"])){if (count($data["join"])>0){ foreach ($data["join"] as $rowJoin){$split = explode(",",$rowJoin);$this->db->join($split[0],$split[1]);}}}
        if (isset($data["left"])){if (count($data["left"])>0){ foreach ($data["left"] as $rowJoin){$split = explode(",",$rowJoin);$this->db->join($split[0],$split[1],$split[2]);}}}
       $this->db->from($this->table);
       $query=  $this->db->get();
       return $query->row_array();
    }

    public function search($data){
        if (isset($data["select"])&& $data["select"]!=""){$this->db->select($data["select"],false);}
        if (isset($data["where"]) && $data["where"]!=""){$this->db->where($data["where"]);}
        #start where_in
        if (isset($data["where_in"])){if (count($data["where_in"])>0){ foreach ($data["where_in"] as $rowWhereIn => $value){$this->db->where_in($rowWhereIn,$value);}}}
        #end where_in
        if (isset($data["order"]) && $data["order"]!=""){$this->db->order_by($data["order"]);}
        if (isset($data["group"]) && $data["group"]!=""){$this->db->group_by($data["group"]);}
        if (isset($data["join"])){if (count($data["join"])>0){ foreach ($data["join"] as $rowJoin){$split = explode(",",$rowJoin);$this->db->join($split[0],$split[1]);}}}
        if (isset($data["left"])){if (count($data["left"])>0){ foreach ($data["left"] as $rowJoin){$split = explode(",",$rowJoin);$this->db->join($split[0],$split[1],$split[2]);}}}
        if (isset($data["limit"]) && $data["limit"]!=""){$this->db->limit($data["limit"]);}
        $this->db->from($this->table);
        $query = $this->db->get();
        $dato = $query->result();
        return $dato;
    }

    public function search_array($data){
        if (isset($data["select"])&& $data["select"]!=""){$this->db->select($data["select"],false);}
        if (isset($data["where"]) && $data["where"]!=""){$this->db->where($data["where"]);}
        if (isset($data["order"]) && $data["order"]!=""){$this->db->order_by($data["order"]);}
        if (isset($data["group"]) && $data["group"]!=""){$this->db->group_by($data["group"]);}
        if (isset($data["join"])){if (count($data["join"])>0){ foreach ($data["join"] as $rowJoin){$split = explode(",",$rowJoin);$this->db->join($split[0],$split[1]);}}}
        if (isset($data["left"])){if (count($data["left"])>0){ foreach ($data["left"] as $rowJoin){$split = explode(",",$rowJoin);$this->db->join($split[0],$split[1],$split[2]);}}}
        if (isset($data["limit"]) && $data["limit"]!=""){$this->db->limit($data["limit"]);}
        $this->db->from($this->table);
        $query = $this->db->get();
        $dato = $query->result_array();
        return $dato;
    }

    public function total_records($data){
        if (isset($data["select"])&& $data["select"]!=""){$this->db->select($data["select"],false);}
        if (isset($data["where"]) && $data["where"]!=""){$this->db->where($data["where"]);}
        #start where_in
        if (isset($data["where_in"])){if (count($data["where_in"])>0){ foreach ($data["where_in"] as $rowWhereIn => $value){$this->db->where_in($rowWhereIn,$value);}}}
        #end where_in
        if (isset($data["order"]) && $data["order"]!=""){$this->db->order_by($data["order"]);}
        if (isset($data["group"]) && $data["group"]!=""){$this->db->group_by($data["group"]);}
        if (isset($data["join"])){if (count($data["join"])>0){ foreach ($data["join"] as $rowJoin){$split = explode(",",$rowJoin);$this->db->join($split[0],$split[1]);}}}
        if (isset($data["left"])){if (count($data["left"])>0){ foreach ($data["left"] as $rowJoin){$split = explode(",",$rowJoin);$this->db->join($split[0],$split[1],$split[2]);}}}
        $this->db->from($this->table);
        $query = $this->db->get();
        $dato = $query->num_rows();
        return $dato;
  }

  public function search_data($data,$inicio,$num_reg){

        if (isset($data["select"])&& $data["select"]!=""){$this->db->select($data["select"],false);}
        if (isset($data["where"]) && $data["where"]!=""){$this->db->where($data["where"]);}
        if (isset($data["order"]) && $data["order"]!=""){$this->db->order_by($data["order"]);}
        if (isset($data["group"]) && $data["group"]!=""){$this->db->group_by($data["group"]);}
        if (isset($data["join"])){if (count($data["join"])>0){ foreach ($data["join"] as $rowJoin){$split = explode(",",$rowJoin);$this->db->join($split[0],$split[1]);}}}
        if (isset($data["left"])){if (count($data["left"])>0){ foreach ($data["left"] as $rowJoin){$split = explode(",",$rowJoin);$this->db->join($split[0],$split[1],$split[2]);}}}
        //if (isset($data["limit"]) && $data["limit"]!=""){$this->db->limit($data["limit"]);}
        $this->db->from($this->table);
        $query = $this->db->get("",$num_reg,$inicio);
        $dato = $query->result();

      $arraytabla =array("tabla"=>$this->table);

      $arraydata=array_merge($arraytabla,$data);
      $this->log($arraydata,"listar");
        return $dato;
  }


  public function search_data_array($data,$inicio,$num_reg){
        if (isset($data["select"])&& $data["select"]!=""){$this->db->select($data["select"],false);}
        if (isset($data["where"]) && $data["where"]!=""){$this->db->where($data["where"]);}
        if (isset($data["order"]) && $data["order"]!=""){$this->db->order_by($data["order"]);}
        if (isset($data["group"]) && $data["group"]!=""){$this->db->group_by($data["group"]);}
        if (isset($data["join"])){if (count($data["join"])>0){ foreach ($data["join"] as $rowJoin){$split = explode(",",$rowJoin);$this->db->join($split[0],$split[1]);}}}
        if (isset($data["left"])){if (count($data["left"])>0){ foreach ($data["left"] as $rowJoin){$split = explode(",",$rowJoin);$this->db->join($split[0],$split[1],$split[2]);}}}
        //if (isset($data["limit"]) && $data["limit"]!=""){$this->db->limit($data["limit"]);}
        $this->db->from($this->table);
        $query = $this->db->get("",$num_reg,$inicio);
        $dato = $query->result_array();

        return $dato;
  }

  public function search_data_rows($data,$inicio,$num_reg){
        if (isset($data["select"])&& $data["select"]!=""){$this->db->select($data["select"]);}
        if (isset($data["where"]) && $data["where"]!=""){$this->db->where($data["where"]);}
        if (isset($data["order"]) && $data["order"]!=""){$this->db->order_by($data["order"]);}
        if (isset($data["group"]) && $data["group"]!=""){$this->db->group_by($data["group"]);}
        if (isset($data["join"])){if (count($data["join"])>0){ foreach ($data["join"] as $rowJoin){$split = explode(",",$rowJoin);$this->db->join($split[0],$split[1]);}}}
        //if (isset($data["limit"]) && $data["limit"]!=""){$this->db->limit($data["limit"]);}
        $this->db->from($this->table);
        $query = $this->db->get("",$inicio,$num_reg);
        $dato = $query->row();
        return $dato;
  }

  public function search_by_query($string_query = "")
  {
    $query = $this->db->query($string_query);
    return $query->result();
  }



  public function search_by_query_row($string_query = "")
  {
    $query = $this->db->query($string_query);
    return $query->row();
  }



  public function total_row_by_query($string_query = "")
  {
    $query = $this->db->query($string_query);
    $dato = $query->num_rows();
    return $dato;
  }


  public function create_unique_slug($string,$key=NULL,$value=NULL){
    $t =& get_instance();
    $slug = url_title(convert_accented_characters($string));

    $slug = strtolower($slug);
    $i = 0;
    $params = array ();
    $params['slug'] = $slug;

    if($key)$params["$key !="] = $value;

    while ($t->db->where($params)->get($this->table)->num_rows()) {
      if (!preg_match ('/-{1}[0-9]+$/', $slug )) {
        $slug .= '-' . ++$i;
      } else {
        $slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
      }
      $params ['slug'] = $slug;
    }
    return $slug;

  }





}
