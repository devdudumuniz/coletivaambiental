<?php
require_once '../loader.php';
@session_start();
if (!isset($_SESSION['LOGADO']) || $_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}
$site = new Site();
$site->getMeta();

$area = new Area();
$area->db = new DB;
$area->getAreas();

$pagina_id = intval($_GET['id']);
$editar = new Pagina();
$editar->pagina_id = $pagina_id;
$editar->getPagina();
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
        <link href="./assets/css/summernote.css" rel="stylesheet">
        <link href="./assets/css/datepicker.css" rel="stylesheet">
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
                    <h2><i class="fa fa-list"></i>  <span>Blog</span></h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">Você está em :</span>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="home/">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Blog</a>
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
                                    <div class="callout callout-info" style="padding-top: 19px;"><p><strong>Editar Post</strong></p></div>
                                </div><!-- /.panel-subheading -->
                                <div class="clearfix"></div>
                                <div class="panel-body no-padding">
                                    <form  enctype="multipart/form-data" method="post" action="pagina_fn.php?acao=atualizar">
                                        <div class="form-body">
                                            <div class="form-group ">
                                                <label for="pagina_area" class="control-label">Categoria</label>
                                                <select id="pagina_area" name="pagina_area" class="form-control input-sm mb-15" required>
                                                    <option value="">Selecione a Categoria</option>
                                                    <?php if (isset($area->db->data[0])): ?>
                                                        <?php foreach ($area->db->data as $categoria): ?>
                                                            <option value="<?= $categoria->area_id ?>"><?= $categoria->area_nome ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div><!-- /.form-group --><!-- /.form-group -->

                                            <div class="form-group">
                                                <label class="control-label">Título do Post</label>
                                                <input class="form-control rounded" type="text" id="pagina_nome"  name="pagina_nome" required value="<?= stripslashes($editar->pagina_nome) ?>">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label class="control-label">Autor</label>
                                                <input class="form-control" type="text"   name="pagina_autor"  value="<?= stripslashes($editar->pagina_autor) ?>">
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Data</label>
                                                <input type="text" class="form-control" id="pagina_data" name="pagina_data" value="<?= $editar->pagina_data ?>">
                                            </div>

                                            <div class="form-group">
                                                <span class="fa fa-exclamation-triangle pull-right"> Meta Keywords - Max 156 caracteres</span>
                                                <label class="control-label">Palavra chave (SEO - opcional)</label>
                                                <input type="text" class="form-control" name="pagina_keywords" value="<?= $editar->pagina_keywords ?>" />
                                            </div>

                                            <div class="form-group">
                                                <span class="fa fa-exclamation-triangle pull-right"> Meta Description - Max 156 caracteres</span>
                                                <label class="control-label">Descrição Breve (SEO - opcional)</label>
                                                <input type="text" class="form-control" name="pagina_description" value="<?= $editar->pagina_description ?>" />
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Imagem</label>
                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                    <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                                    <span class="input-group-addon btn btn-success btn-file"><span class="fileinput-new">Selecione a Imagem</span><span class="fileinput-exists">Mudar de Imagem</span><input type="file" id="pagina_imagem" name="pagina_imagem"></span>
                                                    <a href="#" class="input-group-addon btn btn-danger fileinput-exists" data-dismiss="fileinput">Remover</a>
                                                </div>
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label class="control-label">Descrição da Post</label>
                                                <textarea class="form-control" id="pagina_descricao" name="pagina_descricao" rows="5"><?= stripslashes($editar->pagina_descricao) ?></textarea>
                                                <input type="hidden" id="pagina_id" name="pagina_id" value="<?= $editar->pagina_id ?>" >
                                            </div><!-- /.form-group -->

                                            <div class="form-footer">
                                                <div class="pull-right">
                                                    <button class="btn btn-primary" type="submit">Atualizar</button>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div><!-- /.form-footer -->
                                        </div><!-- /.panel-body -->
                                    </form>
                                </div><!-- /.panel -->
                            </div><!-- /.col-md-6 -->
                        </div><!-- /.row -->
                    </div><!-- /.body-content -->
                    <!--/ End body content -->
            </section><!-- /#page-content -->
        </section><!-- /#wrapper -->
        <!--/ END WRAPPER -->

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
        <!--/ END PAGE LEVEL PLUGINS -->

        <!-- START @PAGE LEVEL SCRIPTS -->
        <script src="./assets/js/apps.js"></script>
        <script src="./assets/js/dark.form.js"></script>
        <script src="./assets/js/summernote.min.js"></script>
        <script src="./assets/js/summernote-pt-BR.js"></script>
        <script src="./assets/js/bootstrap-datepicker.js"></script>
        <script src="./assets/js/bootstrap-datepicker.pt-BR.js"></script>

        <!--/ END PAGE LEVEL SCRIPTS -->
        <!--/ END JAVASCRIPT SECTION -->

    </body>
    <script>
        $('#pagina_data').datepicker({
            format: "dd/MM/yyyy",
            language: "pt-BR"
        });
        $('.pagina').addClass('active');
        $('#pagina_area').val('<?= $editar->pagina_area ?>');

        $(document).ready(function () {
            $('#pagina_descricao').summernote({
                lang: 'pt-BR'
            });
        });

        $('.blogeditar').addClass('active');

        $(".sound").on("click", function () {
            ion.sound.play("button_push.mp3");
        });
    </script>
    <!--/ END BODY -->

</html>