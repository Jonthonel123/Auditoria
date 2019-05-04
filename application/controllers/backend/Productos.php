<?php
/**
 * Created by PhpStorm.
 * User: Mediabyte
 * Date: 28/04/2016
 * Time: 02:09 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Categoria_model");
        $this->load->model("Producto_model");
    }

    public function listar($start = 0)
    {

        if ($this->session->userdata('logged_in') === TRUE) {

          $query = array(
              "select" => "*"
          );

          $categorias = $this->Categoria_model->search($query);

          $join = array(
              'categoria as  C, C.id = producto.categoria_id'
          );

          $params = array(
              "select" => "producto.*, C.nombre as categoria, C.tipo",
              "join" => $join,
              "order" => "id desc"
          );

          $total_registros = $this->Producto_model->total_records($params);

          $registros = $this->Producto_model->search_data($params, $start, $this->elementoPorPagina);
          $this->arrayVista['paginador'] = $this->obtenerPaginadoListado(site_url($this->config->item('path_backend') . '/productos'), $total_registros);

          $arrayMigaPan = array(
              array("nombre" => "Productos"), array("nombre" => "Listar", 'active' => true));

          $this->arrayVista['arrayMigaPan'] = $arrayMigaPan;
          $this->arrayVista['tituloPagina'] = "Listado de Productos";
          $this->arrayVista['registros'] = $registros;
          $this->arrayVista['categorias'] = $categorias;
          $this->arrayVista['vista'] = 'backend/producto/listar_view';
          $this->cargarVistaBackend();


        } else {
            redirect(site_url($this->config->item('path_backend')));
        }
    }



    public function buscar($start = 0)
    {
        if ($this->session->userdata('logged_in') === TRUE) {

            $nombre = $this->input->post('nombre');
            $sku = $this->input->post('sku');
            $tipo = $this->input->post('tipo');
            $categoria = $this->input->post('categoria');
            $productonuevo = $this->input->post('nuevo');
            $productoestrella = $this->input->post('estrella');

            $where = "";

            if ($nombre != "" ) {
                $this->arrayVista['nombre'] = $nombre;
                if ($where != "") {
                    $where .= " AND producto.nombre LIKE '%" . $nombre . "%' ";
                } else {
                    $where = "producto.nombre LIKE '%" . $nombre . "%' ";
                }
            }

            if ($sku != "" ) {
                $this->arrayVista['sku'] = $sku;
                if ($where != "") {
                    $where .= " AND sku = '" . $sku . "' ";
                } else {
                    $where = "sku LIKE '%" . $sku . "%' ";
                }
            }

            if ($tipo != "" ) {
                $this->arrayVista['tipoSeleccionado'] = $tipo;
                if ($where != "") {
                    $where .= " AND C.tipo = ".$tipo." ";
                } else {
                    $where = "C.tipo = " . $tipo . " ";
                }
            }

            if ($categoria != "" ) {
                $this->arrayVista['categoria_select'] = $categoria;
                if ($where != "") {
                    $where .= " AND categoria_id = ".$categoria." ";
                } else {
                    $where = "categoria_id = " . $categoria . " ";
                }
            }

            if ($productonuevo != "" ) {
                $this->arrayVista['categoria_select'] = $productonuevo;
                if ($where != "") {
                    $where .= " AND categoria_id = ".$productonuevo." ";
                } else {
                    $where = "categoria_id = " . $productonuevo . " ";
                }
            }

            if ($productonuevo!= "" ) {
                $this->arrayVista['producto_nuevo_select'] = $productonuevo;
                if ($where != "") {
                    $where .= " AND producto.nuevo LIKE '%" . $productonuevo . "%' ";
                } else {
                    $where = "producto.nuevo LIKE '%" . $productonuevo . "%' ";
                }
            }

            if ($productoestrella!= "" ) {
                $this->arrayVista['producto_nuevo_select'] = $productoestrella;
                if ($where != "") {
                    $where .= " AND producto.estrella LIKE '%" . $productoestrella . "%' ";
                } else {
                    $where = "producto.estrella LIKE '%" . $productoestrella . "%' ";
                }
            }

            $join = array(
                'categoria as  C, C.id = producto.categoria_id'
            );


            if ($where == "") {
                $params = array(
                  "select" => "producto.*, C.nombre as categoria, C.tipo",
                  "join" => $join,
                  "order" => "id desc"
                );
            } else {
                $params = array(
                  "select" => "producto.*, C.nombre as categoria, C.tipo",
                  "join" => $join,
                  "where" => $where,
                  "order" => "id desc"
                );
            }

            $total_registros = $this->Producto_model->total_records($params);
            $registros = $this->Producto_model->search_data($params, $start, $this->elementoPorPagina);

            $query = array(
                "select" => "*"
            );

            $categorias = $this->Categoria_model->search($query);

            $arrayMigaPan = array(
                array("nombre" => "Producto"), array("nombre" => "Listar", 'active' => true));

            $this->arrayVista['arrayMigaPan'] = $arrayMigaPan;
            $this->arrayVista['paginador'] = $this->obtenerPaginadoListado(site_url($this->config->item('path_backend') . '/productos/buscar'), $total_registros);
            $this->arrayVista['tituloPagina'] = "Listado de Productos";
            $this->arrayVista['registros'] = $registros;
            $this->arrayVista['categorias'] = $categorias;
            $this->arrayVista['vista'] = 'backend/producto/listar_view';
            $this->cargarVistaBackend();


        } else {
            redirect(site_url($this->config->item('path_backend')));
        }
    }

    public function agregar()
    {
        if ($this->session->userdata('logged_in') === TRUE) {

            if ($this->input->post()) {
                $categoria = $this->input->post("categoria");
                $nombre = $this->input->post("nombre");
                $sku = $this->input->post("sku");
                $nuevo = $this->input->post("nuevo");
                $estrella = $this->input->post("estrella");
                $estado = $this->input->post("estado");


                $pathImagen = "upload/" . date("Y-m-d");

                if (!is_dir($pathImagen))
                    mkdir($pathImagen, 0775, true);
                if ($_FILES["foto"]["size"] > 0) {
                    $nombreArchivoImagen = "foto";
                    $formato = substr(strrchr($_FILES["foto"]["name"],'.'),1);
                    $nombre_imagen = pathinfo($_FILES['foto']['name'], PATHINFO_FILENAME);
                    $nombre_imagen =  $nombre_imagen."_".date("Y-m-d-h-i-s");
                    $resultadoFoto = $this->subirArchivo($nombreArchivoImagen, $pathImagen,$nombre_imagen, 'jpeg|jpg|png', 2024);
                    $foto = "";

                    if (array_key_exists("upload_data", $resultadoFoto)) {
                        if (isset($resultadoFoto["upload_data"]["file_name"]))
                            $foto = $resultadoFoto["upload_data"]["orig_name"];
                    } else {
                        $this->session->set_flashdata('error', $this->lang->line('error_tamaño_imagen'));
                    }
                }

                if($foto == '')
                  $foto = '';
                else
                  $foto = $pathImagen."/".$foto;

                $data = array(
                    'categoria_id' => $categoria,
                    'sku' => $sku,
                    'nombre' => $nombre,
                    'foto' => $foto,
                    'nuevo' => $nuevo,
                    'estrella' => $estrella,
                    'estado' => $estado
                );

                if (isset($data)) {
                    try {

                      $this->Producto_model->insert($data);
                      $this->alert("La información se guardó correctamente", site_url($this->config->item('path_backend') . '/productos'));

                    } catch (Exception $exception) {
                      $this->alert("Ocurrió un error al guardar");
                    }
                }

            }

            $query = array(
                "select" => "*"
            );

            $categorias = $this->Categoria_model->search($query);

            $arrayMigaPan = array(
                array("nombre" => "Producto", "url" => site_url($this->config->item('path_backend') . '/productos')), array("nombre" => "Agregar", 'active' => true));

            $this->arrayVista['arrayMigaPan'] = $arrayMigaPan;
            $this->arrayVista['categorias'] = $categorias;
            $this->arrayVista['tituloPagina'] = "Agregar Producto";
            $this->arrayVista['vista'] = 'backend/producto/agregar_view';
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
                $categoria = $this->input->post("categoria");
                $sku = $this->input->post("sku");
                $nuevo = $this->input->post("nuevo");
                $estrella = $this->input->post("estrella");
                $estado = $this->input->post("estado");
                $foto_antiguo = $this->input->post("foto_antiguo");

                $query = array(
                    "select" => "*",
                    "where" => "id = '" . $categoria . "'"
                );


                $pathImagen = "upload/" . date("Y-m-d");

                if (!is_dir($pathImagen))
                    mkdir($pathImagen, 0775, true);
                if ($_FILES["foto"]["size"] > 0) {
                    $nombreArchivoImagen = "foto";
                    $formato = substr(strrchr($_FILES["foto"]["name"],'.'),1);
                    $nombre_imagen = pathinfo($_FILES['foto']['name'], PATHINFO_FILENAME);
                    $nombre_imagen =  $nombre_imagen."_".date("Y-m-d-h-i-s");

                    $resultadoFoto = $this->subirArchivo($nombreArchivoImagen, $pathImagen,$nombre_imagen ,'jpeg|jpg|png', 2024);
                    $foto = "";

                    if (array_key_exists("upload_data", $resultadoFoto)) {
                        if (isset($resultadoFoto["upload_data"]["file_name"]))
                            $foto = $resultadoFoto["upload_data"]["orig_name"];
                    } else {
                        $this->session->set_flashdata('error', $this->lang->line('error_tamaño_imagen'));
                    }

                    $foto = $pathImagen."/".$foto;


                } else {
                    $foto = $foto_antiguo;
                }

                $data = array(
                    'nombre' => $nombre,
                    'categoria_id' => $categoria,
                    'sku' => $sku,
                    'foto' => $foto,
                    'nuevo' => $nuevo,
                    'estrella' => $estrella,
                    'estado' => $estado
                );

                if ($this->Producto_model->update($id_registro, $data)) {

                    $this->alert("La información fue actualizada correctamente", site_url($this->config->item('path_backend') . '/productos'));
                }

            }

            $query = array(
                "select" => "*"
            );

            $categorias = $this->Categoria_model->search($query);

            $data = array(
                "select" => "*",
                "where" => "id = '" . $id_registro . "'"
            );

            $registro = $this->Producto_model->get_search_row($data);
            $arrayMigaPan = array(
                array("nombre" => "Producto", "url" => site_url($this->config->item('path_backend') . '/inicio')), array("nombre" => "Editar", 'active' => true));

            $this->arrayVista['arrayMigaPan'] = $arrayMigaPan;
            $this->arrayVista['tituloPagina'] = "Editar Producto";
            $this->arrayVista['categorias'] = $categorias;
            $this->arrayVista['registro'] = $registro;
            $this->arrayVista['vista'] = 'backend/producto/editar_view';
            $this->cargarVistaBackend();


        } else {
            redirect(site_url($this->config->item('path_backend')));
        }
    }

    public function eliminar($id_registro)
    {
      $data = array(
          "select" => "*",
          "where" => "id = '" . $id_registro . "'"
      );

      $registro = $this->Producto_model->get_search_row($data);

      if($registro->id){
        $this->Producto_model->delete($id_registro);
        $this->alert("Se eliminó el registro seleccionado", site_url($this->config->item('path_backend') . '/productos'));
      }else{
        $this->alert("No se pudo eliminar el registro indicado", site_url($this->config->item('path_backend') . '/productos'));
      }
    }



    public function export()
    {
        if ($this->session->userdata('logged_in') === TRUE) {

            $nombre = $this->input->get('nombre');
            $tipo = $this->input->get('tipo');
            $sku = $this->input->get('sku');
            $categoria = $this->input->get('categoria');

            $where = "";


            if ($nombre != "" ) {
                $this->arrayVista['nombre'] = $nombre;
                if ($where != "") {
                    $where .= " AND producto.nombre LIKE '%" . $nombre . "%' ";
                } else {
                    $where = "producto.nombre LIKE '%" . $nombre . "%' ";
                }
            }

            if ($sku != "" ) {
                $this->arrayVista['sku'] = $sku;
                if ($where != "") {
                    $where .= " AND sku = '" . $sku . "' ";
                } else {
                    $where = "sku LIKE '%" . $sku . "%' ";
                }
            }

            if ($tipo != "" ) {
                $this->arrayVista['tipoSeleccionado'] = $tipo;
                if ($where != "") {
                    $where .= " AND C.tipo = ".$tipo." ";
                } else {
                    $where = "C.tipo = " . $tipo . " ";
                }
            }

            if ($categoria != "" ) {
                $this->arrayVista['categoria_select'] = $categoria;
                if ($where != "") {
                    $where .= " AND categoria_id = ".$categoria." ";
                } else {
                    $where = "categoria_id = " . $categoria . " ";
                }
            }

            $join = array(
                'categoria as  C, C.id = producto.categoria_id'
            );


            if ($where == "") {
                $params = array(
                  "select" => "producto.*, C.nombre as categoria, C.tipo",
                  "join" => $join,
                  "order" => "id desc"
                );
            } else {
                $params = array(
                  "select" => "producto.*, C.nombre as categoria, C.tipo",
                  "join" => $join,
                  "where" => $where,
                  "order" => "id desc"
                );
            }

            $registrados = $this->Producto_model->search($params);


            $data = array();
            foreach ($registrados as $registro) {

                array_push($data, array(
                    utf8_decode("Nombre") => isset($registro->nombre)?utf8_decode($registro->nombre):"-",
                    utf8_decode("SKU") => isset($registro->sku)?utf8_decode($registro->sku):"-",
                    utf8_decode("Tipo") => isset($registro->tipo)? (($registro->tipo == 1)? "Escolar":"Oficina") :"-",
                    utf8_decode("Categoria") => isset($registro->categoria)? utf8_decode($registro->categoria):"-",
                    utf8_decode("Nuevo") => isset($registro->nuevo)? (($registro->nuevo == 1)? "Si":"No") :"-",
                    utf8_decode("Estrella") => isset($registro->estrella)? (($registro->estrella == 1)? "Si":"No") :"-",
                    utf8_decode("Estado") => isset($registro->estado)? (($registro->estado == 1)? "Activo":"Inactivo") :"-"
                ));
            }

            function filterData(&$str)
            {
                $str = preg_replace("/\t/", "\\t", $str);
                $str = preg_replace("/\r?\n/", "\\n", $str);
                if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
            }

            $fileName = "Productos-". date('YmdHis') . ".xls";

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
