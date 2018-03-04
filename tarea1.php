<!DOCTYPE html>
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
</html> 