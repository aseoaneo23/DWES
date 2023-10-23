<?php
  $db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die ('conexión fallida a la bd');
?>
<html>
  <head>
    <style>
     h1{
	font-family:Verdana,sans-serif;
     }
     img{
	width:350px;
	height:250px;
     }
     p{
	font-family:Arial;
	font-weight:bolder;
     }
    </style>
  </head>
  <body>
    <?php
	if(!isset($_GET['id'])) {
	  die('No se ha especificado ningún id de juego');
	}
	$id_juego = $_GET['id'];
	$query = 'SELECT * FROM tJuegos WHERE id='.$id_juego;
	$result = mysqli_query($db, $query) or die('Error en la consulta');
	$onerow = mysqli_fetch_array($result);
	echo '<h1>'.$onerow['nombre'].'</h1>';
	echo '<img src="'.$onerow['url_imagen'].'"/>';
 	echo '<p>Estudio: </p>'.$onerow['estudio'];
	echo '<p>Género: </p>'.$onerow['género'].'<br>';
    ?>
    <h3>Comentarios:</h3>
    <ul>
     <?php
	$query2 = 'SELECT * FROM tComentarios WHERE juego_id='.$id_juego;
	$result2 = mysqli_query($db,$query2) or die('Error de consulta');
	while ($row = mysqli_fetch_array($result2)) {
	  echo '<li>'.$row['comentario'].' Fecha:'.$row['timestamp'].'</li>';
	}
	mysqli_close($db);
     ?>
    </ul><br>
    <p>Deja un comentario:</p>
    <form action="/comment.php" method="post">
	<textarea placeholder="Escriba un comentario..." rows="4" cols="50" name="new_comment"></textarea><br>
	<input type="hidden" name="id_juego" value="<?php echo $id_juego; ?>">
	<input type="submit" value="Comentar">
    </form>
   </body>
</html>
