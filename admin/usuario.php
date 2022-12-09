<?php
require_once '../loader.php';
@session_start();
if (!isset($_SESSION['LOGADO']) || $_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}
$site = new Site();
$site->getMeta();

$usuario = new Usuario();
$usuario->db = new DB;
$usuario->getPessoas();
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
        <link href="./assets/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="./assets/css/datatables.responsive.css" rel="stylesheet">
        <link href="./assets/css/fuelux.min.css" rel="stylesheet">
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
        <link href="./assets/css/bootstrap-tagsinput.css" rel="stylesheet">
        <link href="./assets/css/jasny-bootstrap-fileinput.min.css" rel="stylesheet">
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
                    <h2><i class="fa fa-users"></i> <span>Gerenciar Usuários </span></h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">Você está em :</span>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="home/">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Usuários</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="body-content animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel rounded shadow">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h3 class="panel-title"><button class="btn btn-primary" data-toggle="modal" data-target="#incluir"><i class="fa fa-user-plus"></i> Novo Usuário</button></h3>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body">
                                    <table id="datatable-ajax" class="table table-striped table-primary">
                                        <thead>
                                            <tr>
                                                <th data-class="expand">Foto</th>
                                                <th data-class="expand">Nome</th>
                                                <th data-hide="phone">Login</th>
                                                <th data-hide="phone">Email</th>
                                                <th data-hide="phone">Data de Cadastro</th>
                                                <th data-hide="phone">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($usuario->db->data[0])): ?>
                                                <?php foreach ($usuario->db->data as $user): ?>
                                                    <tr>
                                                        <?php if ($user->usuario_imagem): ?>
                                                            <td class="avatar"><img src="thumb.php?w=50&AMP;h=50&AMP;zc=1&AMP;src=../images/usuario/<?= $user->usuario_imagem ?>" class="img-circle"></td>
                                                        <?php else : ?>
                                                            <td class="avatar"><img src="thumb.php?w=50&AMP;h=50&AMP;zc=1&AMP;src=../images/usuario/avatar.png" class="img-circle"></td>
                                                        <?php endif; ?>
                                                        <td><?= stripslashes($user->usuario_nome) ?></td>
                                                        <td><?= stripslashes($user->usuario_login) ?></td>
                                                        <td><?= $user->usuario_email ?></td>
                                                        <td><?= $user->usuario_data ?></td>
                                                        <td style="width: 110px;">
                                                            <a class="btn btn-circle btn-info atualizar" data-update="<?= $user->usuario_id ?>" >
                                                                <i class="fa fa-edit icon-white"></i>
                                                            </a>
                                                            <a class="btn btn-circle btn-danger delete" data-url="usuario_fn.php?acao=remover&AMP;id=<?= $user->usuario_id ?>">
                                                                <i class="fa fa-user-times icon-white"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
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

        <!--***************MODAL INCLUIR*****************-->
        <div class="modal fade" id="incluir" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog panel panel-primary">
                <div class="modal-content ">
                    <div class="panel-heading">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h3 class="panel-title text-center">Adicionar Usuário</h3>
                    </div>
                    <div class="modal-header ">
                        <form role="form" enctype="multipart/form-data" method="post"  action="usuario_fn.php?acao=insert">
                            <div class="form-group">
                                <label for="usuario_nome">Nome:</label>
                                <input type="text" class="form-control"  name="usuario_nome" data-toggle="tooltip" data-placement="bottom" title="Informe o Nome..."  required />
                            </div>

                            <div class="form-group">
                                <label for="usuario_login">Login:</label>
                                <input type="text" class="form-control"   name="usuario_login"  data-toggle="tooltip" data-placement="bottom" title="Informe o login..." required />
                            </div>

                            <div class="form-group">
                                <label for="usuario_email">Email</label>
                                <input type="text" class="form-control" name="usuario_email"  data-toggle="tooltip" data-placement="bottom" title="Informe o email ..."  />
                            </div>

                            <div class="form-group">
                                <label for="usuario_senha">Senha:</label>
                                <input type="password" class="form-control"  name="usuario_senha"  data-toggle="tooltip" data-placement="bottom" title="Informe a senha ..."  required  />
                            </div>

                            <div class="form-group">
                                <label class="control-label">Imagem</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                    <span class="input-group-addon btn btn-success btn-file"><span class="fileinput-new">Selecione a Imagem</span><span class="fileinput-exists">Mudar de Imagem</span><input type="file"  name="usuario_imagem"></span>
                                    <a href="#" class="input-group-addon btn btn-danger fileinput-exists" data-dismiss="fileinput">Remover</a>
                                </div>
                            </div>

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
                        <h3 class="panel-title text-center">Editar Usuário</h3>
                    </div>
                    <div class="modal-header ">
                        <form role="form" enctype="multipart/form-data" method="post"  action="usuario_fn.php?acao=atualizar">
                            <div class="form-group">
                                <label for="usuario_nome">Nome:</label>
                                <input type="text" class="form-control"  name="usuario_nome" id="usuario_nome" data-toggle="tooltip" data-placement="bottom" title="Informe o Nome..." value="<?= $usuario->usuario_nome ?>" required />
                            </div>

                            <div class="form-group">
                                <label for="usuario_login">Login:</label>
                                <input type="text" class="form-control" id="usuario_login"  name="usuario_login"  data-toggle="tooltip" data-placement="bottom" title="Informe o login..." value="<?= $usuario->usuario_login ?>" required />
                            </div>

                            <div class="form-group">
                                <label for="usuario_email">Email</label>
                                <input type="text" class="form-control" id="usuario_email"  name="usuario_email"  data-toggle="tooltip" data-placement="bottom" title="Informe o email ..." value="<?= $usuario->usuario_email ?>" required />
                            </div>

                            <div class="form-group">
                                <label class="control-label">Imagem</label>
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                    <span class="input-group-addon btn btn-success btn-file"><span class="fileinput-new">Selecione a Imagem</span><span class="fileinput-exists">Mudar de Imagem</span><input type="file" id="usuario_imagem" name="usuario_imagem" value="<?= $usuario->usuario_imagem ?>"></span>
                                    <a href="#" class="input-group-addon btn btn-danger fileinput-exists" data-dismiss="fileinput">Remover</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="usuario_senha">Senha:</label>
                                <input type="password" class="form-control" id="usuario_senha"  name="usuario_senha"  data-toggle="tooltip" data-placement="bottom" title="Informe a senha ..." />
                                <input type="hidden" id="usuario_id"  name="usuario_id" value="<?= $usuario->usuario_id ?>">
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
                            O Sistema precisa pelo menos um administardor.
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
        <script src="./assets/js/jquery.dataTables.min.js"></script>
        <script src="./assets/js/dataTables.bootstrap.js"></script>
        <script src="./assets/js/datatables.responsive.js"></script>
        <script src="./assets/js/fuelux.min.js"></script>
        <script src="./assets/js/jquery.rtnotify.js"></script>
        <script src="./assets/js/apps.js"></script>
        <script>
            $('#usuario').addClass('active');
<?php if (isset($_GET['success'])): ?>
                $(document).ready(function () {
                    $.rtnotify({title: "Procedimento Realizado",
                        type: "default"});
                });
<?php endif; ?>

            $('.atualizar').on('click', function () {
                var id = $(this).attr('data-update');
                $('#usuario_id').val(id);
                var url = "usuario_fn.php?acao=Json";
                $.getJSON(url, {usuario_id: id}, function (data) {
                    //console.log(data);
                    $('#modal-16  #usuario_id').val(data.usuario_id);
                    $('#modal-16  #usuario_nome').val(data.usuario_nome);
                    $('#modal-16  #usuario_email').val(data.usuario_email);
                    $('#modal-16  #usuario_login').val(data.usuario_login);
                    $('#modal-16  #usuario_imagem').val(data.usuario_imagem);
                });
                $('#modal-16').modal('show');
            });
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
        </script>
    </body>
</html>