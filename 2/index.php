<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ingreso de texto</title>
</head>
<body>
    <form action="" method="post">
        <label for="inputTexto">texto ingresado</label>
        <textarea name="texto" id="inputTexto" cols="30" rows="10"></textarea>
        <input type="submit" value="enviar">
    </form>

    <?php
        if( isset($_POST["texto"]) ){
            $texto = str_split($_POST["texto"]);
            for($i = 0; $i < sizeof($texto); $i++)
                echo $texto[$i];
        }
    ?>
</body>
</html>