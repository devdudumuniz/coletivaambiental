<?php
require_once '../loader.php';
@session_start();
if (!isset($_SESSION['LOGADO']) || $_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}
$pagina_id = intval($_GET['id']);
$comentario = new Comment();
$comentario->getComments($pagina_id);

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

        <!-- START @META SECTION -->
        <?php require_once './base.php'; ?>
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
                    <h2><i class="fa fa-comments"></i>  <span>Gerenciar Comentários: <?= stripslashes($comentario->pagina_nome) ?>  </span></h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">Você está em :</span>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="home/">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Comentários</a>
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
                                            <th width="120">Nome</th>
                                            <th>Mensagem</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($comentario->db->data [0])): ?>
                                            <?php foreach ($comentario->db->data as $coment): ?>
                                                <tr>

                                                    <td>
                                                        <?= stripslashes($coment->comentario_nome) ?>    
                                                    </td>
                                                    <td><?= stripslashes($coment->comentario_mensagem) ?></td>
                                                    <td style="width: 20%;">
                                                        <div class="form-group">
                                                            <?php if ($coment->comentario_status == 1) : ?>
                                                                <a href="comentario_fn.php?acao=moderar&status=0&id=<?= $coment->comentario_id ?>&pagina_id=<?= $pagina_id ?>">
                                                                    <input type="checkbox" class="make-switch "  name="switch" checked data-on-text="ON" data-off-text="OFF" data-on-color="primary" />
                                                                </a>
                                                            <?php else: ?>
                                                                <a href="comentario_fn.php?acao=moderar&status=1&id=<?= $coment->comentario_id ?>&pagina_id=<?= $pagina_id ?>">
                                                                    <input type="checkbox" class="make-switch" name="switch" data-on-text="ON" data-off-text="OFF"  data-on-color="primary"  data-off-color="danger" />
                                                                </a>
                                                            <?php endif; ?>
                                                            <a class="btn btn-circle btn-info atualizar"id="comentario" data-update="<?= $coment->comentario_id ?>" >
                                                                <i class="fa fa-edit icon-white"></i>
                                                            </a>
                                                            <a  data-url="comentario_fn.php?acao=remover&AMP;id=<?= $coment->comentario_id ?>&pagina_id=<?= $pagina_id ?>" class="btn  btn-danger btn-circle delete">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?= $comentario->db->paginacao ?>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <!--***************MODAL ATUALIZAR*****************-->
        <div class="modal fade" id="modal-16" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog panel panel-primary">
                <div class="modal-content ">
                    <div class="panel-heading">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h3 class="panel-title text-center">Editar Comentário</h3>
                    </div>
                    <div class="modal-header ">
                        <form role="form" method="post"  action="comentario_fn.php?acao=atualizar">
                            <div class="form-group">
                                <label for="area_nome">Título da Página:</label>
                                <input type="reset" class="form-control"  value="<?= stripslashes($comentario->pagina_nome) ?>" required />
                            </div>

                            <div class="form-group">
                                <label for="area_nome">Nome do autor:</label>
                                <input type="reset" class="form-control"  value="<?= stripslashes($comentario->comentario_nome) ?>" required />
                            </div>

                            <div class="form-group">
                                <label class="control-label">Comentário</label>
                                <textarea class="form-control" id="comentario_mensagem" name="comentario_mensagem"><?= stripslashes($comentario->comentario_mensagem) ?></textarea>
                                <input type="hidden" id="comentario_id"  name="comentario_id" value="<?= $comentario->comentario_id ?>">
                                <input type="hidden"  name="pagina_id" value="<?= $pagina_id ?>">
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
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>
                            <button type="button" class="btn btn-danger" id="btn-confirm-remove"><i class="fa fa-trash"></i> Remover</button>

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!--***************MODAL REMOVER*****************-->
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
        <script src="./assets/js/jquery.rtnotify.js"></script>
        <!--/ END PAGE LEVEL PLUGINS -->

        <!-- START @PAGE LEVEL SCRIPTS -->
        <script src="./assets/js/apps.js"></script>
        <script src="./assets/js/bootstrap-switch.min.js"></script>
        <script>
            $('.comentario').addClass('active');
<?php if (isset($_GET['success'])): ?>
                $(document).ready(function () {
                    $.rtnotify({title: "Procedimento Realizado",
                        type: "default"});
                });
<?php endif; ?>
            $("[name='switch']").bootstrapSwitch();

            $('.delete').on('click', function () {
                var url = $(this).attr('data-url');
                $('#MODALREMOVE').modal('show');
                $('#btn-confirm-remove').on('click', function () {
                    window.location = url;
                });
            });

            $(".sound").on("click", function () {
                ion.sound.play("button_push.mp3");
            });

            $('.atualizar').on('click', function () {
                var id = $(this).attr('data-update');
                $('#comentario').val(id);
                var url = "comentario_fn.php?acao=Json";
                $.getJSON(url, {comentario_id: id}, function (data) {
                    //console.log(data);
                    $('#modal-16  #comentario_id').val(data.comentario_id);
                    $('#modal-16  #pagina_nome').val(data.pagina_nome);
                    $('#modal-16  #comentario_nome').val(data.comentario_nome);
                    $('#modal-16  #comentario_mensagem').val(data.comentario_mensagem);
                });
                $('#modal-16').modal('show');
            });
        </script>
    </body>
</html>