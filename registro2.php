<html>
    <head>
        <title>Acabados Contemporaneos</title>
        <!-- CSS BOOTSTRAP-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <script src="scripts/bootstrap.js"></script>
        <style type="text/css">
            body{background-image:url(img/login3.jpg);  background-size: cover;color:black;}   
            * {padding: 0; margin: 0; font-family: century gothic; text-align: center;}
            #principal{display: block; width: 100%; height: 100%; min-width: 900; min-height: 640; max-height: 100%;}
            form {box-shadow: inset 0 0 0 var(--border-size) currentcolor; background-color: #001a1a66;  margin: 0 auto;align-content: center;border: 1px solid #666666;width: 790px; height:85%;}
            #form-ingresar{position: absolute;}
            strong{text-align: center; padding: 12px; color: maroon; font-family: century gothic; font-size:30px }
            h4{text-align: center; padding: 12px; color: #F7F9F9; font-family: century gothic; font-size:25px }
            button {width: calc(100% - 20px); padding: 9px; margin: auto; margin-top: 12px; font-size: 20px}
            button[type='submit']{background-color: #000066; color: #fff;  width: 300px; margin: 0 10%; margin-top: 30px; border: none;}
            .button:hover {background-color: #006699} 
            .boton1{background-color: #F7F9F9; width: 200px; padding: 9px; margin: auto;  font-size: 20px; color: black;  border: none;border-width: 1px;border-style: solid;border-color: black;}
            input{font-size:20px}
            #empleado{font-size:20px}
            #usuario{width: 30%; }
            #datos{font-size:30px; color: Maroon;background-color: #ff8080;}
            #datos2{text-align: center;}
            #dts{font-size:30px; color: #00cc00;background-color: #b3ffb3;}
            #dts2{text-align: center; font-size:10px;}
            h3{text-align: center; padding: 12px; color: #F7F9F9; font-family: century gothic; font-size:10px;} 
            #dch{float: right;  height: 85%; width:48%; background-color: black; color: white; } 
            #texto2{color: white; letter-spacing: .1em;text-shadow: 0 -1px 0 #fff, 0 1px 0 #2e2e2e, 0 2px 0 #2c2c2c, 0 3px 0 #2a2a2a; font-size: 30px;}   
            #emp{margin-top:50px}
        </style>
    </head>
    
    <body>
        <div id = "principal">
            <nav class="navbar navbar-light" style="background-color: #F7F9F9">
                <div class="navbar-brand">
                    <img src="img/logo.png" ></img>
                </div>
                <div>
                    <button onclick="location.href='index.php'" class="boton1">Salir</button>
                </div>
            </nav>
            <div id = "izq">      
                <form id = "form-ingresar" action="registro.php" method="post">
                <div id = "emp"> 
                <strong id="texto2">INGRESE SU ID Y CONTRASEÑA</strong>
                    <div class="form-group" align="center">
                            <img id="usuario" src="img/usuario.png" ></img>
                        </div>
                    <h4></h4>
                    <!--<input type=text name= "inp_usr"  placeholder = "ID" required> </input>-->
                    <?php #Genera los empleados activos en ese momento
                        include 'class.checador.php';
                        $obj = new Checador();
                        $con_mysql = mysqli_connect("127.0.0.1", "root", "", "checador_db") or die ("Problemas de conexión");
                        echo'<select id=empleado name = inp_usr required>';
                        $comando = "call consultaListaEmp();";
                        $consulta = mysqli_query($con_mysql, $comando);
                        $cant_filas = mysqli_num_rows($consulta);
                        if($cant_filas == 0)
                            echo '<option value="" disabled selected>No hay empleados registrados</option>';
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
                    <input type=password name= "inp_pswd"  placeholder = "Contraseña" required> </input>
                    <button  type="submit" class="button">Checar</button>
                </form>  
            </div>

            <div id = "dch">
            <div id = "emp"> 
                <h2>INFORMACIÓN DE EMPLEADO</h2>
                <table border="1" style="margin: 0 auto;"class="table table-bordered table-hover table-light ">
                    <thead class="thead-dark ">
                        <tr>
                        <th  scope="col">ID</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php #Verifica datos ingresados
                                date_default_timezone_set('America/Tijuana');
                                if($_POST)
                                {
                                    $usr = $_REQUEST['inp_usr'];
                                    $pswd = $_REQUEST['inp_pswd'];
                                    $con_mysql = mysqli_connect("127.0.0.1", "root", "", "checador_db") or die ("Problemas de conexión");
                                    $comando = "select * from _Login where idEmpleado = '$usr' and contraseña = '$pswd';";
                                    $consulta = mysqli_query($con_mysql, $comando);
                                    if($consulta)
                                    {
                                        $cant_filas = mysqli_num_rows($consulta);
                                        if($cant_filas != 0)
                                        {
                                            echo "<h3 id='dts2'><span id=dts>Los datos ingresados son correctos</span></h3>";
                                            mysqli_close($con_mysql);
                                            $con_mysql = mysqli_connect("127.0.0.1", "root", "", "checador_db") or die ("Problemas de conexión");
                                            $obj->Checar($con_mysql, $_REQUEST['inp_usr']);
                                            $con_mysql = mysqli_connect("127.0.0.1", "root", "", "checador_db") or die ("Problemas de conexión");
                                            $obj->consultaChecada($con_mysql, $usr);
                                            #header("Location: registro.php");
                                        }
                                        else
                                            echo "<h2 id='datos2'><span id=datos><strong>¡Error!</strong>Los datos ingresados son incorrectos</span></h2>";
                                    }
                                }
                                #Aqui irian las dos funciones***
                            ?>
                        </tr>
                    </tbody>
                </table> 
            </div>
            </div>
        </div>
    </body>
</html>