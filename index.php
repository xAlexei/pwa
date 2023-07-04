<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AVANZAMOS</title>
  <link rel="nav" href="./style_nav.css">
  <link rel="stylesheet" href="./styleer.css">
  <link rel="icon" type="image/png" href="avanzare.png">
  <link rel="manifest" href="manifest.json">
  <!-- Soporte para IOS -->
  <link rel="apple-touch-icon" href="avanzare.png">
  <meta name="apple-mobile-web-app-status-bar" content="#1F1F1F">
  <meta name="theme-color" content="#1F1F1F">
</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="login-box">
    <h2> <img src="avanzare.png" width="25px"> AVANZAMOS</h2>
    <form action="login.php" method="POST">
      <div class="user-box">
        <input type="text" class="username" id="username" name="username" autocomplete="off">
        <label>USUARIO</label>
      </div>
      <div class="user-box">
        <input style="margin-bottom: 15px;" type="password" class="password" id="password" name="password">
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
        </script>
        <label>PASSWORD</label>
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
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="15" height="15" viewBox="0 0 24 24" stroke-width="1" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M5 12l5 5l10 -10" />
        </svg>
        Iniciar
      </button>
    </form>
    <form action="register.php" method="POST">
      <button type="register">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checkbox" width="15" height="15" viewBox="0 0 24 24" stroke-width="1" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M9 11l3 3l8 -8" />
          <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
        </svg>
        registro
      </button>
    </form>
  </div>
  <!-- partial -->

</body>

</html>