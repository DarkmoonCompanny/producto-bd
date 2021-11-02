<?php
include("config/conection.php");
if (!$_GET) {
    header('Location:promos.php?pagina=1');
}

if ($_GET['pagina'] == 1) {
    # code...
    $iniciar  = ($_GET['pagina']) * 50;
} else {
    $iniciar  = ($_GET['pagina'] - 1) * 50;
}

$articulos = "SELECT * FROM articulo WHERE Activo = 0 ";
// echo $_GET['categoria'];
if (!empty($_GET['categoria'])) {
    # code...
    $categoria = $_GET['categoria'];
    $articulos = $articulos . "AND IDCategoria = $categoria ";
}
if (!empty($_GET['search'])) {
    # code...
    $searchs2 = $_GET['search'];
    $articulos = $articulos . "AND Descripcion LIKE  '%$searchs2%' ";
}

$articulos = $articulos . " LIMIT $iniciar,50";
// echo $articulos;

$categorias = "SELECT * FROM categoria WHERE Activa = 1";

if (!empty($_GET['padre'])) {
    # code...
    $padre = $_GET['padre'];
    $categorias = $categorias . " AND IDCategoriaPadre = $padre ";
}

$categorias_padre = "SELECT * FROM categoria_padre WHERE Activa = 1";
$result_tabla = mysqli_query($conexion, $articulos);

//calculo de la paginacion
$articulos_TOTAL = "SELECT * FROM articulo WHERE Activo = 0  ";

if (!empty($_GET['categoria'])) {
    # code...
    $categoria2 = $_GET['categoria'];
    $articulos_TOTAL = $articulos_TOTAL . "AND IDCategoria = $categoria2 ";
}

if (!empty($_GET['search'])) {
    # code...
    $searchs = $_GET['search'];
    $articulos_TOTAL = $articulos_TOTAL . "AND Descripcion LIKE  '%$searchs%' ";
}
// echo "<br>".$articulos_TOTAL;

$result_tabla_v2 = mysqli_query($conexion, $articulos_TOTAL);
$total = mysqli_num_rows($result_tabla_v2);

$paginas = Ceil($total / 50);


// if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
//     header('Location:promos.php?pagina=1');
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/promos.css">
</head>

<body>
    <div class="main-wrap">
        <div class="row">
            <div class="search-filters col-12 col-md-12 col-lg-auto order-last order-lg-first mt-5 mb-5">
                <div class="g-box p-4">
                    <div class="row">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Buscar</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Buscar">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary mb-3" onclick="tipo_filtro('',1)">Buscar</button>
                        </div>
                    </div>


                </div>
                <div class="mt-5"></div>
                <?php if (!empty($_GET['padre'])) { ?>

                    <div class="row">
                        <div class="alert alert-primary   fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="tipo_filtro('',3 )"></button>
                            Categoria padre
                        </div>
                    </div>
                <?php } ?>

                <?php if (!empty($_GET['categoria'])) { ?>

                    <div class="row">
                        <div class="alert alert-primary   fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="tipo_filtro('',2 )"></button>
                            Categoria
                        </div>
                    </div>
                <?php } ?>

                <?php if (!empty($_GET['search'])) { ?>

                    <div class="row">
                        <div class="alert alert-primary   fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="tipo_filtro('',1 )"></button>
                            Buscar <strong><?php echo $_GET['search'] ?></strong>
                        </div>
                    </div>
                <?php } ?>

                <div class="mt-5"></div>

                <div class="g-box p-4 categoria">
                    <span class="font-w-500"> categoria</span>
                    <!-- items -->
                    <?php
                    $result = mysqli_query($conexion, $categorias);


                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <li class="cat-item cat-parent" onclick="tipo_filtro(<?php echo $row['IDCategoria'] . ',2' ?>)">
                            <!-- <div  class=" click"> -->
                            <a><?php echo $row["DCategoria"] ?> </a>
                            <!-- </div> -->

                        </li>

                    <?php } ?>


                </div>
                <div class="mt-5"></div>
                <?php if (empty($_GET['padre'])) { ?>
                    <div class="g-box p-4 categoria">
                        <span class="font-w-500"> Categoria Padre</span>
                        <!-- items -->
                        <?php
                        $result = mysqli_query($conexion, $categorias_padre);


                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <li class="cat-item cat-parent" onclick="tipo_filtro(<?php echo $row['IDCategoriaPadre'] . ',3' ?>)">
                                <!-- <div  class=" click"> -->
                                <a><?php echo $row["DCategoriaPadre"] ?> </a>
                                <!-- </div> -->

                            </li>

                        <?php } ?>


                    </div>
                <?php } ?>
            </div>

            <div class="result-list mt-5 mb-5 pl-5 col ml-3">
                <div class="row justify-content-md-between justify-content-center"></div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 result-item-list m-auto">
                            <table class="table">
                                <thead>
                                    <th scope="col"></th>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Cantidad Stock</th>
                                    <th scope="col">promocion?</th>
                                </thead>
                                <tbody>
                                    <tr>

                                    </tr>
                                    <?php

                                    // echo "numero total = " . $total;
                                    while ($row = mysqli_fetch_assoc($result_tabla)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row["ImagenArticulo"] ?></td>
                                            <td><?php echo $row["IDStock"] ?></td>
                                            <td><?php echo $row["Descripcion"] ?></td>
                                            <td><?php echo $row["CantStock"] ?></td>

                                            <td><?php
                                                if ($row["EnPromocion"]  == 1) {
                                                    # code...
                                                    echo '<strong style="color:green;" >SI</strong>';
                                                } else {
                                                    echo '<strong style="color:red;" >NO</strong>';
                                                }
                                                ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item <?php echo $_GET['pagina'] == 1 ? 'disabled' : '' ?>">

                                    <a class="page-link" href="promos.php?pagina=<?php echo $_GET['pagina'] - 1 ?>">
                                        Previous
                                    </a>

                                </li>
                                <!-- el principio -->
                                <?php if ($_GET['pagina'] == 1) { ?>
                                    <li class="page-item active">
                                        <a class="page-link" href="promos.php?pagina=1">
                                            1
                                        </a>
                                    </li>

                                    <li class="page-item  disabled">
                                        <a class="page-link " href="promos.php?pagina=1">
                                            ...
                                        </a>
                                    </li>

                                    <li class="page-item  ">
                                        <a class="page-link " href="promos.php?pagina=<?php echo $paginas; ?>">
                                            <?php
                                            echo $paginas;
                                            ?>
                                        </a>
                                    </li>

                                <?php } ?>

                                <!-- esta en la mita -->
                                <?php if ($_GET['pagina'] > 1 && $_GET['pagina'] < $paginas) { ?>
                                    <li class="page-item ">
                                        <a class="page-link" href="promos.php?pagina=1">
                                            1
                                        </a>
                                    </li>
                                    <li class="page-item  disabled">
                                        <a class="page-link " href="promos.php?pagina=1">
                                            ...
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link  " href="promos.php?pagina=1">
                                            <?php
                                            echo $_GET['pagina'];
                                            ?>
                                        </a>
                                    </li>
                                    <li class="page-item disabled">
                                        <a class="page-link " href="promos.php?pagina=1">
                                            ...
                                        </a>
                                    </li>

                                    <li class="page-item ">
                                        <a class="page-link " href="promos.php?pagina=<?php echo $paginas; ?>">
                                            <?php
                                            echo $paginas;
                                            ?>
                                        </a>
                                    </li>

                                <?php } ?>


                                <!-- si es el ultimo -->
                                <?php if ($_GET['pagina'] == $paginas) { ?>
                                    <li class="page-item ">
                                        <a class="page-link" href="promos.php?pagina=1">
                                            1
                                        </a>
                                    </li>

                                    <li class="page-item  disabled">
                                        <a class="page-link " href="promos.php?pagina=1">
                                            ...
                                        </a>
                                    </li>

                                    <li class="page-item active ">
                                        <a class="page-link " href="promos.php?pagina=<?php echo $paginas; ?>">
                                            <?php
                                            echo $paginas;
                                            ?>
                                        </a>
                                    </li>

                                <?php } ?>



                                <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : '' ?>"><a class="page-link" href="promos.php?pagina=<?php echo $_GET['pagina'] + 1; ?>">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script>
        var numpage, search, categoria, padre;
        init_search();

        function init_search() {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            numpage = urlParams.get("pagina");
            search = urlParams.get("search");
            categoria = urlParams.get("categoria");
            padre = urlParams.get("padre");
        }

        function searchs() {
            var params = "w=ewe";
            if (numpage != null) {
                params = params + "&pagina=1";
            }

            if (search != null) {
                params = params + "&search=" + search;
            }

            if (categoria != null) {
                params = params + "&categoria=" + categoria;
            }

            if (padre != null) {
                params = params + "&padre=" + padre;
            }

            console.log(params);
            document.location.href = "./" + "promos.php?" + params;
        }

        function tipo_filtro(valor, tipo) {

            switch (tipo) {
                case 0:
                    numpage = valor;
                    break;
                case 1:

                    search = document.getElementById('exampleFormControlInput1').value;
                    break;
                case 2:
                    categoria = valor;
                    break;
                case 3:
                    padre = valor;
                    break;
                default:
                    numpage = valor;
                    break;
            }
            searchs();
        }
    </script>
</body>


</html>