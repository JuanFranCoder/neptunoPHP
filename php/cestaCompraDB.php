<TABLE id="t01">
    <thead>
        <TR>
            <TH>IdProducto</TH>
            <TH>NombreProducto</TH>
            <TH>PrecioUnidad</TH>
            <TH>Unidades</TH>
        </TR>
    </thead>
    <tbody>
<?php
include 'conexionDB.php';

$vIdProducto = isset($_GET['idProducto']) ? $_GET['idProducto'] : null;
if(isset($_SESSION['cestaCompra']) ? $_SESSION['cestaCompra'] : $_SESSION['cestaCompra']=array());

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

    if(is_numeric($vIdProducto) && $vIdProducto>0){      
        if(count($_SESSION['cestaCompra'])>0){
            if (array_key_exists($vIdProducto, $_SESSION['cestaCompra'])){
                $_SESSION['cestaCompra'][$vIdProducto]+=1;
            }else{
                $_SESSION['cestaCompra'][$vIdProducto] = 1;    
            }
        }else{
            $_SESSION['cestaCompra'][$vIdProducto] = 1;
        }    
    }
    // recorremos el array cesta compra y lo mostramos en la tabla

    foreach ($_SESSION['cestaCompra'] as $key=>$value){
        $sql = "SELECT * FROM Productos WHERE IdProducto = '$key'";
        foreach ($dbh->query($sql) as $row)
        { ?>
            <TR>
                <TD><?php print $row['IdProducto']; ?></TD>
                <TD><?php print $row['NombreProducto'] ?></TD>
                <TD><?php print $row['PrecioUnidad'] ?></TD>
                <TD><?php print $value; ?></TD>
            </TR>
    
        <?php }
    }
    
    /*** close the database connection ***/
    $dbh = null;

}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>
    </tbody>
</TABLE>

