<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, max-scale=1.0">
    <title>Mailing</title>
</head>
<style>

    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }

    th, td {
        border: none;
        text-align: left;
        padding: 8px;
    }




</style>
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

                        <p style="padding:0; border:0; margin:0; font-family:Arial; font-size:14px; color:#000; line-height:18px;">
                            <?php echo $mensaje?>
                        </p><br/>

                    <?php if ($url != null ){ ?>
                        <p style="padding:0; border:0; margin:0; font-family:Arial; font-size:14px; color:#000; line-height:18px;">
                            <?php echo $url?>
                        </p><br/>
                    <?php }?>


                    <div >
                        <table>
                            <?php if (isset($adjuntar) && sizeof($adjuntar) > 1 ){
                                $count = round(sizeof($adjuntar)/2);
                                $row = 0;
                                $pair = true;
                                 for($i=0;$i<= $count  ; $i+=2){
                                     ?>
                            <tr>

                                <td width="230">
                                    <a target="_blank" href="<?php if ($adjuntar[$i]->tipo != null){ echo base_url("../../../#/canjes/".$adjuntar[$i]->id);}elseif($adjuntar[$i]->precio != null){ echo base_url("../../../#/cartas/".$adjuntar[$i]->id);}else{ echo base_url("../../../#/promocion/".$adjuntar[$i]->id);}?>" style="text-decoration: none !important; ">
                                        <div style="margin-top: 10px;margin-bottom: 10px">
                                            <img src=" <?php echo base_url($adjuntar[$i]->foto)?>" alt="" style="width: 100%;height: auto"/>
                                            <div style="height: 300px;background-color: #ebebeb;" >
                                                <table>
                                                    <tr>
                                                        <td height="60">
                                                            <h3 style="display:block;font-size: 24px;margin-bottom: 5px;color: #21a053;overflow: hidden;padding: 10px;width: 210px;height: 50px"><?php echo $adjuntar[$i]->nombre?></h3>
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <td height="100">
                                                        <p style="display:block;font-size: 14px;font-weight: bold;margin-bottom: 0px;color: #717171;overflow: hidden;padding: 10px;width: 210px;height: 90px"><?php echo $adjuntar[$i]->descripcion?></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="50">
                                                        <h3 style="display:block;font-size: 14px;float: right;color: #21a053;padding: 20px;width: 150px;overflow: hidden;margin-right: 20px;height: 40px"><?php if ($adjuntar[$i]->tipo != null){ if ($adjuntar[$i]->tipo == "2") echo $adjuntar[$i]->puntos ." + " .$adjuntar[$i]->monto_adicional;else echo $adjuntar[$i]->puntos;}elseif($adjuntar[$i]->precio != null){echo $adjuntar[$i]->precio; }?></h3>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        <div>
                                    </a>

                                </td>
                                <td width="20">
                                </td>
                                <?php
                                     if ( ($i == $count + 2)  && (sizeof($adjuntar) % 2 !=0)) {
                                         $pair = false;
                                     }
                                     if ($pair){
                                         ?>
                                         <td width="230">
                                             <a target="_blank" href="<?php if ($adjuntar[$i+1]->tipo != null){ echo base_url("../../../#/canjes/".$adjuntar[$i+1]->id);}elseif($adjuntar[$i+1]->precio != null){ echo base_url("../../../#/cartas/".$adjuntar[$i+1]->id);}else{ echo base_url("../../../#/promocion/".$adjuntar[$i+1]->id);}?>" style="text-decoration: none !important; ">
                                                 <div style="margin-top: 10px;margin-bottom: 10px">
                                                     <img src=" <?php echo base_url($adjuntar[$i+1]->foto)?>" alt="" style="width: 100%;height: auto"/>
                                                     <div style="height: 300px;background-color: #ebebeb;" >
                                                         <table>
                                                             <tr>
                                                                 <td height="60">
                                                                     <h3 style="display:block;font-size: 24px;margin-bottom: 5px;color: #21a053;overflow: hidden;padding: 10px;width: 210px;height: 50px"><?php echo $adjuntar[$i+1]->nombre?></h3>
                                                                 </td>
                                                             </tr>
                                                             <tr >
                                                                 <td height="100">
                                                                     <p style="display:block;font-size: 14px;font-weight: bold;margin-bottom: 0px;color: #717171;overflow: hidden;padding: 10px;width: 210px;height: 90px"><?php echo $adjuntar[$i+1]->descripcion?></p>
                                                                 </td>
                                                             </tr>
                                                             <tr>
                                                                 <td height="50">
                                                                     <h3 style="display:block;font-size: 14px;float: right;color: #21a053;padding: 20px;width: 150px;overflow: hidden;margin-right: 20px;height: 40px"><?php if ($adjuntar[$i]->tipo != null){ if ($adjuntar[$i]->tipo == "2") echo $adjuntar[$i]->puntos ." + " .$adjuntar[$i]->monto_adicional;else echo $adjuntar[$i]->puntos;}elseif($adjuntar[$i]->precio != null){echo $adjuntar[$i]->precio; }?></h3>
                                                                 </td>
                                                             </tr>

                                                         </table>
                                                     </div>
                                                     <div>
                                          </a>
                                         </td>
                                         <?php
                                     }
                                ?>
                            </tr>
                                <?php
                                 $row++;}?>
                            <?php }?>

                        </table>
                        <table>
                            <?php if (isset($adjuntar) && sizeof($adjuntar) == 1 ){
                                    ?>
                                    <tr>
                                        <td width="500">
                                            <a target="_blank" href="<?php if ($adjuntar[0]->tipo != null){ echo base_url("../../../#/canjes/".$adjuntar[0]->id);}elseif($adjuntar[0]->precio != null){ echo base_url("../../../#/cartas/".$adjuntar[0]->id);}else{ echo base_url("../../../#/promocion/".$adjuntar[0]->id);}?>" style="text-decoration: none !important; ">
                                                <div style="margin-top: 10px;margin-bottom: 10px">
                                                    <img src=" <?php echo base_url($adjuntar[0]->foto)?>" alt="" style="width: 100%;height: auto"/>
                                                    <div style="height: 300px;background-color: #ebebeb;" >
                                                        <table>
                                                            <tr>
                                                                <td height="60">
                                                                    <h3 style="display:block;font-size: 24px;margin-bottom: 5px;color: #21a053;overflow: hidden;padding: 10px;width: 500px;height: 50px"><?php echo $adjuntar[0]->nombre?></h3>
                                                                </td>
                                                            </tr>
                                                            <tr >
                                                                <td height="100">
                                                                    <p style="display:block;font-size: 14px;font-weight: bold;margin-bottom: 0px;color: #717171;overflow: hidden;padding: 10px;width: 500px;height: 90px"><?php echo $adjuntar[0]->descripcion?></p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td height="50">
                                                                    <h3 style="display:block;font-size: 14px;float: right;color: #21a053;padding: 20px;width: 150px;overflow: hidden;margin-right: 20px;height: 40px"><?php if ($adjuntar[0]->tipo != null){ if ($adjuntar[0]->tipo == "2") echo $adjuntar[0]->puntos ." + " .$adjuntar[0]->monto_adicional;else echo $adjuntar[0]->puntos;}elseif($adjuntar[0]->precio != null){echo $adjuntar[0]->precio; }?></h3>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div>
                                            </a>

                                        </td>
                                    </tr>
                            <?php }?>
                        </table>
                    </div>

                    <p style="padding:0; border:0; margin:0; font-family:Arial; font-size:14px; color:#000;">
                        Gracias por confiar en nosotros.
                    </p><br/>


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
