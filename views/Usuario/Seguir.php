<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguir</title>
    <link rel="stylesheet" href="../../assets/styles/Style_home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <!--Cambiar esto para que al clikear al foto vuelva a la pagina principal-->
        <div class="Logo">

            <!--Menu de usuario-->
            <div class="btn-menu">
                <label for="btn-menu">☰</label>
            </div>

            <a href="../Home/home.php"><img src="../../assets/images/Logo.png" alt="Logo compañia"></a>
            <h2 class=nombre-compañia>BlockbUSM</h2>

        </div>

        <!--Menu de usuario-->
        <input type="checkbox" id="btn-menu">
        <div class="container-menu" style="z-index: 1">
            <div class="cont-menu">
                <nav>
                    <a href="../Usuario/Perfil_main.php">Ver Perfil</a>
                    <a href="../InicioyRegistro/Cerrar_Sesion.php">Cerrar Sesion</a>
                </nav>
                <label for="btn-menu">✖️</label>
            </div>
        </div>

        <!-- search bar -->
        <form action="../Home/Home.php" method="post">
            <div class="search-box">
                <input class="search-txt" type="text" name="search" placeholder="Buscar">
                <select name="tipo" class="search-txt">
                    <option value="peliculas">Peliculas</option>
                    <option value="usuarios">Usuarios</option>
                </select>
                <button class="search-btn" type="submit" name="submit-search">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </header>

    <?php
session_start();
include("../InicioyRegistro/conexion.php");

$id = $_POST['user_id'];
$user_name = $_POST['user_name'];

$query = "UPDATE usuarios SET seguidores = seguidores + 1 WHERE id = $id";
$result = mysqli_query($conexion, $query);

$query = "UPDATE usuarios SET seguidos = seguidos + 1 WHERE id = $_SESSION[id]";
$result = mysqli_query($conexion, $query);

$query = "INSERT INTO seguidores (id_usuario_seguidor, id_usuario_seguido) VALUES ($_SESSION[id], $id)";
$result = mysqli_query($conexion, $query);

?>
    <div class="container" styles="z-index: 0;">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Felicidades!</h4>
            <p>Has seguido a
                <?php echo $user_name ?>
            </p>
            <hr>
            <p class="mb-0">Ahora puedes ver sus publicaciones en tu perfil</p>
        </div>
        <a href="../Home/Home.php" styles="">Volver a la pagina principal</a>
    </div>
</body>

</html>