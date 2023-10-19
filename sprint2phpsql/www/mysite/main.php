<?php
  $db = mysqli_connect('localhost','root','1234','mysitedb') or die('No se ha realizado la conexión');
?>
<html>
 <head>
  <style>
	body{
	  margin: auto;
	}

	img{
	  width:250px;
	  height:150px;
        }
	#nom{
	  font-family: Verdana;
	  font-size: 20px;
	}
	#num{
	  font-family: Verdana;
	  font-weight: bolder;
	}
	td{
	  text-align: center;
	}
	#est{
	  font-variant: small-caps;
	  font-size: 18px;
	}
	#gen{
	  font-style: italic;
	  font-size: 18px;
	}
  </style>
 </head>
 <body>
  <h1>¡Conexión establecida!</h1>
  <table border="solid">
   <tr>
    <th>ID</th>
    <th>NOMBRE</th>
    <th>IMAGEN</th>
    <th>ESTUDIO</th>
    <th>GÉNERO</th>
   </tr>
  <?php
    //Lanzar un query
    $query = 'SELECT * FROM tJuegos';
    $result = mysqli_query($db,$query) or die('Error en la consulta');
    //Recorrer el resultado
    while($row = mysqli_fetch_array($result)){
    echo '<tr>';
    echo '<td id="num"><a href="/detail.php?id='.$row['id'].'">'.$row['id'].'</a></td>';
    echo '<td id="nom">'.$row['nombre'].'</td>';
    $url = $row['url_imagen'];
    echo '<td><img src="'.$url.'"></td>';
    echo '<td id="est">'.$row['estudio'].'</td>';
    echo '<td id="gen">'.$row['género'].'</td>';
    echo '</tr>';
    }
    mysqli_close($db); 
  ?>
  </table>
 </body>
</html>
