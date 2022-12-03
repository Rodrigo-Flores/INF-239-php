<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/styles/Style_home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Perfil Pelicula</title>
</head>

<body>
    <!--Creando cabezera de la pagina-->
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
        <div class="container-menu" style="z-index: 1;">
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
                    <option value="usuarios">user_names</option>
                </select>
                <button class="search-btn" type="submit" name="submit-search">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </header>

    <!--Creando cuerpo de la pagina to show pelicula data with a query and his id-->
    <!--
        CREATE TABLE peliculas (
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(100) NOT NULL,
    genero VARCHAR(50) NOT NULL,
    descripcion VARCHAR(500) NOT NULL,
    ejemplares_disponibles INT NOT NULL,
    ejemplares_totales INT NOT NULL,
    publico VARCHAR(2) NOT NULL,
    duracion INT NOT NULL,
    precio INT NOT NULL,
    reparto VARCHAR(100) NOT NULL,
    calificacion_media INT NOT NULL,
    veces_rentada INT NOT NULL,
    calificacion_media_usmtomatoes INT NOT NULL,
    imagen VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
);
-->
    <?php
    include("../InicioyRegistro/conexion.php");
    $id = $_POST['id_pelicula'];
    $query = "SELECT * FROM peliculas WHERE id = $id";
    $result = mysqli_query($conexion, $query);

?>
    <!--
    create a form with califications between 1 and 5 with bootstrap
-->
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="Resenia.php" method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Calificacion</label>
                        <input type="calification" class="form-control" placeholder="1-5"
                            name="calificacion">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Reseña</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            name="resenia"></textarea>
                    </div>
                    <input type="hidden" name="id_pelicula" value="<?php echo $id ?>">
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>   

</body>

</html>