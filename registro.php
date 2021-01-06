<html>
    <head>
        <title>Acabados Contemporaneos</title>
        <!-- CSS BOOTSTRAP-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <script src="scripts/bootstrap.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <style type="text/css">
            body{background-image:url(img/entrarr.jpg);  background-size: cover;color:black;}   
            * {padding: 0; margin: 0; font-family: century gothic; text-align: center;}
            #principal{display: block; width: 100%; height: 100%; min-width: 800; min-height: 640; max-height: 100%;}
            form {border-radius: 20px;box-shadow: inset 0 0 0 var(--border-size) currentcolor;padding: 30px 30px; background-color: #ffffe666; margin: calc(25% + 60px); font-size: 25px; margin-top: 20px; padding-top: 15px; margin-bottom: 0px}
            #form-ingresar{position: absolute;}
            strong{text-align: center; padding: 12px; color: maroon; font-family: century gothic; font-size:30px }
            h4{text-align: center; padding: 12px; color: #F7F9F9; font-family: century gothic; font-size:25px }
            button {width: calc(100% - 20px); padding: 9px; margin: auto; margin-top: 12px; box-shadow: 0px 3px 0px #373c3c;}
            button[type='submit']{border-radius: 20px;background-color: #003366; color: #fff;  width: 250px; margin: 0 10%; margin-top: 40px; border: none; font-size: 20px;  text-shadow: -3px 3px 10px #000;}
            .button:hover {background-color: #006699;} 
            .boton1{background-color: #ff9933; border-radius: 20px; width: 150px; padding: 9px; margin: auto;  font-size: 20px; color: black;  border: none;border-width: 1px;border-style: solid;border-color: black;}
            input{font-size:20px}
            #usuario{width: 30%; }
            h3{text-align: center; padding: 12px; color: #F7F9F9; font-family: century gothic; font-size:10px;} 
            #texto2{color: #0c1a27; letter-spacing: .1em; font-size: 40px;}   

        </style>
    </head>
    
    <body>
        <div id = "principal">
            <nav class="navbar navbar-light" style="background-color: #0c1a27">
                <div class="navbar-brand">        
                </div>
                <div>
                <button onclick="location.href='index.php'" class="boton1">
	            <i class="fa fa-home" aria-hidden="true"></i> Salir
                </button>
                </div>
            </nav>
                <form id = "form-ingresar" action="registro2.php" method="post">
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
                    <button  type="submit" class="button">
                    <i class="fa fa-sign-out" aria-hidden="true"></i> Checar
                    </button>
                </form>              
        </div>
    </body>
</html>