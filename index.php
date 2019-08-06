<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>REGISTRO DE VEHICULOS CAMILO</title>
        <link rel="stylesheet" href="./styles/principal.css" title="estilo1">
    </head>
    <body id="bod">
        <form action="conexion.php" method="POST">
            <div id="registro"  >
                <h1 id="titulo">REGISTRO DE CARROS</h1>
                <table id="tabla" >
       
                    <tr>
                        <td><label>Marca del vehículo:</label></td>
                        <td>
                            <select name="marca" size="1">
                                <option>Audi</option>
                                <option>Bmw</option>
                                <option>Chevrolet</option>
                                <option>Ford</option>
                                <option>Honda</option>
                                <option>Hyundai</option>
                                <option>Jeep</option>
                                <option>Kia</option>
                                <option>Mazda</option>
                                <option>Mercedes Benz</option>
                            </select>
                        </td>        
                    </tr>
                    <tr>
                        <td><label>Modelo:</label></td>
                        <td><input type="text" name="modelo" placeholder="Ingrese el modelo"</td>
                    </tr>
                    <tr>
                        <td><label>Año de matricula:</label></td>
                        <td>
                            <select name="matricula">
                                <script>
                                    for (var cont = 1900; cont <= 2019; cont++) {
                                        document.write("<option>" + cont + "</option>");
                                    }
                                </script>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Placa:</label></td>
                        <td><input type="text" name="placa" placeholder="Ingrese la placa"</td>
                    </tr>
                    <tr>
                        <td><label>Año:</label></td>
                        <td>
                            <select name="año">
                                <script>
                                    for (var cont = 1900; cont <= 2019; cont++) {
                                        document.write("<option>" + cont + "</option>");
                                    }
                                </script>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Numero de motor:</label></td>
                        <td><input type="text" name="motor" placeholder="Ingrese el numero"</td>
                    </tr>
                    <tr>
                        <td><label>Numero de chasis:</label></td>
                        <td><input type="text" name="chasis" placeholder="Ingrese el numero"</td>
                    </tr>
                    <br>
                    <tr>
                        <td><button id="boton">GUARDAR</button></td>
                    </tr>
                </table>
            </div>
        </form>
    </body>
</html>
