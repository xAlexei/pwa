<?php
/*declare(strict_types=1);
require 'vendor/autoload.php';
$secret = 'XVQ2UIGO75XRUKJO';
$link = \Sonata\GoogleAuthenticator\GoogleQrUrl::generate('avanzamos1', $secret, 'avanzamos');
$g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();*/

// if (isset($_POST['submit'])) {
//   $code = $_POST['pass-code'];

//   if ($g->checkCode($secret, $code)) {
//     echo "YES \n";
//   } else {
//     echo "NO \n";
//   }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AVANZAMOS</title>
  <link rel="stylesheet" href="./styleer.css">
  <link rel="icon" type="image/png" href="avanzare.png">
</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="login-box">
    <h2> <img src="avanzare.png" width="25px"> AVANZAMOS</h2>
    <h3>Inicio de Sesión Administrador <br><br></h3>
    <form action="login_staff.php" method="POST">
      <div class="user-box">
        <input type="text" class="username" id="username" name="username" autocomplete="off">
        <label>USUARIO</label>
      </div>
      <div class="user-box">
        <input type="password" class="password" id="password" name="password">
        <label>PASSWORD</label>
        <input style="font-size: 12px; text-transform: uppercase; color: #F7E700; border: none; text-align:left; margin-bottom: 20px;" type="button" value="Mostar Contraseña" onclick="mostrarPassword()">
        <script>
          function mostrarPassword() {
            var passwordInput = document.getElementById("password");
            var contrasenaElemento = document.getElementById("contrasena");

            if (passwordInput.type === "password") {
              passwordInput.type = "text";
              contrasenaElemento.textContent = passwordInput.value;
            } else {
              passwordInput.type = "password";
              contrasenaElemento.textContent = "";
            }
          }
        </script>s
      </div>
      <div class="user-box">
        <input type="password" class="pin" id="pin" name="pin">
        <label>PIN</label>
      </div>

      <button type="submit">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Iniciar
      </button>
    </form>
  </div>
  <!-- partial -->

</body>

</html>