<?php
  $db = mysqli_connect('localhost','root','1234','mysitedb') or die('No se ha realizado la conexión');
?>
<html>
 <head>
  <style>
	body{
	  box-sizing: border-box;
	  width: 900px;
	  margin: auto;
	}
	h1{
	  text-align: center;
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
	table{
		margin: auto;
	}
	td{
	  background-color: #b9c6eb;
	  text-align: center;
	  padding: 20px;
	}
	th{
	  background-color: #b9ebe0;
	}
	#est{
	  font-variant: small-caps;
	  font-size: 18px;
	}
	#gen{
	  font-style: italic;
	  font-size: 18px;
	}
	.logout{
		position: fixed;
		top:10px;
		left:80%;
		color: black;
		text-decoration: none;
	}
	
  </style>
 </head>
 <body>
  <h1>¡Bienvenido a la página principal!</h1><a class="logout" href="logout.php">->Logout</a>
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
    //Recorrer el resultado e ir asignando a cada tr la celda de info que le corresponde.
    while($row = mysqli_fetch_array($result)){
      echo '<tr>';
      echo '<td id="num"><a href="/detail.php?id='.$row['id'].'">'.$row['id'].'</a></td>';
      echo '<td id="nom">'.$row['nombre'].'</td>';
      $url = $row['url_imagen'];
      echo '<td><img src="'.$url.'" hspace=30px></td>';
      echo '<td id="est">'.$row['estudio'].'</td>';
      echo '<td id="gen">'.$row['género'].'</td>';
      echo '</tr>';
    }
    mysqli_close($db); 
  ?>
  </table>
 </body>
</html>
