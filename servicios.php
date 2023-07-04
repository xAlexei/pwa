<!DOCTYPE html>
<html lang="es">
<?php
session_start();

if (!isset($_SESSION["username"])) {
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
	//Busqueda en la tabla de staff
	$consulta = "SELECT * FROM staff WHERE username like '$user'";
	$result = mysqli_query($link, $consulta);

	//verificacion de resultados
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
	} else {
		echo 'error';
	}
}
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AVANZAMOS</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link rel="icon" type="image/png" href="avanzare.png">
	<link rel="stylesheet" href="./style_perfile.css">
	<link rel="normalize" href="./style_nav.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
	<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
	<script>
		function mostrarPopup(id) {
			var popup = document.getElementById(id);
			popup.style.display = "block";
		}

		function ocultarPopup(id) {
			var popup = document.getElementById(id);
			popup.style.display = "none";
		}
	</script>

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
						<span style="font-size: 20px; font-weight:500">AVANZAMOS</span>
						<span></span>
					</h1>
				</div>
			</div>
			<div class="app-header-navigation">
				<marquee>notificación mensual - notificación mensual - notificación mensual - notificación mensual
				</marquee>
			</div>
			<div class="app-header-actions">
				<?php
				if ($user == 'admin') {
					?>
					<form action="perfil.php">
						<button class="user-profile">
							<span> Empresa </span>
							<span>
								<img src="<?php echo ($row["img"]); ?>" />
							</span>
						</button>
					</form>
					<?php
				} else {
					?>
					<form action="perfil.php">
						<button class="user-profile">
							<span> Empresa </span>
							<span>
								<img src="<?php echo ($fila["img"]); ?>" />
							</span>
						</button>
					</form>
				<?php
				}
				?>
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
				<div id="popup1" class="popup">
					<h2>Pop-up</h2>
					<p>Contenido del pop-up</p>
					<button onclick="ocultarPopup('popup1')">Cerrar</button>
				</div>
				<div id="popup2" class="popup">
					<h2>Pop-up</h2>
					<p>Contenido del pop-up 2</p>
					<button onclick="ocultarPopup('popup2')">Cerrar</button>
				</div>
				<div style="padding-top: 1rem;">
					<section class="service-section">
						<h2 style="font-weight:bold; color:black">REUNIONES AVANZAMOS</h2>
						<div class="tiles">
							<article class="tile">
								<div class="tile-header">
									<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cake"
										width="52" height="52" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
										fill="none" stroke-linecap="round" stroke-linejoin="round" marginRight="15px;">
										<path stroke="none" d="M0 0h24v24H0z" fill="none" />
										<path d="M3 20h18v-8a3 3 0 0 0 -3 -3h-12a3 3 0 0 0 -3 3v8z" />
										<path
											d="M3 14.803c.312 .135 .654 .204 1 .197a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1c.35 .007 .692 -.062 1 -.197" />
										<path d="M12 4l1.465 1.638a2 2 0 1 1 -3.015 .099l1.55 -1.737z" />
									</svg>
									<h3>
										<span style="color:black">&nbsp;&nbsp;Aniversario Avanzamos</span>
										<span style="color:black">date</span>
									</h3>
								</div>
								<button onclick="mostrarPopup('popup1')">
									<span style="color: black">Asistir</span>
									<span class="icon-button">
										<svg xmlns="http://www.w3.org/2000/svg"
											class="icon icon-tabler icon-tabler-arrow-narrow-right" width="16"
											height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
											fill="none" stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<path d="M5 12l14 0" />
											<path d="M15 16l4 -4" />
											<path d="M15 8l4 4" />
										</svg>
									</span>
								</button>
							</article>
							<br>
							<br>
							<article style="background-color: #9DCDC0" class="tile">
								<div class="tile-header">
									<svg xmlns="http://www.w3.org/2000/svg"
										class="icon icon-tabler icon-tabler-confetti" width="52" height="52"
										viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
										stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none" />
										<path d="M4 5h2" />
										<path d="M5 4v2" />
										<path d="M11.5 4l-.5 2" />
										<path d="M18 5h2" />
										<path d="M19 4v2" />
										<path d="M15 9l-1 1" />
										<path d="M18 13l2 -.5" />
										<path d="M18 19h2" />
										<path d="M19 18v2" />
										<path
											d="M14 16.518l-6.518 -6.518l-4.39 9.58a1 1 0 0 0 1.329 1.329l9.579 -4.39z" />
									</svg>
									<h3>
										<span style="color:black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Posada
											Avanzamos</span>
										<span style="color:black">&nbsp;&nbsp;18 de Diciembre</span>
									</h3>
								</div>
								<button onclick="mostrarPopup('popup2')">
									<span style="color: black">Asistir</span>
									<span class="icon-button">
										<svg xmlns="http://www.w3.org/2000/svg"
											class="icon icon-tabler icon-tabler-arrow-narrow-right" width="16"
											height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
											fill="none" stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<path d="M5 12l14 0" />
											<path d="M15 16l4 -4" />
											<path d="M15 8l4 4" />
										</svg>
									</span>
								</button>
							</article>
						</div>
						<div class="service-section-footer">
							<p></p>
						</div>
					</section>
				</div>
				<div>
					<br>
					<br>
					<h3 style="font-size: 20px; font-weight: 600;">Las reuniones de empresarios son en el </h3>
					<h3 style="font-size: 25px; font-weight: 800;"> Restaurante OUI </h3>
					<h3 style="font-size: 20px; font-weight: 600;"> todos los jueves de 9:30am a 11:20am </h3>
					<br>
					<br>
					<iframe
						src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14931.510530327723!2d-103.3906055!3d20.6745568!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ae72bfeceaf5%3A0x6a0a9dfc0d56d667!2sOUI%20Restaurant%20Bar!5e0!3m2!1ses-419!2smx!4v1684782770664!5m2!1ses-419!2smx"
						width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
						referrerpolicy="no-referrer-when-downgrade"></iframe>
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
	</div>
	<!-- partial -->
	<script src='https://unpkg.com/phosphor-icons'></script>
	<script src="./script.js"></script>

</body>

</html>