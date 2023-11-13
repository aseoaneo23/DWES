<?php
    $db = mysqli_connect('localhost','root','1234','mysitedb') or die("Error al conectar a la base de datos");
    //Vamos a manipular datos de la sesión
    session_start();

    //Comprobamos que se ha iniciado sesión
    if (!empty($_SESSION['userId'])){
        //Guardamos los datos del cliente en las variables
        $id_user = $_SESSION['userId'];
        $o_password = $_POST['o_password'];
        $n_password = $_POST['n_password'];
        $rn_password = $_POST['rn_password'];
        
        //Comprobamos que las contraseñas nuevas coinciden
        if($n_password != $rn_password){
            echo 'Las contraseñas nuevas no coinciden';
        } else{
            //Preparamos la consulta
            $searchUser = $db->prepare('SELECT contraseña FROM tUsuarios WHERE id = ?');
            $searchUser->bind_param('i',$id_user);
            $searchUser->execute();
            $result = $searchUser->get_result();
            $onlyRow = $result->fetch_row();//Guardamos la info de celda en una variable.

            //Comprobamos que la contraseña antigua sea la de la cuenta.
            if(password_verify($o_password,$onlyRow[0]) == 0){
                echo 'La contraseña actual es incorrecta';
            } else {
                //Hasheamos la contraseña nueva y la insertamos.+
                $phash = password_hash($n_password, PASSWORD_DEFAULT);
                $newPasswdQuery = $db->prepare('UPDATE tUsuarios SET contraseña = ? WHERE id = ?');
                $newPasswdQuery->bind_param('si',$phash,$id_user);
                $newPasswdQuery->execute();
                echo '<p>Contraseña cambiada con éxito</p>';
            }
        }
    } else{
        echo '¡Debes iniciar sesión previamente!';
    }
    mysqli_close($db);
?>