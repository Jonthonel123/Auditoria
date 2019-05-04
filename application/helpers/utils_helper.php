<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('guardar_log_cms'))
{
    function guardar_log_cms($parametros = array(), $operacion = "", $usuario = "")
    {
        $CI = &get_instance();

        if ($CI->db->table_exists(BD_LOG_CMS))
        {
            // some code...

            $logApp = $CI->config->item('save_log_cms');

            if ($logApp == ACTIVAR_LOG)
            {
                $arrayData = array(
                    "operacion" => $operacion, "parametros" => $parametros, "usuario" => $usuario, "ip" => $CI->input->ip_address(), "user_agent" => $CI->input->user_agent(), "fecha_registro" => date("Y-m-d H:i:s")
                );

                if (is_array($parametros)) $arrayData["parametros"] = json_encode($parametros); else
                    $arrayData["parametros"] = $parametros;

                $CI->db->insert('tbl_log_cms', $arrayData);
            }

        }

    }
}

if (!function_exists('guardar_log_app'))
{
    function guardar_log_app($parametros = array(), $accion = "", $metodo = "", $token = "")
    {
        $CI = &get_instance();

        if ($CI->db->table_exists('tbl_log_app'))
        {
            // some code...
            $logApp = $CI->config->item('save_log_app');

            if ($logApp == ACTIVAR_LOG)
            {
                $arrayData = array(
                    "token" => $token, "accion" => $accion, "metodo" => $metodo, "ip" => $CI->input->ip_address(), "user_agent" => $CI->input->user_agent(), "fecha_registro" => date("Y-m-d H:i:s")
                );

                if (is_array($parametros)) $arrayData["parametros"] = json_encode($parametros); else
                    $arrayData["parametros"] = $parametros;

                $CI->db->insert('tbl_log_app', $arrayData);
            }
        }

    }
}

if (!function_exists('guardar_log_dashboard'))
{
    function guardar_log_dashboard($parametros = array(), $accion = "", $metodo = "", $token ="", $usuario = "", $operacion="")
    {
        $CI = &get_instance();

        if ($CI->db->table_exists('tbl_log_dashboard'))
        {
            // some code...
            $log_dashboard = $CI->config->item('save_log_dashboard');

            if ($log_dashboard == ACTIVAR_LOG)
            {

                $arrayData = array(
                    "token" => $token,
                    "accion" => $accion,
                    "metodo" => $metodo,
                    "usuario" => $usuario,
                    "operacion" => $operacion,
                    "ip" => $CI->input->ip_address(),
                    "user_agent" => $CI->input->user_agent(),
                    "fecha_registro" => date("Y-m-d H:i:s")
                );

                if (is_array($parametros)) $arrayData["parametros"] = json_encode($parametros); else
                    $arrayData["parametros"] = $parametros;

                $CI->db->insert('tbl_log_dashboard', $arrayData);
            }
        }

    }
}

if (!function_exists('guardar_token_seguridad'))
{
    function guardar_token_seguridad($token, $usuario_dispositivo, $accion_realizada)
    {
        $CI = &get_instance();
        $CI->load->model("usuario_dispositivo_model", "usuario_dispositivo_model");
        $CI->load->model("token_model", "token_model");

        $arrayToken = array(
            "token" => $token, "id_usuario_dispositivo" => $usuario_dispositivo, "accion_origen" => $accion_realizada, "fecha_registro" => date("Y-m-d H:i:s"), "estado" => "1"
        );

        $CI->token_model->insert($arrayToken, FALSE);

        if ($CI->db->affected_rows() > 0) return TRUE; else
            return FALSE;
    }
}

if (!function_exists('guardar_token_dashboard'))
{
    function guardar_token_dashboard($token, $id_contacto, $accion_realizada)
    {
        $CI = &get_instance();

        $CI->load->model("token_dashboard_model", "token_dashboard_model");

        $arrayToken = array(
            "token" => $token, "id_contacto" => $id_contacto, "accion_origen" => $accion_realizada, "fecha_registro" => date("Y-m-d H:i:s"), "estado" => "1"
        );

        $CI->token_dashboard_model->insert($arrayToken, FALSE);

        if ($CI->db->affected_rows() > 0) return TRUE; else
            return FALSE;
    }
}

if (!function_exists('validar_token_seguridad'))
{
    function validar_token_seguridad($token, $id_empresa)
    {
        $CI = &get_instance();
        $CI->load->model("token_model", "token_model");

        $parametros_busqueda_token = array(
            "select" => "tbl_token.id,tbl_token.token as token,u_dispositivo.id_dispositivo as dispositivo,
            u_dispositivo.id_aplicacion as aplicacion,u_dispositivo.id as usuario_dispositivo",
            "join" => array(
                "tbl_usuario_dispositivo u_dispositivo, u_dispositivo.id = tbl_token.id_usuario_dispositivo",
                "tbl_usuario usuario, usuario.id = u_dispositivo.id_usuario"
            ),
            "where" => "tbl_token.token = '$token'
            and usuario.id_empresa = '$id_empresa'
            and tbl_token.estado = " . ESTADO_ACTIVO
        );
        $objeto_token = $CI->token_model->get_search_row($parametros_busqueda_token);

        return $objeto_token;
    }
}

if (!function_exists('validar_token_seguridad_dashboard'))
{
    function validar_token_seguridad_dashboard($token, $id_empresa)
    {

        $CI = &get_instance();
        $CI->load->model("token_dashboard_model", "token_dashboard_model");

        $parametros_busqueda_token = array(
            "select" => "tbl_token_dashboard.id,
                         tbl_token_dashboard.token as token,
                         tbl_token_dashboard.id_contacto as id_contacto,
                         tbl_token_dashboard.token,
                         contacto.correo as usuario",

            "join" => array(
                "tbl_contacto contacto, contacto.id = tbl_token_dashboard.id_contacto"
            ), 
            "where" => "tbl_token_dashboard.estado = " . ESTADO_ACTIVO . "
            and contacto.estado = " . ESTADO_ACTIVO . "
            and contacto.id_empresa = $id_empresa
            and tbl_token_dashboard.token = '$token'"
        );
        $objeto_token = $CI->token_dashboard_model->get_search_row($parametros_busqueda_token);
        
        return $objeto_token;

    }
}

if (!function_exists('actualizar_foto'))
{

    function actualizar_foto($id_clase_foto, $tipo,$plataforma, $clase)
    {
        // $id_clase_foto : Id de quien pertenece la foto
        // $tipo : 1=> listado , 2 => detalle
        // $clase : 1=>promocion , 2 => beneficio, 3=>carta

        $CI = &get_instance();
        $parametro_foto = array(
            "estado" => "0", "fecha_modificacion" => date("Y-m-d H:i:s")
        );
        switch ($clase)
        {
            case 1:
                $CI->load->model("foto_promocion_model", "foto_promocion_model");
                $where = "tbl_foto_promocion.id_promocion= $id_clase_foto  and tbl_foto_promocion.tipo = $tipo and tbl_foto_promocion.plataforma = $plataforma";
                $filas_afectadas = $CI->foto_promocion_model->update_where($where, $parametro_foto);
                break;

            case 2:
                $CI->load->model("foto_beneficio_model", "foto_beneficio_model");
                $where = "tbl_foto_beneficio.id_beneficio = $id_clase_foto  and tbl_foto_beneficio.tipo = $tipo and tbl_foto_beneficio.plataforma = $plataforma"  ;
                $filas_afectadas = $CI->foto_beneficio_model->update_where($where, $parametro_foto);
                break;

            case 3:
                $CI->load->model("foto_carta_model", "foto_carta_model");
                $where = "tbl_foto_carta.id_carta = $id_clase_foto  and tbl_foto_carta.tipo = $tipo and tbl_foto_carta.plataforma = $plataforma";
                $filas_afectadas = $CI->foto_carta_model->update_where($where, $parametro_foto);
                break;
        }

        return $filas_afectadas;
    }
}

if (!function_exists('enviar_correo_usuario'))
{

    function enviar_correo_usuario($correo,$type,$datos,$token="")
    {
        $CI = &get_instance();
        $CI->load->library("email");
        $url = "http://yesterday.elclubdebeneficios.com/reserva/index.php/dashboard/cambiar_contrasenia"."?token=".$token;

        $data['message_reset_password'] = FALSE;
        $data['message_reserve'] = FALSE;

        $subject = "";

        if ($type == "1"){
            $data['type'] = "1";
            $data['url'] = $url;
            $data['nombre'] = $datos["nombre"];
            $mensaje = $CI->load->view("mailing/message_mailing",$data,TRUE);
            $subject = 'Bienvenido al Club de Beneficios';
        }else {
            $data['nombre'] = $datos["nombre"];
            $data['local'] = $datos["local"];
            $data['fecha'] = $datos["fecha"];
            $data['hora'] = $datos["hora"] ;
            $data['cantidad'] = $datos["cantidad"];
            $data['ambiente'] = $datos["ambiente"];
            $data['local_correo'] = $datos["local_correo"];
            $data['local_telefono'] = $datos["local_telefono"];

            if ($type == "2"){
                $data['type'] = "2";
                $mensaje = $CI->load->view("mailing/message_mailing",$data,TRUE);
                $subject = 'Tu solicitud de reserva ha sido registrada';
            }else if ($type == "3"){
                $data['type'] = "3";
                $mensaje = $CI->load->view("mailing/message_mailing",$data,TRUE);
                $subject = 'Tu solicitud de reserva ha sido aceptada';
            }else if ($type == "4"){
                $data['type'] = "4";
                $mensaje = $CI->load->view("mailing/message_mailing",$data,TRUE);
                $subject = 'Tu solicitud de reserva ha sido rechazada';
            }else if ($type == "5"){
                $data['type'] = "5";
                $data['estado'] = $datos["estado"];
                $mensaje = $CI->load->view("mailing/message_mailing",$data,TRUE);
                $subject = 'Tu solicitud de reserva ha sido modificada';
            }

        }

        $configuracionGmail = array(
            'protocol' => CORREO_PROTOCOL,
            'smtp_host' => CORREO_HOST,
            'smtp_port' => CORREO_PUERTO,
            'smtp_user' => CORREO_NOMBRE,
            'smtp_pass' => CORREO_CONTRASENIA,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );
        $CI->email->initialize($configuracionGmail);
        $CI->email->from(CORREO_NOMBRE, REMITENTE_NOMBRE);
        $CI->email->to($correo);
        $CI->email->subject($subject);
        $CI->email->message($mensaje);
        $envio = $CI->email->send();

        return $envio;
    }
}

if (!function_exists('enviar_correo_mensaje'))
{

    function enviar_correo_mensaje($correo,$nombre,$titulo,$mensaje,$adjuntos,$headers = null)
    {
        $CI = &get_instance();
        $CI->load->library("email");
        $CI->email->clear(TRUE);
        $subject = $titulo;
        $data['nombre'] = $nombre;
        $data['mensaje'] = $mensaje;
        if (array_key_exists('url', $adjuntos)){
            $data['url'] = $adjuntos['url'];
        }else if (array_key_exists('beneficios', $adjuntos) || array_key_exists('promociones', $adjuntos) || array_key_exists('cartas', $adjuntos)){
           $beneficios = array();
           $promociones = array();
           $cartas = array();
           $adjunto =  array();
            if ($adjuntos['beneficios'] != null && sizeof($adjuntos['beneficios'])>0){
                $adjunto = $adjuntos['beneficios'] ;
           }

           if ($adjuntos['promociones']!= null && sizeof($adjuntos['promociones'])>0){
              $adjunto = array_merge($adjunto,$adjuntos['promociones']);
           }

           if($adjuntos['cartas']!= null && sizeof($adjuntos['cartas'])>0){
               $adjunto = array_merge($adjunto,$adjuntos['cartas']);
           }

            $data['adjuntar'] = array_values(array_filter($adjunto));

        }

        $mensaje = $CI->load->view("mailing/message_notification",$data,TRUE);
        $configuracionGmail = array(
            'protocol' => CORREO_PROTOCOL,
            'smtp_host' => CORREO_HOST,
            'smtp_port' => CORREO_PUERTO,
            'smtp_user' => CORREO_NOMBRE,
            'smtp_pass' => CORREO_CONTRASENIA,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );
        $CI->email->initialize($configuracionGmail);
        $CI->email->from(CORREO_NOMBRE, REMITENTE_NOMBRE);
        $CI->email->to($correo);
        $CI->email->subject($subject);
        $CI->email->message($mensaje);


        foreach ($headers as $key => $value){
            $CI->email->set_header($key, $value);
        }

        $envio = $CI->email->send();
        return $envio;
    }
}

if (!function_exists('validar_formato_fecha')){
    
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






