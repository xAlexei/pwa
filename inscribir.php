<!DOCTYPE html>
<html lang="en">

<?php
session_start();
require_once "config.php";

$userID = $_POST['id'];
$cursoID = $_POST["id_curso"];
$fecha = date('Y - m - d');
$cuenta = $_SESSION["user"];

$conn = $link;


$sql = "INSERT INTO asistencia (id_cuenta, idevento, cuenta, registro, registrofecha) VALUES ('$userID', '$cursoID', '$cuenta', '1', '$fecha')";
$consulta = "SELECT * FROM eventos WHERE id_curso = '$cursoID'";
$resultado = mysqli_query($link,$consulta);

if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    // $fila contiene los datos de la fila que deseas imprimir
} else {
    echo '<script type="text/javascript">
        alert("Error al mostrar el curso, intente de nuevo");
        </script>';
}

//inscripcion de los cupos y validacion de que haya cupos disponibles
$cupoActual = $fila['cupo'];
$inscritosActual = $fila['inscritos'];

if ($cupoActual>0)
{
    $inscripcion = "UPDATE eventos SET cupo = cupo - 1, inscritos = inscritos + 1 WHERE id_curso = '$cursoID'";
    mysqli_query($link,$inscripcion);
    if ($conn->query($sql) === TRUE) {

?>
<head>
        <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perfil de Usuario</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <link rel="icon" type="image/png" href="avanzare.png">
        <link rel="stylesheet" href="./style_perfile.css">
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
                    <marquee>notificación mensual - notificación mensual - notificación mensual - notificación mensual </marquee>
                </div>
                <div class="app-header-actions">
                    <form action="perfil.php">
                        <button class="user-profile">
                            <span> Empresa </span>
                            <span>
                                <img src="https://assets.codepen.io/285131/almeria-avatar.jpeg" />
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
            <?php if ($cuenta == 'admin') {
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
                    <div class="user-box">
                        <h1>¡Gracias por tu registro a nuestro curso</h1>
                        <h5><?php echo " " . $fila["Nombre"]; ?>!</h5>
                        <h4>Correo electrónico: </h4>
                        <h5><?php echo " " . $fila["fechas"]; ?> </h5>
                        <h4>Teléfono personal: </h4>
                        <h5><?php echo " " . $fila["cupo"]; ?></h5>
                        <h4>Nombre Empresa: </h4>
                        <h5><?php echo " " . $fila["creador"]; ?></h5>
                        <h4>Domicilio: </h4>
                        <h5><?php echo " " . $fila["categoria"]; ?></h5>
                        <h4>Teléfono Empresa: </h4>
                        <h5><?php echo " " . $fila["costo"]; ?></h5>
                        <h4>Descripción: </h4>
                        <h5><?php echo " " . $fila["descripcion"]; ?></h5>
                        <h4>Sector: </h4>
                        <h5><?php echo " " . $fila["lugar"]; ?></h5>
                        <div class="navigation">
                            <form action="calendario.php">
                                <button type="return">
                                    <span></span>
                                    Regresar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
    </body>

</html>
<?php
}
?>

<?php
} else {
?>

    <head>
        <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perfil de Usuario</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <link rel="icon" type="image/png" href="avanzare.png">
        <link rel="stylesheet" href="./style_perfile.css">
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
                    <marquee>notificación mensual - notificación mensual - notificación mensual - notificación mensual </marquee>
                </div>
                <div class="app-header-actions">
                    <form action="perfil.php">
                        <button class="user-profile">
                            <span> Empresa </span>
                            <span>
                                <img src="https://assets.codepen.io/285131/almeria-avatar.jpeg" />
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
                <div class="app-body-navigation">
                    <nav class="navigation">
                        <button href="#">
                            <i class="ph-browsers"></i>
                            <span>REUNIONES</span>
                        </button>
                        <button href="#">
                            <i class="ph-check-square"></i>
                            <span>SERVICIOS</span>

                        </button>
                        <button href="#">
                            <i class="ph-swap"></i>
                            <span>CALENDARIO</span>
                        </button>
                        <button href="#">
                            <i class="ph-file-text"></i>
                            <span>REPORTAR CIERRE</span>
                        </button>
                        <button href="#">
                            <i class="ph-globe"></i>
                            <span>RECURSOS Y CONVOCATORIAS</span>
                        </button>
                        <button href="#">
                            <i class="ph-clipboard-text"></i>
                            <span>CURSOS Y CAPACITACIONES</span>
                        </button>
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
                <div class="app-body-main-content">
                    <div class="user-box">
                        <h1>Hubo un error al momento de registrarte en nuestro curso, por favor intenta de nuevo</h1>
                        <h2>Si el error persiste, favor de comunicarte con administración</h2>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
<?php
}
?>