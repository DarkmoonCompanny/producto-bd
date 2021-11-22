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

// $articulos = "SELECT * FROM articulo WHERE Activo = -1  ";
$articulos = "SELECT 
categoria_padre.DCategoriaPadre,
categoria.DCategoria,
articulo.Descripcion,
categoria.IDCategoria,
categoria_padre.IDCategoriaPadre,
marca.IDRubro,
marca.IDMarca,
marca.DMarca,
articulo.IDArticulo
articulo.IDMarca
articulo.IDRubro
articulo.IDFamilia
articulo.CodRevista
articulo.Descripcion
articulo.PReVendedor
From
articulo Inner Join
categoria On categoria.IDCategoria = articulo.IDCategoria Inner Join
categoria_padre On categoria_padre.IDCategoriaPadre = categoria.IDCategoriaPadre Inner Join
marca On marca.IDMarca = articulo.IDMarca
        And marca.IDRubro = articulo.IDRubro
Where
articulo.Activo = -1 And
articulo.EnPromocion = -1 And";
// echo $_GET['categoria'];
if (!empty($_GET['padre'])) {
    # code...
    $categorias = "SELECT * FROM categoria WHERE 1=1";
    $padre = $_GET['padre'];
    // $categorias = $categorias . " AND IDCategoriaPadre = $padre ";
    $articulos = $articulos . "AND categoria_padre.IDCategoriaPadre = $padre ";
}

if (!empty($_GET['categoria'])) {
    # code...
    $categoria = $_GET['categoria'];
    // $articulos = $articulos . "AND IDCategoria = $categoria ";
    $articulos = $articulos . "AND categoria.IDCategoria = $categoria ";
}
if (!empty($_GET['search'])) {
    # code...
    $searchs2 = $_GET['search'];
    $articulos = $articulos . "AND articulo.Descripcion LIKE  '%$searchs2%' ";
}
if (!empty($_GET['marca'])) {
    # code...
    $searchs22 = $_GET['marca'];
    $articulos = $articulos . "AND marca.IDMarca =  $searchs22 ";
}

$articulos = $articulos . "LIMIT $iniciar,50";
// echo $articulos;

$categorias = "SELECT * FROM categoria WHERE   0=1";

if (!empty($_GET['padre'])) {
    # code...
    $categorias = "SELECT * FROM categoria WHERE 1=1";
    $padre = $_GET['padre'];
    $categorias = $categorias . " AND IDCategoriaPadre = $padre ";
}

//marcas
$marcas = "SELECT * FROM marca WHERE 0 = 1";

if (!empty($_GET['categoria'])) {
    # code...
    $marcas = "SELECT * FROM marca WHERE 1 = 1";
    $padre = $_GET['categoria'];
    $marcas = $marcas . " AND IDRubro = $padre ";
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

<!DOCTYPE HTML>
<html>
<link rel="shortcut icon" type="image/png" href="https://refomar.com.ar/refomar/favicon.png" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div id="titleBar"><a href="#navPanel" class="toggle"></a><span class="title">undefined</span></div>

<head>
    <title>REFRIGERACI&Oacute;N OMAR S.R.L. - Somos L&iacute;der en refrigeraci&oacute;n y repuestos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/login_style.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <link rel="stylesheet" type="text/css" href="slider/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="slider/css/style.css" />
    <noscript>
        <link rel="stylesheet" type="text/css" href="slider/css/noscript.css" />
    </noscript>
</head>

<body>
    <section class="wrapper style13">
        <?php include("includes/top.php"); ?>
    </section>
    <section class="wrapper style4">
        <div class="container">
            <section class="up">
                <?php include("includes/fechador.php"); ?>
            </section>
            <section class="up1">
                <?php include("includes/desde.php"); ?>
            </section>
            <section class="up2">
                <?php include("includes/solicite.php"); ?>
            </section>
        </div>
    </section>
    <div id="page-wrapper">
        <!--Login-->
        <?php include("includes/login.php"); ?>
        <!-- end Login -->
    </div>
    <div id="page-wrapper">
        <!-- Header -->
        <?php include("includes/cabezal.php"); ?>
    </div>
    <div id="header">
        <!-- botonera -->
        <?php include("includes/botonera-articulos.php"); ?>
    </div>


    <!-- end botonera -->
    <!-- Highlights -->
    <!-- ESPACIO CENTRAL -->

    <section class="wrapper style1">
        <div class="container">
            <div class="row 200%">
                <div class="4u 12u(narrower)">
                    <div class="row">
                        <div class="col">
                            <div id="sidebar">
                                <!-- Sidebar -->
                                <section>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <div class="">
                                                <label for="exampleFormControlInput1" class="form-label">Buscar</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Buscar">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary mb-3" onclick="tipo_filtro('',1)">Buscar</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- <a href="promos.php" class="button">BUSCAR DE NUEVO</a> -->
                                    <?php if (!empty($_GET['padre'])) { ?>
                                        <div class="mt-2"></div>
                                        <div class="row mb-5">
                                            <div class="alert alert-primary   fade show" role="alert">
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="tipo_filtro('',3 )"></button>
                                                Categoria padre <?php $_GET['nombre_padre'] ?>
                                            </div>
                                        </div>
                                        <br>
                                    <?php } ?>

                                    <?php if (!empty($_GET['categoria'])) { ?>
                                        <div class="mt-2"></div>
                                        <div class="row mb-5">
                                            <div class="alert alert-primary   fade show" role="alert">
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="tipo_filtro('',2 )"></button>
                                                Categoria <?php $_GET['nombre_categoria'] ?>
                                            </div>
                                        </div>
                                        <br>
                                    <?php } ?>

                                    <?php if (!empty($_GET['search'])) { ?>
                                        <div class="mt-2"></div>

                                        <div class="row mb-5">
                                            <div class="alert alert-primary   fade show" role="alert">
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="tipo_filtro('',1 )"></button>
                                                Buscar <strong><?php echo $_GET['search'] ?></strong>
                                            </div>
                                        </div>
                                        <br>
                                    <?php } ?>

                                    <?php if (!empty($_GET['marca'])) { ?>
                                        <div class="mt-2"></div>
                                        <div class="row mb-5">
                                            <div class="alert alert-primary   fade show" role="alert">
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="tipo_filtro('',4)"></button>
                                                Marca <?php $_GET['nombre_marca'] ?>
                                            </div>
                                        </div>
                                        <br>
                                    <?php } ?>

                                    <br><br>
                                    Seleccione <strong>CATEGORIA</strong> que usted desee:<br>
                                    <br>
                                    <table id="table_id2" width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:10px; line-height:12px;">
                                        <thead>
                                            <tr>
                                                <td width="25%" style="border-top:1px solid #37c0fb; border-right:#37c0fb 1px solid; border-bottom:#37c0fb 1px solid; color:#FFF; text-align:center; padding:2px 5px; font-weight:bold; background-color:#37c0fb; font-size:12px">CATEGORIA</td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php if (empty($_GET['padre'])) { ?>
                                                <div class="g-box p-4 categoria">
                                                    <?php
                                                    $result = mysqli_query($conexion, $categorias_padre);


                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>

                                                        <tr>
                                                            <td colspan="4" style="padding:2px 5px; border-left:#37c0fb 1px solid; border-bottom:#37c0fb 1px dashed;  border-right:#37c0fb 1px solid" onclick="tipo_filtro(<?php echo $row['IDCategoriaPadre'] . ',3' ?>)">
                                                                <?php echo $row["DCategoriaPadre"] ?></td>
                                                        </tr>
                                                    <?php } ?>


                                                </div>
                                            <?php } ?>

                                        </tbody>
                                    </table>

                                </section>
                                <hr style=" border-top: 1px solid blue;">
                                <p>
                                    Seleccione la <strong>SUB-CATEGORIA</strong> que usted desee:<br>
                                    <br>
                                <table id="table_id2" width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:10px; line-height:12px;">
                                    <thead>
                                        <tr>
                                            <td width="25%" style="border-top:1px solid #37c0fb; border-right:#37c0fb 1px solid; border-bottom:#37c0fb 1px solid; color:#FFF; text-align:center; padding:2px 5px; font-weight:bold; background-color:#37c0fb; font-size:12px">SUB-CATEGORIA</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <!-- items -->
                                        <?php
                                        $result = mysqli_query($conexion, $categorias);


                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>

                                            <tr>
                                                <td colspan="4" style="padding:2px 5px; border-left:#37c0fb 1px solid; border-bottom:#37c0fb 1px dashed;  border-right:#37c0fb 1px solid" onclick="tipo_filtro(<?php echo $row['IDCategoria'] . ',2' ?>)">
                                                    <?php echo $row["DCategoria"] ?></td>
                                            </tr>
                                        <?php } ?>



                                    </tbody>
                                </table>

                                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td width="45%" align="left" valign="middle" bgcolor="#FFFFFF" style="padding:5px 0">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>
                                    Seleccione la <strong>MARCA</strong> que usted desee:<br>
                                    <br>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:10px; line-height:12px;">
                                    <tr>
                                        <td width="25%" style="border-top:1px solid #37c0fb; border-right:#37c0fb 1px solid; border-bottom:#37c0fb 1px solid; color:#FFF; text-align:center; padding:2px 5px; font-weight:bold; background-color:#37c0fb; font-size:12px">MARCA</td>
                                    </tr>

                                    <?php
                                    $result = mysqli_query($conexion, $marcas);


                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>

                                        <tr>
                                            <td colspan="4" style="padding:2px 5px; border-left:#37c0fb 1px solid; border-bottom:#37c0fb 1px dashed;  border-right:#37c0fb 1px solid" onclick="tipo_filtro(<?php echo $row['IDMarca'] . ',4' ?>)">
                                                <?php echo $row["DMarca"] ?></td>
                                        </tr>
                                    <?php } ?>

                                </table>
                                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td width="45%" align="left" valign="middle" bgcolor="#FFFFFF" style="padding:5px 0">
                                                <!-- <a href="buscador_articulos_numero.php"  class="button">Volver a Buscar</a> -->
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>



                    </div>



                </div>
                <div class="4u 12u(narrower)" style="width: 60%;">
                    <div class="col">
                        <div class="">
                            <div id="content">
                                <!-- Articulos -->
                                <div style="float:right">
                                    <?php
                                    $q12 = mysqli_query($link, "SELECT *
                           FROM `tmoneda`
                           WHERE IdMoneda =2
                           LIMIT 0 , 30");


                                    $read = mysqli_fetch_array($q12);
                                    ///$CAMBIO=$read['TCambio'];
                                    $_SESSION['CAMBIO'] = $read['TCambio'];
                                    ?>
                                    Tipo de cambio para facturacion: <?php echo $read['TCambio']; ?>
                                    <br>
                                    Estos precios incluyen I.V.A.
                                </div>
                                <strong>Estimado cliente:</strong><br>
                                Resultado de su b&uacute;squeda por categor&iacute;as: <br>
                                <br>
                                <table id="table_id4" width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:10px; line-height:12px;">
                                    <thead>
                                        <tr>
                                            <td width="10%" style="color:#FFF; text-align:center; padding:2px 5px; background-color:#37c0fb; font-weight:bold;"></td>
                                            <td width="10%" style="color:#FFF; text-align:center; padding:2px 5px; background-color:#37c0fb; font-weight:bold;">CODIGO</td>
                                            <td width="55%" style="color:#FFF; text-align:center; padding:2px 5px; background-color:#37c0fb; font-weight:bold;">DETALLE</td>


                                            <td width="10%" style="color:#FFF; text-align:center; padding:2px 5px; background-color:#37c0fb; font-weight:bold; border-right:#37c0fb 1px solid">PRECIO</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        // echo "numero total = " . $total;
                                        while ($row = mysqli_fetch_assoc($result_tabla)) {
                                            $idmarca = $row['articulo.IDMarca'];
                                            $idrubro = $row['articulo.IDRubro'];
                                            $idfamilia = $row['articulo.IDFamilia'];
                                            $idarticulo = $row['articulo.IDArticulo'];


                                            $v = mysqli_query($conexion, "SELECT * from ficha_articulo where rubro='" . $idrubro . "' 
                                    and marca='" . $idmarca . "' and  familia='" . $idfamilia . "' and articulo='" . $row['articulo.IDArticulo'] . "'");
                                            $va = mysqli_fetch_array($v);
                                            $enlace = $va['ruta'];


                                            $v22 = mysqli_query($conexion, "SELECT * from articulo where 
                                    IDArticulo='" . $row['articulo.IDArticulo'] . "'
                                    AND
                                    IDRubro='" . $idrubro . "' and IDMarca='" . $idmarca . "' and  IDFamilia='" . $idfamilia . "'");


                                            $va22 = mysqli_fetch_array($v22);
                                            $enlace3 = $va22['ImagenArticulo'];


                                        ?>
                                            <tr>
                                                <td>
                                                    <a style="color: #000;" href="producto.php?id=<?php echo $idarticulo ?>&idmarca=<?php echo $idmarca ?>&idfamilia=<?php echo $idfamilia ?>&idrubro=<?php echo $idrubro ?>"><img src="foca0_ver_info.png" width="96" height="96" alt="Imagen"></a>
                                                </td>
                                                <td width="15%" style="border-right:#37c0fb 1px solid; border-bottom:#37c0fb 1px dashed; padding:2px 5px"><?php echo $row["articulo.CodRevista"] ?></td>
                                                <td width="15%" style="border-right:#37c0fb 1px solid; border-bottom:#37c0fb 1px dashed; padding:2px 5px"><?php echo $row["articulo.Descripcion"] ?></td>
                                                <td width="15%" style="border-right:#37c0fb 1px solid; border-bottom:#37c0fb 1px dashed; padding:2px 5px"><?php echo $row["articulo.PReVendedor"] ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>

                                </table>
                                <b>Cantidad de registros encontrados: <?php echo $i; ?> </b>
                                <br>
                                <br>
                                <br>
                                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td width="45%" align="left" valign="middle" bgcolor="#FFFFFF" style="padding:5px 0">
                                                <!-- <a href="buscador_articulos_numero.php"  class="button">Volver a Buscar</a> -->
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <!-- Footer -->
    <div id="footer">

        <div class="container">
            <div class="row">
                <section class="3u 6u(narrower) 12u$(mobilep)">

                    <div class="footer contacto" style="width: 25%;color: white">



                        <a style="font-size: 17px;text-decoration: none;" target="_blank" href="https://api.whatsapp.com/send?phone=5491141453097&amp;text=Hola!%20Quiero%20Informarme"> WhatsApp:
                            <img style="font-size: 17px;text-decoration: none;width:16px;height:16px" src="https://refomar.com.ar/refomar/ws.jpg">
                            Mariano </a>



                    </div>

                    <div class="footer contacto" style="width: 25%;color: white">
                        <a style="font-size: 17px;text-decoration: none;" target="_blank" href="https://api.whatsapp.com/send?phone=5491141451710&amp;text=Hola!%20Quiero%20Informarme"> WhatsApp:
                            <img style="font-size: 17px;text-decoration: none;width:16px;height:16px" src="https://refomar.com.ar/refomar/ws.jpg">
                            Leandro </a>
                    </div>

                    <div class="footer contacto" style="width: 25%;color: white">
                        <a style="font-size: 17px;text-decoration: none;" target="_blank" href="https://api.whatsapp.com/send?phone=55491141446747&amp;text=Hola!%20Quiero%20Informarme"> WhatsApp:
                            <img style="font-size: 17px;text-decoration: none;width:16px;height:16px" src="https://refomar.com.ar/refomar/ws.jpg">
                            Walter </a>
                    </div>

                    <div class="footer contacto" style="width: 25%;color: white">
                        <a style="font-size: 17px;text-decoration: none;" target="_blank" href="https://api.whatsapp.com/send?phone=5491123003078&amp;text=Hola!%20Quiero%20Informarme"> WhatsApp:
                            <img style="font-size: 17px;text-decoration: none;width:16px;height:16px" src="https://refomar.com.ar/refomar/ws.jpg">
                            David </a>
                    </div>
            </div>
            <hr>
            </section>
            <div class="container">
                <div class="row">
                    <section class="3u 6u(narrower) 12u$(mobilep)">

                        <div class="footer contacto">
                            <div class="footer images">
                                <img src="images/footer_arroba.jpg" width="40" height="40">
                            </div>
                            <div class="footer texto">Compras:
                                <br>
                                omarm@refomar.com.ar <br>
                                <br>
                                Ventas: <br>
                                refomar@refomar.com.ar
                            </div>
                        </div>

                        <div class="footer contacto">
                            <div class="footer images">
                                <img src="images/footer_tel.jpg" width="40" height="40">
                            </div>
                            <div class="footer texto"><span class="footer tel">(+54.11) 4641.1454</span><br>
                                4641.5321 | 4642.6956 | 4644.2140</div>
                        </div>

                        <div class="footer contacto">
                            <div class="footer images">
                                <img src="images/footer_reloj.jpg" width="40" height="40">
                            </div>
                            <div class="footer texto">Lunes a Viernes:<br>
                                08:00 a 13:00 hs. - 14:00 a 18:00 hs.<br>
                                <br>
                                S&aacute;bados:<br>
                                09:00 a 13:00 hs.
                            </div>
                        </div>

                        <div class="footer fiscal">
                            <img src="images/F960.png" width="100" height="144" alt="Data Fiscal">
                        </div>

                    </section>
                </div>
            </div>

            <!-- Copyright -->
            <div class="copyright">
                Copyright &copy; 2003 - <? $anio = (date("Y"));
                                        echo ($anio) ?> Refrigeraci&oacute;n Omar SRL - Todos los derechos reservados. - <a href="https://refomar.com.ar/refomar/politica-privacidad.php">Pol&iacute;tica de Privacidad</a>
            </div>

        </div>

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.dropotron.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
        <script type="text/javascript" src="slider/js/jquery.eislideshow.js"></script>
        <script type="text/javascript" src="slider/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#ei-slider').eislideshow({
                    animation: 'center',
                    autoplay: true,
                    slideshow_interval: 3000,
                    titlesFactor: 0
                });
            });
        </script>


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

        <script>
            var numpage, search, categoria, padre, marca,nombre_categoria,nombre_padre,nombre_marca,nombre_search;
            init_search();

            function init_search() {
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                numpage = urlParams.get("pagina");
                search = urlParams.get("search");
                nombre_search = urlParams.get("search");
                categoria = urlParams.get("categoria");
                nombre_categoria = urlParams.get("nombre_categoria");
                padre = urlParams.get("padre");
                nombre_padre = urlParams.get("nombre_padre");
                marca  = urlParams.get("marca");
                nombre_marca  = urlParams.get("nombre_marca");
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
                    params = params + "&nombre_categoria=" + nomnombre_categoriabre_padre;
                }

                if (padre != null) {
                    params = params + "&padre=" + padre;
                    params = params + "&nombre_padre=" + nombre_padre;
                }

                if (marca != null) {
                    params = params + "&marca=" + marca;
                    params = params + "&nombre_marca=" + nombre_marca;
                }
                console.log(params);
                document.location.href = "./" + "promos.php?" + params;
            }

            function tipo_filtro(valor, tipo,nombre="") {

                switch (tipo) {
                    case 0:
                        numpage = valor;
                        break;
                    case 1:

                        search = document.getElementById('exampleFormControlInput1').value;
                        break;
                    case 2:
                        categoria = valor;
                        nomnombre_categoriabre_padre = nombre;
                        break;
                    case 3:
                        padre = valor;
                        nombre_padre = nombre;
                        break;
                    case 4:
                        marca = valor;
                        nombre_marca = nombre;
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