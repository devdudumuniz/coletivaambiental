<?php
require_once '../loader.php';
@session_start();
if (!isset($_SESSION['LOGADO']) || $_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}
$site = new Site();
$site->getMeta();


$pagina = new Pagina();
$pagina->db = new DB;
$pagina->db->url = "posts";
$pagina->db->paginate(24);
$pagina->getPosts();

$area = new Area();
$area->db = new DB;
$area->getAreas();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="pt-br"> <!--<![endif]-->

    <!-- START @HEAD -->
    <head>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

        <?php require_once './base.php'; ?>
        <!-- START @META SECTION -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title><?= $site->site_meta_titulo ?></title>
        <!--/ END META SECTION -->

        <!-- START @FAVICONS -->
        <link href="./assets/img/ico/favicon.ico?<?= rand(0, 100) ?>" rel="shortcut icon" sizes="144x144">
        <!--/ END FAVICONS -->

        <!-- START @FONT STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>
        <!--/ END FONT STYLES -->

        <!-- START @GLOBAL MANDATORY STYLES -->
        <link href="./assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!--/ END GLOBAL MANDATORY STYLES -->

        <!-- START @PAGE LEVEL STYLES -->
        <link href="./assets/fontawesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="./assets/css/animate.min.css" rel="stylesheet">
        <!--/ END PAGE LEVEL STYLES -->

        <!-- START @THEME STYLES -->
        <link href="./assets/css/reset.css" rel="stylesheet">
        <link href="./assets/css/layout.css" rel="stylesheet">
        <link href="./assets/css/components.css" rel="stylesheet">
        <link href="./assets/css/plugins.css" rel="stylesheet">
        <link href="./assets/css/themes/default.theme.css" rel="stylesheet" id="theme">
        <link href="./assets/css/gallery.css" rel="stylesheet">
        <link href="./assets/css/custom.css" rel="stylesheet">
        <link href = './assets/css/jquery.rtnotify.css' rel = 'stylesheet'>
        <link href = './assets/css/noty_theme_default.css' rel = 'stylesheet'>
        <!--/ END THEME STYLES -->

        <!-- START @IE SUPPORT -->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="./assets/js/html5shiv.min.js"></script>
        <script src="./assets/js/respond.min.js"></script>
        <![endif]-->
        <!--/ END IE SUPPORT -->
    </head>
    <!--/ END HEAD -->
    <body>

        <!--[if lt IE 9]>
        <p class="upgrade-browser">Upps!! You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- START @WRAPPER -->
        <section id="wrapper" class="page-sound">

            <!-- START @HEADER -->
            <?php require_once './navegacao.php'; ?> <!-- /#header -->
            <!-- /#header -->
            <!--/ END HEADER -->

            <!-- /#sidebar-left -->
            <?php require_once './menu.php'; ?>
            <!--/ END SIDEBAR LEFT -->

            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-pencil"></i> <span>Posts cadastrados</span></h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">Você está em :</span>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="index.php">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Posts</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        </ol>
                    </div><!-- /.breadcrumb-wrapper -->
                </div><!-- /.header-content -->
                <!--/ End page header -->

                <!-- Start body content -->
                <div class="body-content animated fadeIn">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <button class="filter btn btn-primary btn-sm" data-filter="all">Todas</button>
                                <?php if (isset($area->db->data[0])): ?>
                                    <?php foreach ($area->db->data as $cat): ?>
                                        <button class="filter btn btn-primary btn-sm" data-filter=".<?= $cat->area_nome ?>" ><?= $cat->area_nome ?></button>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <ul id="gallery">
                        <?php if (isset($pagina->db->data[0])): ?>
                            <?php foreach ($pagina->db->data as $listar): ?>
                                <li class="mix <?= $listar->area_nome ?>">
                                    <div class="gallery-item rounded shadow">
                                        <span class="gallery-love">
                                            <i class="fa fa-heart-o"></i>
                                        </span>
                                        <a href="javascript:void(0);" class="gallery-img"><img src="thumb.php?w=400&h=250&zc=0&src=../images/blog/<?= $listar->pagina_imagem ?>" class="img-responsive full-width" alt="..." /></a>
                                        <br />
                                        <div class="gallery-author">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h4 class="media-heading text-capitalize">Em <?= stripslashes($listar->area_nome)?></h4>
                                                    <span class="text-capitalize">Post: <?= stripslashes($listar->pagina_nome)?></span>
                                                    <p><span class="text-capitalize"> Data: <?= $listar->pagina_data ?></span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gallery-details">
                                            <div class="gallery-summary">
                                                <p><?= Validacao::cut(stripslashes($listar->pagina_descricao), 200, '...') ?></p>
                                            </div>
                                            <hr>
                                            <div class="text-center">
                                                <?php if (isset($listar->comentario_pagina)): ?>
                                                    <a class="btn btn-circle btn-info atualizar"  href="post/comentarios/<?= $listar->pagina_id ?>/">
                                                        <i class="fa fa-comments-o icon-white"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <a class="btn btn-circle btn-info comentario disabled-result" data-toggle="tooltip" data-placement="top" title="Não existe comentário pra esta página" href="javascript:void(0);">
                                                        <i class="fa fa-comments-o icon-white "></i>
                                                    </a>
                                                <?php endif; ?>
                                                <a class="btn btn-circle btn-info atualizar"  href="post/editar/<?= $listar->pagina_id ?>/">
                                                    <i class="fa fa-edit icon-white"></i>
                                                </a>
                                                <a class="btn btn-circle btn-danger delete" data-url="pagina_fn.php?acao=remover&AMP;id=<?= $listar->pagina_id ?>">
                                                    <i class="fa fa-trash icon-white"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </div><!-- /.gallery-item -->
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </ul>
                    <?= $pagina->db->paginacao ?>
                </div><!-- /.body-content -->
            </section><!-- /#page-content -->
        </section><!-- /#wrapper -->
        <!--/ END WRAPPER -->
        <!--***************MODAL REMOVER*****************-->
        <div class="modal fade" id="MODALREMOVE" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="text-center text-danger">Atenção!</h4>
                        <p class="text-center text-danger">
                            Você está prestes à excluir um registro de forma permanente.<br />
                            Deseja realmente executar este procedimento?
                        </p>
                        <p class="text-center">
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="glyphicon glyphicon-remove-circle"></i> Cancelar</button>
                            <button type="button" class="btn btn-danger" id="btn-confirm-remove"><i class="glyphicon glyphicon-ok-circle"></i> Remover</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!--***************MODAL REMOVER*****************-->
        <!-- START @BACK TOP -->
        <div id="back-top" class="animated pulse circle">
            <i class="fa fa-angle-up"></i>
        </div><!-- /#back-top -->
        <!--/ END BACK TOP -->

        <!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- START @CORE PLUGINS -->
        <script src="./assets/js/jquery.min.js"></script>
        <script src="./assets/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="./assets/js/handlebars.js"></script>
        <script src="./assets/js/typeahead.bundle.min.js"></script>
        <script src="./assets/js/jquery.nicescroll.min.js"></script>
        <script src="./assets/js/index.js"></script>
        <script src="./assets/js/jquery.easing.1.3.min.js"></script>
        <script src="./assets/ionsound/ion.sound.min.js"></script>
        <script src="./assets/js/bootbox.js"></script>
        <!--/ END CORE PLUGINS -->

        <!-- START @PAGE LEVEL PLUGINS -->
        <script src="./assets/js/jquery.mixitup.min.js"></script>
        <!--/ END PAGE LEVEL PLUGINS -->

        <!-- START @PAGE LEVEL SCRIPTS -->
        <script src="./assets/js/dark.gallery.js"></script>
        <script src="./assets/js/jquery.rtnotify.js"></script>
        <script src="./assets/js/apps.js"></script>
        <script>
            $('.listarblog').addClass('active');
<?php if (isset($_GET['success'])): ?>
                $(document).ready(function () {
                    $.rtnotify({title: "Procedimento Realizado",
                        type: "default"});
                });
<?php endif; ?>
            $('.delete').on('click', function () {
                var url = $(this).attr('data-url');
                $('#MODALREMOVE').modal('show');
                $('#btn-confirm-remove').on('click', function () {
                    window.location = url;
                });
            });
        </script>
    </body>
</html>