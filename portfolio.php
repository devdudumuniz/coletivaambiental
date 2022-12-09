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
$pagina->getBlog();

$portfolio_id = intval($_GET['id']);
$categoria_portfolio = new Area1();
$categoria_portfolio->getAreas1();

$projeto = new Portfolio();
$projeto->portfolio_id = "$portfolio_id";
$projeto->getBy();

?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="pt-br"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="ptbr"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="pt-br"> <![endif]-->
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
        <link href='//fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
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
        <!-- isotope -->
        <link type="text/css" rel="stylesheet" href="js-plugin/isotope/css/style.css">
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
    <body class="activateAppearAnimation" id="<?= $modulo_aparencia->modulo_aparencia_wide?>">
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
            <section id="portfolio">
                <header class="page-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-2 col-sm-2 col-md-1">
                                <a href="javascript:history.go(-1)" class="btn btn-sm btn-inverse"><i class="icon-left-open-mini"></i>Voltar</a>
                            </div>  
                            <div class="col-xs-10 col-sm-10 col-md-11 projectTitle">
                                <h1><?= stripslashes($projeto->portfolio_nome) ?></h1>
                                <?php $data = explode("/", $projeto->portfolio_data); ?>
                                <p><?= stripslashes($projeto->area1_nome) ?> / <?= $data[0] ?> <?= $data[1] ?></p>

                                <ul class="breadcrumb visible-md visible-lg">
                                    <li><a href="home/">Home</a></li>
                                    <li><a href="javascript:void(0);">Projeto</a></li>
                                    <li><a href="javascript:void(0);"><?= stripslashes($projeto->portfolio_nome) ?></a></li>
                                    <li class="active"><?= stripslashes($projeto->area1_nome) ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </header>
                <section id="content" class="mt30">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="owl-carousel nekoDataOwl" data-neko_items="1" data-neko_paginationnumbers="true" data-neko_singleitem="true">
                                    <?php if(isset($projeto->portfolio_imagem)): ?>
                                        <img src="thumb.php?w=705&h=550&zc=2&src=images/portfolio/<?= $projeto->portfolio_imagem ?>" alt="" class="img-responsive"/>
                                    <?php endif;?>                                    
                                    <?php if (isset($projeto->db->data[0])):  ?>
                                        <?php foreach ($projeto->db->data as $slide): ?>
                                            <img src="thumb.php?w=705&h=550&zc=2&src=images/portfolio/<?= $slide->foto_url ?>" alt="" class="img-responsive"/>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12 col-sm-4">
                                        <h2>Descrição do Projeto</h2>
                                        <p><?= stripslashes($projeto->portfolio_descricao) ?></p>
                                    </div>
                                    <div class="col-md-12 col-sm-4">
                                        <h2>Cliente</h2>
                                        <p><?= stripslashes($projeto->portfolio_cliente) ?></p>
                                    </div>

                                    <div class="col-md-12 col-sm-4">
                                        <br />
                                        <?php if (!empty($projeto->portfolio_url)): ?>
                                            <a href="<?= Filter::UrlExternal($projeto->portfolio_url) ?>" target="_blank">
                                                <button class="btn btn-primary"><i class="fa fa-desktop"></i> Demo</button>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- works -->

                    <!-- ==============================================
                    PORTFOLIO RELACIONADOS
                    =============================================== -->
                    <?php $categoria_portfolio->getRelacionados($projeto->area1_id,$projeto->portfolio_id); ?>
                    <?php if (isset($categoria_portfolio->db->data [0])): ?>

                    <section id="projects">
                        <br><br><br>
                        <div class="container mt15">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>Projetos Relacionados</h2>
                                </div>
                            </div>
                            <div class="row">
                                <section class="owl-carousel imgHover nekoDataOwl"  data-neko_items="3" data-neko_paginationnumbers="true" data-neko_singleitem="false" >
                                    <!-- portfolio item -->

                                        <?php foreach ($categoria_portfolio->db->data as $rel): ?>
                                            <article class="item">
                                                <section class="imgWrapper">
                                                    <img alt="" src="thumb.php?w=370&h=250&zc=2&src=images/portfolio/<?= $rel->portfolio_imagem ?>" class="img-responsive">
                                                </section>
                                                <div class="mediaHover">
                                                    <div class="mask"></div>
                                                    <div class="iconLinks"> 
                                                        <a href="projeto/<?= Filter::slug2($rel->portfolio_nome) ?>/<?= $rel->portfolio_id ?>/" title="link" class="sizer portfolioSheet">
                                                            <i class="icon-picture iconRounded iconMedium"></i>
                                                            <span>Ver Projeto</span>
                                                        </a> 
                                                        <a href="images/portfolio/<?= $rel->portfolio_imagem ?>" class="image-link" title="Ampliar imagem" >
                                                            <i class="icon-search iconRounded iconMedium"></i>
                                                            <span>zoom</span>
                                                        </a> 
                                                    </div>
                                                </div>
                                                <section class="boxContent">
                                                    <h3><?= stripslashes($rel->portfolio_nome )?></h3>
                                                    <p>
                                                        <?= Validacao::cut(stripslashes($rel->portfolio_descricao), 150, '...') ?> <br />
                                                        <a href="projeto/<?= Filter::slug2($rel->portfolio_nome) ?>/<?= $rel->portfolio_id ?>/" class="moreLink">Leia mais...</a>
                                                    </p>
                                                </section>
                                            </article>
                                        <?php endforeach; ?>
               
                                </section>
                            </div>
                        </div>
                    </section>
                                         <?php endif; ?>
                    <!-- ==============================================
                     FIM PORTFOLIO RELACIONADOS
                    =============================================== -->
                    <!-- call to action -->
                    <section class="pt30 pb30 mb15">

                    </section>
                    <!-- call to action -->
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
        <!-- isotope -->
        <script type="text/javascript" src="js-plugin/isotope/jquery.isotope.min.js"></script>
        <!-- sharrre -->
        <script type="text/javascript" src="js-plugin/jquery.sharrre-1.3.4/jquery.sharrre-1.3.4.min.js"></script>
        <!-- appear -->
        <script type="text/javascript" src="js-plugin/appear/jquery.appear.js"></script>	
        <!-- Custom  -->
        <script type="text/javascript" src="js/custom.js"></script>
        <script>
            $('#projeto').addClass('active');
        </script>
    </body>
</html>
