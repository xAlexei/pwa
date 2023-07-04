<?php
session_start();

require_once"config.php";
$username = $_SESSION["user"];

$conn = $link;

$actualizaciones = array(
    'nombre' => $_POST['nombre'],
    'tel_personal' => $_POST['tel_personal'],
    'email' => $_POST['email'],
    'nombre_empresa' => $_POST['nombre_empresa'],
    'direccion' => $_POST['direccion'],
    'tel_empresa' => $_POST['tel_empresa'],
    'sector' => $_POST['giro'],
    'descripcion' => $_POST['descripcion'],
    'password' => $_POST['password'],
    //'img' => $_POST['img'],
);

$sql = "UPDATE users SET ";
$valores = array();
foreach($actualizaciones as $columna => $valor)
{
    if(!empty($valor))
    {
        $valores[] = "$columna = '$valor'";
    }
}

if (count($valores) > 0){
    $sql .= implode(', ', $valores) . "WHERE username like '$username'";
    mysqli_query($conn, $sql);
    echo "1";
}

mysqli_close($conn);
?>