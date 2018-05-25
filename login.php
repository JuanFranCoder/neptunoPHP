<?php
   include 'sesion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/main.css" />
    <title>Login - Neptuno</title>
</head>
<body>

<?php
    include 'php/conexionDB.php';
    if (isset($_POST['login']) && !empty($_POST['nombre']) && !empty($_POST['apellidos'])){
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        try {
            $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
            /*** echo a message saying we have connected ***/
        
            /*** The SQL SELECT statement ***/
            $sql = $dbh->prepare("SELECT * FROM Empleados WHERE Nombre = '$nombre' AND Apellidos = '$apellidos'");
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();
            $row=$sql->fetch();
            
            if($row){
                echo "Sesión iniciada <br>";
                $_SESSION['nombre'] = $row['Nombre'];
                $_SESSION['apellidos'] = $row['Apellidos'];
                $_SESSION['idEmpleado'] = $row['IdEmpleado'];
            }else{
                echo "¡Error! Usuario no encontrado";
            }
            
            /*** close the database connection ***/
            $dbh = null;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }    
?>

    <?php echo mostrarLogin();?>
    <!-- Header -->
    <header id="header">
        <a href="./"><h1>Neptuno</h1></a>
        <p>Empresa dedicada a la comercialización de productos de alimentación <a href="http://html5up.net">HTML5 UP</a>.</p>
    </header>

    <form action="" method="post">
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" required autofocus style="width:300px;"><br>
        <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" required style="width:300px;"><br>
        <input type="submit" value="Login" name="login" id="login">
    </form>

    <!-- Footer -->
    <footer id="footer">
        <ul class="icons">
            <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li>
            <li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
        </ul>
        <ul class="copyright">
            <li>&copy; Untitled.</li><li>Credits: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>
    </footer>

    <!-- Scripts -->
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="assets/js/main.js"></script>
</body>
</html>