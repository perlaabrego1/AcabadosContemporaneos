<html>
    <head>
        <title>Acabados Contemporaneos</title>
        <!-- CSS BOOTSTRAP-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="scripts/bootstrap.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <style type="text/css">
          body{background-image:url(img/fondoinicio3.jpg);  background-size: cover;color:black;}   
            * {padding: 0; margin: 0; font-family: century gothic; text-align: center;}
            #principal{display: block; width: 100%; height: 100%; min-width: 900; min-height: 640; max-height: 100%; }
            form {  margin: 0 auto;align-content: center;width: 800px; height:80%;}
            #form-ingresar{position: absolute;}
            strong{text-align: center; padding: 12px; color: maroon; font-family: century gothic; font-size:30px }
            h4{text-align: center; padding: 12px; color: #F7F9F9; font-family: century gothic; font-size:25px }
            button {width: calc(100% - 20px); padding: 9px; margin: auto; margin-top: 12px; font-size: 20px}
            button[type='submit']{background-color: #000066; color: #fff;  width: 300px; margin: 0 10%; margin-top: 30px; border: none;}
            .button:hover {background-color: #006699} 
            .boton1{background-color: #ff9933; border-radius: 20px; width: 150px; padding: 9px; margin: auto;  font-size: 20px; color: black;  border: none;border-width: 1px;border-style: solid;border-color: black;}
            input{font-size:20px}
            #empleado{font-size:20px}
            #usuario{width: 30%; }
            #datos{font-size:30px; color: Maroon;background-color: #ff8080;}
            #datos2{text-align: center;}
            h3{text-align: center; padding: 12px; color: #F7F9F9; font-family: century gothic; font-size:10px;} 
            #general{margin:auto; margin-top:50px; width:960px;  margin-bottom: 2px; }
            #texto2{color: white; letter-spacing: .1em;text-shadow: 0 -1px 0 #fff, 0 1px 0 #2e2e2e, 0 2px 0 #2c2c2c, 0 3px 0 #2a2a2a; font-size: 30px;}   
            #emp{margin-top:90px;margin-left:27px; width:900px; height:80%;  color:white; background: rgba(0,0,0,.5);}
            .wrap {width: 60%;margin: auto;color:#fff;margin-left:25%; }
            .widget {width: 100%;height: 60%; }
            .widget p {display: inline-block;line-height: 1em;}
            .fecha {font-family: Oswald, arial;text-align: center;font-size: 30px;margin-bottom: 2px;background: rgba(0,0,0,.5);padding: 20px;width: 100%;}
            .reloj {font-family:Oswald, arial;width: 100%;font-size: 50px;text-align: center;background: rgba(0,0,0,.5);}
            .reloj .cajaSegundos {display: inline-block;  }
            .reloj .ampm, .reloj .segundos{display: block;font-size: 2rem;}
            #chequeo{width:840px; height:200px; margin-bottom: 2px; }
            thead{color:black}
            #mensaje{text-align: center; padding: 12px; color: #F7F9F9; font-family: century gothic; font-size:25px; }
        </style>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    </head>
    
    <body>
        <div id = "principal">
            <nav class="navbar navbar-light" style="background-color: #0c1a27">
                <div class="navbar-brand">  
                    <button onclick="location.href='consulta.php'" class="boton1">
                        <i class="fa fa-reply" aria-hidden="true"></i> Regresar
                    </button>      
                </div>
                <div>
                <button onclick="location.href='index.php'" class="boton1">
	            <i class="fa fa-home" aria-hidden="true"></i> Salir
                </button>
                </div>
            </nav>
            <div id = "general">      
                <form id = "form-ingresar" action="registro.php" method="post">
                    <div id = "chequeo"> 
                        <!--Código del reloj-->
                        <div class="wrap">
                            <div class="widget">
                                <div class="fecha">
                                    <p id="diaSemana" class="diaSemana"></p>, 
                                    <p id="dia" class="dia"></p> 
                                    <p>de</p>
                                    <p id="mes" class="mes"></p> 
                                    <p>del</p>
                                    <p id="anio" class="anio"></p>
                                </div>
                            <div class="reloj">
                                <p id="hora" class="hora"></p> 
                                <p>:</p>
                                <p id="minutos" class="minutos"></p> 
                                <p>:</p>
                                <div class="cajaSegundos">
                                    <p id="ampm" class="ampm"></p>
                                    <p id="segundos" class="segundos"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--<input type=text name= "inp_usr"  placeholder = "ID" required> </input>--> 
                </form>  

            <div id = "emp"> 
                <h2 class="bg-primary">HORAS LABORADAS DEL EMPLEADO</h2><br>
                <h3 ></h3> 
                <table border="1" style="margin: 0 auto;"class="table table-bordered table-hover table-dark ">
                    <thead style="background-color: #ffcc66">
                        <tr>
                        <th  scope="col"># Folio</th>
                        <th  scope="col">ID</th>
                        <th scope="col">Horas Trabajadas dia 1</th>
                        <th scope="col">Horas Trabajadas dia 2</th>
                        <th scope="col">Horas Trabajadas dia 3</th>
                        <th scope="col">Horas Trabajadas dia 4</th>
                        <th scope="col">Horas Trabajadas dia 5</th>
                        <th scope="col">Horas Trabajadas dia 6</th>
                        <th scope="col">Total Horas Trabajadas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php #Verifica datos ingresados
                                date_default_timezone_set('America/Tijuana');
                                include 'class.checador.php';
                                $obj = new Checador();
                                $usr = $_GET['varusr'];
                                $con_mysql = mysqli_connect("127.0.0.1", "root", "", "checador_db") or die ("Problemas de conexión");
                                #echo "<h3 id='dts2'><span id=dts>Los datos ingresados son correctos</span></h3>";
                                $obj->consultaSemana($con_mysql, $usr);
                                #header("Location: registro.php");
                                mysqli_close($con_mysql);
                            ?>
                        </tr>
                    </tbody>
                </table> 
            </div>
        </div>
        <script src="reloj.js"></script>
    </body>
</html>