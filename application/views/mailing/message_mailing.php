<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, max-scale=1.0">
    <title>Mailing</title>
</head>
<body bgcolor="#fff" style="border:0; margin:0; padding:0;">

<table width="600" bgcolor="#ffffff" align="center" border="0" cellpadding="0" cellspacing="0">

    <div style="width: auto; height: 50px;background: #21A053;text-align: center">
        <img src="<?php echo base_url();?>/upload/mailing/logo_linear.png" style="margin-top: 8px;">
    </div>

    <tr>
        <td height="30" valign="top" bgcolor="#fff">&nbsp;</td>
    </tr>
    <tr>
        <td valign="top"></td>
    </tr>
    <tr>
        <td valign="top"><table width="600" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td width="50" valign="top" bgcolor="#fff">&nbsp;</td>
                    <br width="500" valign="top" bgcolor="#fff">

                        <p style="padding:0; border:0; margin:0; font-family:Arial; font-size:16px; font-weight:bold; line-height:18px; color:#000;">
                            Hola <?php echo $nombre?>,
                        </p><br />

                    <?php if ($type == "1"){?>

                        <p style="padding:0; border:0; margin:0; font-family:Arial; font-size:14px; color:#000; line-height:18px;">
                            Gracias por registrarte al Club Beneficios para agregar una contraseña a tu cuenta por favor ingresa al siguiente enlace <a target="_blank" href="<?php echo $url?>">Verificar contraseña</a>
                        </p>  <br/>

                    <?php } else if ($type == "2"){?>

                        <p style="padding:0; border:0; margin:0; font-family:Arial; font-size:14px; color:#000; line-height:18px;">
                            Hemos recibido tu solicitud de reserva correctamente. Es posible que nos comuniquemos contigo por email o por teléfono para confirmar tu reserva.
                        </p><br/>
                        <p style="padding:0; border:0; margin:0; font-family:Arial; font-size:14px; color:#000; line-height:18px;">
                            Pronto tendrás noticias de nosotros. Para asegurar que recibas los correos correctamente, agrega este correo reservas@elclubdebeneficios.com a tu lista de correos seguros.
                        </p><br/>
                        <p style="padding:0; border:0; margin:0; font-family:Arial; font-size:14px; color:#000; line-height:18px;">
                            En la parte inferior encontrarás los detalles de la solicitud de tu reserva. Si tienes alguna consulta, no dejes de ponerte en contacto con nosotros al email <?php echo $local_correo?> o por teléfono al <?php echo $local_telefono?>.
                        </p><br/>

                    <?php } else if ($type == "3"){?>

                    <p style="padding:0; border:0; margin:0; font-family:Arial; font-size:14px; color:#000; line-height:18px;">
                        Tu solicitud de reserva ha sido aceptada.
                    </p><br/>
                    <p style="padding:0; border:0; margin:0; font-family:Arial; font-size:14px; color:#000; line-height:18px;">
                        En la parte inferior encontrarás los detalles de la solicitud de tu reserva. Si tienes alguna consulta, no dejes de ponerte en contacto con nosotros al email <?php echo $local_correo?> o por teléfono al <?php echo $local_telefono?>.
                    </p><br/>

                    <?php } else if ($type == "4"){?>

                        <p style="padding:0; border:0; margin:0; font-family:Arial; font-size:14px; color:#000; line-height:18px;">
                            Tu solicitud de reserva ha sido rechazada, lamentamos darte esta noticia esto pero en estos momentos no contamos con disponibilidad de ambientes para atender tu solicitud de reserva.
                        </p><br/>
                        <p style="padding:0; border:0; margin:0; font-family:Arial; font-size:14px; color:#000; line-height:18px;">
                            Si tienes alguna consulta, no dejes de ponerte en contacto con nosotros al email <?php echo $local_correo?> o por teléfono al <?php echo $local_telefono?>.
                        </p><br/>

                    <?php }else {?>
                        <p style="padding:0; border:0; margin:0; font-family:Arial; font-size:14px; color:#000; line-height:18px;">
                            Tu solicitud de reserva ha sido modificada.
                        </p><br/>
                        <p style="padding:0; border:0; margin:0; font-family:Arial; font-size:14px; color:#000; line-height:18px;">
                            Si tienes alguna consulta, no dejes de ponerte en contacto con nosotros al email <?php echo $local_correo?> o por teléfono al <?php echo $local_telefono?>.
                        </p><br/>
                    <?php }?>

                        <p style="padding:0; border:0; margin:0; font-family:Arial; font-size:14px; color:#000;">
                            Gracias por confiar en nosotros.
                        </p><br/>

                    <?php if ($type == "2" || $type == "3" || $type == "5"){?>
                        <p style="padding:0; border:0; margin:0; font-family:Arial; font-size:14px; color:#000;">
                            Datos de solicitud de reserva :
                        </p><br/>

                    <table width="auto" border="1" cellspacing="0" cellpadding="0" align="center" style="margin: 0px auto;">
                        <tbody>
                        <tr>
                            <td width="auto" valign="top" bgcolor="#fff" style="padding: 5px">
                                <p style="padding:0; border:0; margin:0; font-family:Arial; font-size:14px; color:#000;">
                                    Local :
                                </p>
                            </td>
                            <td width="auto" valign="top" bgcolor="#fff" style="padding: 5px">
                                <?php echo $local?>
                            </td>
                        </tr>
                        <tr>
                            <td width="auto" valign="top" bgcolor="#fff" style="padding: 5px">
                                <p style="padding:0; border:0; margin:0; font-family:Arial; font-size:14px; color:#000;">
                                Fecha :
                                </p>
                            </td>
                            <td width="auto" valign="top" bgcolor="#fff" style="padding: 5px">
                                <?php echo $fecha?>
                            </td>
                        </tr>
                        <tr>
                            <td width="auto" valign="top" bgcolor="#fff" style="padding: 5px">
                                <p style="padding:0; border:0; margin:0; font-family:Arial; font-size:14px; color:#000;">
                                Hora :
                                </p>
                            </td>
                            <td width="auto" valign="top" bgcolor="#fff" style="padding: 5px">
                                <?php echo $hora?>
                            </td>
                        </tr>
                        <tr>
                            <td width="auto" valign="top" bgcolor="#fff" style="padding: 5px">
                                <p style="padding:0; border:0; margin:0; font-family:Arial; font-size:14px; color:#000;">
                                Cantidad :
                                </p>
                            </td>
                            <td width="auto" valign="top" bgcolor="#fff" style="padding: 5px">
                                <?php echo $cantidad?>
                            </td>
                        </tr>
                        <tr>
                            <td width="auto" valign="top" bgcolor="#fff" style="padding: 5px">
                                <p style="padding:0; border:0; margin:0; font-family:Arial; font-size:14px; color:#000;">
                                Ambiente :
                                </p>
                            </td>
                            <td width="auto" valign="top" bgcolor="#fff" style="padding: 5px">
                                <?php echo $ambiente?>
                            </td>
                        </tr>
                        <?php if ($type == "5"){?>
                        <tr>
                            <td width="auto" valign="top" bgcolor="#fff" style="padding: 5px">
                                <p style="padding:0; border:0; margin:0; font-family:Arial; font-size:14px; color:#000;">
                                Estado :
                                </p>
                            </td>
                            <td width="auto" valign="top" bgcolor="#fff" style="padding: 5px">
                                <?php echo $estado?>
                            </td>
                        </tr>
                        <?php }?>

                        </tbody>
                    </table>

                    <?php }?>

                    <td width="50" valign="top" bgcolor="#fff">&nbsp;</td>
                </tr>
                <tr>
                    <td valign="top" bgcolor="#fff">&nbsp;</td>
                    <td valign="top" bgcolor="#fff">&nbsp;</td>
                    <td valign="top" bgcolor="#fff">&nbsp;</td>
                </tr>

                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td height="30" valign="top" bgcolor="#fff">&nbsp;</td>
    </tr>
</table>
<div style="width: auto;text-align: center; margin-top: 20px;" >
    <span style="color: #808080;font-size: 80%"> © Club de beneficios, <?php echo date('Y')?> </span>
</div>

</body>
</html>
