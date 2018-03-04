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
            $arrayCookie = array();                
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