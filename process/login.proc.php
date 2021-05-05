<?php


//inicio la conexión escrita en recibir.php
include '../services/connection.php';

$usuario=$_REQUEST['email'];
$pass=$_REQUEST['password'];
$user=mysqli_real_escape_string($conexion,$usuario); //hace que este string no pueda tener carácteres especiales cómo comillas

//Realizo una consulta buscando un usuario con los datos untroducidos por el usuario
$usuarioBD = mysqli_query($conexion,"SELECT * FROM tbl_admin WHERE email_admin=MD5('{$usuario}') and pass_admin=MD5('{$pass}')");

if (mysqli_num_rows($usuarioBD) == 1) {
    session_start();
    $_SESSION['nom_admin']=$usuario;
    header("location: ej20.php");
} else {
    //echo "Usuario o contraseña erroneos.";
    header("location: ../index.php");
}

mysqli_free_result($usuarioBD);