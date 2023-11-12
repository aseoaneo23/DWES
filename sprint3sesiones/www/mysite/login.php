<?php
//Conectamos con la bd
$db = mysqli_connect('localhost','root','1234','mysitedb') or die('Error al conectar con la base de datos');
//Guardamos info del form en variables.
$email_posted = $_POST['f_email'];
$password_posted = $_POST['f_password'];
//Preparamos la consulta de forma segura para comprobar si usuario existe.
$query = $db->prepare("SELECT id, contraseña FROM tUsuarios WHERE email = ? ");
$query->bind_param("s",$email_posted);
$query->execute();
$secureQuery = $query->get_result();
$onlyRow = $secureQuery->fetch_row();

if(mysqli_num_rows($secureQuery) > 0){
    if(password_verify($password_posted,$onlyRow[1]) == 1){
        session_start();
        $_SESSION['userId'] = $onlyRow[0];
        header('Location: main.php');
    } else {
        echo '<p>Contraseña incorrecta</p>';
    
    }
} else {
    echo '<p>Usuario no encontrado con el email indicado</p>';
}

mysqli_close($db);
?>