<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class login extends CI_Controller 
{    
    private $session_id;     
    public function __construct()    
    {        
        parent::__construct();        
        $this->load->model("login_modelo");        
        $this->layout->setLayout('login');        
        $this->session_id = $this->session->userdata('login_id');    
    }    
    public function index()    
    {        
        if($this->input->post())        
        {            
            $datos=$this->login_modelo->logueo($this->input->post("correo",true), sha1($this->input->post("clave",true)));            
            if(!empty($datos->correo) && !empty($datos->clave))            
            {                
                $this->session->set_userdata("taller_ci");                
                $this->session->set_userdata('login_id',$datos->IdUsuario);                
                $this->session->set_userdata('login_correo',$datos->correo);                
                $this->session->set_userdata('login_nombre',$datos->nombres);               
                redirect(base_url().'backend/dashboard', 301);            
            }            
            else            
            {                
                $this->session->set_flashdata('Mal','Usuario y/o clave incorrecta');                
                redirect(base_url().'backend/login', 301);            
            }        
        }
        if(!empty($this->session_id))        
        {            
            redirect(base_url().'backend/dashboard', 301);        
        }        
        else        
        {            
            $this->layout->setTitle("Acceso panel de administración.");            
            $this->layout->view("index");        
        }      
    }    
    public function salir()    
    {        
        $this->session->unset_userdata(
            array(                
            'login_id'=>'',                
            'login_correo'=>'',                
            'login_nombre'=>''            
            ));        
        $this->session->sess_destroy("taller_ci");        
        redirect(base_url().'backend/login', 301);    
    }
}