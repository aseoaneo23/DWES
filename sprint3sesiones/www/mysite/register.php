<?php
//Establecemos conexión con nuestra base de datos.
$db = mysqli_connect('localhost','root','1234','mysitedb') or die('Fallo al conectar con la base de datos');
//Guardamos la info de los formularios en variables.
$name = $_POST['f_name'];
$surname = $_POST['f_surname'];
$email = $_POST['f_email'];
$passwd = $_POST['f_passwd'];
$rpasswd = $_POST['f_rpasswd'];

//Controlamos que las contraseñas coincidan.
if ($passwd != $rpasswd){
    die('¡Las contraseñas no coinciden! Vuelve a la página de registro e inténtalo de nuevo.');
}
//Comprobamos que no quede ningún campo vacío.
if ($name == null or $surname == null or $email == null or $passwd == null or $rpasswd == null){
    die('No puedes dejar ningún campo vacío. Vuelve a la página de registro.');
}

//Preparamos la consulta de comprobar si el email ya existe y evitamos inyecciones de SQL.
$consultaUsuario = $db->prepare("SELECT count(*) FROM tUsuarios WHERE email = ?");
$consultaUsuario->bind_param("s",$email);
$consultaUsuario->execute();
$resultado = $consultaUsuario->get_result();//Guardamos en una variable la consulta preparada.
$unaFila = $resultado->fetch_row();//cogemos la primera y única fila que devuelve la consulta.

//Comprobamos que no esté registrado ese email.
if($unaFila[0] > 0){
    echo "Este email ya está registrado, prueba con otro";
}
$consultaUsuario->close();
//Encriptamos la contraseña con una función HASH.
$phash = password_hash($passwd, PASSWORD_DEFAULT);
$insertarUsuario = $db->prepare("INSERT INTO tUsuarios VALUES (0,?,?,?,?)");
$insertarUsuario->bind_param("ssss",$name,$surname,$email,$phash);
$insertarUsuario->execute();//Introducimos los datos a la base de datos.
$insertarUsuario->get_result();
$insertarUsuario->close();

//INICIAMOS SESIÓN AL REGISTRARSE
$id_usuario_nuevo = $db->prepare('SELECT id FROM tUsuarios WHERE email = ?');
$id_usuario_nuevo->bind_param('s',$email);
$id_usuario_nuevo->execute();
$resultado = $id_usuario_nuevo->get_result();
$unaFila = $resultado->fetch_row();
session_start();
$_SESSION['userId'] = $unaFila[0];
header('Location: main.php');

mysqli_close($db);
?>

