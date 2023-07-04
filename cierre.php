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
$sql = "SELECT * FROM eventos ORDER BY fechas";
$resultado = mysqli_query($link, $sql);

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
    <link rel="nav" href="./style_nav.css">
    <link rel="stylesheet" href="./style_calendario.css">

    <style>
        .tile {
            background-color: <?php echo $color; ?> !important;
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
                <marquee>notificación mensual - notificación mensual - notificación mensual - notificación mensual </marquee>
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
                <section class="service-section">
                    <h2>PROXIMAS REUNIONES</h2>
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
                    <div class="mobile-only">
                        <button class="flat-button">
                            Buscar
                        </button>
                    </div>
                    <?php
                    if (isset($_GET['giro']) && $_GET['filtros'] == 'true') {
                        $giro = $_GET['giro'];

                        $consulta = "SELECT Nombre, fechas, categoria, id_curso from eventos WHERE categoria = '$giro'";
                        $respuesta = mysqli_query($conn, $consulta);


                        if (mysqli_num_rows($respuesta) > 0) {
                            while ($row = mysqli_fetch_assoc($respuesta)) {
                                $color = $colores[$i];
                                $i++;
                                $contador++;

                    ?>
                                <div class="tiles">
                                    <article class="tile" style="background-color: <?php echo $color ?>">
                                        <div class="tile-header">
                                            <i class="ph-lightning-light"></i>
                                            <h3>
                                                <span style="color:black"> <?php echo " " . $row["Nombre"]; ?> </span>
                                                <span style="color:black"> <?php echo " " . $row["fechas"]; ?> </span>
                                                <span style="color:black"> <?php echo " " . $row["categoria"]; ?> </span>
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
                            }
                            if ($i >= count($colores)) {
                                $i = 0;
                            }
                            if ($contador == 3) {
                                echo "<br>";
                                $contador = 0;
                            }
                        } else {
                            echo '<script type="text/javascript">
								alert("Wrong username or password. Please check your credentials.");
								window.location.href="index.php";
								</script>';
                        }
                    } else {
                        if (mysqli_num_rows($resultado) > 0) {
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                $color = $colores[$i];
                                $i++;
                                $contador++;
                            ?>
                                <div class="tiles">
                                    <article class="tile" style="background-color: <?php echo $color ?>">
                                        <div class="tile-header">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checklist" width="45" height="45" viewBox="0 0 24 24" stroke-width="1" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9.615 20h-2.615a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8" />
                                                <path d="M14 19l2 2l4 -4" />
                                                <path d="M9 8h4" />
                                                <path d="M9 12h2" />
                                            </svg>
                                            <h3>
                                                <span style="color:black"> <?php echo " " . $fila["Nombre"]; ?> </span>
                                                <span style="color:black"> <?php echo " " . $fila["fechas"]; ?> </span>
                                                <span style="color:black"> <?php echo " " . $fila["categoria"] ?> </span>
                                            </h3>
                                        </div>
                                        <form action="cierre_curso.php" method="POST">
                                            <input type="hidden" name="curso_id" value="<?php echo $fila['id_curso']; ?>">
                                            <button>
                                                <span>Registrar cierre </span>
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
				alert("Wrong username or password. Please check your credentials.");
				window.location.href="index.php";
				</script>';
                        }
                    }
                    ?>
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
    </div>
    <script src='https://unpkg.com/phosphor-icons'></script>
    <script src="./script.js"></script>

</body>

</html>