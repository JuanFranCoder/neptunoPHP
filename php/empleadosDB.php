<TABLE id="t01">
    <thead>
        <TR>
            <TH>Nombre</TH>
            <TH>Apellidos</TH>
            <TH>Cargo</TH>
            <TH>IdEmpleado</TH>
        </TR>
    </thead>
    <tbody>
<?php
include 'conexionDB.php';

$cadena = isset($_POST['cadena']) ? $_POST['cadena'] : '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/

    /*** The SQL SELECT statement ***/
    $sql = "SELECT * FROM Empleados WHERE (Nombre LIKE '%$cadena%' OR Apellidos LIKE '%$cadena%')";
    foreach ($dbh->query($sql) as $row)
    { ?>
        <TR>
            <TD><?php print $row['Nombre'] ?></TD>
            <TD><?php print $row['Apellidos'] ?></TD>
            <TD><?php print $row['Cargo'] ?></TD>
            <TD><a href="pedidosPorEmpleado.php?IdEmpleado=<?php print $row['IdEmpleado']?>"><?php print $row['IdEmpleado'] ?></a></TD>
        </TR>

    <?php }

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

