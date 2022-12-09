<?php
require_once './loader.php';
$site = new Site();
$site->getMeta();

$modulo_aparencia = new ModuloAparencia();
$modulo_aparencia->getModuloaparencia();

$topo = new Modulo1();
$topo->getModulo1();

$menu = new Modulo2();
$menu->getModulo2();

$sobre = new Modulo3();
$sobre->getModulo3();

$portfolio = new Modulo7();
$portfolio->getModulo7();

$contato = new Modulo9();
$contato->getModulo9();

$blog = new Modulo10();
$blog->getModulo10();


$pagina = new Pagina();
$pagina->db->url = "blog/";
$pagina->db->paginate($blog->modulo10_paginacao);
$pagina->getPaginas();
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="pt-br">
    <!--<![endif]-->
    <head>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

        <?php require_once './analytics.php'; ?>
        <?php require_once './base.php'; ?>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <title><?= $site->site_meta_titulo ?></title>
        <meta name="description" content="<?= $site->site_meta_desc ?>">
        <meta name="keywords" content="<?= $site->site_meta_palavra ?>">
        <meta name="author" content="<?= $site->site_meta_autor ?>">
        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- CSS
        ================================================== -->
        <!-- Bootstrap  -->
        <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
        <!-- web font  -->
        <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <!-- plugin css  -->
        <link rel="stylesheet" type="text/css" href="js-plugin/animation-framework/animate.css" />
        <!-- Pop up-->
        <link rel="stylesheet" type="text/css" href="js-plugin/magnific-popup/magnific-popup.css" />
        <!-- Flex slider-->
        <link rel="stylesheet" type="text/css" href="js-plugin/flexslider/flexslider.css" />
        <!-- Owl carousel-->
        <link rel="stylesheet" href="js-plugin/owl.carousel/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="js-plugin/owl.carousel/owl-carousel/owl.transitions.css">
        <link rel="stylesheet" href="js-plugin/owl.carousel/owl-carousel/owl.theme.css">
        <!-- icon fonts -->
        <link type="text/css" rel="stylesheet" href="font-icons/custom-icons/css/custom-icons.css">
        <link type="text/css" rel="stylesheet" href="font-icons/custom-icons/css/custom-icons-ie7.css">
        <!-- nekoAnim-->
        <link rel="stylesheet" type="text/css" href="js-plugin/appear/nekoAnim.css">
        <!-- Custom css -->
        <link type="text/css" rel="stylesheet" href="css/layout.css">
        <link type="text/css" id="colors" rel="stylesheet" href="css/<?= $modulo_aparencia->modulo_aparencia_cor ?>.css">
        <link type="text/css" rel="stylesheet" href="css/custom.css">
        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
        <script src="js/modernizr-2.6.1.min.js"></script>
        <!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="admin/assets/img/ico/favicon.ico?<?= rand(0, 100) ?>">
    </head>
    <body class="activateAppearAnimation">
        <!-- Primary Page Layout 
        ================================================== -->
        <!-- globalWrapper -->
        <div id="globalWrapper">
            <!-- header -->
            <header class="navbar-fixed-top">
                <div id="mainHeader" role="banner">
                    <?php require_once './menu.php'; ?>
                </div>
            </header>
            <!-- header -->
            <!-- ======================================= content ======================================= -->
            <section id="page">
                <header class="page-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1><?= stripslashes($blog->modulo10_nome) ?></h1>
                                <p><?= stripslashes($blog->modulo10_subtitulo) ?></p>
                                <ul class="breadcrumb visible-md visible-lg">
                                    <li><a href="home/">Home</a></li>
                                    <li><a href="javascript:void(0);">Blog</a></li>
                                    <li class="active">Posts</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </header>
                <section id="content" class="mt30 pb30">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <?php $comentario = new Comment(); ?>
                    <?php if (isset($_POST['busca'])) : ?>
                           <?php $pagina->getSearch(); ?>
                    <?php endif; ?>
                                                    
                                <?php if (isset($pagina->db->data[0])): ?>
                                    <?php foreach ($pagina->db->data as $pos): ?>
                                        <article class="post clearfix">
                                            <div class="postPic">
                                                <div class="imgBorder mb15">
                                                    <a href="blog/<?= Filter::slug2($pos->pagina_nome) ?>/<?= $pos->pagina_id ?>/"><img src="thumb.php?w=750&h=500&src=images/blog/<?= $pos->pagina_imagem ?>" alt="" class="img-responsive" /></a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <section class="col-sm-11 col-xs-10">
                                                    <h2><a href="blog/<?= Filter::slug2($pos->pagina_nome) ?>/<?= $pos->pagina_id ?>/"><?= stripslashes($pos->pagina_nome) ?></a></h2>
                                                    <p>
                                                        <?= Validacao::cut(stripslashes($pos->pagina_descricao), 350, '...') ?>
                                                        <a href="blog/<?= Filter::slug2($pos->pagina_nome) ?>/<?= $pos->pagina_id ?>/" class="readMore">Leia mais ...</a>
                                                    </p>
                                                    <?php $data = explode('/', $pos->pagina_data); ?>
                                                    <ul class="entry-meta">
                                                        <li class="entry-date"><a href="javascript:void(0);"><i class="icon-pin"></i><?= $data[0] ?> <?= $data[1] ?>. <?= $data[2] ?></a></li>
                                                        <li class="entry-category"><a href="javascript:void(0);"><i class="icon-th-list"></i>&nbsp;<?= stripslashes($pos->area_nome) ?></a></li>
                                                        <li class="entry-author"><a href="javascript:void(0);"><i class="icon-male"></i>&nbsp;<?= stripslashes($pos->pagina_autor) ?></a></li>
                                                        <li class="entry-comments"><a href="javascript:void(0);"><i class="icon-comment-1"></i><?= $pagina->CountComentario($pos->pagina_id) ?> Comentários</a></li>
                                                    </ul>
                                                </section>
                                            </div>
                                        </article>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <hr>
                                <ul class="pagination">
                                    <?= $pagina->db->paginacao ?>
                                </ul>
                            </div>
                            <!-- Sidebar -->
                            <aside class="col-md-4">
                                <!-- ==============================================
                                                     BUSCA
                                  =============================================== -->
                                <?php require_once './form_busca.php'; ?>
                                <!-- ==============================================
                                                  FIM  BUSCA
                                  =============================================== -->

                                <!-- ==============================================
                                                 MENU CATEGORIA
                                 =============================================== -->
                                <?php require_once './menu_categoria.php'; ?>
                                <!-- ==============================================
                                                FIM  MENU CATEGORIA
                                =============================================== -->
                            </aside>
                            <!-- Sidebar -->
                        </div><!-- row -->
                    </div><!-- container -->
                </section>
            </section>
            <!-- content -->
            <!-- footer -->
            <footer id="footerWrapper" class="footer2">
                <?php require_once './footer.php'; ?>
            </footer>
            <!-- End footer -->
        </div>
        <!-- global wrapper -->
        <!-- End Document 
        ================================================== -->
        <script type="text/javascript" src="js-plugin/respond/respond.min.js"></script>
        <script type="text/javascript" src="js-plugin/jquery/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="js-plugin/jquery-ui/jquery-ui-1.8.23.custom.min.js"></script>
        <!-- third party plugins  -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="js-plugin/easing/jquery.easing.1.3.js"></script>
        <!-- carousel -->
        <script type="text/javascript" src="js-plugin/owl.carousel/owl-carousel/owl.carousel.min.js"></script>
        <!-- pop up -->
        <script type="text/javascript" src="js-plugin/magnific-popup/jquery.magnific-popup.min.js"></script>
        <!-- flex slider -->
        <script type="text/javascript" src="js-plugin/flexslider/jquery.flexslider-min.js"></script>
        <!-- appear -->
        <script type="text/javascript" src="js-plugin/appear/jquery.appear.js"></script>	
        <!-- Custom  -->
        <script type="text/javascript" src="js/custom.js"></script>
        <script>
            $('#posts').addClass('active');
        </script>
    </body>
</html>
