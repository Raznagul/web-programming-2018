<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tarea Porgramada 2</title>
</head>
<body>

    <?php
        $arrayCookie = isset($_COOKIE['eventos'])? unserialize($_COOKIE['eventos']): null;

        echo 'init php part';
        if (!isset($arrayCookie)){
            echo 'Array being created';
            <html>
            <head>
                <title>Tarea1</title>
            </head>
            <body>
                <h1><a href="index.php">Home</a></h2>
                <h1>Conversiones</h1>
                <?php
                $formularios = array("Longitud", "Superficie", "Volumen", "Capacidad", "Peso", "Velocidad potencia");
                $longitud = array("Milimetros", "Pulgadas", "Centimetros", "Metros", "Pies", "Yardas", "Brazas", "Kilometros", "Millas Tierra", "Millas Mar (EU)", "Millas Mar (RU)");
                $superficie = array("Longitud", "Superficie", "Volumen", "Capacidad", "Peso", "Velocidad potencia");
                $volumen = array("Centimetros 3", "Metros 3", "Pulgadas 3", "Pies 3", "Yardas 3", "Galones (EU)", "Galones (RU)");
                $capacidad = array("Litros", "Pulgadas 3", "Pies 3", "Galones (EU)", "Pintas liquidas", "Hectolitros");
                $peso = array("Gramos", "Onzas (Av.)", "Onzas (Troy)", "Kilogramos", "Libras (Av.)", "Libras (Troy", "Toneladas 3", "Toneladas (EU)", "Toneladas (RU)");
                $velocidadPotencia = array("Kilometros por hora", "Millas hora", "Kilometros hora", "Nudos", "Caballos de vapor", "Caballos de fuerza");
                foreach($formularios as $formulario){
                echo $formulario;
        
                ?>
                <form action="'. htmlentities($_SERVER["PHP_SELF"]).'" method="GET">
                      <fieldset>
                        <label>
                            Quiero convertir:
                            <input name="food[]" value="Italian" />
                        </label>
                        <label>
                            <select>
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="mercedes">Mercedes</option>
                                <option value="audi">Audi</option>
                            </select>
                        </label>
                        <label>
                            a
                            <select>
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="mercedes">Mercedes</option>
                                <option value="audi">Audi</option>
                            </select>
                        </label>
                        <label>
                            Resultado:  
                        </label>
                        <input type="submit" value="Go!" />
                        </fieldset>
                </form> 
                <?php
        
                }
                ?>
            </body>
        </html> $arrayCookie = array();                
        }
        
        if(isset($_POST['evento'])){
            $evento = array(
                'fecha' => $_POST['fecha'],
                'hora' => $_POST['hora'],
                'evento' => $_POST['evento']
            );
            $arrayCookie[] = $evento;
            $arrayCookie = array_values($arrayCookie);
            echo 'after insert';
            var_dump($arrayCookie);
        }
        if(isset($_POST['eventoEliminar'])){
            $index = $_POST['eventoEliminar'];
            echo 'index for elimination';
            var_dump($index);
            unset($arrayCookie[$index]);
            $arrayCookie = array_values($arrayCookie);
            echo 'ELIMINATION';
            var_dump($arrayCookie);
        }
        
    ?>
    <h1>Calendario de eventos</h1>
    <form action="" method="POST">
        <label for="fecha">Fecha del evento</label>
        <input name="fecha" type="date">
        <br>

        <label for="hora">Hora del evento</label>
        <input name="hora" type="time">
        <br>

        <label for="evento">Evento</label>
        <input name="evento" type="text">
        <br>

        <button type="submit">Enviar</button>

    </form>
    
    <h2>Lista de eventos creados</h2>

    <?php
        //  var_dump($arrayCookie);
        if(isset($arrayCookie)){
            echo 'printing form';
            foreach ($arrayCookie as $key => $value) {
                echo '<form action="" method="POST">';
                
                echo $value['fecha'].'hora ->'.$value['hora'].' evento -> '.$value['evento'].' index -> '.$key;
                echo '<input hidden type="text" name="eventoEliminar" value="'.$key.'">';
                echo '<button type="submit">Eliminar</button>';
                echo '<br>';
                echo '</form>';
            }
        }
        
        setcookie('eventos', serialize($arrayCookie));  
    ?>

</body>
</html>