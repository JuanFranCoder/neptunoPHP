<?php
include 'conexionDB.php';
include '../claseCliente.php';

$vIdCliente = isset($_POST['idCliente']) ? $_POST['idCliente'] : null;
$vNombreCompany = isset($_POST['nombreCompany']) ? $_POST['nombreCompany'] : null;
$vNombreContacto = isset($_POST['nombreContacto']) ? $_POST['nombreContacto'] : null;
$vPais = isset($_POST['pais']) ? $_POST['pais'] : null;
$vTelefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
$vSaldo = (isset($_POST['saldo']) && strlen($_POST['saldo'])>0) ? $_POST['saldo'] : null;

$cliente = new Cliente($vIdCliente,  $vNombreCompany, $vNombreContacto, $vPais, $vTelefono, $vSaldo);
//print_r($cliente->convertObjectToArray());
try {

    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/

    /*** The SQL SELECT statement ***/
    $sql = $dbh->prepare("INSERT INTO Clientes (IdCliente, NombreCompany, NombreContacto, Pais, Telefono, Saldo) VALUES (:IdCliente, :NombreCompany, :NombreContacto, :Pais, :Telefono, :Saldo) 
    ON DUPLICATE KEY UPDATE NombreCompany=:NombreCompany, NombreContacto=:NombreContacto, Pais=:Pais, Telefono=:Telefono, Saldo=:Saldo");
    // NombreContacto=:NombreContacto, Pais=:Pais, Telefono=:Telefono, Saldo=:Saldo
    
    if($sql->execute($cliente->convertObjectToArray())){
        echo "Se ha creado un nuevo registro!";
        //header ("Location: ../formClientes.php");
    }else{
        print_r($sql->errorInfo());
    }
    

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