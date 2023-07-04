<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (!isset($_SESSION["username"])) {
	header("Location: index.php");
}

$user = $_SESSION["username"];
require_once "config.php";
$conn = $link;

//CONSULTA CURSOS A LOS QUE MARQUÉ UNA ASISTENCIA
$sql = "SELECT e.Nombre AS Nombre, e.fechas, e.lugar, e.id_curso, e.categoria
        FROM eventos e
        INNER JOIN asistencia a ON e.id_curso = a.idevento
        INNER JOIN users u ON u.id = a.id_cuenta
        WHERE u.username = '$user'";

$resultado = mysqli_query($link, $sql);

//CONSULTA DE CURSOS DONDE EL USUARIO ES EL QUE IMPARTE LOS CURSOS
$consulta = "SELECT * FROM users WHERE username like '$user'";
$respuesta = mysqli_query($link, $consulta);
if (mysqli_num_rows($respuesta) > 0) {
	$fila = mysqli_fetch_assoc($respuesta);
	// $fila contiene los datos de la fila que deseas imprimir
} else {
	echo '<script type="text/javascript">
    alert("Wrong username or password. Please check your credentials.");
    window.location.href="index.php";
    </script>';
}

//CONSULTA DE LAS REUNIONES PERSONALES
$solicitud = "SELECT r.nombre AS nombre, r.fechas, r.lugar, r.id_reunion, r.categoria
			FROM reuniones r
			INNER JOIN asistenciarp a ON r.id_reunion = a.idreunion
			INNER JOIN users u ON u.id = a.idcuenta
			WHERE u.username = '$user'";
$answer = mysqli_query($link,$solicitud);

//CONSULTA DEL USUARIO
$query = "SELECT * FROM eventos WHERE username like '$user'";
$result = mysqli_query($link, $query);

//colores de las tarjetas
$colores = array("#E3FFA8", "#45FFBC", "#BDBBB7");

//Contadores
$i = 0;
$contador = 0;

?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AVANZAMOS</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link rel="icon" type="image/png" href="avanzare.png">
	<link rel="stylesheet" href="./style_calendario.css">

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
				<section class="service-section">
					<h2>MIS CURSOS</h2>
					<h3>Búsqueda por categorias</h3>
					<form action="buscar.php" method="POST">
						<div class="service-section-header">
							<div class="search-field">
								<!-- <i class="ph-magnifying-glass"></i> -->
								<select class="giro" name="giro">
									<option value="Moda y Eventos">Moda y Eventos</option>
									<option value="Salud">Salud</option>
									<option value="Servicios">Servicios</option>
									<option value="Construccion">Construcción</option>
									<option value="Legal y Contable">Legal y Contable</option>
									<option value="Tecnologia y Marketing">Tecnología y Marketing</option>
									<option value="Alimentos y Bebidas">Alimentos y Bebidas</option>
								</select>
							</div>
							<button type="submit" class="flat-button">
								Buscar
							</button>
						</div>
					</form>
					<!-- <div class="mobile-only">
						<button class="flat-button">
							Buscar
						</button>
					</div> -->
					<?php
					if (mysqli_num_rows($resultado) > 0) {

						?>
						<h3 style="font-size: 20px;"><br><br>ASISTENCIAS</h3>
						<?php
						while ($row = mysqli_fetch_assoc($resultado)) {
							$color = $colores[$i];
							$i++;
							$contador++;
							?>
							<div class="tiles">
								<article class="tile" style="background-color: <?php echo $color ?>">
									<div class="tile-header">
										<i class="ph-lightning-light"></i>
										<h3>
											<span style="color:black">
												<?php echo " " . $row["Nombre"]; ?>
											</span>
											<span style="color:black">
												<?php echo " " . $row["fechas"]; ?>
											</span>
											<span style="color:black">
												<?php echo " " . $row["categoria"] ?>
											</span>
										</h3>
									</div>
									<form action="mostrar_curso.php" method="POST">
										<input type="hidden" name="curso_id" value="<?php echo $row['id_curso']; ?>">
										<button>
											<span>Asistir </span>
											<span class="icon-button">
												<i class="ph-caret-right-bold"></i>
											</span>
										</button>
									</form>
								</article>
							</div>
							<?php
							if ($i >= count($colores)) {
								$i = 0;
							}
							if ($contador == 3) {
								echo "<br>";
								$contador = 0;
							}
						}
					} else {
						echo '<script type="text/javascript">
				alert("error. Please try again.");
				window.location.href="calendario.php";
				</script>';
					}
					?>
					<?php
					if (mysqli_num_rows($resultado) > 0) {

						?>
						<h3 style="font-size: 20px;"><br><br>MIS CURSOS A IMPARTIR</h3>
						<?php
						while ($row = mysqli_fetch_assoc($result)) {
							$color = $colores[$i];
							$i++;
							$contador++;
							?>
							<div class="tiles">
								<article class="tile" style="background-color: <?php echo $color ?>">
									<div class="tile-header">
										<i class="ph-lightning-light"></i>
										<h3>
											<span style="color:black">
												<?php echo " " . $row["Nombre"]; ?>
											</span>
											<span style="color:black">
												<?php echo " " . $row["fechas"]; ?>
											</span>
											<span style="color:black">
												<?php echo " " . $row["categoria"] ?>
											</span>
										</h3>
									</div>
									<form action="mostrar_curso.php" method="POST">
										<input type="hidden" name="curso_id" value="<?php echo $row['id_curso']; ?>">
										<button>
											<span>Asistir </span>
											<span class="icon-button">
												<i class="ph-caret-right-bold"></i>
											</span>
										</button>
									</form>
								</article>
							</div>
							<?php
							if ($i >= count($colores)) {
								$i = 0;
							}
							if ($contador == 3) {
								echo "<br>";
								$contador = 0;
							}
						}
					} else {
						echo '<script type="text/javascript">
				alert("Unknown error. Please try again.");
				window.location.href="calendario.php";
				</script>';
					}
					?>
					<?php
					if (mysqli_num_rows($resultado) > 0) {

						?>
						<h3 style="font-size: 20px;"><br><br>REUNIONES PERSONALES</h3>
						<?php
						while ($array = mysqli_fetch_assoc($answer)) {
							$color = $colores[$i];
							$i++;
							$contador++;
							?>
							<div class="tiles">
								<article class="tile" style="background-color: <?php echo $color ?>">
									<div class="tile-header">
										<i class="ph-lightning-light"></i>
										<h3>
											<span style="color:black">
												<?php echo " " . $array["nombre"]; ?>
											</span>
											<span style="color:black">
												<?php echo " " . $array["fechas"]; ?>
											</span>
											<span style="color:black">
												<?php echo " " . $array["categoria"] ?>
											</span>
										</h3>
									</div>
									<form action="mostrar_curso.php" method="POST">
										<input type="hidden" name="curso_id" value="<?php echo $array['id_reunion']; ?>">
										<button>
											<span>Asistir </span>
											<span class="icon-button">
												<i class="ph-caret-right-bold"></i>
											</span>
										</button>
									</form>
								</article>
							</div>
							<?php
							if ($i >= count($colores)) {
								$i = 0;
							}
							if ($contador == 3) {
								echo "<br>";
								$contador = 0;
							}
						}
					} else {
						echo '<script type="text/javascript">
				alert("Unknown error. Please try again.");
				window.location.href="calendario.php";
				</script>';
					}
					?>
					<div class="service-section-footer">
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