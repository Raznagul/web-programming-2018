<?php 
    session_start();
    if (!isset($_SESSION['fruits'])) { 
        $_SESSION['fruits'] = array();
    }
?>
<html>
    <head>
        <title>Clase2 - 22-2 - Session</title>
    </head>
    <body>
        <h1><a href="index.php">Home</a></h2>
        <h1>Clase2 - 22-2 - Session</h1>

        <strong>Frutas</strong>
        <form action="" method="post">
            <input type="text" name="fruit"/>
            <input type="submit" name="Submit" value="Salvar" />
        </form>
        
        <form action="" method="post">
            <input type="submit" name="Delete" value="Borrar" />
        </form>

        <?php 

        if (isset($_POST['Submit'])) { 
            array_push($_SESSION['fruits'], $_POST['fruit']);
        }
        
        if (isset($_POST['Delete'])) { 
            $_SESSION['fruits'] = array();
        }
        
        foreach($_SESSION['fruits'] as $fruit){
            echo $fruit."</br>";
        }
        
        ?> 

        
        
    </body>
</html>