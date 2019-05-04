<?php
/**
 * Created by PhpStorm.
 * User: Mediabyte
 * Date: 28/04/2016
 * Time: 02:09 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Area_model");
    }

    public function listar($start = 0)
    {

        if ($this->session->userdata('logged_in') === TRUE) {
            $params = array(
                "select" => "*",
            );
            $total_areas = $this->Area_model->total_records($params);

            $areas = $this->Area_model->search_data($params, $start, $this->elementoPorPagina);
            $this->arrayVista['paginador'] = $this->obtenerPaginadoListado(site_url($this->config->item('path_backend') . '/areas'), $total_areas);

            $arrayMigaPan = array(
                array("nombre" => "Areas"), array("nombre" => "Listar", 'active' => true));

            $this->arrayVista['arrayMigaPan'] = $arrayMigaPan;
            $this->arrayVista['tituloPagina'] = "Listado de Areas";
            $this->arrayVista['areas'] = $areas;
            $this->arrayVista['vista'] = 'backend/area/listar_view';
            $this->cargarVistaBackend();


        } else {
            redirect(site_url($this->config->item('path_backend')));
        }
    }



    public function buscar($start = 0)
    {
        if ($this->session->userdata('logged_in') === TRUE) {
            $nombre = $this->input->post('nombre');
            $estado = $this->input->post('estado');

            $where = "";

            if ($nombre != "" ) {
                $this->arrayVista['nombre'] = $nombre;
                if ($where != "") {
                    $where .= " AND nombre LIKE '%" . $nombre . "%' ";
                } else {
                    $where = "nombre LIKE '%" . $nombre . "%' ";
                }
            }



              if ($estado != "" ) {
                  $this->arrayVista['estado'] = $estado;
                  if ($where != "")
                    $where .= " AND tbl_area.estado = $estado";
                  else
                    $where .= "tbl_area.estado = $estado";
            }



            if ($where == "") {
                $params = array(
                    "select" => "*",
                    "order" => "id desc"
                );
            } else {
                $params = array(
                    "select" => "*",
                    "where" => $where,
                    "order" => "id desc"
                );
            }

            $total_areas = $this->Area_model->total_records($params);
            $areas = $this->Area_model->search_data($params, $start, $this->elementoPorPagina);

            $arrayMigaPan = array(
                array("nombre" => "Area"), array("nombre" => "Listar", 'active' => true));

            $this->arrayVista['arrayMigaPan'] = $arrayMigaPan;
            $this->arrayVista['paginador'] = $this->obtenerPaginadoListado(site_url($this->config->item('path_backend') . '/Area/buscar'), $total_areas);
            $this->arrayVista['tituloPagina'] = "Listado de Areas";
            $this->arrayVista['areas'] = $areas;
            $this->arrayVista['vista'] = 'backend/area/listar_view';
            $this->cargarVistaBackend();


        } else {
            redirect(site_url($this->config->item('path_backend')));
        }
    }

    public function agregar()
    {
        if ($this->session->userdata('logged_in') === TRUE) {

            if ($this->input->post()) {

                $nombre = $this->input->post("nombre");
                $estado = $this->input->post("estado");


                $data = array(
                    'nombre' => $nombre,
                    'estado' => $estado
                );


                if (isset($data)) {
                    try {

                      $this->Area_model->insert($data);
                      $this->alert("La información se guardó correctamente", site_url($this->config->item('path_backend') . '/inicio'));

                    } catch (Exception $exception) {
                      $this->alert("Ocurrió un error al guardar");
                    }
                }

            }

            $arrayMigaPan = array(
                array("nombre" => "Area", "url" => site_url($this->config->item('path_backend') . '/inicio')), array("nombre" => "Agregar", 'active' => true));

            $this->arrayVista['arrayMigaPan'] = $arrayMigaPan;
            $this->arrayVista['tituloPagina'] = "Agregar Area";
            $this->arrayVista['vista'] = 'backend/area/agregar_view';
            $this->cargarVistaBackend();


        } else {
            redirect(site_url($this->config->item('path_backend')));
        }
    }


    public function editar($id_area)
    {
        if ($this->session->userdata('logged_in') === TRUE) {
            if ($this->input->post()) {

                $nombre = $this->input->post("nombre");
                $estado = $this->input->post("estado");



                $area = array(
                    'nombre' => $nombre,
                    'estado' => $estado
                );

                if ($this->Area_model->update($id_area, $area)) {

                    $this->alert("La información fue actualizada correctamente", site_url($this->config->item('path_backend') . '/inicio'));
                }

            }

            $data = array(
                "select" => "*",
                "where" => "id = '" . $id_area . "'"
            );

            $area = $this->Area_model->get_search_row($data);
            $arrayMigaPan = array(
                array("nombre" => "Area", "url" => site_url($this->config->item('path_backend') . '/inicio')), array("nombre" => "Editar", 'active' => true));

            $this->arrayVista['arrayMigaPan'] = $arrayMigaPan;
            $this->arrayVista['tituloPagina'] = "Editar Area";
            $this->arrayVista['area'] = $area;
            $this->arrayVista['vista'] = 'backend/area/editar_view';
            $this->cargarVistaBackend();


        } else {
            redirect(site_url($this->config->item('path_backend')));
        }
    }



    public function export()
    {
        if ($this->session->userdata('logged_in') === TRUE) {

            $nombre = $this->input->get('nombre');
            $tipo = $this->input->get('tipo');
            $where = "";


            if ($nombre != "" ) {

                $this->arrayVista['nombre'] = $nombre;
                if ($where != "") {
                    $where .= " AND nombre LIKE '%" . $nombre . "%' ";
                } else {
                    $where = "nombre LIKE '%" . $nombre . "%' ";
                }
            }

            if ($tipo != "" ) {

                $this->arrayVista['departamentoSeleccionado'] = $tipo;
                if ($where != "") {
                    $where .= " AND tipo = " . $tipo . " ";
                } else {
                    $where = "tipo = " . $tipo . " ";
                }
            }

            if ($where == "") {
                $params = array(
                    "select" => "*",
                    "order" => "id desc"
                );
            } else {
                $params = array(
                    "select" => "*",
                    "where" => $where,
                    "order" => "id desc"
                );
            }

            $registrados = $this->Informe_model->search($params);


            $data = array();
            foreach ($registrados as $registro) {

                array_push($data, array(
                    utf8_decode("Nombre") => isset($registro->nombre)?utf8_decode($registro->nombre):"-",
                    utf8_decode("Tipo") => isset($registro->tipo)? (($registro->tipo == 1)? "Escolar":"Oficina") :"-",
                    utf8_decode("Estado") => isset($registro->estado)? (($registro->estado == 1)? "Activo":"Inactivo") :"-"
                ));
            }

            function filterData(&$str)
            {
                $str = preg_replace("/\t/", "\\t", $str);
                $str = preg_replace("/\r?\n/", "\\n", $str);
                if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
            }

            $fileName = "areas-". date('YmdHis') . ".xls";

            header("Content-Disposition: attachment; filename=\"$fileName\"");
            header("Content-Type: application/vnd.ms-excel, charset=utf-8");

            $flag = false;

            foreach($data as $row) {
                // print_r( array_values($row))."<br>";
                if(!$flag) {

                    echo implode("\t", array_keys($row)) . "\n";
                    $flag = true;
                }

                array_walk($row, 'filterData');
                echo implode("\t", array_values($row)) . "\n";
            }

            exit;

        } else {
            redirect(site_url($this->config->item('path_backend')));
        }
    }
}
