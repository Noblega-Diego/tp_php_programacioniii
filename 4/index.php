<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cargar Articulo</title>
</head>
<body>

    <form action="">
        <h2>Articulo</h2>
        <div>
            <label for="in_nombre">nombre: </label>
            <input type="text" name="nombre" id="in_nombre">
        </div>
        <div>
            <label for="in_descripcion">descripcion: </label>
            <input type="text" name="descripcion" id="in_descripcion">
        </div>
        <div>
            <label for="in_precio">precio: </label>
            <input type="number" name="precio" id="in_precio">
        </div>
        <button type="submit">dar alta</button>
    </form>

    <?php
        function insertarTitulo(){
            echo("<tr>".
                    "<th>nombre</th>".
                    "<th>descripcion</th>".
                    "<th>precio</th>".
                    "<th></th>".
                "</tr>");
        }
        function insertarFila($id, $nombre, $descripcion, $precio){
            echo("<tr data-id='$id'>".
                    "<td>$nombre</td>".
                    "<td>$descripcion</td>".
                    "<td>$precio</td>".
                    "<td><button>eliminar</button></td>".
                "</tr>");
        }
        function aperturaTable(){
            echo("<table id='table'>");
        }
        function cierreTable(){
            echo("</table>");
        }


        $host = "localhost";
        $port = "3306";
        $user = "root";
        $password = "";
        $db = "testecomers";
        $method = $_SERVER['REQUEST_METHOD'];

        $conexion = new mysqli($host . ":" . $port , $user, $password, $db);                
        if($conexion->connect_error)
            die("no ha podido establecer una conexion con la bd");
        
        if('GET' === $method){
            $nombre = isset($_GET["nombre"])?  $_GET["nombre"]: "";
            $descripcion = isset($_GET["descripcion"])?  $_GET["descripcion"]: "";
            $precio = isset($_GET["precio"])?  settype($_GET["precio"], "double"): "";

            if ($nombre != "" && $descripcion != "" && $precio != ""){
                $query = "INSERT INTO `articulos`( `nombre`, `descripcion`, `precio`)" . 
                "VALUES ('$nombre', '$descripcion', $precio)";
                $conexion->query($query);
            }
        }else if('DELETE' === $method){
            $id = isset($_GET["id"])?  $_GET["id"]: "";
            if($id != ""){
                $query = "DELETE FROM `articulos` WHERE `id`=$id";
                $conexion->query($query);
            }
        }
        
        

        $query = "SELECT `id`, `nombre`, `descripcion`, `precio` FROM `articulos`";
        $result = $conexion->query($query);
        if($result && $result->num_rows){
            aperturaTable();
            insertarTitulo();
            while ($fila=$result->fetch_assoc()) {
                insertarFila($fila["id"],$fila["nombre"],$fila["descripcion"], $fila["precio"]);
            }
            cierreTable();
        }
        $conexion->close();
    ?>
    <script src="script.js"></script>
</body>
</html>