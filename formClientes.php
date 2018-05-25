<?php
	include 'sesion.php';
?>
<!DOCTYPE HTML>
<!--
	Eventually by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
	$vIdCliente=isset($_GET['idCliente']) ? $_GET['idCliente'] : null;
	include 'php/conexionDB.php';
	try {
		$dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
		/*** echo a message saying we have connected ***/
	
		/*** The SQL SELECT statement ***/
		$sql = $dbh->prepare("SELECT * FROM Clientes WHERE IdCliente = :idCliente");
		$sql->bindParam(':idCliente', $vIdCliente);
		$cliente = $sql->setFetchMode(PDO::FETCH_ASSOC);
		$sql->execute();

		$row = $sql->fetch();	
		
		/*** close the database connection ***/
		$dbh = null;
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>
<html>
	<head>
		<title>Neptuno</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>
		<?php echo mostrarLogin();?>

		<!-- Header -->
			<header id="header">
			
			<!-- Botón volver al listado de clientes -->
				<!--<input style="width:100px;" type="button" value="Volver" onClick="window.location = 'clientes.php'" />-->

				<a href="./"><h1>Neptuno</h1></a>
				<p>Empresa dedicada a la comercialización de productos de alimentación <a href="http://html5up.net">HTML5 UP</a>.</p>
			</header>

			<!-- volver a listado de empleados -->
			<a href="./clientes.php">Volver al listado de clientes</a>

		<!-- Signup Form -->
			<form id="filtrar" method="post" action="php/addCliente.php">
				<input type="text" name="idCliente" id="idCliente" placeholder="idCliente" size="5" value="<?php echo $vIdCliente?>"/><br />
                <fieldset>
                <input type="text" name="nombreCompany" id="nombreCompany" placeholder="nombreCompany" size="80" value="<?php echo $row["NombreCompany"];?>"/><br />
                <input type="text" name="nombreContacto" id="nombreContacto" placeholder="nombreContacto" size="60" value="<?php echo $row["NombreContacto"];?>"/><br />
                <input type="text" name="pais" id="pais" placeholder="pais" size="30" value="<?php echo $row["Pais"];?>"/><br />
                <input type="tel" name="telefono" id="telefono" placeholder="telefono" value="<?php echo $row["Telefono"];?>"/><br />
                <input type="number" name="saldo" id="saldo" placeholder="saldo" step="0.01" value="<?php echo $row["Saldo"];?>"/><br />
                </fieldset>
				<input type="reset" value="Cancelar" />
                <input type="submit" value="Insertar" />
			</form>

        <!-- Tabla de clientes -->

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
