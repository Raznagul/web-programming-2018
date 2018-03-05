<!DOCTYPE html>
<html>
    <head>
        <title>Tarea 2 - Cookies</title>
    </head>
    <body>
        <h1><a href="index.php">Home</a></h2>
        <h1>Tarea 2 - Cookies</h1>

        <strong>Calendario de eventos</strong>
        <table>
        <tr>
            <th>Dia</th>
            <th>Hora</th>
            <th>Evento</th>
            <th>Operacion</th>
        </tr>
        <?php 
            $arrayEventos = isset($_COOKIE['eventos'])? unserialize($_COOKIE['eventos']): array();
            if (isset($_POST['Submit'])) { 
                $evento = array(
                    'dia' => $_POST['dia'],
                    'hora' => $_POST['hora'],
                    'evento' => $_POST['evento']
                );
                $arrayEventos[] = $evento;
                $arrayEventos = array_values($arrayEventos);
            }
            if (isset($_POST['Delete'])) { 
                $index = $_POST['Delete'];
                unset($arrayEventos[$index]);
                $arrayEventos = array_values($arrayEventos);
            }
            foreach($arrayEventos as $key => $evento){
                echo "<tr>";
                echo '<form action="" method="post">';
                echo "<td>".$evento['dia']."</td>";
                echo "<td>".$evento['hora']."</td>";
                echo "<td>".$evento['evento']."</td>";
                echo '<input hidden type="text" name="Delete" value="'.$key.'">';
                echo '<td><input type="submit" name="Borrar" value="Borrar" /></td>';
                echo '</form>';
                echo "</tr>";
            }
        ?> 
        <tr>
            <form action="" method="post">
                <td><input name="dia" type="date"></td>

                <td><input name="hora" type="time"></td>

                <td><input name="evento" type="text"></td>

                <td><input type="submit" name="Submit" value="Nuevo" /></td>
            </form>
        </tr>
        </table>
        <?php            
            setcookie('eventos', serialize($arrayEventos));  
        ?> 
        
        
    </body>
</html>