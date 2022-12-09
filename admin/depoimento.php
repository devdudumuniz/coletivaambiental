<?php
require_once '../loader.php';
@session_start();
if (!isset($_SESSION['LOGADO']) || $_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}
$site = new Site();
$site->getMeta();

$depoimentos = new Depoimento();
$depoimentos->db = new DB; 
$depoimentos->db->url = "depoimento";
$depoimentos->db->paginate(12);
$depoimentos->getDepoimentos();

$area = new Area();
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

        <section id="wrapper" class="page-sound">
            <?php require_once './navegacao.php'; ?>
            <?php require_once './menu.php'; ?>
            <section id="page-content">
                <div class="header-content">
                    <h2><i class="fa fa-users"></i> <span>Depoimentos Cadastrados</span></h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">Você está em :</span>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="home/">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Depoimentos</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="body-content animated fadeIn">
                    <ul class="col-md-12 row" >
                        <?php if (isset($depoimentos->db->data[0])): ?>
                            <?php foreach ($depoimentos->db->data as $listar): ?>
                                <div class="col-md-3">
                                    <div class="gallery-item rounded shadow">
                                        <span class="gallery-love">
                                            <i class="fa fa-heart-o"></i>
                                        </span>
                                        <a href="javascript:void(0);" class="gallery-img"><img src="thumb.php?w=600&h=400&zc=1&src=../images/team/<?= $listar->depoimento_imagem ?>" class="img-responsive full-width" alt="..." /></a>
                                        <br />
                                        <div class="gallery-author">
                                            <div class="media">
                                                <div class="media-body text-center">
                                                    <h4 class="media-heading text-capitalize"> <?= stripslashes($listar->depoimento_nome) ?> </h4>
                                                    <span class="text-capitalize"> Cargo : <?= stripslashes($listar->depoimento_cargo) ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gallery-details">
                                            <div class="text-center">
                                                <a class="btn btn-circle btn-info atualizar"  href="depoimento/editar/<?= $listar->depoimento_id ?>/">
                                                    <i class="fa fa-edit icon-white"></i>
                                                </a>
                                                <a class="btn btn-circle btn-danger delete" data-url="depoimento_fn.php?acao=remover&AMP;id=<?= $listar->depoimento_id ?>">
                                                    <i class="fa fa-trash icon-white"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                    <?= $depoimentos->db->paginacao ?>
                </div>
            </section>
        </section>
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
        <div id="back-top" class="animated pulse circle">
            <i class="fa fa-angle-up"></i>
        </div>
        <script src="./assets/js/jquery.min.js"></script>
        <script src="./assets/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="./assets/js/handlebars.js"></script>
        <script src="./assets/js/typeahead.bundle.min.js"></script>
        <script src="./assets/js/jquery.nicescroll.min.js"></script>
        <script src="./assets/js/index.js"></script>
        <script src="./assets/js/jquery.easing.1.3.min.js"></script>
        <script src="./assets/ionsound/ion.sound.min.js"></script>
        <script src="./assets/js/bootbox.js"></script>
        <script src="./assets/js/jquery.rtnotify.js"></script>
        <script src="./assets/js/jquery.mixitup.min.js"></script>
        <script src="./assets/js/apps.js"></script>
        <script src="./assets/js/dark.gallery.js"></script>
        <script>
<?php if (isset($_GET['success'])): ?>
                $(document).ready(function () {
                    $.rtnotify({title: "Procedimento Realizado",
                        type: "default"});
                });
<?php endif; ?>
            $('.listardepoimento').addClass('active');
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