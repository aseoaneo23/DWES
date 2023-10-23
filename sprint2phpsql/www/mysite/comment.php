<?php
  $db = mysqli_connect('localhost','root','1234','mysitedb') or die("Error al conectar a la base de datos");
?>
<html>
  <body>
    <?php
	$id_juego = $_POST['id_juego'];
	$comentario = $_POST['new_comment'];	

	$query = "INSERT INTO tComentarios(comentario, usuario_id, juego_id, timestamp) VALUES ('".$comentario."',NULL,".$id_juego.",now())";

	mysqli_query($db, $query) or die('Error');

	echo "<p>Nuevo comentario nº ";
	echo mysqli_insert_id($db);
	echo " añadido</p>";

	echo "<a href='/main.php'>Volver</a>";
	mysqli_close($db);
    ?>
  </body>
</html>
