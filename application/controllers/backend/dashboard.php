<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller 
{
    private $session_id;
    public function __construct()
    {
        parent::__construct();
        $this->load->model("modelo_dashboard");
        $this->layout->setLayout('paginas');
        $this->session_id = $this->session->userdata('login_id');
    }
    public function index()
    {
        if(!empty($this->session_id))
        {
            $this->layout->setTitle("Panel de administración.");
            $this->layout->setBreadcrumb('
                <li>
                    <i class="fa fa-home"></i>
                    <a>Dashboard</a></i>
                </li>
            ');
            $data = array(
                'titulo' => "Dashboard",
                'countcategorias' => $this->modelo_dashboard->contar_categorias(),
                'counttiendas' => $this->modelo_dashboard->contar_tiendas(),
                'countrestaurantes' => $this->modelo_dashboard->contar_restaurantes(),
                'countpeliculas' => $this->modelo_dashboard->contar_peliculas(),
                'countacividades' => $this->modelo_dashboard->contar_actividades(),
                'countpromociones' => $this->modelo_dashboard->contar_promociones(),
            );
            $this->layout->view("index",$data);
        }
        else
        {
            redirect(base_url().'backend/dashboard', 301);
        }
    }
}