<?php
    $con = mysqli_connect("localhost","root","","db_reproductor");
    
    $DatoMP3["nombre"] = "";
    $DatoMP3["ruta"] = "";
    $DatoMP3["descripcion"] = "";
    if(isset($_REQUEST["que_debo_hacer"])){
        switch($_REQUEST["que_debo_hacer"]){
            case "agregar_mp3":
                
                //print_r($_FILES);
                copy($_FILES["mp3"]["tmp_name"],"mp3/".$_FILES["mp3"]["name"]);
    
                $sql = "insert into mp3 
                (nombre, descripcion, ruta, fecha_creado)
                values
                ('".$_REQUEST["nombre"]."','".$_REQUEST["descripcion"]."','".$_FILES["mp3"]["name"]."',now())";
                mysqli_query($con,$sql);
                break;
            case "mostrar_para_editar":
                    /*Obtener un solo registro de la tabla mp3*/
                    $sqlMP3 = "select * from mp3 where id = '".$_REQUEST["idMP3"]."' ";
                    $QueryMP3 = mysqli_query($con,$sqlMP3);
                    $DatoMP3 = mysqli_fetch_array($QueryMP3);
                break;
            case "editar_mp3":
                $sql = "update mp3 set 
                nombre='".$_REQUEST["nombre"]."', 
                descripcion='".$_REQUEST["descripcion"]."', 
                ruta = '".$_REQUEST["ruta"]."'
                where id = '".$_REQUEST["idMP3"]."'
                ";
                mysqli_query($con,$sql);
                break;
            case "eliminar_mp3":
                $sql = "delete from mp3 
                where id = '".$_REQUEST["idMP3"]."'
                ";
                mysqli_query($con,$sql);
                break;
        }   
    }

    /*OBtener todos los registro de la tabla mp3*/
    $sql = "select * from mp3 ";
    $Query = mysqli_query($con,$sql);



?>
<!------------------------------------------------------>
<!doctype html>
<html> 
    <head>
        <title>
        Administrar MP3
        </title>
    </head>
    <body>
        <fieldset>
            <legend>Agregar MP3</legend>
            
            <form action="" method="post" enctype="multipart/form-data">
            
                <?php if(empty($DatoMP3["nombre"])){ ?>
                <input type="hidden" name="que_debo_hacer" value="agregar_mp3" />
                <?php }else{ ?>
                <input type="hidden" name="que_debo_hacer" value="editar_mp3" />
                <input type="hidden" name="idMP3" value="<?php echo $DatoMP3["id"]; ?>" />
                <?php } ?>
                
                <input type="text" name="nombre" value="<?php echo $DatoMP3["nombre"]; ?>" placeholder="Nombre MP3"/> <hr/>
                <input type="file" name="mp3" />
                <input type="hidden" 
            name="ruta" placeholder="Ruta MP3"  value="<?php echo $DatoMP3["ruta"]; ?>" /> <hr/>
                
                <textarea name="descripcion" placeholder="Descripción"><?php echo $DatoMP3["descripcion"]; ?></textarea>
                <br/>
                
                <button type="submit">
                Procesar</button>
            </form>
        </fieldset>
        <fieldset>
            <legend>Listado de MP3</legend>
            <table border="1">
                <tr>
                    <th>Opciones</th>
                    <th>Nombre</th>
                    <th>Ruta</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    
                </tr>
                <!------------------------------------------------->
                <?php while($registro = mysqli_fetch_array($Query)){ ?>
                <tr>
                    <td><a href="?idMP3=<?php echo $registro["id"]; ?>&que_debo_hacer=mostrar_para_editar">Editar</a> 
                        || 
                <a href="?idMP3=<?php echo $registro["id"]; ?>&que_debo_hacer=eliminar_mp3">Eliminar</a>
                    </td>
                    <td><?php echo $registro["nombre"]; ?></td>
                    <td>
<audio controls>
<source src="mp3/<?php echo $registro["ruta"]; ?>" type="audio/mpeg">
</audio>
                        </td>
                    <td><?php echo $registro["descripcion"]; ?></td>
                    <td><?php echo $registro["fecha_creado"]; ?></td>
                </tr>
                <?php } ?>
                <!------------------------------------------------->
            </table>
        </fieldset>
    </body>
</html>