<html>
    <head>
        <title>Acabados Contemporaneos</title>
        <!-- CSS BOOTSTRAP-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="scripts/jquery-3.4.1.js"></script>
        <script src="scripts/bootstrap.js"></script>
        <style type="text/css">
            body{background-image:url(img/login3.jpg);  background-size: cover;color:black;font-size:25px}   
            * {padding: 0; margin: 0; font-family: century gothic; text-align: center;}
              .boton1{background-color: black; width: 200px; padding: 9px; margin: auto;  font-size: 20px; color: #fff;  border: none;}
            #usuario{width: 30%; height: 25%;}
        </style>
    </head>
    
    <body>
        <nav class="navbar navbar-light" style="background-color: black">
            <div class="navbar-brand">
            <button onclick="location.href='login.php'" class="boton1">Regresar</button>
            </div>
            <div class="salir">
                <button onclick="location.href='index.php'" class="boton1">Salir</button>
            </div>
        </nav>
<?php
    $usr = $_REQUEST['inp_usr'];
    $pswd = $_REQUEST['inp_pswd'];
    $con_mysql = mysqli_connect("127.0.0.1", "root", "", "checador_db") or die ("Problemas de conexión");
    $registro = "select * from _Login where idEmpleado = '$usr' and contraseña = '$pswd';";
    $consulta = mysqli_query($con_mysql, $registro);
    if($consulta)
    {
        $cant_filas = mysqli_num_rows($consulta);
        if($cant_filas != 0)
        {
            header("Location: registro.php");
            #header("Location: usr_admin.php?varUsr=$usr"); Se usaría para llevarlo al perfil de administrador
        }
        else
            echo "USUARIO O CONTRASEÑA INCORRECTOS";
    }
    mysqli_close($con_mysql);
?>
    </body>
    
    </html>