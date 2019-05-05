<?php
/**
 * Created by PhpStorm.
 * User: Mediabyte
 * Date: 28/04/2016
 * Time: 02:09 PM
 */
defined('BASEPATH') or exit('No direct script access allowed');

class Responsable extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model("Categoria_model");

        $this->load->model("Persona_model");
    }
    public function listar($start = 0)
    {


        if ($this->session->userdata('logged_in') === TRUE) {
            $params = array(
                "select" => "*"
            );

            $total_responsables = $this->Persona_model->total_records($params);

            $responsables = $this->Persona_model->search_data($params, $start, $this->elementoPorPagina);
            $this->arrayVista['paginador'] = $this->obtenerPaginadoListado(site_url($this->config->item('path_backend') . '/responsables'), $total_responsables);

            $arrayMigaPan = array(
                array("nombre" => "Responsables"), array("nombre" => "Listar", 'active' => true)
            );

            $this->arrayVista['arrayMigaPan'] = $arrayMigaPan;
            $this->arrayVista['tituloPagina'] = "Listado de Personas";
            $this->arrayVista['responsables'] = $responsables;
            $this->arrayVista['vista'] = 'backend/responsables/listar_view';
            $this->cargarVistaBackend();
        } else {
            redirect(site_url($this->config->item('path_backend')));
        }
    }



    public function buscar($start = 0)
    {

      if ($this->session->userdata('logged_in') === TRUE) {
          $nombre = $this->input->post('nombre');
          $apellido = $this->input->post('apellido');
          $email = $this->input->post('email');
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


          if ($apellido != "" ) {
              $this->arrayVista['apellido'] = $apellido;
              if ($where != "") {
                  $where .= " AND apellido LIKE '%" . $apellido . "%' ";
              } else {
                  $where = "apellido LIKE '%" . $apellido . "%' ";
              }
          }




          if ($email != "" ) {
              $this->arrayVista['email'] = $email;
              if ($where != "") {
                  $where .= " AND email LIKE '%" . $email . "%' ";
              } else {
                  $where = "email LIKE '%" . $email . "%' ";
              }
          }



          if ($estado != "" ) {
              $this->arrayVista['estado'] = $estado;
              if ($where != "") {
                            $where .= " AND estado = ".$estado." ";
              } else {
                            $where = "estado = " . $estado . " ";
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

          $total_responsables = $this->Persona_model->total_records($params);
          $responsables = $this->Persona_model->search_data($params, $start, $this->elementoPorPagina);

          $arrayMigaPan = array(
              array("nombre" => "Responsable"), array("nombre" => "Listar", 'active' => true));

          $this->arrayVista['arrayMigaPan'] = $arrayMigaPan;
          $this->arrayVista['paginador'] = $this->obtenerPaginadoListado(site_url($this->config->item('path_backend') . '/Responsable/buscar'), $total_responsables);
          $this->arrayVista['tituloPagina'] = "Listado de Responsables";
          $this->arrayVista['responsables'] = $responsables;
          $this->arrayVista['vista'] = 'backend/responsables/listar_view';
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
                $apellido = $this->input->post("apellido");
                $email = $this->input->post("email");
                $estado = $this->input->post("estado");



                $data = array(
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'email' => $email,
                    'estado' => $estado
                );

                if (isset($data)) {
                    try {

                        $this->Persona_model->insert($data);
                        $this->alert("La información se guardó correctamente", site_url($this->config->item('path_backend') . '/responsables'));
                    } catch (Exception $exception) {
                        $this->alert("Ocurrió un error al guardar");
                    }
                }
            }


            $arrayMigaPan = array(
                array("nombre" => "Responsable", "url" => site_url($this->config->item('path_backend') . '/responsables')), array("nombre" => "Agregar", 'active' => true)
            );

            $this->arrayVista['arrayMigaPan'] = $arrayMigaPan;
            $this->arrayVista['tituloPagina'] = "Agregar Persona Responsable";
            $this->arrayVista['vista'] = 'backend/responsables/agregar_view';
            $this->cargarVistaBackend();
        } else {
            redirect(site_url($this->config->item('path_backend')));
        }
    }


    public function editar($id_registro)
    {
      if ($this->session->userdata('logged_in') === TRUE) {
          if ($this->input->post()) {

              $nombre = $this->input->post("nombre");
              $apellido = $this->input->post("apellido");
              $email= $this->input->post("email");
              $estado = $this->input->post("estado");



              $responsable = array(
                  'nombre' => $nombre,
                  'apellido'=>$apellido,
                  'email' => $email,
                  'estado' => $estado
              );

              if ($this->Persona_model->update($id_registro, $responsable)) {

                  $this->alert("La información fue actualizada correctamente", site_url($this->config->item('path_backend') . '/inicio'));
              }

          }

          $data = array(
              "select" => "*",
              "where" => "id = '" . $id_registro . "'"
          );

          $responsable = $this->Persona_model->get_search_row($data);
          $arrayMigaPan = array(
              array("nombre" => "Responsable", "url" => site_url($this->config->item('path_backend') . '/inicio')), array("nombre" => "Editar", 'active' => true));

          $this->arrayVista['arrayMigaPan'] = $arrayMigaPan;
          $this->arrayVista['tituloPagina'] = "Editar Persona Responsable";
          $this->arrayVista['responsable'] = $responsable;
          $this->arrayVista['vista'] = 'backend/responsables/editar_view';
          $this->cargarVistaBackend();


      } else {
          redirect(site_url($this->config->item('path_backend')));
      }
    }


}
