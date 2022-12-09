<?php
require_once '../loader.php';
@session_start();
if (!isset($_SESSION['LOGADO']) || $_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}
$site = new Site();
$site->getMeta();

$slide = new Slide();
$slide->db->url = "posts";
$slide->db->paginate(24);
$slide->getImagens();

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
        <link href="./assets/css/jasny-bootstrap-fileinput.min.css" rel="stylesheet">
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
            <?php require_once './navegacao.php'; ?> <!-- /#header -->
            <?php require_once './menu.php'; ?>
            <section id="page-content">
                <div class="header-content">
                    <h2><i class="fa fa-pencil"></i> <span>Slide</span></h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">Você está em :</span>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="home/">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Slide</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="body-content animated fadeIn">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <h3 class="panel-title"><button class="btn btn-primary" data-toggle="modal" data-target="#incluir"><i class="fa fa-plus-circle"></i> Nova Imagem</button></h3>
                        </div>
                        <div class="clearfix"></div>
                        <br />
                    </div>
                    <ul class="col-md-12 row" >
                        <?php if (isset($slide->db->data[0])): ?>
                            <?php foreach ($slide->db->data as $listar): ?>
                                <div class="col-md-3">
                                    <div class="gallery-item rounded shadow">
                                        <a href="javascript:void(0);" class="gallery-img">
                                            <img src="thumb.php?w=400&h=300&zc=0&src=../images/<?= $listar->slide_imagem ?>" class="img-responsive full-width" alt="..." />
                                        </a>
                                        <br />
                                        <div class="gallery-details">
                                            <div class="text-center">
                                                <a class="btn btn-circle btn-info atualizar" data-update="<?= $listar->slide_id ?>" >
                                                    <i class="fa fa-edit icon-white"></i>
                                                </a>
                                                <a style="position: relative; z-index: 10;" class="btn btn-circle btn-danger delete" data-url="slide_fn.php?acao=remover&AMP;id=<?= $listar->slide_id ?>">
                                                    <i class="fa fa-trash icon-white" ></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                    <?= $slide->db->paginacao ?>
                </div>
            </section>
        </section>

        <!--***************MODAL INCLUIR*****************-->
        <div class="modal fade" id="incluir" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog panel panel-primary">
                <div class="modal-content ">
                    <div class="panel-heading">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h3 class="panel-title text-center">Cadastrar nova Imagem</h3>
                    </div>
                    <div class="modal-header ">
                        <form role="form" method="post" enctype="multipart/form-data" action="slide_fn.php?acao=incluir">
                            <div class="form-group">
                                <label class="control-label">Título</label>
                                <textarea class="form-control rounded" type="text"  name="slide_nome" style="max-height:50px;" placeholder="Informe o título a ser exibido "></textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Subtítulo</label>
                                <textarea class="form-control rounded" type="text"  name="slide_subtitulo" style="max-height:50px;" placeholder="Informe o primeiro subtítulo a ser exibido "></textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Subtítulo 2</label>
                                <textarea class="form-control rounded" type="text"  name="slide_subtitulo1" style="max-height:50px;" placeholder="Informe o segundo subtítulo a ser exibido "></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Imagem</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                    <span class="input-group-addon btn btn-success btn-file"><span class="fileinput-new">Selecione a Imagem</span><span class="fileinput-exists">Mudar de Imagem</span><input type="file" id="slide_imagem" name="slide_imagem"></span>
                                    <a href="#" class="input-group-addon btn btn-danger fileinput-exists" data-dismiss="fileinput">Remover</a>
                                </div>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--***************MODAL INCLUIR*****************-->

        <!--***************MODAL ATUALIZAR*****************-->
        <div class="modal fade" id="modal-16" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog panel panel-primary">
                <div class="modal-content ">
                    <div class="panel-heading">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h3 class="panel-title text-center">Editar Slide</h3>
                    </div>
                    <div class="modal-header ">
                        <form role="form" enctype="multipart/form-data" method="post"  action="slide_fn.php?acao=atualizar">
                            <div class="form-group">
                                <label class="control-label">Título</label>
                                <textarea class="form-control rounded" type="text"  name="slide_nome" id="slide_nome" style="max-height:50px;" placeholder="Informe o título a ser exibido "><?= stripslashes($slide->slide_nome) ?></textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Subtítulo</label>
                                <textarea class="form-control rounded" type="text"  name="slide_subtitulo" id="slide_subtitulo" style="max-height:50px;" placeholder="Informe o primeiro subtítulo a ser exibido "><?= stripslashes($slide->slide_subtitulo) ?></textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Subtítulo 2</label>
                                <textarea class="form-control rounded" type="text"  name="slide_subtitulo1" id="slide_subtitulo1" style="max-height:50px;" placeholder="Informe o segundo subtítulo a ser exibido "><?= stripslashes($slide->slide_subtitulo1) ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Imagem</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                    <span class="input-group-addon btn btn-success btn-file"><span class="fileinput-new">Selecione a Imagem</span><span class="fileinput-exists">Mudar de Imagem</span><input type="file" id="slide_imagem" name="slide_imagem"></span>
                                    <a href="#" class="input-group-addon btn btn-danger fileinput-exists" data-dismiss="fileinput">Remover</a>
                                    <input type="hidden" id="slide_id"  name="slide_id" value="<?= $slide->slide_id ?>">
                                </div>
                            </div><!-- /.form-group -->

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
        <script src="./assets/js/jasny-bootstrap.fileinput.min.js"></script>
        <script src="./assets/js/typeahead.bundle.min.js"></script>
        <script src="./assets/js/jquery.nicescroll.min.js"></script>
        <script src="./assets/js/index.js"></script>
        <script src="./assets/js/jquery.easing.1.3.min.js"></script>
        <script src="./assets/ionsound/ion.sound.min.js"></script>
        <script src="./assets/js/bootbox.js"></script>
        <script src="./assets/js/jquery.mixitup.min.js"></script>
        <script src="./assets/js/apps.js"></script>
        <script src="./assets/js/dark.gallery.js"></script>
        <script src="./assets/js/jquery.rtnotify.js"></script>
        <script>

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
            $('#slide').addClass('active');
            $('.atualizar').on('click', function () {
                var id = $(this).attr('data-update');
                $('#slide_id').val(id);
                var url = "slide_fn.php?acao=Json";
                $.getJSON(url, {slide_id: id}, function (data) {
                    $('#modal-16 #slide_id').val(data.slide_id);
                    $('#modal-16 #slide_nome').val(data.slide_nome);
                    $('#modal-16 #slide_subtitulo').val(data.slide_subtitulo);
                    $('#modal-16 #slide_subtitulo1').val(data.slide_subtitulo1);
                });
                $('#modal-16').modal('show');
            });
        </script>
    </body>
</html>