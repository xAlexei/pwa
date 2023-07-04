<!DOCTYPE html>
<html lang="en">
<?php
session_start();

require_once "config.php";

$user = $_SESSION["username"];
$curso_Id = $_POST["curso_id"];
$conn = $link;


if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM eventos WHERE id_curso = '$curso_Id'";
$resultado = mysqli_query($link, $sql);

if (mysqli_num_rows($resultado) > 0) {
	$fila = mysqli_fetch_assoc($resultado);
	// $fila contiene los datos de la fila que deseas imprimir
} else {
	echo '<script type="text/javascript">
        alert("Error al mostrar el curso, intente de nuevo");
        window.location.href="calendario.php";
        </script>';
}

$query = "SELECT * FROM users WHERE username like '$user'";
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
} else {
	echo '<script type="text/javascript">
        alert("Error al obtener los datos de usuario, intente de nuevo");
        window.location.href="calendario.php";
        </script>';
}


?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AVANZAMOS</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link rel="icon" type="image/png" href="avanzare.png">
	<link rel="nav" href="./style_nav.css">
	<link rel="stylesheet" href="./style_prueba.css">

	<style>
		.tile {
			background-color:
				<?php echo $color; ?>
				!important;
		}
	</style>

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
				<marquee>notificación mensual - notificación mensual - notificación mensual - notificación mensual
				</marquee>
			</div>
			<div class="app-header-actions">
				<form action="perfil.php">
					<button class="user-profile">
						<span> Empresa </span>
						<span>
							<img src="<?php echo ($row["img"]); ?>" />
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
						<br>
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
						<br>
						<form action="cierre.php">
							<button type="submit">
								<i class="ph-file-text"></i>
								<span>REPORTAR CIERRE DE NEGOCIO</span>
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
							<br/>

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
							<br/>

						</div>
					</footer>
				</div>
			<?php }
			?>
			<div class="app-body-main-content">
			<section class="seccion-perfil-usuario">
			<div class="perfil-usuario-footer">
					<ul class="lista-datos">
						<li><i class="icono fas fa-map-signs"></i> Nombre del curso:</li>
						<li><i class="icono fas fa-phone-alt"></i> Fecha:</li>
						<li><i class="icono fas fa-briefcase"></i> Cupo:</li>
						<li><i class="icono fas fa-building"></i> Expositor:</li>
						<li><i class="icono fas fa-building"></i> Categoria:</li>
						<li><i class="icono fas fa-building"></i> Costo:</li>
						<li><i class="icono fas fa-building"></i> Lugar:</li>
					</ul>
					<ul class="lista-datos">
						<li><i class="icono fas fa-map-marker-alt"></i>
							<?php echo $fila["Nombre"]; ?>
						</li>
						<li><i class="icono fas fa-calendar-alt"></i>
							<?php echo $fila["fechas"]; ?>
						</li>
						<li><i class="icono fas fa-user-check"></i>
							<?php echo $fila["cupo"]; ?>
						</li>
						<li><i class="icono fas fa-share-alt"></i>
							<?php echo $fila["creador"]; ?>
						</li>
						<li><i class="icono fas fa-share-alt"></i>
							<?php echo $fila["categoria"]; ?>
						</li>
						<li><i class="icono fas fa-share-alt"></i>
							<?php echo $fila["costo"]; ?>
						</li>
						<li><i class="icono fas fa-share-alt"></i>
							<?php echo $fila["lugar"]; ?>
						</li>
					</ul>
				</div>
				<div class="payment-section-footer">
					<form action="inscribir.php" method="POST">
						<input type="hidden" name="id" value="<?php echo $row["id"] ?>">
						<input type="hidden" name="id_curso" value="<?php echo $curso_Id; ?>">
						<input type="hidden" name="fecha" value="<?php echo date('Y - m - d') ?>">
						<button class="save-button">
							Inscribirse
						</button>
					</form>
					<form action="calendario.php">
						<button class="save-button">
							Regresar
						</button>
					</form>
				</div>
				</section>
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
	</div>
	<script src='https://unpkg.com/phosphor-icons'></script>
	<script src="./script.js"></script>

</body>

</html>