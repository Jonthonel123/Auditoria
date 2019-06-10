<?php

class MY_Controller extends CI_Controller
{


    protected $arrayVista;
    protected $elementoPorPagina = ELEMENTOS_POR_PAGINA;

    function __construct()
    {
        parent::__construct();
        $this->arrayVista = array("nombreWeb" => "Estación AVA","mostrarLogoMenuLateral"=>true);


    }


    protected function cargarVistaBackend()
    {
        $this->load->view("backend/layout/plantilla_view", $this->arrayVista);

    }

    protected function cargarVistaFrontend()
    {
        $this->load->view("frontend/layout/plantilla_vista_view", $this->arrayVista);
    }

    protected function cargarVistaImprimir()
    {
        $this->load->view("frontend/layout/plantilla_imprimir_view", $this->arrayVista);
    }

    protected function cargarVistaLoginBackend()
    {
        $this->load->view("backend/layout/plantilla_login_view", $this->arrayVista);
    }

    protected function cargarVistaLoginFrontend()
    {
        $this->load->view("frontend/layout/plantilla_login_view", $this->arrayVista);
    }

    protected function cargarVistaLoginDashboard()
    {
        $this->load->view("dashboard/layout/plantilla_login_view", $this->arrayVista);
    }

    protected function cargarVistaDashboard()
    {
        $this->load->view("dashboard/layout/plantilla_view", $this->arrayVista);
    }
    protected function checkLoginFrontEnd()
    {

    }

    protected function cargarVistaListaAjax($vista)
    {
        $this->load->view($vista, $this->arrayVista);
    }

    protected function checkLoginBackEnd($controlador)
    {

        $array = $this->session->userdata();

        if ($this->session->userdata('logged_in') !== TRUE)
            redirect(site_url($this->config->item('path_backend')));
        else {
            if ($this->session->userdata('usuario_sistema')->tipo == TIPO_USUARIO_ADMINISTRADOR_CMS) {
                if ($controlador == NOMBRE_CONTROLADOR_USUARIO)
                    redirect(site_url($this->config->item('path_backend')));
            }
        }

    }

    protected function checkLoginApi()
    {

    }


    protected function obtenerPaginadoListado($baseUrl, $totalRegistros,$segmentoURI = 0)
    {
        $this->load->library('pagination');

        $config = array();
        $config["base_url"] = $baseUrl;
        $config["total_rows"] = $totalRegistros;

             $config["uri_segment"] = $segmentoURI;



        $config["per_page"] = ELEMENTOS_POR_PAGINA;
        //$config["num_links"] = $cantidadLinks;


        $config['full_tag_open'] = '<div id="paginador"><ul class="pagination pagination-sm pull-right push-down-20">';
        $config['full_tag_close'] = '</ul></div>';

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['last_link'] = 'Último';
        $config['first_link'] = 'Inicio';

        $this->pagination->initialize($config);

        return $this->pagination->create_links();
    }


    protected function subirArchivo($nombre_file = "", $path_file = "",$file_name="")
    {

        $config['upload_path'] = $path_file;

        $config['allowed_types'] = '*';
        $config['encrypt_name'] = false;
       if ($file_name != ""){
           $config['file_name'] = $file_name;
       }


        $this->load->library('upload', $config);
        $array_resultado = array();

        if (!$this->upload->do_upload($nombre_file))
            $array_resultado = array('error' => $this->upload->display_errors());
        else
            $array_resultado = array('upload_data' => $this->upload->data());


        return $array_resultado;
    }

    protected function alert($message, $url = null)
    {

        print '<script language="JavaScript">';
        print 'alert("' . $message . '");';
        if (isset($url)) print 'window.location.assign("' . $url . '");';
        print '</script>';
    }

    protected function fechaImagen($foto)
    {

        $dir = "./upload/categoria_promocion/";
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                $file1 = $dir . "./$file/";
                $file1 = scandir($file1);
                foreach ($file1 as $imagen) {
                    if ($imagen == $foto) {
                        $fecha = $file;
                        return $fecha;
                        exit;
                    }else{
                        return null;
                    }
                }

            }
        }
    }

    protected function json_url($token,$url,$type,$data){


        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        $CI = &get_instance();
        if ($type == "POST")
        {
            curl_setopt($ch, CURLOPT_POST, true);
        }else
        {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
        }

            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $CI->input->user_agent());

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'token:'.$token,
            'Content-Type: application/json'
        ));

        $result = curl_exec($ch);
        $pos = strpos($result, "{");
        $result=  substr($result,$pos);
        $result = json_decode($result);
        $result = json_decode(json_encode($result), True);
        return $result;
    }

    function validar_formato_fecha($fecha){
        //YYYY-MM-DD
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$fecha))
        {
            return true;
        }else{
            return false;
        }
    }


}
