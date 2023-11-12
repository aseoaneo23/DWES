<?php
  $db = mysqli_connect('localhost','root','1234','mysitedb') or die("Error al conectar a la base de datos");
?>
<html>
  <body>
    <?php
	session_start();//Inicio de manipulación de la sesión
	$id_insertar = 'NULL';//Creamos variable para insert.

	if (!empty($_SESSION['userId'])){
		$id_user_insertar = $_SESSION['userId'];

		$id_juego = $_POST['id_juego'];
		$comentario = $_POST['new_comment']; //guardamos el comment en una variable	

		//guardamos la consulta en una variable.
		$query = $db->prepare("INSERT INTO tComentarios(comentario, usuario_id, juego_id, timestamp) VALUES (?,?,?,now())");
		$query->bind_param('sii',$comentario,$id_user_insertar,$id_juego);		echo'hola';

		$query->execute();


		//mysqli_query($db, $query) or die('Error');

		echo "<p>Nuevo comentario nº ";
		echo mysqli_insert_id($db);
		echo " añadido</p>";
	} else {
		echo '<p>No puedes insertar un comentario porque no estás logueado</p>';

	}


	echo "<a href='/main.php'>Volver</a>";
	mysqli_close($db);
    ?>
  </body>
</html>
