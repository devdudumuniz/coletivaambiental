<?php
require_once '../loader.php';
@session_start();
if (!isset($_SESSION['LOGADO']) || $_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}
$social = new Social();
$social->db = new DB;
$social->getSociais();

$site = new Site();
$site->getMeta();
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
        <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
        <!--/ END GLOBAL MANDATORY STYLES -->

        <!-- START @PAGE LEVEL STYLES -->
        <link href="./assets/fontawesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="./assets/css/animate.min.css" rel="stylesheet">
        <link href="./assets/css/bootstrap-tagsinput.css" rel="stylesheet">
        <link href="./assets/css/jasny-bootstrap-fileinput.min.css" rel="stylesheet">
        <link href="./assets/css/chosen.min.css" rel="stylesheet">
        <link href="./assets/css/bootstrap-switch.min.css" rel="stylesheet">
        <!--/ END PAGE LEVEL STYLES -->

        <!-- START @THEME STYLES -->
        <link href="./assets/css/reset.css" rel="stylesheet">
        <link href="./assets/css/layout.css" rel="stylesheet">
        <link href="./assets/css/components.css" rel="stylesheet">
        <link href="./assets/css/plugins.css" rel="stylesheet">
        <link href="./assets/css/themes/default.theme.css" rel="stylesheet" id="theme">
        <link href="./assets/css/custom.css" rel="stylesheet">
        <link href="./assets/css/social.css" rel="stylesheet">
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
                    <h2><i class="fa fa-facebook"></i>  <span>Gerenciar Redes Sociais</span></h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">Você está em :</span>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="home/">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Redes Sociais</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="body-content animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive mb-20">
                                <table class="table table-striped table-primary">
                                    <thead>
                                        <tr>
                                            <th>Rede Social</th>
                                            <th>Url</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($social->db->data [0])): ?>
                                            <?php foreach ($social->db->data as $redes): ?>
                                                <tr>
                                                    <td>
                                                        <span class="social-icons icon-circle"><i class="fa <?= $redes->social_nome ?>"></i></span>    
                                                    </td>
                                                    <td><?= $redes->social_url ?></td>
                                                    <td style="width: 160px;">
                                                        <div class="form-group">
                                                            <a data-update="<?= $redes->social_id ?>" class="btn  btn-primary btn-circle atualizar" data-toggle="tooltip" data-placement="top" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                                                            <?php if ($redes->social_status == 1) : ?>
                                                                <a href="social_fn.php?acao=moderar&status=0&id=<?= $redes->social_id ?>">
                                                                    <input type="checkbox" class="make-switch "  name="switch" checked data-on-text="ON" data-off-text="OFF" data-on-color="primary" />
                                                                </a>
                                                            <?php else: ?>
                                                                <a href="social_fn.php?acao=moderar&status=1&id=<?= $redes->social_id ?>">
                                                                    <input type="checkbox" class="make-switch" name="switch" data-on-text="ON" data-off-text="OFF"  data-on-color="primary"  data-off-color="danger" />
                                                                </a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div><!-- /.table-responsive -->
                            <!--/ End table horizontal scroll -->
                        </div>
                    </div><!-- /.row --><!-- /.body-content -->
            </section><!-- /#page-content -->
        </section><!-- /#wrapper -->
        <!--/ END WRAPPER -->

        <!--***************MODAL ATUALIZAR*****************-->
        <div class="modal fade" id="modal-16" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog panel panel-primary">
                <div class="modal-content ">
                    <div class="panel-heading">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h3 class="panel-title text-center">Editar Social</h3>
                    </div>
                    <div class="modal-header ">
                        <form role="form" method="post"  action="social_fn.php?acao=atualizar">
                            <div class="form-group">
                                <label for="social_url">Nome:</label>
                                <input type="text" class="form-control"  name="social_url" id="social_url" data-toggle="tooltip" data-placement="bottom" title="Informe o link da sua rede social..." value="<?= $redes->social_url ?>" required />
                                <input type="hidden" id="social_id"  name="social_id" value="<?= $social->social_id ?>">
                            </div>

                            <div class="form-group">
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--***************MODAL ATUALIZAR*****************-->

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
        <script src="./assets/js/bootstrap-tagsinput.min.js"></script>
        <script src="./assets/js/jasny-bootstrap.fileinput.min.js"></script>
        <script src="./assets/js/holder.js"></script>
        <script src="./assets/js/bootstrap-maxlength.min.js"></script>
        <script src="./assets/js/jquery.autosize.min.js"></script>
        <script src="./assets/js/chosen.jquery.min.js"></script>
        <script src="./assets/js/jquery.rtnotify.js"></script>
        <!--/ END PAGE LEVEL PLUGINS -->

        <!-- START @PAGE LEVEL SCRIPTS -->
        <script src="./assets/js/apps.js"></script>
        <script src="./assets/js/bootstrap-switch.min.js"></script>
        <script>
            $('#social').addClass('active');
<?php if (isset($_GET['success'])): ?>
                $(document).ready(function () {
                    $.rtnotify({title: "Procedimento Realizado",
                        type: "default"});
                });
<?php endif; ?>
            $("[name='switch']").bootstrapSwitch();

            $('.atualizar').on('click', function () {
                var id = $(this).attr('data-update');
                $('#social_id').val(id);
                var url = "social_fn.php?acao=Json";
                $.getJSON(url, {social_id: id}, function (data) {
                    //console.log(data);
                    $('#modal-16  #social_id').val(data.social_id);
                    $('#modal-16  #social_url').val(data.social_url);
                });
                $('#modal-16').modal('show');
            });
            $(".sound").on("click", function () {
                ion.sound.play("button_push.mp3");
            });
        </script>
    </body>
</html>