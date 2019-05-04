<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct()
	{
			parent::__construct();
			$this->load->model("Contacto_model");
			$this->lang->load("api_mensajes_lang", "spanish");
			$this->lang->load("api_error_lang", "spanish");

	}

	public function index()
	{

		$this->arrayVista['vista'] = 'frontend/inicio/home_view';
		$this->cargarVistaFrontend();
	}


		public function contacto()
		{

		//		$tipousuario = $this->input->post('tipousuario',TRUE);
				$nombres = $this->input->post('nombres',TRUE);
				$email = $this->input->post('email',TRUE);
				$mensaje = $this->input->post('mensaje',TRUE);
				$fecha = date("Y-m-d H:i:s");

				$arrayData = array(
					//	'tipousuario' => $tipousuario,
						'nombres' => $nombres,
						'email' => $email,
				    'mensaje' => $mensaje,
						"fecha_registro"=>$fecha
						);

				$id = $this->Contacto_model->insert($arrayData);

			if($id > 0)
			{


    			$body = "REGISTRO CONTACTO<br>===========================<br><br>";
		//	$body .= "<strong>TipoUsuario:</strong><br>".$tipousuario."<br><br>"
    			$body .= "<strong>Nombre:</strong><br>".$nombres."<br><br>";
    			$body .= "<strong>Correo:</strong><br>".$email."<br><br>";
    			$body .= "<strong>Mensaje:</strong><br>".$mensaje."<br><br>";


    			$this->load->library("email");
             		$this->email->clear(TRUE);

                $configuracionGmail = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.gmail.com',
                    'smtp_port' => '465',
                    'smtp_user' => 'mercedeschiscul18@gmail.com',
                    'smtp_pass' => 'mercedes2018',
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    'newline' => "\r\n"
                );


                $this->email->initialize($configuracionGmail);
                // $this->email->from('mercedeschiscul18@gmail.com', 'Web AUDITORIA');
                $this->email->to('mercedeschiscul18@gmail.com');
	        			// $this->email->cc('jeanquispe1993@gmail.com');
                $this->email->subject('Nuevo Registro de Contacto');
                $this->email->message($body);

                $this->email->send();


				echo '1';

			}
			else
			{
				echo '0';

			}
			// echo $this->response($resultado);

	}


}
