<?php
    session_start();

    require_once"config.php";

    $user = $_SESSION["username"];

    $Nombre = $_POST["Nombre"];
    $fechas = $_POST["fechas"];
    $cupo = $_POST["cupo"];
    $creador = $_POST["creador"];
    $costo = floatval($_POST["costo"]);
    $descripcion = $_POST["descripcion"];
    $lugar = $_POST["lugar"];
    $categoria = $_POST["categoria"];

    $conn = $link;

    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO eventos (Nombre, fechas, cupo, creador, categoria, costo, obligatorio, descripcion, lugar) 
                    VALUES ('$Nombre','$fechas','$cupo','$creador','$categoria','$costo','Y','$descripcion','$lugar')";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        echo '<script language="javascript">alert("Curso registrado correctamente);</script>';
        header("Location: servicios.php");
    }
    else
    {
        echo '<script language="javascript">alert("Something went wrong");</script>';
    }
?>