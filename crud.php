<?php
// Carga los valores de conexcion a mi base de datos 
$host = "dpg-ci58d2lgkuvh0tji8co0-a.oregon-postgres.render.com";
$user = "dbapi_y9qo_user";
$pass = "u2YsEO6jeJnitYHBzJleI4KJvcITlZiJ";
$db = "dbapi_y9qo";

// Genera la conexion con la base de datos 
//$conexion = mysqli_connect($host,$user,$pass,$db);
// Establecer la conexión
$conn = pg_connect("host=$host dbname=$db user=$user password=$pass");
// Verificar la conexión
if (!$conn) {
    echo "Error al conectar a la base de datos.";
    exit;
} else {
    echo "Conectado";
}
//Comprueba la conexcion 

if($conn){
    echo "<pre>";
    echo "Conectado exitosamente";
    echo "</pre>";
}

else {
    echo "No se ha podido conectar a la base de datos";
}
        
$query = "SELECT * FROM \"AlertProtec_alert\"";
$result = pg_query($conn, $query);

if ($result) {
    // Mostrar los resultados
    while ($row = pg_fetch_assoc($result)) {
        echo "ID: " . $row['id'] . " - Status: " . $row['status'] . " - ID Persona: " . $row['person_id'] . "<br>";
    }
} else {
    echo "Error al ejecutar la consulta.";
}

pg_close($conn);
/*
// CRUD
$operacion = $_GET[''];
$nombre = $_GET['nombre'];
$valor = $_GET['valor'];
$id_a = $_GET['id_a'];
$id_b = $_GET['id_b'];

//echo "operacion -> ".$operacion." | nombre -> ".$nombre. " | valor ->" . $valor . " | id_a ->".$id_a . " | id_b ->".$id_b;
switch ($operacion) {
        // Crear un registro
    case "crear":
        $bloqueo = "LOCK TABLES nombres WRITE";
        mysqli_query($conexion, $bloqueo);
        $consulta = "INSERT INTO `nombres` (`id`, `nombre`, `valor`, `fecha_cambio`) VALUES (NULL, '" . $nombre . "', '" . $valor . "', current_timestamp());";
        $result = mysqli_query($conexion, $consulta);
        if ($result) {
            echo "Se CREO el anuncio correctamente";
        } else {
            echo "Disculpe hubo un error, intentelo una vez más. Si el error persiste contactese con el administrador del sistema";
        }
        $bloqueo = "UNLOCK TABLES";
        mysqli_query($conexion, $bloqueo);

        $command = "python3 /home/tecsup/6to/respuesta/envia.py " . escapeshellarg("{'operacion':crear, 'nombre': $nombre, 'valor': $valor }");
        $output = shell_exec($command);

        break;
        break;
        // Consultar  un registro
    case "consultar":
        $bloqueo = "LOCK TABLES nombres WRITE";
        mysqli_query($conexion, $bloqueo);
        $consulta = "SELECT * FROM `nombres`";
        echo '<table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">valor</th>
                            <th scope="col">fecha de cambio</th>
                            </tr>
                        </thead>
                        <tbody>
                    ';
        if ($result = mysqli_query($conexion, $consulta)) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<th scope="row">' . $row["id"] . '</th>';
                echo '<td>' . $row["nombre"] . '</td>';
                echo '<td>' . $row["valor"] . '</td>';
                echo '<td>' . $row["fecha_cambio"] . '</td>';
                echo "</tr>";
            }
        }
        echo '</tbody></table>';
        $bloqueo = "UNLOCK TABLES";
        mysqli_query($conexion, $bloqueo);
        $command = "python3 /home/tecsup/6to/respuesta/envia.py " . escapeshellarg("{'operacion': 'consulta' }");
        $output = shell_exec($command);
        break;

        break;
        // Actualizar un registro
    case "actualizar":
        $bloqueo = "LOCK TABLES nombres WRITE";
        mysqli_query($conexion, $bloqueo);
        $consulta = "UPDATE `nombres` SET `valor` = '" . $valor . "' WHERE `nombres`.`id` = " . $id_a . ";";
        $result = mysqli_query($conexion, $consulta);
        if ($result) {
            echo "Se ACTUALIZO el anuncio correctamente";
        } else {
            echo "Disculpe hubo un error, intentelo una vez más. Si el error persiste contactese con el administrador del sistema";
        }
        $bloqueo = "UNLOCK TABLES";
        mysqli_query($conexion, $bloqueo);

        $command = "python3 /home/tecsup/6to/respuesta/envia.py " . escapeshellarg("{'operacion': actualizar, 'id': $id_a, 'valor':$valor}");
        $output = shell_exec($command);

        break;
        break;
        // Borrar un registro
    case "borrar":
        $bloqueo = "LOCK TABLES nombres WRITE";
        mysqli_query($conexion, $bloqueo);
        $consulta = "DELETE FROM `nombres` WHERE `nombres`.`id` = " . $id_b . "";
        $result = mysqli_query($conexion, $consulta);
        if ($result) {
            echo "Se BORRO el anuncio correctamente";
        } else {
            echo "Disculpe hubo un error, intentelo una vez más. Si el error persiste contactese con el administrador del sistema";
        }
        $bloqueo = "UNLOCK TABLES";
        mysqli_query($conexion, $bloqueo);

        $command = "python3 /home/tecsup/6to/respuesta/envia.py " . escapeshellarg("{'operacion': borrar , 'id': $id_b }");
        $output = shell_exec($command);

        break;

        break;
    default:

        break;
}*/
