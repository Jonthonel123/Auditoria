<?php
/**
 * Created by PhpStorm.
 * User: Mediabyte
 * Date: 28/04/2016
 * Time: 02:09 PM
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Area_Responsable extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Area_responsable_model");
        $this->load->model("Area_model");
        $this->load->model("Persona_model");
    }

    public function listar($start = 0)
    {

        if ($this->session->userdata('logged_in') === TRUE) {

            $params = array(
                "select" => "tbl_area_persona.id,tbl_area.nombre as area,tbl_persona.nombre as responsable,
               tbl_area_persona.estado",
                "join" => array('tbl_persona,tbl_area_persona.id_persona = tbl_persona.id', 'tbl_area, tbl_area_persona.id_area = tbl_area.id')
            );





            $total_areas = $this->Area_responsable_model->total_records($params);

            $areas = $this->Area_responsable_model->search_data($params, $start, $this->elementoPorPagina);
            $this->arrayVista['paginador'] = $this->obtenerPaginadoListado(site_url($this->config->item('path_backend') . '/areas'), $total_areas);

            $arrayMigaPan = array(
                array("nombre" => "Area Responsable"), array("nombre" => "Listar", 'active' => true)
            );

            $this->arrayVista['arrayMigaPan'] = $arrayMigaPan;
            $this->arrayVista['tituloPagina'] = "Listado de Areas y Responsables";
            $this->arrayVista['areas'] = $areas;
            $this->arrayVista['vista'] = 'backend/area_responsable/listar_view';
            $this->cargarVistaBackend();
        } else {
            redirect(site_url($this->config->item('path_backend')));
        }
    }



    public function buscar($start = 0)
    {
        if ($this->session->userdata('logged_in') === TRUE) {
            $area = $this->input->post('area');
            $responsable = $this->input->post('responsable');
            $estado = $this->input->post('estado');

            $where = "";

            if ($area != "") {
                $this->arrayVista['area'] = $area;
                if ($where != "") {
                    $where .= " AND tbl_area.nombre LIKE '%" . $area . "%' ";
                } else {
                    $where = "tbl_area.nombre LIKE '%" . $area . "%' ";
                }
            }



            if ($responsable != "") {
                $this->arrayVista['responsable'] = $responsable;
                if ($where != "") {
                    $where .= " AND tbl_persona.nombre LIKE '%" . $responsable . "%' ";
                } else {
                    $where = "tbl_persona.nombre LIKE '%" . $responsable . "%' ";
                }
            }



            if ($estado != "") {
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
                    "select" => "tbl_area_persona.id,tbl_area.nombre as area,tbl_persona.nombre as responsable,
                   tbl_area_persona.estado",
                    "join" => array(
                        'tbl_persona,tbl_area_persona.id_persona = tbl_persona.id',
                        'tbl_area, tbl_area_persona.id_area = tbl_area.id'
                    ),
                    "where" => $where
                );
            }

            $total_areas = $this->Area_responsable_model->total_records($params);
            $areas = $this->Area_responsable_model->search_data($params, $start, $this->elementoPorPagina);

            $arrayMigaPan = array(
                array("nombre" => "Area Responsable"), array("nombre" => "Listar", 'active' => true)
            );

            $this->arrayVista['arrayMigaPan'] = $arrayMigaPan;
            $this->arrayVista['paginador'] = $this->obtenerPaginadoListado(site_url($this->config->item('path_backend') . '/Area/buscar'), $total_areas);
            $this->arrayVista['tituloPagina'] = "Listado de Areas y Responsables";
            $this->arrayVista['areas'] = $areas;
            $this->arrayVista['vista'] = 'backend/area_responsable/listar_view';
            $this->cargarVistaBackend();
        } else {
            redirect(site_url($this->config->item('path_backend')));
        }
    }

    public function agregar()
    {
        if ($this->session->userdata('logged_in') === TRUE) {

            if ($this->input->post()) {
                $id_responsable = $this->input->post("id_persona");
                $id_area = $this->input->post("id_area");
                $estado = $this->input->post("estado");


                $data = array(
                    'id_persona' => $id_responsable,
                    'id_area' => $id_area,
                    'estado' => $estado,
                    'fecha_registro' => date("Y-m-d H:i:s")
                );


                if (isset($data)) {
                    try {

                        $this->Area_responsable_model->insert($data);
                        $this->alert("La información se guardó correctamente", site_url($this->config->item('path_backend') . '/Area_Responsable/listar'));
                    } catch (Exception $exception) {
                        $this->alert("Ocurrió un error al guardar");
                    }
                }
            }


            $areas = array(
                "select" => "*", "where" => "estado = 1"
            );

            $responsables = array(
                "select" => "*", "where" => "estado = 1"
            );

            $areas = $this->Area_model->search($areas);

            $responsables = $this->Persona_model->search($responsables);

            $arrayMigaPan = array(
                array("nombre" => "Area", "url" => site_url($this->config->item('path_backend') . '/inicio')), array("nombre" => "Agregar", 'active' => true)
            );

            $this->arrayVista['arrayMigaPan'] = $arrayMigaPan;
            $this->arrayVista['tituloPagina'] = "Agregar Responsable del Area";
            $this->arrayVista['areas'] = $areas;
            $this->arrayVista['responsables'] = $responsables;
            $this->arrayVista['vista'] = 'backend/area_responsable/agregar_view';
            $this->cargarVistaBackend();
        } else {
            redirect(site_url($this->config->item('path_backend')));
        }
    }


    public function editar($id_area_responsable)
    {
        if ($this->session->userdata('logged_in') === TRUE) {
            if ($this->input->post()) {

                $id_responsable = $this->input->post("id_persona");
                $id_area = $this->input->post("id_area");
                $estado = $this->input->post("estado");

                $area_responsable = array(
                    'id_persona' => $id_responsable,
                    'id_area' => $id_area,
                    'estado' => $estado,
                    'fecha_modificacion' => date("Y-m-d H:i:s")
                );



                if ($this->Area_responsable_model->update($id_area_responsable, $area_responsable)) {

                    $this->alert("La información fue actualizada correctamente", site_url($this->config->item('path_backend') . '/area_responsables'));
                }
            }

            $data = array(
                "select" => "*",
                "where" => "id = '" . $id_area_responsable . "'"
            );

            $areas = array(
                "select" => "*", "where" => "estado = 1"
            );

            $responsables = array(
                "select" => "*", "where" => "estado = 1"
            );

            $areas = $this->Area_model->search($areas);

            $responsables = $this->Persona_model->search($responsables);


            $area_responsable = $this->Area_responsable_model->get_search_row($data);
            $arrayMigaPan = array(
                array("nombre" => "Area Responsable", "url" => site_url($this->config->item('path_backend') . '/area_responsables')), array("nombre" => "Editar", 'active' => true)
            );

            $this->arrayVista['arrayMigaPan'] = $arrayMigaPan;
            $this->arrayVista['tituloPagina'] = "Editar Area";
            $this->arrayVista['area_responsable'] = $area_responsable;
            $this->arrayVista['areas'] = $areas;
            $this->arrayVista['responsables'] = $responsables;
            $this->arrayVista['vista'] = 'backend/area_responsable/editar_view';
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


            if ($nombre != "") {

                $this->arrayVista['nombre'] = $nombre;
                if ($where != "") {
                    $where .= " AND nombre LIKE '%" . $nombre . "%' ";
                } else {
                    $where = "nombre LIKE '%" . $nombre . "%' ";
                }
            }

            if ($tipo != "") {

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
                    utf8_decode("Nombre") => isset($registro->nombre) ? utf8_decode($registro->nombre) : "-",
                    utf8_decode("Tipo") => isset($registro->tipo) ? (($registro->tipo == 1) ? "Escolar" : "Oficina") : "-",
                    utf8_decode("Estado") => isset($registro->estado) ? (($registro->estado == 1) ? "Activo" : "Inactivo") : "-"
                ));
            }

            function filterData(&$str)
            {
                $str = preg_replace("/\t/", "\\t", $str);
                $str = preg_replace("/\r?\n/", "\\n", $str);
                if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
            }

            $fileName = "areas-" . date('YmdHis') . ".xls";

            header("Content-Disposition: attachment; filename=\"$fileName\"");
            header("Content-Type: application/vnd.ms-excel, charset=utf-8");

            $flag = false;

            foreach ($data as $row) {
                // print_r( array_values($row))."<br>";
                if (!$flag) {

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
