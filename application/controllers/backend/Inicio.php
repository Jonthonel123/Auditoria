<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends MY_Controller {

	public function __construct()
    {
            parent::__construct();

		$this->load->model("Usuario_sistema_model");
		$this->lang->load('backend_error_lang', 'spanish');
		$this->lang->load('backend_mensajes_lang', 'spanish');


    }

	public function index(){

		$usuario= $this->session->userdata('usuario');

		if(isset($usuario) && isset($usuario->id))
		{
			redirect($this->config->item('path_backend').'/inicio');  // página de inicio


		}

		else
		{

			$this->arrayVista['vista'] = 'backend/login/login_view';
			$this->cargarVistaLoginBackend();
		}

	}



	public function login()
	{
		//Recuperamos los valores del formulario
		$usuario = $this->input->post("txtUsuario",TRUE);
		$password = $this->input->post("txtPassword",TRUE);
		$error =  array();

		$params = array(
			"select" => "*",
			"where" => "usuario = '".$usuario."'"
		);

		$objUsuario = $this->Usuario_sistema_model->get_search_row($params);

		if (isset($objUsuario->id))
		{
			//Verificamos si el usuario esta activo
			if($objUsuario->estado == ESTADO_ACTIVO){

				if(md5($password) != $objUsuario->contrasenia) {
					$error = array("msg"=>$this->lang->line('error_password'),"cod"=>2);
				} else{
					//Destruimos cualquier session que exista
					$this->session->sess_destroy();
					$this->session->__construct();
					//Removemos el Password de la consulta
					unset($objUsuario->contrasenia);
					//Set session data
					$this->session->set_userdata(array('usuario' => $objUsuario));
					$this->session->set_userdata(array('logged_in' => true));
					$this->session->set_userdata(array('user'=> $objUsuario->usuario));

					$error = array("msg"=>$this->lang->line('mensaje_logueo'),"cod"=>0);
				}
			}else{
				$error = array("msg"=>$this->lang->line('error_usuario'),"cod"=>3);
			}
		}
		else
		{
			$error = array("msg"=>$this->lang->line('error_usuario_incorrecto'),"cod"=>1);
		}
		echo json_encode($error);
	}



	public function logout(){

        //Destruimos la session del usuario
        $this->session->sess_destroy();

        //redireccionamos al login
        redirect($this->config->item('path_backend'));

    }
}
