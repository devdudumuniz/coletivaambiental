<?php
require_once '../loader.php';
@session_start();
if (!isset($_SESSION['LOGADO']) || $_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}
$site = new Site();
$site->getMeta();

$area1 = new Area1();
$area1->db = new DB;
$area1->getAreas1();

$portfolio_id = intval($_GET['id']);
$work = new Portfolio();
$work->portfolio_id = $portfolio_id;
$work->getPortfolio();
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
        <link href="./assets/css/dropzone.css" rel="stylesheet">
        <link href="./assets/css/jquery-ui.min.css" rel="stylesheet">
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
                    <h2><i class="fa fa-list"></i> Portfólio<span></span></h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">Você está em :</span>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="home/">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Portfólio</a>
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
                                    <div class="callout callout-info" style="padding-top: 19px;"><p><strong>Editar Projeto</strong></p></div>
                                </div><!-- /.panel-subheading -->
                                <div class="clearfix"></div>
                                <div class="panel-body no-padding">
                                    <form  enctype="multipart/form-data" method="post" action="portfolio_fn.php?acao=atualizar">
                                        <div class="form-body">
                                            <div class="form-group ">
                                                <label for="portfolio_area1" class="control-label">Categoria</label>
                                                <select data-placeholder="Obrigatório selecionar a área" id="portfolio_area1" name="portfolio_area1" class="form-control input-sm mb-15" required>
                                                    <option value="">Selecione a Área</option>
                                                    <?php if (isset($area1->db->data[0])): ?>
                                                        <?php foreach ($area1->db->data as $categoria): ?>
                                                    <option value="<?= $categoria->area1_id ?>"><?= stripslashes($categoria->area1_nome)?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div><!-- /.form-group --><!-- /.form-group -->

                                            <div class="form-group">
                                                <label class="control-label">Título do Projeto</label>
                                                <input class="form-control rounded" type="text" id="portfolio_nome"  name="portfolio_nome" required value="<?= stripslashes($work->portfolio_nome )?>">
                                            </div><!-- /.form-group -->
                                            
                                            <div class="form-group">
                                                <label class="control-label">Cliente</label>
                                                <input class="form-control" type="text" id="portfolio_cliente"  name="portfolio_cliente" value="<?= stripslashes($work->portfolio_cliente) ?>" />
                                            </div>

                                            <div class="form-group">
                                                <label class= control-label">Data</label>
                                                <input type="text" class="form-control" id="portfolio_data" name="portfolio_data" value="<?= $work->portfolio_data ?>">
                                            </div>

                                            <div class="form-group">
                                                <label class= control-label">Link do projeto</label>
                                                <input type="text" class="form-control" id="portfolio_url" name="portfolio_url" value="<?= $work->portfolio_url ?>">
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Imagem</label>
                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                    <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                                    <span class="input-group-addon btn btn-success btn-file"><span class="fileinput-new">Selecione a Imagem</span><span class="fileinput-exists">Mudar de Imagem</span><input type="file" id="portfolio_imagem" name="portfolio_imagem"></span>
                                                    <a href="#" class="input-group-addon btn btn-danger fileinput-exists" data-dismiss="fileinput">Remover</a>
                                                </div>
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label class="control-label">Desrição do Portfólio</label>
                                                <textarea class="form-control" id="portfolio_descricao" name="portfolio_descricao" rows="5"><?= stripslashes($work->portfolio_descricao) ?></textarea>
                                                <input type="hidden" id="portfolio_id" name="portfolio_id" value="<?= $work->portfolio_id ?>" >
                                            </div><!-- /.form-group -->

                                            <div class="form-footer">
                                                <div class="text-center">
                                                    <button class="btn btn-primary" type="submit">Atualizar</button>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div><!-- /.form-footer -->
                                        </div><!-- /.panel-body -->
                                    </form>
                                    <div class="container">
                                        <form id="form-dropzone" class="dropzone" action="upload.php?portfolio_id=<?= $portfolio_id ?>" enctype="multipart/form-data" method="post">
                                            <div class="fallback">
                                                <div class="dz-preview dz-file-preview">
                                                    <div class="dz-details">
                                                        <div class="dz-filename"><span data-dz-name></span></div>
                                                        <div class="dz-size" data-dz-size></div>
                                                        <img data-dz-thumbnail />
                                                    </div>
                                                    <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                                                    <div class="dz-success-mark"><span>✔</span></div>
                                                    <div class="dz-error-mark"><span>✘</span></div>
                                                    <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                                </div>
                                            </div>
                                            <div id="msg-drop"></div>
                                        </form>
                                        <form method="post" id="form-remove" action="portfolio_fn.php?acao=removerFoto&portfolio_id=<?= $portfolio_id ?>">
                                            <?php
                                            $foto = new Foto();
                                            $foto->foto_portfolio = $portfolio_id;
                                            $foto->getFotos();
                                            ?>
                                            <?php $flag = ($foto->db->data >= 1) ? 'show' : 'hide'; ?>

                                            <div id="galeria" class="col-sm-12 col-md-12" style="border:0px solid red;">
                                                <?php if (isset($foto->db->data[0])) : ?>
                                                    <?php foreach ($foto->db->data as $f) : ?>
                                                        <div class="col-md-2  col-sm-3 col-xs-6" id="li_<?= $f->foto_id ?>">
                                                            <input class="hide" type="checkbox" name="fotos[]" value="<?= $f->foto_id ?>" id="check_<?= $f->foto_id ?>"  />
                                                            <img src="thumb.php?w=120&h=100&zc=1&src=../images/portfolio/<?= $f->foto_url ?>" class="thumbnail  tip click-remove" id="<?= $f->foto_id ?>"
                                                                 style="cursor: pointer;width: 150px; height: 100px; margin-top:10px; margin-bottom: 20px; " title="marcar para remover" >
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>

                                            <div class="row col-xs-12 div-btn-remove <?= $flag ?>">
                                                <p class="text-center">
                                                    <button type="button" class="btn btn-danger  btn-sel-tudo">
                                                        <i class="fa fa-check-circle-o"></i>
                                                        Selecionar Tudo
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sel-nada hide">
                                                        <i class="fa fa-undo"></i>
                                                        Desmarcar Tudo
                                                    </button>
                                                    <button type="button" class="btn btn-danger" id="btn-submit-remove">
                                                        <i class="fa fa-trash-o"></i>
                                                        Remover  Selecionadas
                                                    </button>
                                                </p>
                                            </div>                                       
                                        </form>
                                    </div>

                               
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
        <script src="./assets/js/dropzone.js"></script>
        <script src="./assets/js/jquery-ui.min.js"></script>

        <!--/ END PAGE LEVEL SCRIPTS -->
        <!--/ END JAVASCRIPT SECTION -->

    </body>
    <script>
        $('#portfolio_data').datepicker({
            format: "dd/MM/yyyy",
            language: "pt-BR"
        });
        $('.portfolio').addClass('active');
        $('#portfolio_area1').val('<?= $work->portfolio_area1 ?>');
        $(document).ready(function () {
            $('#portfolio_descricao').summernote({
                lang: 'pt-BR'
            });
        });
        $('.portfolioeditar').addClass('active');

    </script>
    <script>
        $(function () {
            reloadActions();
        });
        function reloadActions() {
            //var sortedIDs = $( ".selector" ).sortable( "toArray" );        
            $("#galeria").sortable({cursor: "move",
                stop: function (event, ui) {
                    var ids = $("#galeria").sortable("toArray");
                    var url = 'foto_fn.php?acao=posicao';
                    $.post(url, {item: ids}, function (data) {
                        console.log(data);
                    });
                }
            });
        }

        $(function () {
            Dropzone.autoDiscover = false;
            $(".dropzone").dropzone({
                url: "upload.php?portfolio_id=<?= $portfolio_id ?>",
                accept: function (file, done) {
                    done();

                },
                maxFilesize: 2000, // MB
                complete: function (file) {
                    //console.log($('#form-dropzone').html())
                    if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                        $('.dz-preview').each(function () {
                            $(this).fadeOut(1000);
                        });

                        $('#msg-drop').html('<center> <h1><i class="fa fa-3x fa-thumbs-up"></i>  <br /> Upload Concluído</h1></center>');
                        setTimeout(function () {
                            $('#msg-drop').html('<center> <h1><i class="fa fa-3x fa-cloud-upload"></i>  <br /> Enviar Imagens</h1></center>');
                            $('.div-btn-remove').removeClass('hide').show();
                            window.location.reload();
                        }, 1000);
                    }
                    var f = $.parseJSON(file.xhr.response);
                    var div = '';
                    div += '    <div class="col-md-2"> ';
                    div += '        <input class="hide" type="checkbox" name="fotos[]" value="' + f.foto_id + '" id="check_' + f.foto_id + '"  />';
                    div += '        <img src="../images/portfolio/' + f.foto_url + '" class="thumbnail tip click-remove" id="' + f.foto_id + '" ';
                    div += '         style="cursor: pointer;width: 150px; height: 100px; margin-top:10px; margin-bottom: 20px; " title="marcar para remover" >';
                    div += '    </div>';
                    $('#galeria').append(div);
                    reloadActions();

                    $('#' + f.foto_id).on('click', function () {
                        var id = f.foto_id;
                        $('#check_' + id).trigger('click');
                        $('#' + id).toggleClass('btn-danger');

                        if ($('input:checked').length >= 1) {
                            $('#btn-submit-remove').show();
                        } else {
                            $('#btn-submit-remove').hide();
                        }
                    });

                },
                sending: function (file, xhr, formData) {
                    formData.append("portfolio_id", "<?= $portfolio_id ?>");
                    if (xhr.readyState === 4) {
                        //console.log(xhr.response)
                    }
                },
                totaluploadprogress: function () {

                }
            });
        });
        $('#btn-submit-remove').hide();

        $('#btn-submit-remove').on('click', function () {
            if ($('input:checked').length >= 1) {
                $('#form-remove').submit();
            }
        });

        $('.click-remove').on('click', function () {
            var id = $(this).attr('id');
            $('#check_' + id).trigger('click');
            $('#' + id).toggleClass('btn-danger');

            if ($('input:checked').length >= 1) {
                $('#btn-submit-remove').show();
            } else {
                $('#btn-submit-remove').hide();
            }
        });

        $('.btn-sel-tudo').on('click', function () {
            $('.click-remove').each(function () {
                var id = $(this).attr('id');
                $('#' + id).addClass('btn-danger');
                $('#check_' + id).attr('checked', 'checked');
            });
            $('.btn-sel-tudo').hide();
            $('.btn-sel-nada').removeClass('hide').show();

            if ($('input:checked').length >= 1) {
                $('#btn-submit-remove').show();
            } else {
                $('#btn-submit-remove').hide();
            }
        });

        $('.btn-sel-nada').on('click', function () {
            $('.click-remove').each(function () {
                var id = $(this).attr('id');
                $('#' + id).removeClass('btn-danger');
                $('#check_' + id).removeAttr('checked');
            });
            $('.btn-sel-tudo').show();
            $('.btn-sel-nada').hide();

            if ($('input:checked').length >= 1) {
                $('#btn-submit-remove').show();
            } else {
                $('#btn-submit-remove').hide();
            }
        });

    </script>
    <!--/ END BODY -->

</html>