<?php
#se realizara el registro de checadas
    $usr = $_REQUEST['inp_usr'];
    $con_mysql = mysqli_connect("127.0.0.1", "root", "", "checador_db") or die ("Problemas de conexión");
    $registro = "select * from ListaEmp where idEmpleado = '$usr' and contraseña = '$pswd';";
    $consulta = mysqli_query($con_mysql, $registro);
    if($consulta)
    {
        $cant_filas = mysqli_num_rows($consulta);
        if($cant_filas != 0)
            header("Location: registro.php");
        else
            echo "USUARIO O CONTRASEÑA INCORRECTOS";
    }
    mysqli_close($con_mysql);
?>