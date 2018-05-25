<?php
    session_start();

    if(isset($_GET['logout'])){
        //unset($_GET['logout']);
        session_destroy();
        header('Location: ./');

    }

    if(isset($_GET['login'])){
        header('Location: ./login.php');
    }

    function mostrarLogin(){
        if(isset($_SESSION['idEmpleado'])){
        ?>
        <div>
            <span id="infoUsuario">El usuario <span class="user"><?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellidos'];?></span> está autenticado.</span>
            <span id="cerrarSesion">
                <!--<a class="volver" href="./">Volver a inicio</a>-->
                <a class="logout" href="./sesion.php?logout=true">Log Out</a>
            </span>
        </div>
    <?php
        }else{
        ?>
            <div>
                <span id="infoUsuario">No hay ningún usuario autenticado.</span>
                <span id="cerrarSesion">
                    <!--<a class="volver" href="./">Volver a inicio</a>-->
                    <a class="login" href="./sesion.php?login=true">Log In</a>
                </span>
            </div>
        <?php }
    }
    ?>

<style>
div {
    
}
#infoUsuario {
    float: left;
    color:white;
}
#cerrarSesion {
    float:right;
}
.logout{
    color:red;
}
.login, .user{
    color:green;
}
.volver {
    padding-right:50px;
    display:inline;
}
</style>