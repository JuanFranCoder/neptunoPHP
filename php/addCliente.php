<?php
include 'conexionDB.php';
include '../claseCliente.php';

$vIdCliente = isset($_POST['idCliente']) ? $_POST['idCliente'] : '';
$vNombreCompany = isset($_POST['nombreCompany']) ? $_POST['nombreCompany'] : '';
$vNombreContacto = isset($_POST['nombreContacto']) ? $_POST['nombreContacto'] : '';
$vPais = isset($_POST['pais']) ? $_POST['pais'] : '';
$vTelefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
$vSaldo = isset($_POST['saldo']) ? $_POST['saldo'] : null;

//$cliente = new Cliente($vIdCliente, $vNombreCompany, $vNombreContacto, $vPais, $vTelefono, $vSaldo);
$cliente = new Cliente($vIdCliente,  $vNombreCompany);
//echo $cliente->vIdCliente;
//$cliente->convertObjectToArray();

try {

    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/

    /*** The SQL SELECT statement 
    $sql = $dbh->prepare("INSERT INTO Clientes (IdCliente, NombreCompany, NombreContacto, Pais, Telefono, Saldo) VALUES ('$vIdCliente', '$vNombreCompany', '$vNombreContacto', '$vPais', '$vTelefono', '$vSaldo')");
    //$sql = $dbh->prepare("INSERT INTO Clientes (IdCliente, NombreCompany, NombreContacto, Pais, Telefono, Saldo) VALUES (':IdCliente', ':NombreCompany', ':NombreContacto', ':Pais', ':Telefono', ':Saldo')");
    if($sql->execute((array) $cliente)){
        echo "Se ha creado un nuevo registro!";
        //header ("Location: ../formClientes.php");
    };
    ***/
    
    /*
    $stmt = $dbh->prepare("INSERT INTO Clientes (IdCliente, NombreCompany) VALUES (?, ?)");
    // Bind
    $stmt->bindParam(1, $vIdCliente);
    $stmt->bindParam(2, $vNombreCompany);
    // Excecute
    $stmt->execute();
    */

    $stmt = $dbh->prepare("INSERT INTO Clientes (IdCliente, NombreCompany, NombreContacto, Pais, Telefono, Saldo) VALUES (:IdCliente, :NombreCompany, :NombreContacto, :Pais, :Telefono, :Saldo)");
    $stmt->execute($cliente->convertObjectToArray());

    /*** close the database connection ***/
    $dbh = null;
    
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>
<!--
<script>
    document.ready(function(){
        setTimeout(function() {
            alert();
            //window.location.href="../formClientes.php";
        }, 2000);
    });
</script>
-->