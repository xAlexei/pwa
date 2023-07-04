<?php
session_start();

require_once "config.php";

$username = $_POST["username"];
$password = $_POST["password"];
$pin = $_POST["pin"];

// Create connection
  $conn = $link;

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



/* prepare and bind
$stmt = $conn->prepare("SELECT * FROM users WHERE username = '$username' AND password = '$password';");
$stmt->bind_param("ss", $username, $password);



// set parameters and execute

$stmt->execute();

$result = $stmt->get_result();*/

$consulta="SELECT * from users WHERE username = '$username' AND password = '$password' AND pin = '$pin';";
$result=mysqli_query($conn, $consulta);
$filas=mysqli_num_rows($result);


if ($filas > 0) {
    $_SESSION['username'] = $username;
    header("Location: servicios.php");
}
else {
    echo '<script type="text/javascript">
    alert("Wrong username or password. Please check your credentials.");
    window.location.href="index.php";
    </script>';
    //echo "<script>alert('Wrong username or password. Please check your credentials');</script>";
    //header("Location: index.php");
}

$conn->close();
?>