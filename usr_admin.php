<html>
    <head>
        <title>Acabados Contemporaneos</title>
        <!-- CSS BOOTSTRAP-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="scripts/jquery-3.4.1.js"></script>
        <script src="scripts/bootstrap.js"></script>
        <style type="text/css">
            body{background-image:url(img/fondo.jpg);  background-size: cover;color:black; text-align: center;}   
            * {padding: 0; margin: 0; font-family: century gothic; text-align: center;}
            form {border-radius: 20px;box-shadow: inset 0 0 0 var(--border-size) currentcolor;padding: 50px 50px; background-color: #001a1a66; margin: calc(25% + 50px); margin-top: 70px; padding-top: 28px; margin-bottom: 50px}
            strong{text-align: center; padding: 12px; color: #F7F9F9; font-family: century gothic; font-size:30px }
            h4{text-align: center; padding: 12px; color: #F7F9F9; font-family: century gothic; font-size:25px }
            button {width: calc(100% - 20px); padding: 9px; margin: auto; margin-top: 12px; font-size: 16px}
            button[type='submit']{background-color: #000066; color: #fff; width: calc(80% - 20px); margin: 0 10%; margin-top: 50px; border: none;}
            .button:hover {background-color: #006699}     
            #texto{font-family: 'Lucida Sans', 'Lucida Sans Regular',  'Lucida Sans Unicode', Geneva, Verdana, sans-serif;text-align: center;font-size:50px; padding: 12px;color:black; }   
        </style>
    </head>
    
    <body>
        <nav class="navbar navbar-light" style="background-color: #F7F9F9">
            <div class="navbar-brand">
                <img id="usuario" src="img/logo.png" ></img>
            </div>
        </nav>
        <div id="texto">
        <strong id="texto">¡BIENVENIDO!</strong>
        </div>
        <form id = "form-ingresar" action="login.php" method="post">
            <strong>SOMOS DISTRIBUIDORES</strong>
            <h4>DIRECTOS DE LAS MEJORES MARCAS</h4>
            <button  type="submit" class="button">Ingresar</button>
        </form>  
    </body>
</html>