<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, max-scale=1.0">
    <title>AVA</title>
</head>
<style>

</style>
<body bgcolor="#fff" style="border:0; margin:0; padding:0;">


<table width="100%" bgcolor="#ffffff" align="center" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td>
            <p>Hola, acabas de recibir la siguiente información del formulario de contacto:</p>
            <br />            
            
        </td>
    </tr>
    <tr>
        <td>
            <p><strong>Nombre:</strong> <?php echo  $arrayData["name"]; ?></p>
        </td>
    </tr>  
    <tr>
        <td>
            <p><strong>Email:</strong> <?php echo  $arrayData["email"]; ?></p>
        </td>
    </tr>  
    <tr>
        <td>
            <p><strong>Teléfono:</strong> <?php echo  $arrayData["phone"]; ?></p>
        </td>
    </tr>  
    <tr>
        <td>
            <p><strong>DNI:</strong> <?php echo  $arrayData["dni"]; ?></p>
        </td>
    </tr>  
    <tr>
        <td>
            <p><strong>Sexo:</strong> <?php echo  $arrayData["gender"]; ?></p>
        </td>
    </tr>  
    <tr>
        <td>
            <p><strong>Departamento:</strong> <?php echo  $arrayData["departamento"]; ?></p>
        </td>
    </tr>  
    <tr>
        <td>
            <p><strong>Provincia:</strong> <?php echo  $arrayData["provincia"]; ?></p>
        </td>
    </tr>  
     <tr>
        <td>
            <p><strong>Distrito:</strong> <?php echo  $arrayData["distrito"]; ?></p>
        </td>
    </tr> 
    <tr>
        <td>
            <p><strong>Comentario:</strong> <?php echo  $arrayData["comment"]; ?></p>
        </td>
    </tr>    
</table>
</body>
</html>
