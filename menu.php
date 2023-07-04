<!DOCTYPE html>
<html>
<?php
session_start();

if (!isset($_SESSION["username"])) {
	header("Location: index.php");
}

$user = $_SESSION["username"];


require_once "config.php";
$conn = $link;

?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AVANZAMOS</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link rel="icon" type="image/png" href="avanzare.png">
	<link rel="nav" href="./style_nav.css">
	<link rel="stylesheet" href="./style_menu.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

	<style>
		.tile {
			background-color: <?php echo $color; ?> !important;
		}
	</style>

</head>

<body>
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
					<br>
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
					<br>
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