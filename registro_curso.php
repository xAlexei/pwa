<!DOCTYPE html>
<html lang="en">
<?php
session_start();

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
            <div class="login-box">
                <h2> <img class="logo-fondo" src="avanzare.png" width="50px"> AVANZAMOS</h2>
                <form action="register_curso.php" method="POST">
                    <section class="seccion-perfil-usuario">
                        <div class="perfil-usuario-body">
                            <div class="perfil-usuario-bio">
                                <h3 class="titulo">
                                    REGISTRA TU CURSO
                                </h3>
                            </div>
                            <div class="perfil-usuario-footer">
                                <ul class="lista-datos">
                                    <li><i class="icono fas fa-map-signs"></i> Nombre del curso:</li>
                                    <li><i class="icono fas fa-map-signs"></i><input
                                            style="width: 180%; font-size: 15px; border: none; border-bottom: 1px solid #000;"
                                            type="text" class="Nombre" name="Nombre" autocomplete="off"></li>
                                    <li><i class="icono fas fa-phone-alt"></i> Fecha:</li>
                                    <li><i class="icono fas fa-map-signs"></i><input
                                            style="width: 180%; font-size: 15px; border: none; border-bottom: 1px solid #000;"
                                            type="date" class="fechas" name="fechas" autocomplete="off"></li>
                                    <li><i class="icono fas fa-briefcase"></i> Cupo:</li>
                                    <li><i class="icono fas fa-map-signs"></i><input
                                            style="width: 180%; font-size: 15px; border: none; border-bottom: 1px solid #000;"
                                            type="text" class="cupo" name="cupo" autocomplete="off"></li>
                                    <li><i class="icono fas fa-building"></i> Expositor:</li>
                                    <li><i class="icono fas fa-map-signs"></i><input
                                            style="width: 180%; font-size: 15px; border: none; border-bottom: 1px solid #000;"
                                            type="text" class="creador" name="creador" autocomplete="off"></li>
                                    <li><i class="icono fas fa-map-signs"></i> Costo:</li>
                                    <li><i class="icono fas fa-map-signs"></i><input
                                            style="width: 180%; font-size: 15px; border: none; border-bottom: 1px solid #000;"
                                            type="text" class="costo" name="costo" autocomplete="off"></li>
                                    <li><i class="icono fas fa-phone-alt"></i> Descripcion:</li>
                                    <li><i class="icono fas fa-map-signs"></i><input
                                            style="width: 180%; font-size: 15px; border: none; border-bottom: 1px solid #000;"
                                            type="text" class="descripcion" name="descripcion" autocomplete="off"></li>
                                    <li><i class="icono fas fa-briefcase"></i>Categoria:</li>
                                    <li><i class="icono fas fa-map-signs"></i><select style="width: 180%; font-size: 15px; border: none; border-bottom: 1px solid #000;" name="giro" id="giro">
                                            <option value="Moda y Eventos">Moda y Eventos</option>
                                            <option value="Salud">Salud</option>
                                            <option value="Servicios">Servicios</option>
                                            <option value="Construccion">Construcción</option>
                                            <option value="Legal y Contable">Legal y Contable</option>
                                            <option value="Tecnologia y Marketing">Tecnología y Marketing</option>
                                            <option value="Alimentos y Bebidas">Alimentos y Bebidas</option>
                                        </select></li>
                                    <li><i class="icono fas fa-building"></i> Lugar:</li>
                                    <li><i class="icono fas fa-map-signs"></i><input
                                            style="width: 180%; font-size: 15px; border: none; border-bottom: 1px solid #000;"
                                            type="text" class="lugar" name="lugar" autocomplete="off"></li>
                                </ul>
                            </div>
                            <div class="payment-section-footer">
                                <button class="save-button">
                                    Registrar Curso
                                </button>
                            </div>
                        </div>
                    </section>
                </form>
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
</body>

</html>