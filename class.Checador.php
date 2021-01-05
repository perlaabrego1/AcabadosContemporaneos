<html>
    <head>
        <title>Acabados Contemporaneos</title>
        <!-- CSS BOOTSTRAP-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <script src="scripts/bootstrap.js"></script>
        <style type="text/css">
            #h3{text-align: center; padding: 12px; color: #F7F9F9; font-family: century gothic; font-size:25px; }
        </style>
    </head>
<?php
    date_default_timezone_set('America/Tijuana');
    class Checador{
        function consultaChecada($con_mysql, $usr)
        {
            $comando = "call consultarChecada($usr);";
            $consulta = mysqli_query($con_mysql, $comando);
            $c = 0;
            if($consulta)
            {
                $cant_filas = mysqli_num_rows($consulta);
                if($cant_filas != 0)
                {
                    $contador = 0;
                    while($cant_filas != 0 && $contador<$cant_filas)
                    {
                        $dato = $consulta->fetch_object();
                        
                        echo"
                        <th scope='col'>$dato->idEmpleado</th>
                        <th scope='col'>$dato->fechaAsist</th>
                        <th scope='col'>$dato->hora</th>";
                        $c1 = $dato->dia1;
                        $c2 = $dato->dia2;
                        $c3 = $dato->dia3;
                        $c4 = $dato->dia4;
                        $c5 = $dato->dia5;
                        $c6 = $dato->dia6;
                        $contador++;
                    }
                    $dia = date("N");
                    if($dia == "1")
                        $c = $c1;  
                    if(date("N") == "2")
                        $c = $c2;
                    if(date("N") == 3)
                        $c = $c3;
                    if(date("N") == 4)
                        $c = $c4;
                    if(date("N") == 5)        
                        $c = $c5;
                    if(date("N") == 6)
                        $c = $c6;
                    echo"<th scope='col'>$c</th>";
                }
            }        
        }
        function Checar($con_mysql, $usr)
        {
            $comando ="call consultarChecada($usr);";
            $consulta = mysqli_query($con_mysql, $comando);
            if($consulta)
            {
                $cant_filas = mysqli_num_rows($consulta);
                if($cant_filas != 0)
                {
                    $contador = 0;
                    while($contador<$cant_filas)
                    {
                        $dato = $consulta->fetch_object();
                        $c1 = $dato->dia1;
                        $c2 = $dato->dia2;
                        $c3 = $dato->dia3;
                        $c4 = $dato->dia4;
                        $c5 = $dato->dia5;
                        $c6 = $dato->dia6;
                        $f = $dato->fechaAsist;
                        $contador++;
                    }
                    if(date("N") == "1")
                        $c = $c1;  
                    if(date("N") == "2")
                        $c = $c2;
                    if(date("N") == "3")
                        $c = $c3;
                    if(date("N") == "4")
                        $c = $c4;
                    if(date("N") == "5")        
                        $c = $c5;
                    if(date("N") == "6")
                        $c = $c6;
                }
            }
            $F = date("Y"). "-" .date("m"). "-" . date("d");
            if($c < 4 || $f != $F)
            {
                $c = $c + 1;
                mysqli_close($con_mysql);
                $con_mysql = mysqli_connect("127.0.0.1", "root", "", "checador_db") or die ("Problemas de conexión");
                $comando = "select max(NoFolio) as 'max' from listaemp";
                $consulta = mysqli_query($con_mysql, $comando);
                if($consulta)
                {
                    $cant_filas = mysqli_num_rows($consulta);
                    if($cant_filas != 0)
                    {
                        $contador = 0;
                        while($contador<$cant_filas)
                        {
                            $dato = $consulta->fetch_object();
                            $fol = $dato->max;
                            $contador++;
                        }
                    }
                }
                switch(date("N"))
                {
                    case 1:
                        
                        $comando = "update ListaEmp set fechaAsist = curdate(), hora = (select time (NOW()) ),
                        dia1 = $c, hrC_dia1 = CURRENT_TIMESTAMP where idEmpleado =  $usr and NoFolio = $fol";
                        break;
                    case 2:
                        $comando = "update ListaEmp set fechaAsist = curdate(), hora = (select time (NOW()) ),
                        dia2 = $c, hrC_dia2 = CURRENT_TIMESTAMP where idEmpleado =  $usr and NoFolio = $fol";
                        break;
                    case 3:
                        $comando = "update ListaEmp set fechaAsist = curdate(), hora = (select time (NOW()) ),
                        dia3 = $c, hrC_dia3 = CURRENT_TIMESTAMP where idEmpleado =  $usr and NoFolio = $fol";
                        break;
                    case 4:
                        $comando = "update ListaEmp set fechaAsist = curdate(), hora = (select time (NOW()) ),
                        dia4 = $c, hrC_dia4 = CURRENT_TIMESTAMP where idEmpleado =  $usr and NoFolio = $fol";
                        break;
                    case 5:
                        $comando = "update ListaEmp set fechaAsist = curdate(), hora = (select time (NOW()) ),
                        dia5 = $c, hrC_dia5 = CURRENT_TIMESTAMP where idEmpleado =  $usr and NoFolio = $fol";
                        break;
                    case 6:
                        $comando = "update ListaEmp set fechaAsist = curdate(), hora = (select time (NOW()) ),
                        dia6 = $c, hrC_dia6 = CURRENT_TIMESTAMP where idEmpleado =  $usr and NoFolio = $fol";
                        break;
                }
                $consulta = mysqli_query($con_mysql, $comando);
                if(!$consulta){ echo mysqli_error($con_mysql); }
                if ($c == 4)
                { echo "<h3 id='mensaje'>Ya has terminado tu jornada laboral</h3>"; }
                mysqli_close($con_mysql);
            }
            else { echo "<h3 id='mensaje'>Ya has terminado tu jornada laboral</h3>"; }
        }      
        function Cantidad ($c)
        {
            #Aqui va la condicion del conteo de horas trabajadas para registrarlas en  hrsTrabajadas_dia1 int,
            switch($c)
            {
                case 1:
                    break;
                case 2:
                    break;
                case 3:
                    break;
                case 4:
                    break;
                default:
                break;
            }
        }
    }
?>