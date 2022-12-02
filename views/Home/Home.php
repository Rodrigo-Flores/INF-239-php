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
    <title>Home</title>
</head>

<body>
    <header>
        <!--Cambiar esto para que al clikear al foto vuelva a la pagina principal-->
        <div class="Logo">

            <!--Menu de usuario-->
            <div class="btn-menu">
                <label for="btn-menu">☰</label>
            </div>

            <a href="home.php"><img src="../../assets/images/Logo.png" alt="Logo compañia"></a>
            <h2 class=nombre-compañia>BlockbUSM</h2>

        </div>

        <!--Barra de busqueda-->
        <!-- search bar -->
        <form action="Home.php" method="post">
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
    include("../InicioyRegistro/conexion.php");
    $query = "SELECT * FROM top5peliculasusmtomatoes";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die('Query Failed' . mysqli_error($conn));
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Top 5 Peliculas</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Imagen</th>
                                    <th>Calificacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($result)) { ?>
                                <tr>
                                    <td>
                                        <?php echo $row['titulo'] ?>
                                    </td>
                                    <td>
                                        <img href="<?php echo $row['imagen'] ?>" styles="margin: 5em;">
                                    </td>
                                    <td>
                                        <?php echo $row['calificacion_media_usmtomatoes'] ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include("../InicioyRegistro/conexion.php");
        $query = "SELECT * FROM top5peliculasusmtomatoespeores";
        $result = mysqli_query($conexion, $query);
        if (!$result) {
            die('Query Failed' . mysqli_error($conn));
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Top 5 Peliculas Peores</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Imagen</th>
                                    <th>Calificacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($result)) { ?>
                                <tr>
                                    <td>
                                        <?php echo $row['titulo'] ?>
                                    </td>
                                    <td>
                                        <img href="<?php echo $row['imagen'] ?>" styles="margin: 5em;">
                                    </td>
                                    <td>
                                        <?php echo $row['calificacion_media_usmtomatoes'] ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        <input type="checkbox" id="btn-menu">
        <div class="container-menu">
            <div class="cont-menu">
                <nav>
                    <a href="../Usuario/Perfil_main.php">Ver Perfil</a>
                    <a href="../InicioyRegistro/Cerrar_Sesion.php">Cerrar Sesion</a>
                </nav>
                <label for="btn-menu">✖️</label>
            </div>
        </div>

        <!-- show 5 best movies -->
        <div class="row p-5">
            <?php
            include("../InicioyRegistro/conexion.php");
            if (isset($_POST["tipo"])) {
                if ($_POST["tipo"] == "peliculas") {
                    include("../InicioyRegistro/conexion.php");
                    $query = "SELECT * FROM peliculas WHERE titulo LIKE '%" . $_POST['search'] . "%'";
                    $result = mysqli_query($conexion, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="col-sm-3 p-4">
                <div class="card w-100 h-100 p-2">
                    <!-- render a image as form -->
                    <form action="../Peliculas/Perfil_peliculas.php" method="post">
                        <input type="hidden" name="id_pelicula" value="<?php echo $row['id']; ?>">
                        <input type="image" src="<?php echo $row['imagen']; ?>" class="card-img-top" alt="...">
                    </form>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="../Peliculas/Perfil_peliculas.php" style="text-decoration: none; color: black;">
                                <?php echo $row["titulo"]; ?>
                            </a>
                        </h5>
                        <p class="card-text">
                            <?php echo $row["descripcion"]; ?>
                        </p>
                        <form action="../Peliculas/Perfil_peliculas.php" method="post" class="d-inline">
                            <input type="hidden" name="id_pelicula" value="<?php echo $row["id"]; ?>">
                            <input type="submit" name="detail" value="Ver Detalles">
                        </form>
                        <form action="../Peliculas/Resenia_peliculas.php" method="post" class="d-inline">
                            <input type="hidden" name="id_pelicula" value="<?php echo $row["id"]; ?>">
                            <input type="submit" name="resenia" value="Reseña">
                        </form>
                    </div>
                </div>
            </div>
            <?php
                        }
                    } else {
                        echo "No se encontraron resultados";
                    }
                } else {
                    $query = "SELECT * FROM usuarios WHERE user_name LIKE '%{$_POST['search']}%' OR nombre LIKE '%{$_POST['search']}%'";
                    $result = mysqli_query($conexion, $query);
                    $queryResult = mysqli_num_rows($result);
                    if ($queryResult > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
            ?>

            <div class="col-sm-3 p-4">
                <div class="card w-100 h-100 p-2">
                    <!-- render a image as form -->
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $row["user_name"]; ?>
                            </a>
                        </h5>
                        <p class="card-text">
                            <?php echo $row["descripcion"]; ?>
                        </p>
                        <form action="../Usuario/Perfil_Usuarios.php" method="post">
                            <input type="hidden" name="id_usuario" value="<?php echo $row["id"]; ?>">
                            <input type="submit" name="detail" value="Ver Perfil">
                        </form>
                    </div>
                </div>
            </div>



            <?php
                        }
                    } else {
                        echo "No hay resultados";
                    }
                }
            }
            ?>
        </div>
</body>

</html>