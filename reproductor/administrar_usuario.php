<?php 
/*
create table usuario(
	id int not null AUTO_INCREMENT PRIMARY KEY,
    usuario varchar(100),
    clave varchar(200),
    fecha datetime
);
*/
 $con = mysqli_connect("localhost","root","","db_reproductor");
$DatoUsuario["nombre_usuario"]="";
$DatoUsuario["clave_usuario"]="";
$DatoUsuario["id_usuario"]="";

if(isset($_REQUEST["que_debo_hacer"])){
        switch($_REQUEST["que_debo_hacer"]){
            case "agregar_usuario":
    
                $sql = "insert into usuario 
                (usuario, clave, fecha)
                values
                ('".$_REQUEST["usuario"]."','".md5($_REQUEST["clave"])."',now())";
                mysqli_query($con,$sql);
                break;
                
                case "eliminar_usuario":
                $sql = "delete from usuario 
                where id = '".$_REQUEST["idUsuario"]."'
                ";
                mysqli_query($con,$sql);
                break;
                
                case "mostrar_para_editar":
                    /*Obtener un solo registro de la tabla mp3*/
                     $sqlUsuario = "select 
                    id as id_usuario,
                    usuario as nombre_usuario,
                    clave as clave_usuario
                    from usuario where id = '".$_REQUEST["idUsuario"]."' ";
                    $QueryUsuario = mysqli_query($con,$sqlUsuario);
                    $DatoUsuario = mysqli_fetch_array($QueryUsuario);
                break;
                
                case "editar_usuario":
                
                $nuevaClave = ($_REQUEST["claveOld"] == $_REQUEST["clave"])? "" : " , clave= '".md5($_REQUEST["clave"])."' " ;
                
                $sql = "update usuario set 
                usuario='".$_REQUEST["usuario"]."' ".$nuevaClave."
                where id = '".$_REQUEST["idUsuario"]."'
                ";
                mysqli_query($con,$sql);
                break;
                
        }
}

/*OBtener todos los registro de la tabla usuario*/
    $sql = "select * from usuario ";
    $Query = mysqli_query($con,$sql);

?>
<!doctype html>
<html> 
    <head>
        <title>
         Administrar usuarios
        </title>
    </head>
    <body>
        <fieldset>
            <legend>Administrar usuario</legend>
            <form action="" method="post" enctype="multipart/form-data">
                
                <?php if(empty($DatoUsuario["nombre_usuario"])){ ?>
                <input type="hidden" name="que_debo_hacer" value="agregar_usuario" />
                
                <?php }else{ ?>
                
                <input type="hidden" name="que_debo_hacer" value="editar_usuario" />
                <input type="hidden" name="idUsuario" value="<?php echo $DatoUsuario["id_usuario"]; ?>" />
                <input type="hidden" name="claveOld" value="<?php echo $DatoUsuario["clave_usuario"]; ?>" />
                <?php } ?>
                
                <input type="text" name="usuario" value="<?php echo $DatoUsuario["nombre_usuario"]; ?>" placeholder="Nombre Usuario"/> <hr/>
                <input type="password" 
            name="clave" placeholder="Clave"  value="<?php echo $DatoUsuario["clave_usuario"]; ?>" /> <hr/>
                
                <br/>
                
                <button type="submit">
                Procesar</button>
                
            </form>
        </fieldset>
        
        <fieldset>
            <legend>Listado de Usuarios</legend>
            <table border="1">
                <tr>
                    <th>Opciones</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    
                </tr>
                <!------------------------------------------------->
                <?php while($registro = mysqli_fetch_array($Query)){ ?>
                <tr>
                    <td><a href="?idUsuario=<?php echo $registro["id"]; ?>&que_debo_hacer=mostrar_para_editar">Editar</a> 
                        || 
                <a href="?idUsuario=<?php echo $registro["id"]; ?>&que_debo_hacer=eliminar_usuario">Eliminar</a>
                    </td>
                    <td><?php echo $registro["usuario"]; ?></td>
                    
                    <td><?php echo $registro["fecha"]; ?></td>
                </tr>
                <?php } ?>
                <!------------------------------------------------->
            </table>
        </fieldset>
    </body>
</html>