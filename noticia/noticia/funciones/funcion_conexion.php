<?php

function conexion(){
    $con = mysqli_connect("localhost","root","","db_grupo_fcc");
    if($con){
        return $con;
    }else{
        die("Error en la conexion: ".$con->error);
    }
}

/*
create database  db_grupo_fcc;
use db_grupo_fcc;
create table usuarios(
  id int not null AUTO_INCREMENT PRIMARY KEY,
    usuario varchar(100),
    email varchar(150),
    clave varchar(180),
    fecha datetime,
    id_usuario int
);
create table categorias(
  id int not null AUTO_INCREMENT PRIMARY KEY,
  nombre varchar(100),
  descripcion text,
  fecha datetime,
  id_usuario int
);
create table articulos(
  id int not null AUTO_INCREMENT PRIMARY KEY,
  titulo varchar(100),
  cuerpo text,
  extracto varchar(150),
  img varchar(200),
  id_categoria int,
  fecha datetime,
  id_usuario int
);
create table comentarios(
  id int not null AUTO_INCREMENT PRIMARY KEY,
  id_articulo int,
  comentario text,
  fecha datetime,
  id_usuario int
);
*/

?>