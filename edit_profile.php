<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
}

$user = $_SESSION["username"];


require_once "config.php";
$conn = $link;

// Attempt select query execution
$sql = "SELECT * FROM users WHERE username like '$user'";
$resultado = mysqli_query($link, $sql);



// Verifica si se obtuvo algún resultado
if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    // $fila contiene los datos de la fila que deseas imprimir
} else {
    echo '<script type="text/javascript">
    alert("Wrong username or password. Please check your credentials.");
    window.location.href="index.php";
    </script>';
}

$consulta = "SELECT * FROM rewards WHERE username = '$user'";
$result = mysqli_query($link, $consulta);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $puntos = $row['puntos'];
    // $fila contiene los datos de la fila que deseas imprimir
} else {
    echo '<script type="text/javascript">
    alert("Wrong username or password. Please check your credentials.");
    window.location.href="index.php";
    </script>';
}

$limitePuntos = 250;
$progreso = ($puntos / $limitePuntos) * 100;

?>

<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVANZAMOS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="icon" type="image/png" href="avanzare.png">
    <link rel="nav" href="./style_nav.css">
    <link rel="stylesheet" href="./style_prueba.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="app">
        <header class="app-header">
            <div class="app-header-logo">
                <div class="logo">
                    <span class="logo-icon">
                        <img src="avanzare.png" />
                    </span>
                    <h1 class="logo-title">
                        <span>AVANZAMOS</span>
                        <span></span>
                    </h1>
                </div>
            </div>
            <div class="app-header-navigation">
            </div>
            <div class="app-header-actions">
                <form action="perfil.php">
                    <button class="user-profile">
                        <span> Empresa </span>
                        <span>
                            <img src="<?php echo ($fila["img"]); ?>" />
                        </span>
                    </button>
                </form>

                <div class="app-header-actions-buttons">
                    <button class="icon-button large">
                        <i class="ph-magnifying-glass"></i>
                    </button>
                    <button class="icon-button large">
                        <i class="ph-bell"></i>
                    </button>
                </div>
            </div>
            <a href="menu.php">
                <div class="app-header-mobile">
                    <button class="icon-button large">
                        <i class="ph-list"></i>
                    </button>
                </div>
            </a>
        </header>
        <div class="app-body">
        <?php if ($user == 'admin') {
				?>
				<div class="app-body-navigation">
					<nav class="navigation">
						<form action="servicios.php">
							<button type="submit">
								<i class="ph-browsers"></i>
								<span>REUNIONES</span>
							</button>
						</form>
						<button href="#">
							<i class="ph-check-square"></i>
							<span>SERVICIOS</span>
						</button>
						<form action="calendario.php">
							<button type="submit">
								<i class="ph-swap"></i>
								<span>CALENDARIO</span>
							</button>
						</form>
						<form action="cierre.php">
							<button type="submit">
								<i class="ph-file-text"></i>
								<span>REPORTAR CIERRE DE NEGOCIO</span>
							</button>
						</form>
						<form action="reuniones_personales.php">
							<button type="submit">
								<i class="ph-globe"></i>
								<span>REUNIONES PERSONALES</span>
							</button>
						</form>
						<br>
						<form action="registro_curso.php">
						<button type="submit">
							<i class="ph-clipboard-text"></i>
							<span>REGISTRAR CURSO</span>
						</button>
						</form>
						<button href="#">
							<i class="ph-clipboard-text"></i>
							<span>REWARDS</span>
						</button>
					</nav>
					<footer class="footer">
						<h1>AVANZAMOS <small>©</small></h1>
						<div>
							Barcelo studio © 2023
							<br />

						</div>
					</footer>
				</div>

				<?php
			} else {
				?>
				<div class="app-body-navigation">
					<nav class="navigation">
						<form action="servicios.php">
							<button type="submit">
								<i class="ph-browsers"></i>
								<span>REUNIONES</span>
							</button>
						</form>
						<br>
						<form action="mis_reuniones.php">
							<button type="submit"">
							<i class=" ph-check-square"></i>
								<span>MIS REUNIONES</span>
							</button>
						</form>
						<br>
						<form action="calendario.php">
							<button type="submit">
								<i class="ph-swap"></i>
								<span>PRÓXIMAS REUNIONES</span>
							</button>
						</form>
						<br>
						<form action="reuniones_personales.php">
							<button type="submit">
								<i class="ph-globe"></i>
								<span>REUNIONES PERSONALES</span>
							</button>
						</form>
						<br>
					</nav>
					<footer class="footer">
						<h1>AVANZAMOS <small>©</small></h1>
						<div>
							Barcelo studio © 2023
							<br />

						</div>
					</footer>
				</div>
			<?php }
			?>
            <div class="app-body-main-content">
                <h1>Editar Perfil</h1>
                <section class="seccion-perfil-usuario">
                    <div class="perfil-usuario-header">
                        <div class="perfil-usuario-portada">
                            <div class="perfil-usuario-avatar">
                                <img src="<?php echo $fila["img"]; ?>" alt="img-avatar">
                            </div>
                        </div>
                    </div>
                    <div class="perfil-usuario-body">
                        <div class="perfil-usuario-bio">
                            <h3 class="titulo">
                                <?php echo $fila["nombre"] ?>
                            </h3>
                            <p class="texto">
                                <?php echo $fila["descripcion"] ?>
                            </p>
                        </div>
                        <div class="perfil-usuario-footer">
                            <ul class="lista-datos">
                                <li><i class="icono fas fa-map-signs"></i> Nombre de usuario:</li>
                                <li><i class="icono fas fa-phone-alt"></i> Nombre Completo:</li>
                                <li><i class="icono fas fa-briefcase"></i> Telefono:</li>
                                <li><i class="icono fas fa-building"></i> Email:</li>
                                <li><i class="icono fas fa-map-signs"></i> Empresa:</li>
                                <li><i class="icono fas fa-phone-alt"></i> Sector:</li>
                                <li><i class="icono fas fa-briefcase"></i> Descripcion:</li>
                                <li><i class="icono fas fa-building"></i> Contraseña:</li>
                            </ul>
                            <ul class="lista-datos">
                                <li style="margin-bottom: -3px;"><i class="icono fas fa-map-marker-alt"></i>
                                    <?php echo $fila["username"]; ?>
                                </li>
                                <li style="padding: 8px 1px;"><input style="width: 94%" type="text" class="nombre" name="nombre" autocomplete="off"></li>
                                <li style="padding: 3px .5px;"><input style="width: 93%" type="text" class="tel_personal"  name="tel_personal"
                                        autocomplete="off"></li>
                                <li style="padding: 6px 0;"><input style="width: 93%" type="text" class="email"  name="email" autocomplete="off"></li>
                                <li style="padding: 3px 0;"><input style="width: 93%" type="text" class="nombre_empresa" name="nombre_empresa" autocomplete="off"></li>
                                <li><select name="giro" id="giro">
                                        <option value="Moda y Eventos">Moda y Eventos</option>
                                        <option value="Salud">Salud</option>
                                        <option value="Servicios">Servicios</option>
                                        <option value="Construccion">Construcción</option>
                                        <option value="Legal y Contable">Legal y Contable</option>
                                        <option value="Tecnologia y Marketing">Tecnología y Marketing</option>
                                        <option value="Alimentos y Bebidas">Alimentos y Bebidas</option>
                                    </select></li>
                                <li style="padding: 5px 0;"><input style="width: 93%" type="descripcion" class="descripcion" name="descripcion"
                                        autocomplete="off"></li>
                                <li style="padding: 3px 0;"><input style="width: 93%" type="password" class="password"  name="password"
                                        autocomplete="off"></li>
                            </ul>
                        </div>
                        <div class="payment-section-footer">
                            <form action="update.php">
                                <button class="save-button">
                                    Editar perfil
                                </button>
                            </form>
                            <form action="perfil.php">
                            <button class="save-button">
                                Regresar
                            </button>
                        </form>
                        </div>
                    </div>
                </section>
                <div class="service-section-footer">
                </div>
            </div>
            <div class="app-body-sidebar">
                <section class="payment-section">
                    <div class="payment-section-footer">
                        <form action="logout.php">
                            <button class="save-button">
                                Cerrar sesión
                            </button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <script src='https://unpkg.com/phosphor-icons'></script>
        <script src="./script.js"></script>

</body>

</html>