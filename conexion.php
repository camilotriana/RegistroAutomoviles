<?php
//Conexion a base de datos Sybase
$dns = "conexion_usuario";
$usuario = "DBA";
$clave = "sql";
$con= odbc_connect($dns, $usuario, $clave);

//Conexion a base de datos en Oracle
   $conexion = oci_connect("system", "oracle","10.57.5.98/XE");
   // $conexion = oci_connect("SYSTEM", "oracle");
   
if(!$con || !$conexion){
    ini_set('date.timezone','America/Bogota'); 
    $hora = date('m/d/Y h:i:sa');
    $archivoF = fopen("archivos/ConexionFallida.txt", "a") or die("Error al crear");
    fwrite($archivoF,$hora);
    fwrite($archivoF,",No se ha podido establecer la conexion con las bases de datos \n");
    echo "<br><script type='text/javascript'>
        alert('No se ha podido establecer la conexion con las bases de datos');
        window.location.href='index.php';
        </script>'; ";
    
}else{
    
//LEEMOS LOS DATOS
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$matricula = $_POST['matricula'];
$placa = $_POST['placa'];
$año = $_POST['año'];
$motor = $_POST['motor'];
$chasis = $_POST['chasis'];
$resultado=TRUE;
//VALIDAMOS QUE TODOS LOS CAMPOS ESTEN LLENOS
$validacion = (strlen($marca)*strlen($modelo)*strlen($matricula)*strlen($placa)*strlen($año)
               *strlen($motor)*strlen($chasis));

if($validacion!=0){
    //AGREGAMOS LOS DATOS EN LA BASE DE DATOS DE ORACLE
    $registro = "INSERT INTO VEHICULO VALUES('$placa','$motor','$chasis')";
   // $registro = "INSERT INTO SYS.VEHICULO VALUES('$placa','$motor','$chasis')";
    $oracle = oci_parse($conexion, $registro);
    $ejecutar = oci_execute($oracle)or die("<br><script type='text/javascript'>
        alert('Error Placa existente');
        window.location.href='index.php';
        </script>'; "); 
    oci_free_statement($oracle); 
    
    
    //AGREGAMOS LOS DATOS EN LA BASE DE DATOS DE SYBASE
    $sybase = "insert into vehiculo values('$marca','$modelo','$matricula','$placa')";
    odbc_exec($con, $sybase) or die("<br><script type='text/javascript'>
        alert('Error Placa existente');
        window.location.href='index.php';
        </script>'; ");
    
    //AGREGAMOS EN EL ARCHIVO PLANO
    $archivo = fopen("Placas.txt", "a") or die("Error al crear");
    fwrite($archivo,"$placa,$año \n");
    $archivoR = fopen("archivos/Registros.txt", "a") or die("Error al crear");
    fwrite($archivoR,"$marca,$modelo,$matricula,$placa,$año,$motor,$chasis \n");
    
    echo "<br><script type='text/javascript'>
        alert('REGISTRO EXITOSO');
        window.location.href='ListaRegistros.php';
        </script>';";
    ini_set('date.timezone','America/Bogota'); 
    $hora = date('m/d/Y h:i:sa');
    $archivoE = fopen("archivos/RegistroExitoso.txt", "a") or die("Error al crear");
    fwrite($archivoE, "$hora,$marca,$modelo,$matricula,$placa,$año,$motor,$chasis" );
    fwrite($archivoE,",AUTO REGISTRADO CORRECTAMENTE \n");
}else{
    ini_set('date.timezone','America/Bogota'); 
    $hora = date('m/d/Y h:i:sa');
    $archivoC = fopen("archivos/ErrorCampos.txt", "a") or die("Error al crear");
    fwrite($archivoC, $hora);
    fwrite($archivoC,",No se ingresaron todos los datos solicitados \n");
    echo "<br><script type='text/javascript'>
        alert('Error no se han llenado todos los campos');
        window.location.href='index.php';
        </script>'; ";
    
}
}
 ?>
