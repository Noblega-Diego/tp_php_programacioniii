<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>segunda pagina</title>
</head>
<body>
    <table>
    <?php
        $fila = $_GET["valor1"];
        $columna = $_GET["valor2"];
        $matriz;
        if($fila == $columna){
            for($i = 0; $i < $fila; $i ++){
                for($c = 0; $c < $columna; $c ++){
                    $matriz[$i][$c] = ((($fila-1) - $i) == $c )? 1:0;
                }
            }
        }

        if($fila == $columna){
            for($i = 0; $i < sizeof($matriz); $i ++){?>
                <tr>
            <?php for($c = 0; $c < sizeof($matriz[0]); $c ++){ ?>
                    <td><?php echo($matriz[$i][$c]) ?></td>    
            <?php } ?>
                </tr>
            <?php
            }
        }
    ?>
    </table>    
    
        
</body>
</html>