<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AVANZAMOS</title>
  <link rel="nav" href="./style_nav.css">
  <link rel="stylesheet" href="./register_style.css">
  <link rel="icon" type="image/png" href="avanzare.png">
</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="login-box">
    <h2> <img src="avanzare.png" width="25px"> AVANZAMOS</h2>
    <h3> Registrate </h3>
    <form action="registration.php" method="POST" enctype="multipart/form-data">
      <div class="user-box">
        <input type="text" class="username" id="username" name="username" autocomplete="off">
        <label>Crea tu nombre de usuario (tu nombre o el de tu empresa)</label>
      </div>
      <div class="user-box">
        <input type="text" class="nombre" id="nombre" name="nombre" autocomplete="off">
        <label>Introduce tu nombre completo</label>
      </div>
      <div class="user-box">
        <input type="text" class="email" id="email" name="email" autocomplete="off">
        <label>Introduce tu email</label>
      </div>
      <div class="user-box">
        <input type="text" class="nombre_empresa" id="nombre_empresa" name="nombre_empresa" autocomplete="off">
        <label>Introduce el nombre de tu empresa</label>
      </div>
      <div class="user-box">
        <input type="text" class="tel_personal" id="tel_personal" name="tel_personal" autocomplete="off">
        <label>Introduce tu número de teléfono de contacto</label>
      </div>
      <div class="user-box">
        <label>Elige el sector de tu empresa</label>
        <select name="giro" id="giro">
          <option value="Moda y Eventos">Moda y Eventos</option>
          <option value="Salud">Salud</option>
          <option value="Servicios">Servicios</option>
          <option value="Construccion">Construcción</option>
          <option value="Legal y Contable">Legal y Contable</option>
          <option value="Tecnologia y Marketing">Tecnología y Marketing</option>
          <option value="Alimentos y Bebidas">Alimentos y Bebidas</option>
        </select>
      </div>
      <div class="user-box">
        <input type="descripcion" class="descripcion" id="descripcion" name="descripcion" autocomplete="off">
        <label>Escribe una breve descripcion de tu empresa</label>
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
        <input for="imagen" type="file" class="imagen" id="imagen" name="imagen">
        <label>Elige una imagen de foto de perfil</label>
      </div>
      <div class="user-box">
        <input type="text" class="pin" id="pin" name="pin" autocomplete="off">
        <label>Crea un PIN de CUATRO dígitos</label>
      </div>
      <!-- <div class="user-box">
        <label for="img">Selecciona una imagen:</label>
        <input type="file" name="img" id="img"><br>
      </div> -->

      <button type="submit">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-forward-up" width="16"
          height="16" viewBox="0 0 24 24" stroke-width="1" stroke="#ffffff" fill="none" stroke-linecap="round"
          stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M15 14l4 -4l-4 -4" />
          <path d="M19 10h-11a4 4 0 1 0 0 8h1" />
        </svg>
        Registro
      </button>
    </form>
    <form action="index.php">
      <button type="regresar">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="16" height="16"
          viewBox="0 0 24 24" stroke-width="1" stroke="#ffffff" fill="none" stroke-linecap="round"
          stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" />
        </svg>
        regresar
      </button>
    </form>
  </div>
  <!-- partial -->

</body>

</html>