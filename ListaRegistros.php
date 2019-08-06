<html>
    <head>
        <meta charset="UTF-8">
        <title>LISTA DE REGISTROS</title>
        <link rel="stylesheet" href="styles/registros.css" title="estilo2">
    </head>
    <body id="bod">
        <div id="principal">
        <h1 id="titulo">AUTOS REGISTRADOS</h1>
        <table border="1" id="tabla">
            <thead>
            <br><br>
            <tr>
                <td>MARCA DEL VEHICULO</td>
                <td>MODELO</td>
                <td>AÑO DE MATRICULA</td>
                <td>NUMERO DEL MOTOR</td>
                <td>NUMERO DEL CHASIS</td>
                <td>PLACA</td>
            </tr>
            </thead>
            
            <?php
            $dns = "conexion_usuario";
            $usuario = "DBA";
            $clave = "sql";
            $con= odbc_connect($dns, $usuario, $clave);
            $sybase = "select *from vehiculo";
            $consultando = odbc_exec($con, $sybase);
            $conexion = oci_connect("SYSTEM", "oracle","10.57.5.98/XE")or die("La contraseña espira en 6 dias");
//            $conexion = oci_connect("SYSTEM", "oracle"); Use este si la base de datos esta en el mismo servidor
            $registro = "SELECT *FROM VEHICULO";
//            $registro = "SELECT *FROM SYS.VEHICULO";
            $oracle = oci_parse($conexion, $registro);
            oci_execute($oracle);
            while($fila = odbc_fetch_array($consultando)){
                $filab = oci_fetch_array($oracle);
                echo "<tr>";
                echo "<td>".$fila['Marca']."</td>";
                echo "<td>".$fila['Modelo']."</td>";
                echo "<td>".$fila['Matricula']."</td>";
                echo "<td>".$filab['NUMEROMOTOR']."</td>";
                echo "<td>".$filab['NUMEROCHASIS']."</td>";
                echo "<td>".$fila['Placa']."</td>";
                echo "</tr>";
                }
            ?>
        </table>
        <a href="index.php" id="link">REGISTRAR</a>
        </div>
    </body>
</html>