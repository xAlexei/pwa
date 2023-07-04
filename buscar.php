<?php
session_start();

if (!isset($_SESSION["user"])) {
	header("Location: calendario.php");
}

$user = $_SESSION["username"];
require_once "config.php";
$conn = $link;

$giro = $_POST["giro"];

if($conn -> connect_error)
{
    die('Error de conexión' . $conn->connect_error);
}

$sql = "SELECT * FROM eventos";
$resultado = $conn->query($sql);

if ($resultado->num_rows>0) {
    $cursos = array();

    while($row = $resultado->fetch_assoc()){
        $cursos[] = $row;
    }
}
else {
    echo "No se encontraron cursos";
}

$cursosFiltrados = array_filter($cursos, function ($curso) use ($giro) {
    // Verificar si la clave 'categoria' está definida en el arreglo $curso
    if (isset($curso['giro'])) {
        // Comparar la categoría solo si está definida en el arreglo $curso
        return $curso['giro'] === $giro;
    }
    
    return false; // Si no se encuentra la clave 'categoria', se descarta el curso
});


header("Location: calendario.php?giro=$giro&filtros=true");

?>