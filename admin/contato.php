<?php
require_once '../loader.php';
@session_start();
if (!isset($_SESSION['LOGADO']) || $_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}

$contato = new Contato();
$contato->getContato();

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
        <link href='http://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>
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
        <!--/ END PAGE LEVEL STYLES -->

        <!-- START @THEME STYLES -->
        <link href="./assets/css/reset.css" rel="stylesheet">
        <link href="./assets/css/layout.css" rel="stylesheet">
        <link href="./assets/css/components.css" rel="stylesheet">
        <link href="./assets/css/plugins.css" rel="stylesheet">
        <link href="./assets/css/themes/default.theme.css" rel="stylesheet" id="theme">
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
            <?php require_once './navegacao.php'; ?>
            <!--/ END HEADER -->



            <!-- /#sidebar-left -->
            <?php require_once './menu.php'; ?>
            <!--/ END SIDEBAR LEFT -->

            <!-- START @PAGE CONTENT -->
            <section id="page-content">

                <!-- Start page header -->
                <div class="header-content">
                    <h2><i class="fa fa-phone"></i>  <span>Configurações do Contato</span></h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">Você está em :</span>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="home/">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Contato</a>
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

                            <!-- Start input fields - basic form -->
                            <div class="panel rounded shadow">
                                <div class="panel-sub-heading">
                                    <div class="callout callout-info" style="padding-top: 19px;"><p><strong>Gerenciar contato</strong></p></div>
                                </div>
                                <div class="clearfix"></div>
                                <!-- /.panel-subheading -->
                                <div class="panel-body no-padding">

                                    <form method="post" action="contato_fn.php?acao=atualizar">
                                        <div class="form-body">

                                            <div class="form-group">
                                                <label class="control-label"> E-mail</label>
                                                <input class="form-control rounded" type="text" id="contato_email"  name="contato_email" value="<?= $contato->contato_email ?>" />
                                            </div>

                                            <div class="form-group">
                                                <span class="pull-right"><i class="fa fa-exclamation-triangle"></i> Telefone Principal</span>
                                                <label class="control-label"> Telefone </label>
                                                <input type="text" class="form-control rounded" data-inputmask="'mask': ['()-9999-9999 [x99999]', '+099 99 99 9999[9]-9999'], 'showTooltip': true" id="contato_telefone1" name="contato_telefone1" required value="<?= $contato->contato_telefone1 ?>" />
                                            </div>

                                            <div class="form-group">
                                                <span class="pull-right"><i class="fa fa-exclamation-triangle"></i> Telefone Secundário / Alternativo</span>
                                                <label class="control-label"> Telefone </label>
                                                <input type="text" class="form-control rounded" data-inputmask="'mask': ['()-9999-9999 [x99999]', '+099 99 99 9999[9]-9999'], 'showTooltip': true" id="contato_telefone2" name="contato_telefone2" value="<?= $contato->contato_telefone2 ?>" />
                                            </div>

                                            <div class="form-group">
                                                <span class="pull-right"><i class="fa fa-exclamation-triangle"></i> Campo livre ex:(11)99999-9999 (WhattsApp)</span>
                                                <label class="control-label"> Telefone Personalizado</label>
                                                <input type="text" class="form-control rounded"  id="contato_telefone3" name="contato_telefone3" value="<?= $contato->contato_telefone3 ?>" />
                                            </div>

                                            <div class="form-group">
                                                <span class="pull-right"><i class="fa fa-exclamation-triangle"></i> Campo livre ex:(11)99999-9999 (Tim)</span>
                                                <label class="control-label"> Telefone Personalizado</label>
                                                <input type="text" class="form-control rounded" id="contato_telefone4" name="contato_telefone4" value="<?= $contato->contato_telefone4 ?>" />
                                            </div>
                                            <div class="form-group">
                                                <span class="pull-right"><i class="fa fa-exclamation-triangle"></i> Campo livre ex:(11)99999-9999 (Vivo)</span>
                                                <label class="control-label"> Telefone Personalizado</label>
                                                <input type="text" class="form-control rounded" id="contato_telefone5" name="contato_telefone5"  value="<?= $contato->contato_telefone5 ?>" />
                                            </div>
                                            <div class="form-group">
                                                <span class="pull-right"><i class="fa fa-exclamation-triangle"></i> Campo livre ex:(11)99999-9999 (Claro)</span>
                                                <label class="control-label"> Telefone Personalizado</label>
                                                <input type="text" class="form-control rounded" id="contato_telefone6" name="contato_telefone6" value="<?= $contato->contato_telefone6 ?>" />
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label"> Endereço</label>
                                                <input type="text" class="form-control rounded" id="contato_endereco" name="contato_endereco" required value="<?= $contato->contato_endereco ?>" />
                                                <input type="hidden" id="contato_id" name="contato_id"  value="<?= $contato->contato_id ?>" />
                                            </div>

                                            <div class="form-footer">
                                                <div class="pull-right">
                                                    <button class="btn btn-primary" type="submit">Atualizar</button>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <div id="back-top" class="animated pulse circle">
            <i class="fa fa-angle-up"></i>
        </div>
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
        <!--/ END PAGE LEVEL PLUGINS -->

        <!-- START @PAGE LEVEL SCRIPTS -->
        <script src="./assets/js/apps.js"></script>
        <script src="./assets/js/dark.form.js"></script>
        <script src="./assets/js/jquery.maskedinput.min.js"></script>
        <script src="./assets/js/jquery.rtnotify.js"></script>
    </body>
    <script>
        $('#contato').addClass('active');
<?php if (isset($_GET['success'])): ?>
            $(document).ready(function () {
                $.rtnotify({title: "Procedimento Realizado",
                    type: "default"});
            });
<?php endif; ?>
        $(function ($) {
            $("#contato_telefone1").mask("(99) 9999-9999");
            $("#contato_telefone2").mask("(99) 9999-9999");
        });
    </script>
</html>