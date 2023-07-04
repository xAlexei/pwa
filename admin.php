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

//variables necesarias para las consultas
$mesActual = date('m'); //obtencion del mes actual
$añoActual = date('Y'); //obtencion del año actual 

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

//obtencion de los datos para las tablas de admin
$sqlMes = "SELECT SUM(inscritos * costo) as dinero_mes FROM eventos WHERE MONTH(fechas) = '$mesActual'";
$queryMes = mysqli_query($link, $sqlMes);

$sqlAño = "SELECT SUM(inscritos * costo) as dinero_anio FROM eventos WHERE YEAR(fechas) = '$añoActual'";
$queryAño = mysqli_query($link, $sqlAño);

//calculo del dinero generado en el mes
$dineroMes = 0;
while ($filaMes = mysqli_fetch_assoc($queryMes)) {
    $dineroMes += $filaMes['dinero_mes'];
}

//calculo del dinero generado por año
$dineroAño = 0;
while ($filaAño = mysqli_fetch_assoc($queryAño)) {
    $dineroAño += $filaAño['dinero_anio'];
}

$sqlTopUsuarios = "SELECT id_cuenta, cuenta, COUNT(*) AS total_eventos FROM asistencia GROUP BY id_cuenta, cuenta ORDER BY total_eventos DESC LIMIT 3";
$queryTopUsuarios = mysqli_query($link, $sqlTopUsuarios);

?>

<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AVANZAMOS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="icon" type="image/png" href="avanzare.png">
    <link rel="nav" href="./style_nav.css">
    <link rel="stylesheet" href="./style_calendario.css">
    <script src="chart.js"></script>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        .rank {
            font-weight: bold;
        }

        .gold {
            background-color: gold;
        }

        .silver {
            background-color: silver;
        }

        .bronze {
            background-color: #cd7f32;
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
                    <h2>PANEL ADMINISTRACIÓN</h2>
                    <div class="mobile-only">
                        <button class="flat-button">
                            Buscar
                        </button>
                    </div>
                    <div style="background-color: #fff; border-radius: 8px;">
                        <canvas style="border-radius: 8px;" id="grafica-dinero"></canvas>
                    </div>
                    <script>
                        // Paso 1: Obtén los datos de dinero generado en el mes y en el año
                        // (siguiendo los pasos descritos anteriormente)

                        // Paso 2: Crea la gráfica con Chart.js
                        var ctx = document.getElementById('grafica-dinero').getContext('2d');
                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Mes', 'Año'],
                                datasets: [{
                                    label: 'Dinero Generado',
                                    data: [<?php echo $dineroMes; ?>, <?php echo $dineroAño; ?>],
                                    backgroundColor: ['rgba(255, 248, 120, 1)', 'rgba(54, 162, 235, 1)'],
                                    borderColor: ['rgba(102, 102, 102, 1)', 'rgba(102, 102, 102, 1)'],
                                    borderWidth: 2
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                },
                                elements: {1
                                    line: {
                                        borderColor: 'rgba(255, 255, 255, 1)',
                                        borderWidth: 3
                                    }
                                }
                            }
                        });
                    </script>
                    <?php
                    if ($queryTopUsuarios) {
                        while ($filaTopUsuario = mysqli_fetch_assoc($queryTopUsuarios)) {
                    ?>
                    <div style="border-radius: 18px; width: 25%; margin-top: 30px;">
                        <table>
                            <tr>
                                <th>Posición</th>
                                <th>Usuario</th>
                                <th>Eventos</th>
                            </tr>
                            <tr>
                                <td class="rank gold">1</td>
                                <td>Usuario 1</td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td class="rank silver">2</td>
                                <td>Usuario 2</td>
                                <td>90</td>
                            </tr>
                            <tr>
                                <td class="rank bronze">3</td>
                                <td>Usuario 3</td>
                                <td>80</td>
                            </tr>
                        </table>
                    </div>
                    <?php 
                        }
                    } else {
                        echo "error en la consulta";
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