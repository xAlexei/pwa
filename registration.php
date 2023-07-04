<?php
    session_start();

    require_once "config.php";

    $username = $_POST["username"];
    $nombre = $_POST["nombre"];
    $tel_personal = $_POST["tel_personal"];
    $email = $_POST["email"];
    $nombre_empresa = $_POST["nombre_empresa"];
    $giro = $_POST["giro"];
    $descripcion = $_POST["descripcion"];
    $password = $_POST["password"];
    $pin = $_POST["pin"];
    $imagen_perfil = $_FILES["imagen"];

    $conn = $link;

    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imagen"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["imagen"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

    $sql = "INSERT INTO users (username, password, email, pin, activo, tel_personal, nombre, descripcion, nombre_empresa, sector, img) 
                    VALUES ('$username','$password','$email','$pin','1','$tel_personal','$nombre','$descripcion','$nombre_empresa','$giro','$target_file')";
    $result = mysqli_query($conn,$sql);
    if ($result) {
      $consulta = "SELECT id FROM users WHERE username = '$username'";
      $resultado = mysqli_query($conn,$consulta);
      if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $id_usuario = $fila["id"];  
        // $fila contiene los datos de la fila que deseas imprimir

        $escritura = "INSERT INTO rewards (id_usuario, usuario, puntos) VALUES ('$id_usuario', '$username', '0')";
        $query_result = mysqli_query($conn,$escritura);
        if($query_result)
        {
          echo '<script type="text/javascript">
          alert("Usuarior registrado correctamente");
          window.location.href="servicios.php";
          </script>';
        }
    } else {
        echo '<script type="text/javascript">
            alert("Error al mostrar el curso, intente de nuevo");
            window.location.href="index.php";
            </script>';
    }
  
    
    }
    else
    {
        echo '<script language="javascript">alert("Something went wrong");</script>';
    }
