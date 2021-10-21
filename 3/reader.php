<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reader file</title>
</head>
<body>
    <?php
        $fileManager;
    try {
        if(file_exists("nuevoTexto.txt"))
            $fileManager = fopen("nuevoTexto.txt", "r");
        else
            throw new Exception("No se encuentra el archivo solicitado", 1);
        $text = "";
        while( !feof($fileManager) ){
            $text = $text . fgetc($fileManager);
        }
        $textoSeparado = explode("-", $text);
        for ($i=0; $i < sizeof($textoSeparado); $i++) { 
            echo($textoSeparado[$i] . "\n");
        }
    } catch (Error $th) {
        echo("no se ha podido leer el archivo " . $th);
    } catch (Exception $th) {
        echo($th);
    } finally {
        fclose($fileManager);
    }
    ?>
</body>
</html>