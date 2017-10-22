<?php
$con = mysqli_connect("localhost","root","","db_reproductor");
    $sql = "select * from mp3 ";
    $Query = mysqli_query($con,$sql);
?>
<!doctype html>
<html>
    <head>
        <title>Reproduciendo: </title>
    </head>
    <body>
        <?php if(isset($_GET["nombreMP3"])){ ?>
        <section>
            <h4><?php echo $_GET["nombreMP3"]; ?></h4>
            <audio controls autoplay>
                <source src="mp3/<?php echo $_GET["rutaMP3"]; ?>" type="audio/mpeg"  />
            </audio>
        </section>
        <?php } ?>
        <aside>
            <h1>Listado de canciones</h1>
            <ul>
                <?php while($registro = mysqli_fetch_array($Query)){ ?>
                <li><a href="?idMP3=<?php echo $registro["id"]; ?>&nombreMP3=<?php echo $registro["nombre"]; ?>&rutaMP3=<?php echo $registro["ruta"]; ?>"><?php echo $registro["nombre"]; ?></a></li>
                <?php } ?>
            </ul>
        </aside>
    </body>
</html>
