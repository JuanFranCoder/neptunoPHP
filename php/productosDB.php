<TABLE id="t01">
    <thead>
        <TR>
            <TH>IdProducto</TH>
            <TH>NombreProducto</TH>
            <TH>PrecioUnidad</TH>
        </TR>
    </thead>
    <tbody>
<?php
include 'conexionDB.php';

$vIdCategoria = isset($_GET['idCategoria']) ? $_GET['idCategoria'] : 'NULL';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/

    /*** The SQL SELECT statement ***/
    $sql = "SELECT * FROM Productos WHERE IdCategoria = $vIdCategoria OR $vIdCategoria IS NULL";

    foreach ($dbh->query($sql) as $row)
    : ?>
        <TR>
            <TD><?php print $row['IdProducto'] ?></TD>
            <TD><a href="detallesPedidos.php?idProducto=<?php echo $row['IdProducto']; ?>"><?php print $row['NombreProducto'] ?></a></TD>
            <TD><?php print $row['PrecioUnidad'] ?></TD>
            <TD><a href="cestaCompra.php?idProducto=<?php echo $row['IdProducto'];?>"><?php print "Añadir a la cesta"?></a></TD>
        </TR>

    <?php endforeach;

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

