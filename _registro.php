<html>
    <head>
        <title>Acabados Contemporaneos</title>
        <!-- CSS BOOTSTRAP-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="scripts/jquery-3.4.1.js"></script>
        <script src="scripts/bootstrap.js"></script>
        <style type="text/css">
            body{background-image:url(img/login3.jpg);  background-size: cover;color:black;}   
            * {padding: 0; margin: 0; font-family: century gothic; text-align: center;}
            form {border-radius: 20px;box-shadow: inset 0 0 0 var(--border-size) currentcolor;padding: 50px 50px; background-color:#001a1a66; margin: calc(25% + 50px); margin-top: 70px; padding-top: 28px; margin-bottom: 50px}
            strong{text-align: center; padding: 12px; color: #F7F9F9; font-family: century gothic; font-size:40px }
            h4{text-align: center; padding: 12px; color: #F7F9F9; font-family: century gothic; font-size:25px }
            button {width: calc(100% - 20px); padding: 9px; margin: auto; margin-top: 12px; font-size: 16px}
            button[type='submit']{background-color: #000066; color: #fff; width: calc(80% - 20px); margin: 0 10%; margin-top: 50px; border: none;}
            .button:hover {background-color: #006699}   
            #salir{width: 50px; padding: 9px; margin: auto; margin-top: 12px; font-size: 16px;background-color: red; color: #fff; width: calc(80% - 20px); margin: 0 10%; margin-top: 50px; border: none;} 
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
        <form id = "form-ingresar" action="registro.php" method="post">
        <div class="form-group" align="center">
                    <img id="usuario" src="img/usuario.png" ></img>
                </div>
            <?php
                $con_mysql = mysqli_connect("127.0.0.1", "root", "", "checador_db") or die ("Problemas de conexión");
                echo'<select name = empleados required>';
                $comando = "call consultaListaEmp();";
                $consulta = mysqli_query($con_mysql, $comando);
                $cant_filas = mysqli_num_rows($consulta);
                if($cant_filas == 0)
                    echo '<option value="" disabled selected>No se cuenta registrado</option>';
                else{
                    $contador = 0;
                    echo '<option value="" disabled selected>Seleccione su ID</option>';
                    while($cant_filas != 0 && $contador<$cant_filas)
                    {
                        $dato = $consulta->fetch_object();
                        $contenido = $dato->idEmpleado;
                        echo '<option value = '.$contenido.'>'.$contenido.'</option>';
                        $contador++;
                    }
                }
                echo'</select>';
            ?>  
            <button  type="submit" class="button">Checar</button>
        </form>
        <div>
       
        </div>
    </body>
</html>