<?php session_start();
include 'conexion_alien.php';
include 'configuracion.php';

// if ($_GET['id']=='') {
//   $url="buscador_articulos.php";
//  echo '<script type="text/javascript">window.location="'.$url.'";</script>';
// }

// if (!isset($_SESSION['iduser'])) {
// $url="index.php";
// echo '<script type="text/javascript">window.location="'.$url.'";</script>';
// }
?>
<!DOCTYPE HTML>
<html>
<div id="titleBar"><a href="#navPanel" class="toggle"></a><span class="title">undefined</span></div>

<head>
   <title>REFRIGERACI&Oacute;N OMAR S.R.L. - Somos L&iacute;der en refrigeraci&oacute;n y repuestos</title>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
   <link rel="stylesheet" href="assets/css/main.css" />
   <link rel="stylesheet" href="assets/css/login_style.css" />
   <!--[if lte IE 8]>
      <link rel="stylesheet" href="assets/css/ie8.css" />
      <![endif]-->
   <!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ie9.css" />
      <![endif]-->
   <link rel="stylesheet" type="text/css" href="slider/css/demo.css" />
   <link rel="stylesheet" type="text/css" href="slider/css/style.css" />
   <script src="assets/js/jquery.min.js"></script>
   <script src="assets/js/jquery.dropotron.min.js"></script>
   <script src="assets/js/skel.min.js"></script>
   <script src="assets/js/util.js"></script>
   <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
   <script src="assets/js/main.js"></script>
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
   <script type="text/javascript" src="slider/js/jquery.eislideshow.js"></script>
   <script type="text/javascript" src="slider/js/jquery.easing.1.3.js"></script>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
   <style type="text/css">
      body,
      td,
      th {
         color: #474747;
      }
   </style>
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

               <div id="sidebar">
                  <!-- Sidebar -->
                  <section>
                     <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Buscar</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Buscar">
                     </div>
                     <div class="row">
                        <div class="col">
                           <button type="submit" class="btn btn-primary mb-3" onclick="tipo_filtro('',1)">Buscar</button>
                        </div>
                     </div>
                     <br>
                     <hr>
                     <a href="promo.php" class="button">BUSCAR DE NUEVO</a>
                     <br><br>
                     Seleccione <strong>CATEGORIA</strong> que usted desee:<br>
                     <br>
                     <table id="table_id" class="table_id" width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:10px; line-height:12px;">
                        <thead>
                           <tr>
                              <td width="25%" style="border-top:1px solid #37c0fb; border-left:1px solid #37c0fb; 
                                    border-right:#37c0fb 1px solid; border-bottom:#37c0fb 1px dashed; background-color:#F1F1F1; font-weight:bold; 
                                    color:#37c0fb; text-align:center; padding:2px 5px; font-size:12px">CATEGORIA</td>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           if (isset($_GET['idRubro'])) {
                              $q = mysqli_query($link, "SELECT `IDCategoriaPadre`, `DCategoriaPadre`, `Activa` FROM `categoria_padre` WHERE activa=1 and IDCategoriaPadre = '" . $_GET['idRubro'] . "' order by DCategoriaPadre ");
                           } else {
                              $q = mysqli_query($link, "SELECT `IDCategoriaPadre`, `DCategoriaPadre`, `Activa` FROM `categoria_padre` where activa =1 order by DCategoriaPadre ");
                           }

                           while ($r = mysqli_fetch_array($q)) {
                              echo '<tr>
                                      <td colspan="4" style="padding:2px 5px; border-left:#37c0fb 1px solid; border-bottom:#37c0fb 1px dashed;  
                                      border-right:#37c0fb 1px solid"><a style="color:#37C0FB; font-size:14px; text-decoration:none; 
                                      "href="promo.php?idRubro=' . $r['IDCategoriaPadre'] . '">' . utf8_encode($r['DCategoriaPadre']) . '</a></td>
                                    </tr>';
                           }

                           ?>
                        </tbody>
                     </table>
                  </section>
                  <hr style=" border-top: 1px solid blue;">
                  <p>
                     Seleccione <strong>SUB CATEGORIA</strong> que usted desee:<br>
                     <br>
                  <table id="table_id2" width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:10px; line-height:12px;">
                     <thead>
                        <tr>
                           <td width="25%" style="border-top:1px solid #37c0fb; border-right:#37c0fb 1px solid; border-bottom:#37c0fb 1px solid; color:#FFF; text-align:center; padding:2px 5px; font-weight:bold; background-color:#37c0fb; font-size:12px">SUB-CATEGORIA</td>
                        </tr>
                        <?php
                        if (isset($_GET['idRubro'])) {

                           $qr = mysqli_query($link, "SELECT `IDCategoria`, `DCategoria`, `IDCategoriaPadre`, `Activa` 
                                  FROM `categoria` WHERE IDCategoriaPadre='" . $_GET['idRubro'] . "' ");
                           $rq = mysqli_fetch_array($qr);

                           //    echo '
                           //  <tr>
                           //    <td colspan="4" style="padding:2px 5px; border-bottom:#37c0fb 1px solid; border-left:#37c0fb 1px solid; border-right:#37c0fb 1px solid; background-color:#F1F1F1"><strong>Rubro seleccionado:</strong> '.$rq['IDRubro'].'-'.$rq['DRubro'].'</td>
                           //  </tr>';

                        ?>
                     </thead>
                     <tbody>
                     <?php
                           if (isset($_GET['idMarca'])) {
                              $q = mysqli_query($link, "SELECT `IDCategoria`, `DCategoria`, `IDCategoriaPadre`, `Activa` 
                                FROM `categoria` WHERE Activa=1 and
                                IDCategoriaPadre='" . $_GET['idRubro'] . "' 
                                and IDCategoria='" . $_GET['idMarca'] . "' order by DCategoria  ");
                           } else {
                              $q = mysqli_query($link, "SELECT `IDCategoria`, `DCategoria`, `IDCategoriaPadre`, `Activa` 
                                FROM `categoria` WHERE Activa=1 and
                                IDCategoriaPadre='" . $_GET['idRubro'] . "' order by DCategoria");
                           }



                           while ($r = mysqli_fetch_array($q)) {
                              echo '<tr>
                                                           <td colspan="4" style="padding:2px 5px; border-left:#37c0fb 1px solid; border-bottom:#37c0fb 1px dashed;  border-right:#37c0fb 1px solid"><a style="color:#37C0FB; font-size:14px; text-decoration:none; 
                                                           "href="promo.php?idMarca=' . $r['IDCategoria'] . '&idRubro=' . $r['IDCategoriaPadre'] . '">' . utf8_encode($r['DCategoria']) . ' </a></td>
                                                         </tr>';
                           }
                        }
                     ?>
                     </tbody>
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
                  <p>
                     Seleccione la <strong>MARCA</strong> que usted desee:<br>
                     <br>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:10px; line-height:12px;">
                     <tr>
                        <td width="25%" style="border-top:1px solid #37c0fb; border-right:#37c0fb 1px solid; border-bottom:#37c0fb 1px solid; color:#FFF; text-align:center; padding:2px 5px; font-weight:bold; background-color:#37c0fb; font-size:12px">MARCA</td>
                     </tr>
                     <?php
                     // echo '
                     // <tr>
                     // <td colspan="4" style="padding:2px 5px; border-bottom:#37c0fb 1px solid; border-left:#37c0fb 1px solid; border-right:#37c0fb 1px solid; background-color:#F1F1F1"><strong>Rubro seleccionado:</strong> '.$rq['IDRubro'].'-'.$rq['DRubro'].'</td>
                     // </tr>';

                     ?>
                     <?php
                     if (isset($_GET['idRubro']) && !isset($_GET['idMarca']) && !isset($_GET['idM'])) {




                        $q22 = mysqli_query($link, "Select
                             categoria_padre.DCategoriaPadre,
                             categoria.DCategoria,
                             articulo.Descripcion,
                             categoria.IDCategoria,
                             categoria_padre.IDCategoriaPadre,
                             marca.IDRubro,
                             marca.DMarca,
                             marca.IDMarca,
                             articulo.IDArticulo,
                             articulo.Activo,
                             articulo.ListaInternet,
                             articulo.EnPromocion
                             From
                             articulo Inner Join
                             categoria On categoria.IDCategoria = articulo.IDCategoria Inner Join
                             categoria_padre On categoria_padre.IDCategoriaPadre = categoria.IDCategoriaPadre Inner Join
                             marca On marca.IDMarca = articulo.IDMarca
                                     And marca.IDRubro = articulo.IDRubro
                             Where
                             articulo.EnPromocion = -1 And
                             articulo.Activo = -1 And
                             articulo.ListaInternet = -1 And
                             categoria_padre.IDCategoriaPadre ='" . $_GET['idRubro'] . "'                             
                             GROUP BY  marca.IDMarca
                               Order By
                               marca.DMarca");
                     } elseif (isset($_GET['idRubro']) && isset($_GET['idMarca']) && !isset($_GET['idM'])) {



                        $q22 = mysqli_query($link, "Select
                             categoria_padre.DCategoriaPadre,
                             categoria.DCategoria,
                             articulo.Descripcion,
                             categoria.IDCategoria,
                             categoria_padre.IDCategoriaPadre,
                             marca.IDRubro,
                             marca.DMarca,
                             marca.IDMarca,
                             articulo.IDArticulo,
                             articulo.Activo,
                             articulo.ListaInternet,
                             articulo.EnPromocion
                             From
                             articulo Inner Join
                             categoria On categoria.IDCategoria = articulo.IDCategoria Inner Join
                             categoria_padre On categoria_padre.IDCategoriaPadre = categoria.IDCategoriaPadre Inner Join
                             marca On marca.IDMarca = articulo.IDMarca
                                     And marca.IDRubro = articulo.IDRubro
                             Where
                             articulo.EnPromocion = -1 And
                             articulo.Activo = -1 And
                             articulo.ListaInternet = -1 And
                             categoria_padre.IDCategoriaPadre ='" . $_GET['idRubro'] . "'  
                             And
                             categoria.IDCategoria='" . $_GET['idMarca'] . "'
                             GROUP BY  marca.IDMarca
                         Order By
                           marca.DMarca");
                     } elseif (isset($_GET['idRubro']) && isset($_GET['idMarca']) && isset($_GET['idM'])) {



                        $q22 = mysqli_query($link, "Select
                             categoria_padre.DCategoriaPadre,
                             categoria.DCategoria,
                             articulo.Descripcion,
                             categoria.IDCategoria,
                             categoria_padre.IDCategoriaPadre,
                             marca.IDRubro,
                             marca.DMarca,
                             marca.IDMarca,
                             articulo.IDArticulo,
                             articulo.Activo,
                             articulo.ListaInternet,
                             articulo.EnPromocion
                             From
                             articulo Inner Join
                             categoria On categoria.IDCategoria = articulo.IDCategoria Inner Join
                             categoria_padre On categoria_padre.IDCategoriaPadre = categoria.IDCategoriaPadre Inner Join
                             marca On marca.IDMarca = articulo.IDMarca
                                     And marca.IDRubro = articulo.IDRubro
                             Where
                             articulo.EnPromocion = -1 And
                             articulo.Activo = -1 And
                             articulo.ListaInternet = -1 And
                             categoria_padre.IDCategoriaPadre ='" . $_GET['idRubro'] . "'  
                             And
                             categoria.IDCategoria='" . $_GET['idMarca'] . "' And
                             marca.IDMarca='" . $_GET['idM'] . "'
                                                          GROUP BY  marca.IDMarca
                         Order By
                         marca.DMarca");
                     }

                     while ($r22 = mysqli_fetch_array($q22)) {
                        echo '<tr>
                               <td colspan="4" style="padding:2px 5px; border-left:#37c0fb 1px solid; border-bottom:#37c0fb 1px dashed;  
                               border-right:#37c0fb 1px solid">
                               <a style="color:#37C0FB; font-size:14px; text-decoration:none; 
                               "href="promo.php?idMarca=' . $r22['IDCategoria'] . '&idRubro=' . $r22['IDCategoriaPadre'] . '&idM=' . $r22['IDMarca'] . '">' . utf8_encode($r22['DMarca']) . ' </a></td>
                             </tr>';
                     }

                     ?>
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
                  <!-- <center>
                        <a href="promo.php" class="button" >BUSCAR DE NUEVO</a>
                        </center> -->
                  <?php
                  function getRealIP()
                  {
                     if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                        return $_SERVER['HTTP_CLIENT_IP'];
                     } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                        return $_SERVER['HTTP_X_FORWARDED_FOR'];
                     } else {
                        return $_SERVER['REMOTE_ADDR'];
                     }
                  }

                  $ip = getRealIP();

                  $cu = mysqli_query($link, "SELECT COUNT(*) as cuantos FROM `historial` WHERE ip='" . $ip . "'");
                  $rh2 = mysqli_fetch_array($cu);
                  $cuantosreg = $rh2['cuantos'];

                  if ($cuantosreg > 0) {


                  ?>
                     <p>
                        <strong>Productos Vistos Recientemente</strong>:<br>
                        <br>
                     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:10px; line-height:12px;">
                        <tr>
                           <td width="25%" style="border-top:1px solid #37c0fb; border-right:#37c0fb 1px solid; border-bottom:#37c0fb 1px solid; color:#FFF; text-align:center; padding:2px 5px; font-weight:bold; background-color:#37c0fb; font-size:12px">PRODUCTOS</td>
                           <td width="25%" style="border-top:1px solid #37c0fb; border-right:#37c0fb 1px solid; border-bottom:#37c0fb 1px solid; color:#FFF; text-align:center; padding:2px 5px; font-weight:bold; background-color:#37c0fb; font-size:12px"></td>
                        </tr>
                        <?php
                        $rhq = mysqli_query($link,  "SELECT `id`, `rubro`, `marca`, `familia`, `articulo`, `ip` 
                           FROM `historial` 
                           WHERE  ip='" . $ip . "'");

                        while ($rhh = mysqli_fetch_array($rhq)) {

                           $qah = mysqli_query($link, "SELECT categoria_padre.DCategoriaPadre,categoria_padre.IDCategoriaPadre,
                             categoria.DCategoria,categoria.IDCategoria, articulo.Descripcion,
                           `IDRubro`, `IDMarca`, `IDFamilia`, `IDArticulo`, 
                           `IDStock`, `CodAnterior`, `Descripcion`, `PRevista`, `IDMedida`, `PVenta`, 
                           `PReVendedor`, `PCompra`, `PReposicion`, `CantMinima`, `AcumuladoVentas`, 
                           `AcumuladoCompras`, `AcumuladoAjuste`, `CantStock`, `SaldoInventario`, 
                           `FechaIngreso`, `FechaEgreso`, `FechaAlta`, `Acumulado`, `SaldoInvDeposito1`, 
                           `CAntDeposito1`, `AjusteDeposito1`, `IdPais`, 
                           `Activo`, `NumDespacho`, `SaldoInvDeposito2`, `CAntDeposito2`, `AjusteDeposito2`, 
                           `SaldoInvDeposito3`, `CAntDeposito3`, `AjusteDeposito3`, `FechaInvDep0`, `FechaInvDep1`, 
                           `FechaInvDep2`, `FechaInvDep3`, `FOB`, `IvaDiferencial`, `IdMoneda`, `CodRevista`, `Moneda`, `Pais`, `Medida` 
                           FROM articulo
                           INNER JOIN categoria ON categoria.IDCategoria = articulo.IDCategoria
                           INNER JOIN categoria_padre ON categoria_padre.IDCategoriaPadre = categoria.IDCategoriaPadre
                           WHERE  IDArticulo='" . $rhh['articulo'] . "'  
                           AND
                           IDRubro ='" . $rhh['rubro'] . "'
                           AND
                           IDMarca ='" . $rhh['marca'] . "'
                           AND
                           IDFamilia = '" . $rhh['familia'] . "'
                                                        group by IDArticulo");

                           $r = mysqli_fetch_array($qah);

                           $idmarca = $rhh['marca'];
                           $idrubro = $rhh['rubro'];
                           $idfamilia = $rhh['familia'];
                           $idarticulo = $rhh['articulo'];


                           $v = mysqli_query($link, "SELECT *from ficha_articulo 
                             where rubro='" . $idrubro . "' and marca='" . $idmarca . "' and  familia='" . $idfamilia . "' and articulo='" . $r['IDArticulo'] . "'");
                           $va = mysqli_fetch_array($v);
                           $enlace = $va['ruta'];





                           $v22 = mysqli_query($link, "SELECT *from articulo where 
                             IDArticulo='" . $r['IDArticulo'] . "'
                             AND
                             IDRubro='" . $idrubro . "' and IDMarca='" . $idmarca . "' and  IDFamilia='" . $idfamilia . "'");

                           $va22 = mysqli_fetch_array($v22);
                           $enlace3 = $va22['ImagenArticulo'];


                           /*
                           
                           $_SESSION['Lprecio']
                           NOTA:   Para poder presupuestar el cliente tiene que estar con Tipo  = C en tabla tclientesweb..   
                           ADEMÁS: SI LPrecio = 0 (en tclientesweb) tomar PreVendedor de la tabla de artículos. 
                           SI LPrecio = 1 (en tclientesweb) tomar PRevista de la tabla de artículos.    
                           SI LPrecio = 2 (en tclientesweb) tomar PVenta de la tabla de artículos.       
                           Ahora me quedo tranquilo era algo no aclarado en la explicación que te mandé,  Saludos
                           
                             */

                           if ($MuestraPrecio == 'SI') {



                              if ($_SESSION['Lprecio'] == '0') {
                                 $precio = $r['PVenta'];
                              }

                              if ($_SESSION['Lprecio'] == '1') {
                                 $precio = $r['PRevista'];
                              }

                              if ($_SESSION['Lprecio'] == '2') {
                                 $precio = $r['PReVendedor'];
                              }

                              # code...
                           } else {
                              $precio = "0";
                           }
                           $precio = $r['PVenta'];
                           //   if ($enlace=='') {$enlaces="javascript:void(0);"; $enlace2="sin-info.png";$ficha=""; }else{$enlaces="fichas/".$enlace; $enlace2="images/ficha.png";$ficha='<a target="_blank" href="'.$enlaces.'"> <img src="'.$enlace2.'" width="45" height="45" alt="descargar ficha"></a>';}
                           //   if ($enlace3=='') {$enlace23="sin-info.png"; }
                           //   else{$enlace23="fichas/".$enlace3;}

                           if ($enlace == '') {
                              $enlaces = "javascript:void(0);";
                              $enlace2 = "sin-info.png";
                              $ficha = '';
                           } else {
                              $enlaces = "fichas/" . $enlace;
                              $enlace2 = "pdf_ficha.png";
                              $ficha = '<a target="_blank" href="' . $enlaces . '"> <img src="' . $enlace2 . '" width="45" height="45" alt="descargar ficha"></a>';
                           }

                           if ($enlace3 == '') {
                              $enlace23 = "foca0_ver_info.png";
                           } else {
                              $enlace23 = "fichas/" . $enlace3;
                           }

                           $precios = $precio * $_SESSION['CAMBIO'];

                        ?>
                        <?php
                           echo '<tr>
                                 <td width=25%" align="left" valign="middle" bgcolor="#FFFFFF" style="padding:5px 0">
                                    <a href="producto.php?id=' . $r['IDArticulo'] . '&idmarca=' . $r['IDMarca'] . '&idfamilia=' . $r['IDFamilia'] . '&idrubro=' . $r['IDRubro'] . '">
                                    <img style="width:40px;height:40px" src="' . $enlace23 . '" alt="articulo" >
                                    </a>
                                 
                                 </td>
                                    <td width="25%" align="left" valign="middle" bgcolor="#FFFFFF" style="padding:5px 0">
                                    <a style="color:#000" href="producto.php?id=' . $r['IDArticulo'] . '&idmarca=' . $r['IDMarca'] . '&idfamilia=' . $r['IDFamilia'] . '&idrubro=' . $r['IDRubro'] . '"
                                     <h3>' . utf8_encode($r['Descripcion']) . '</h3>
                                     </a>
                                     <br>
                                                      
                                       <b>
                                          $' . $precios . ' 
                                       </b>
                           
                                    </td>
                                  </tr>';
                        }
                        ?>
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
                     <!-- <center>
                        <a href="promo.php" class="button" >BUSCAR DE NUEVO</a>
                        </center> -->
                  <?php }  ?>
               </div>

            </div>
            <div class="8u  12u(narrower) important(narrower)">
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
                     <?php
                     if (isset($_GET['idRubro']) && !isset($_GET['idMarca']) && !isset($_GET['idM'])) {



                        $q = mysqli_query($link, "SELECT categoria_padre.DCategoriaPadre, categoria.DCategoria, articulo.Descripcion,
                              articulo.`IDRubro`, articulo.`IDMarca`, articulo.`IDFamilia`, `IDArticulo`, 
                               `IDStock`, `CodAnterior`, `Descripcion`, `PRevista`, `IDMedida`, `PVenta`, 
                               `PReVendedor`, `PCompra`, `PReposicion`, `CantMinima`, `AcumuladoVentas`, 
                               `AcumuladoCompras`, `AcumuladoAjuste`, `CantStock`, `SaldoInventario`, 
                               `FechaIngreso`, `FechaEgreso`, `FechaAlta`, `Acumulado`, `SaldoInvDeposito1`, 
                               `CAntDeposito1`, `AjusteDeposito1`, `IdPais`, 
                               `Activo`, `NumDespacho`, `SaldoInvDeposito2`, `CAntDeposito2`, `AjusteDeposito2`, 
                               `SaldoInvDeposito3`, `CAntDeposito3`, `AjusteDeposito3`, `FechaInvDep0`, `FechaInvDep1`, 
                               `FechaInvDep2`, `FechaInvDep3`, `FOB`, `IvaDiferencial`, `IdMoneda`, `CodRevista`, `Moneda`, `Pais`, `Medida`
                          From
                              articulo Inner Join
                              categoria On categoria.IDCategoria = articulo.IDCategoria Inner Join
                              categoria_padre On categoria_padre.IDCategoriaPadre = categoria.IDCategoriaPadre Inner Join
                              marca On marca.IDMarca = articulo.IDMarca
                                      And marca.IDRubro = articulo.IDRubro
                          Where
                              articulo.EnPromocion = -1 And
                              articulo.Activo = -1 And
                              articulo.ListaInternet = -1 And
                              categoria_padre.IDCategoriaPadre = '" . $_GET['idRubro'] . "'");
                     } elseif (isset($_GET['idRubro']) && isset($_GET['idMarca']) && !isset($_GET['idM'])) {



                        $q = mysqli_query($link, "SELECT categoria_padre.DCategoriaPadre, categoria.DCategoria, articulo.Descripcion,
                             articulo.`IDRubro`, articulo.`IDMarca`, articulo.`IDFamilia`, `IDArticulo`, 
                              `IDStock`, `CodAnterior`, `Descripcion`, `PRevista`, `IDMedida`, `PVenta`, 
                              `PReVendedor`, `PCompra`, `PReposicion`, `CantMinima`, `AcumuladoVentas`, 
                              `AcumuladoCompras`, `AcumuladoAjuste`, `CantStock`, `SaldoInventario`, 
                              `FechaIngreso`, `FechaEgreso`, `FechaAlta`, `Acumulado`, `SaldoInvDeposito1`, 
                              `CAntDeposito1`, `AjusteDeposito1`, `IdPais`, 
                              `Activo`, `NumDespacho`, `SaldoInvDeposito2`, `CAntDeposito2`, `AjusteDeposito2`, 
                              `SaldoInvDeposito3`, `CAntDeposito3`, `AjusteDeposito3`, `FechaInvDep0`, `FechaInvDep1`, 
                              `FechaInvDep2`, `FechaInvDep3`, `FOB`, `IvaDiferencial`, `IdMoneda`, `CodRevista`, `Moneda`, `Pais`, `Medida`
                         From
                             articulo Inner Join
                             categoria On categoria.IDCategoria = articulo.IDCategoria Inner Join
                             categoria_padre On categoria_padre.IDCategoriaPadre = categoria.IDCategoriaPadre Inner Join
                             marca On marca.IDMarca = articulo.IDMarca
                                     And marca.IDRubro = articulo.IDRubro
                         Where
                             articulo.EnPromocion = -1 And
                             articulo.Activo = -1 And
                             articulo.ListaInternet = -1 And
                             categoria.IDCategoria = '" . $_GET['idMarca'] . "' And
                             categoria_padre.IDCategoriaPadre = '" . $_GET['idRubro'] . "'");

                        //   echo "SELECT categoria_padre.DCategoriaPadre, categoria.DCategoria, articulo.Descripcion,
                        //   `IDRubro`, `IDMarca`, `IDFamilia`, `IDArticulo`, 
                        //   `IDStock`, `CodAnterior`, `Descripcion`, `PRevista`, `IDMedida`, `PVenta`, 
                        //   `PReVendedor`, `PCompra`, `PReposicion`, `CantMinima`, `AcumuladoVentas`, 
                        //   `AcumuladoCompras`, `AcumuladoAjuste`, `CantStock`, `SaldoInventario`, 
                        //   `FechaIngreso`, `FechaEgreso`, `FechaAlta`, `Acumulado`, `SaldoInvDeposito1`, 
                        //   `CAntDeposito1`, `AjusteDeposito1`, `IdPais`, 
                        //   `Activo`, `NumDespacho`, `SaldoInvDeposito2`, `CAntDeposito2`, `AjusteDeposito2`, 
                        //   `SaldoInvDeposito3`, `CAntDeposito3`, `AjusteDeposito3`, `FechaInvDep0`, `FechaInvDep1`, 
                        //   `FechaInvDep2`, `FechaInvDep3`, `FOB`, `IvaDiferencial`, `IdMoneda`, `CodRevista`, `Moneda`, `Pais`, `Medida` 
                        //  FROM articulo
                        //  INNER JOIN categoria ON categoria.IDCategoria = articulo.IDCategoria
                        //  INNER JOIN categoria_padre ON categoria_padre.IDCategoriaPadre = categoria.IDCategoriaPadre
                        //  WHERE  
                        //  categoria_padre.IDCategoriaPadre='".$_GET['idRubro']."' and  
                        //  categoria.IDCategoria='".$_GET['idMarca']."' 
                        //  and EnPromocion=-1   
                        //  group by IDArticulo
                        //  order by articulo.Descripcion";

                     } elseif (isset($_GET['idRubro']) && isset($_GET['idMarca']) && isset($_GET['idM'])) {


                        $q = mysqli_query($link, "SELECT categoria_padre.DCategoriaPadre, categoria.DCategoria, articulo.Descripcion,
                              articulo.`IDRubro`, articulo.`IDMarca`, articulo.`IDFamilia`, `IDArticulo`, 
                               `IDStock`, `CodAnterior`, `Descripcion`, `PRevista`, `IDMedida`, `PVenta`, 
                               `PReVendedor`, `PCompra`, `PReposicion`, `CantMinima`, `AcumuladoVentas`, 
                               `AcumuladoCompras`, `AcumuladoAjuste`, `CantStock`, `SaldoInventario`, 
                               `FechaIngreso`, `FechaEgreso`, `FechaAlta`, `Acumulado`, `SaldoInvDeposito1`, 
                               `CAntDeposito1`, `AjusteDeposito1`, `IdPais`, 
                               `Activo`, `NumDespacho`, `SaldoInvDeposito2`, `CAntDeposito2`, `AjusteDeposito2`, 
                               `SaldoInvDeposito3`, `CAntDeposito3`, `AjusteDeposito3`, `FechaInvDep0`, `FechaInvDep1`, 
                               `FechaInvDep2`, `FechaInvDep3`, `FOB`, `IvaDiferencial`, `IdMoneda`, `CodRevista`, `Moneda`, `Pais`, `Medida`
                         From
                             articulo Inner Join
                             categoria On categoria.IDCategoria = articulo.IDCategoria Inner Join
                             categoria_padre On categoria_padre.IDCategoriaPadre = categoria.IDCategoriaPadre Inner Join
                             marca On marca.IDMarca = articulo.IDMarca
                                     And marca.IDRubro = articulo.IDRubro
                         Where
                             articulo.EnPromocion = -1 And
                             articulo.Activo = -1 And
                             articulo.ListaInternet = -1 And
                             categoria.IDCategoria = '" . $_GET['idMarca'] . "' And
                             categoria_padre.IDCategoriaPadre = '" . $_GET['idRubro'] . "'");





                        // $q=mysqli_query($link,"SELECT categoria_padre.DCategoriaPadre, categoria.DCategoria, articulo.Descripcion,
                        // `IDRubro`, `IDMarca`, `IDFamilia`, `IDArticulo`, 
                        //  `IDStock`, `CodAnterior`, `Descripcion`, `PRevista`, `IDMedida`, `PVenta`, 
                        //  `PReVendedor`, `PCompra`, `PReposicion`, `CantMinima`, `AcumuladoVentas`, 
                        //  `AcumuladoCompras`, `AcumuladoAjuste`, `CantStock`, `SaldoInventario`, 
                        //  `FechaIngreso`, `FechaEgreso`, `FechaAlta`, `Acumulado`, `SaldoInvDeposito1`, 
                        //  `CAntDeposito1`, `AjusteDeposito1`, `IdPais`, 
                        //  `Activo`, `NumDespacho`, `SaldoInvDeposito2`, `CAntDeposito2`, `AjusteDeposito2`, 
                        //  `SaldoInvDeposito3`, `CAntDeposito3`, `AjusteDeposito3`, `FechaInvDep0`, `FechaInvDep1`, 
                        //  `FechaInvDep2`, `FechaInvDep3`, `FOB`, `IvaDiferencial`, `IdMoneda`, `CodRevista`, `Moneda`, `Pais`, `Medida` 
                        // FROM articulo
                        // INNER JOIN categoria ON categoria.IDCategoria = articulo.IDCategoria
                        // INNER JOIN categoria_padre ON categoria_padre.IDCategoriaPadre = categoria.IDCategoriaPadre
                        // WHERE  categoria_padre.IDCategoriaPadre='".$_GET['idRubro']."' and  
                        // categoria.IDCategoria='".$_GET['idMarca']."' and  
                        // IDMarca='".$_GET['idM']."' and EnPromocion=-1  group by IDArticulo
                        // order by articulo.Descripcion");




                     } else {

                        $q = mysqli_query($link, "SELECT categoria_padre.DCategoriaPadre, categoria.DCategoria, articulo.Descripcion,
                              articulo.`IDRubro`, articulo.`IDMarca`, articulo.`IDFamilia`, `IDArticulo`, 
                               `IDStock`, `CodAnterior`, `Descripcion`, `PRevista`, `IDMedida`, `PVenta`, 
                               `PReVendedor`, `PCompra`, `PReposicion`, `CantMinima`, `AcumuladoVentas`, 
                               `AcumuladoCompras`, `AcumuladoAjuste`, `CantStock`, `SaldoInventario`, 
                               `FechaIngreso`, `FechaEgreso`, `FechaAlta`, `Acumulado`, `SaldoInvDeposito1`, 
                               `CAntDeposito1`, `AjusteDeposito1`, `IdPais`, 
                               `Activo`, `NumDespacho`, `SaldoInvDeposito2`, `CAntDeposito2`, `AjusteDeposito2`, 
                               `SaldoInvDeposito3`, `CAntDeposito3`, `AjusteDeposito3`, `FechaInvDep0`, `FechaInvDep1`, 
                               `FechaInvDep2`, `FechaInvDep3`, `FOB`, `IvaDiferencial`, `IdMoneda`, `CodRevista`, `Moneda`, `Pais`, `Medida` 
                          From
                              articulo Inner Join
                              categoria On categoria.IDCategoria = articulo.IDCategoria Inner Join
                              categoria_padre On categoria_padre.IDCategoriaPadre = categoria.IDCategoriaPadre Inner Join
                              marca On marca.IDMarca = articulo.IDMarca
                                      And marca.IDRubro = articulo.IDRubro
                          Where
                              articulo.EnPromocion = -1 And
                              articulo.Activo = -1 And
                              articulo.ListaInternet = -1");


                        // $q=mysqli_query($link,"SELECT categoria_padre.DCategoriaPadre, categoria.DCategoria, articulo.Descripcion,
                        // `IDRubro`, `IDMarca`, `IDFamilia`, `IDArticulo`, 
                        //  `IDStock`, `CodAnterior`, `Descripcion`, `PRevista`, `IDMedida`, `PVenta`, 
                        //  `PReVendedor`, `PCompra`, `PReposicion`, `CantMinima`, `AcumuladoVentas`, 
                        //  `AcumuladoCompras`, `AcumuladoAjuste`, `CantStock`, `SaldoInventario`, 
                        //  `FechaIngreso`, `FechaEgreso`, `FechaAlta`, `Acumulado`, `SaldoInvDeposito1`, 
                        //  `CAntDeposito1`, `AjusteDeposito1`, `IdPais`, 
                        //  `Activo`, `NumDespacho`, `SaldoInvDeposito2`, `CAntDeposito2`, `AjusteDeposito2`, 
                        //  `SaldoInvDeposito3`, `CAntDeposito3`, `AjusteDeposito3`, `FechaInvDep0`, `FechaInvDep1`, 
                        //  `FechaInvDep2`, `FechaInvDep3`, `FOB`, `IvaDiferencial`, `IdMoneda`, `CodRevista`, `Moneda`, `Pais`, `Medida` 
                        // FROM articulo
                        // INNER JOIN categoria ON categoria.IDCategoria = articulo.IDCategoria
                        // INNER JOIN categoria_padre ON categoria_padre.IDCategoriaPadre = categoria.IDCategoriaPadre
                        // WHERE EnPromocion=-1 
                        // order by articulo.Descripcion


                        // ");
                     }


                     // $q=mysqli_query($link,"SELECT `IDRubro`, `IDMarca`, `IDFamilia`, `IDArticulo`, 
                     // `IDStock`, `CodAnterior`, `Descripcion`, `PRevista`, `IDMedida`, `PVenta`, 
                     // `PReVendedor`, `PCompra`, `PReposicion`, `CantMinima`, `AcumuladoVentas`, 
                     // `AcumuladoCompras`, `AcumuladoAjuste`, `CantStock`, `SaldoInventario`, 
                     // `FechaIngreso`, `FechaEgreso`, `FechaAlta`, `Acumulado`, `SaldoInvDeposito1`, 
                     // `CAntDeposito1`, `AjusteDeposito1`, `IDCategoria`, `IdPais`, 
                     // `Activo`, `NumDespacho`, `SaldoInvDeposito2`, `CAntDeposito2`, `AjusteDeposito2`, 
                     // `SaldoInvDeposito3`, `CAntDeposito3`, `AjusteDeposito3`, `FechaInvDep0`, `FechaInvDep1`, 
                     // `FechaInvDep2`, `FechaInvDep3`, `FOB`, `IvaDiferencial`, `IdMoneda`, `CodRevista`, `Moneda`, `Pais`, `Medida` 
                     // FROM `articulo` WHERE  IDRubro='".$_GET['idRubro']."' and  IDMarca='".$_GET['idMarca']."' AND IDFamilia='".$_GET['idFamilia']."' ");



                     echo '<thead>   <tr>
                                 <td width="10%" style="color:#FFF; text-align:center; padding:2px 5px; background-color:#37c0fb; font-weight:bold;"></td>
                                 <td width="10%" style="color:#FFF; text-align:center; padding:2px 5px; background-color:#37c0fb; font-weight:bold;">CODIGO</td>
                                 <td width="55%" style="color:#FFF; text-align:center; padding:2px 5px; background-color:#37c0fb; font-weight:bold;">DETALLE</td>
                                    
                                    
                                    <td width="10%" style="color:#FFF; text-align:center; padding:2px 5px; background-color:#37c0fb; font-weight:bold; border-right:#37c0fb 1px solid">PRECIO</td>
                                    <td width="10%" style="color:#FFF; text-align:center; padding:2px 5px; background-color:#37c0fb; font-weight:bold; border-right:#37c0fb 1px solid">FICHA</td>
                                   
                               </tr><thead> <tbody>';
                     $i = 0; // // <td width="5%" style="color:#FFF; text-align:center; padding:2px 5px; background-color:#37c0fb; font-weight:bold; border-right:#37c0fb 1px solid">PEDIR</td>
                     while ($r = mysqli_fetch_array($q)) {

                        $idmarca = $r['IDMarca'];
                        $idrubro = $r['IDRubro'];
                        $idfamilia = $r['IDFamilia'];
                        $idarticulo = $r['IDArticulo'];


                        $v = mysqli_query($link, "SELECT *from ficha_articulo where rubro='" . $idrubro . "' 
                                and marca='" . $idmarca . "' and  familia='" . $idfamilia . "' and articulo='" . $r['IDArticulo'] . "'");
                        $va = mysqli_fetch_array($v);
                        $enlace = $va['ruta'];





                        $v22 = mysqli_query($link, "SELECT *from articulo where 
                                IDArticulo='" . $r['IDArticulo'] . "'
                                AND
                                IDRubro='" . $idrubro . "' and IDMarca='" . $idmarca . "' and  IDFamilia='" . $idfamilia . "'");


                        $va22 = mysqli_fetch_array($v22);
                        $enlace3 = $va22['ImagenArticulo'];


                        /*
                              
                              $_SESSION['Lprecio']
                              NOTA:   Para poder presupuestar el cliente tiene que estar con Tipo  = C en tabla tclientesweb..   
                              ADEMÁS: SI LPrecio = 0 (en tclientesweb) tomar PreVendedor de la tabla de artículos. 
                              SI LPrecio = 1 (en tclientesweb) tomar PRevista de la tabla de artículos.    
                              SI LPrecio = 2 (en tclientesweb) tomar PVenta de la tabla de artículos.       
                              Ahora me quedo tranquilo era algo no aclarado en la explicación que te mandé,  Saludos
                              
                                */

                        if ($MuestraPrecio == 'SI') {



                           if ($_SESSION['Lprecio'] == '0') {
                              $precio = $r['PVenta'];
                           }

                           if ($_SESSION['Lprecio'] == '1') {
                              $precio = $r['PRevista'];
                           }

                           if ($_SESSION['Lprecio'] == '2') {
                              $precio = $r['PReVendedor'];
                           }

                           # code...
                        } else {
                           $precio = "0";
                        }
                        $precio = $r['PVenta'];
                        if ($enlace == '') {
                           $enlaces = "javascript:void(0);";
                           $enlace2 = "sin-info.png";
                           $ficha = '';
                        } else {
                           $enlaces = "fichas/" . $enlace;
                           $enlace2 = "pdf_ficha.png";
                           $ficha = '<a target="_blank" href="' . $enlaces . '"> <img src="' . $enlace2 . '" width="45" height="45" alt="descargar ficha"></a>';
                        }

                        if ($enlace3 == '') {
                           $enlace23 = "foca0_ver_info.png";
                        } else {
                           $enlace23 = "fichas/" . $enlace3;
                        }

                        // echo $precio;

                        $precios = $precio * $_SESSION['CAMBIO'];


                        echo '
                               <tr>
                              
                                    <td width="15%" style="border-right:#37c0fb 1px solid; border-bottom:#37c0fb 1px dashed; padding:2px 5px"><a style="color: #000;" href="producto.php?id=' . $idarticulo . '&idmarca=' . $idmarca . '&idfamilia=' . $idfamilia . '&idrubro=' . $idrubro . '"><img src="' . $enlace23 . '" width="96" height="96" alt="Imagen"></a></td>
                                    <td width="15%" style="border-right:#37c0fb 1px solid; border-bottom:#37c0fb 1px dashed; padding:2px 5px"><a style="color: #000;font-size:12px" href="producto.php?id=' . $idarticulo . '&idmarca=' . $idmarca . '&idfamilia=' . $idfamilia . '&idrubro=' . $idrubro . '">' . $r['CodRevista'] . '</a></td>
                                     <td width="45%" style="border-right:#37c0fb 1px solid; border-bottom:#37c0fb 1px dashed;padding:2px 5px"><a style=" color: #000;font-size:12px" href="producto.php?id=' . $idarticulo . '&idmarca=' . $idmarca . '&idfamilia=' . $idfamilia . '&idrubro=' . $idrubro . '">' . utf8_encode($r['Descripcion']) . '</a></td>
                                   
                           
                                    <td width="10%" align="right" style="border-right:#37c0fb 1px solid; border-bottom:#37c0fb 1px dashed; padding:2px 5px;font-size:12px"><b>$' . $precios . '</b></td>
                                    <td width="15%" style="border-right:#37c0fb 1px solid; border-bottom:#37c0fb 1px dashed; padding:2px 5px">' . $ficha . '</td>
                                    
                                  </tr>
                                '; //// <td width="5%" style="border-bottom:#37c0fb 1px dashed; padding:2px 5px"><a href="pedir-articulo.php?CodRevista='.$r['CodRevista'].'"><img src="images/carrito.png" width="25" height="25" alt="COMPRAR"></a></td>
                        $i++;
                     }

                     ?></tbody>
                  </table>
                  </td>
                  </tr>
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
   </section>
   <!-- FIN ESPACIO CENTRAL -->
   <!-- CTA -->
   <section id="cta" class="wrapper style3">
      <div class="container">
         <img src="images/marcas.jpg" width="100%" alt="Proveedores">
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
                        4641.5321 | 4642.6956 | 4644.2140
                     </div>
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
      <script>
         // let table = new DataTable('#table_id', {
         //  "iDisplayLength": 50,
         //   "language": {
         //       "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
         //   }
         // });

         // let table2 = new DataTable('#table_id2', {
         //  "iDisplayLength": 50,
         //   "language": {
         //       "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
         //   }
         // });

         // let table3 = new DataTable('#table_id3', {
         //  "iDisplayLength": 50,
         //   "language": {
         //       "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
         //   }
         // });

         // let table4 = new DataTable('#table_id4', {
         //  "iDisplayLength": 50,
         //   "language": {
         //       "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
         //   }
         // });
      </script>
</body>

</html>