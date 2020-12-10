<html>
    <head>
        <title>Acabados Contemporaneos</title>
        <!-- CSS BOOTSTRAP-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="scripts/jquery-3.4.1.js"></script>
        <script src="scripts/bootstrap.js"></script>
        <style type="text/css">
            body{background-image:url(img/fondos.jpg);  background-size: cover;color:black; text-align: center; }   
            * {padding: 0; margin: 0; font-family: century gothic; text-align: center;}
            form {box-shadow: inset 0 0 0 var(--border-size) currentcolor;padding: 50px 50px;   margin-top: 70px; padding-top: 28px; margin-bottom: 50px}
            strong{text-align: center; padding: 12px; color: #F7F9F9; font-family: century gothic; font-size:30px }
            h4{text-align: center; padding: 12px; color: #F7F9F9; font-family: century gothic; font-size:25px }
            button {width: 200px; padding: 9px; margin: auto; margin-top: 12px; font-size: 20px}
            button[type='submit']{background-color: #000066; color: #fff; width: 300px; margin: 0 10%; margin-top: 50px; border: none;}
            .button:hover {background-color: #006699}     
            #texto{background-color:#001a1a66;color: #e0dfdc;letter-spacing: .1em;}   
            #texto2{color: #1f262e; letter-spacing: .1em;text-shadow: 0 -1px 0 #fff, 0 1px 0 #2e2e2e, 0 2px 0 #2c2c2c, 0 3px 0 #2a2a2a; font-size: 60px;}   
        
        </style>
    </head>
    
    <body>
        <nav class="navbar navbar-light" style="background-color: #F7F9F9">
            <div class="navbar-brand">
                <img id="usuario" src="img/logo.png" ></img>
            </div>
        </nav>
        <div id="texto2">
        <strong id="texto2">¡BIENVENIDO!</strong>
            </div>
        <div id="texto">
        <form id = "form-ingresar" action="registro.php" method="post">
            <strong>SOMOS DISTRIBUIDORES</strong>
            <h4>DIRECTOS DE LAS MEJORES MARCAS</h4>
            <button  type="submit" class="button">Ingresar</button>
        </form>
        </div>
    </body>
    
</html>