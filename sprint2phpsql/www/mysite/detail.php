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
	$query2 = 'SELECT * FROM tComentarios WHERE id='.$id_juego;
	$result2 = mysqli_query($db,$query2) or die('Error de consulta');
	while ($row = mysqli_fetch_array($result2)) {
	  echo '<li>'.$row['comentario'].'</li>';
	}
	mysqli_close($db);
     ?>
    </ul>
   </body>
</html>
