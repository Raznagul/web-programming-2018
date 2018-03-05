<!DOCTYPE html>
<html>
    <head>
        <title>Clase2 - 22-2 - Cookies</title>
    </head>
    <body>
        <h1><a href="index.php">Home</a></h2>
        <h1>Clase2 - 22-2 - Cookies</h1>

        <strong>Frutas</strong>
        <form action="" method="post">
            <input type="text" name="fruit"/>
            <input type="submit" name="Submit" value="Salvar" />
        </form>
        
        <form action="" method="post">
            <input type="submit" name="Delete" value="Borrar" />
        </form>

        <?php 
        $arrayFruits = isset($_COOKIE['fruits'])? unserialize($_COOKIE['fruits']): array();
        
        if (isset($_POST['Submit'])) { 
            $newFruit = $_POST['fruit'];
            $arrayFruits[] = $newFruit;
        }
        if (isset($_POST['Delete'])) { 
            $arrayFruits = array();
        }
        
        foreach($arrayFruits as $fruit){
            echo $fruit."</br>";
        }
        setcookie('fruits', serialize($arrayFruits));  
        ?> 

        
        
    </body>
</html>