<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>write file</title>
</head>
<body>
    <?php
        $file;
        try {
            if(file_exists("nuevoTexto.txt"))
                $file = fopen("nuevoTexto.txt", "w");
            else
                throw new Exception("no existe el archivo", 1);
            fwrite($file,"nuevo-texto-introducido");
        } catch (Exception $ex) {
            echo($ex);
        } catch (Error $er) {
            echo("error inesperdo");
        } finally{
            if(isset($file))
                fclose($file);
        }
    ?>
</body>
</html>