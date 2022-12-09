<?php
require_once '../loader.php';
@session_start();
if (!isset($_SESSION['LOGADO']) || $_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}
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

        <section id="wrapper" class="page-sound">
            <?php require_once './navegacao.php'; ?>
            <?php require_once './menu.php'; ?>
            <section id="page-content">
                <div class="header-content">
                    <h2><i class="fa fa-globe"></i>  <span>Configurações do SEO</span></h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">Você está em :</span>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="home/">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">SEO</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="body-content animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel rounded shadow">
                                <div class="panel-sub-heading">
                                    <a class="pull-right" href="http://www.seomarketing.com.br/tutorial-SEO.php" target="_blank">Mais sobre SEO</a>
                                    <div class="callout callout-info" style="padding-top: 19px;"><p><strong style="padding-top: 19px;">SEO - Otimização de Mecanismos de Busca</strong></p><a class="pull-right" href="http://www.seomarketing.com.br/tutorial-SEO.php" target="_blank">Mais sobre SEO</a></div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="panel-body no-padding">

                                    <form method="post" action="site_fn.php?acao=atualizar">
                                        <div class="form-body">
                                            <div class="form-group form-group-divider">
                                                <div class="callout callout-warning">
                                                    <h6 class="no-margin" style="padding-top: 10px;">  A Tag Title é um dos itens que mais influencia o posicionamento no Google, se não for o mais importante. E é fácil entender o porquê. O propósito do algoritmo do Google é conseguir mostrar às pessoas os resultados mais relevantes às suas buscas. (Um título ideal deve ter de 50 a 68 caracteres)</h6>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Meta Title</label>
                                                <input class="form-control rounded" type="text"  id="site_meta_titulo"  name="site_meta_titulo" required value="<?= stripslashes($site->site_meta_titulo) ?>">
                                            </div>
                                            <div class="form-group form-group-divider">
                                                <div class="callout callout-warning">
                                                    <h6 class="no-margin" style="padding-top: 19px;"> O nome do autor da página.</h6>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Meta Author</label>
                                                <input class="form-control rounded" type="text" id="site_meta_autor"  name="site_meta_autor" required value="<?= stripslashes($site->site_meta_autor) ?>" >
                                            </div>
                                            <div class="form-group form-group-divider">
                                                <div class="callout callout-warning">
                                                    <h6 class="no-margin" style="padding-top: 19px;"> As keywords tipicamente são usadas por alguns motores de busca para indexar os documentos juntamente com informações encontradas em seu título e body. As frases ou palavras devem ser separadas por vírgulas.</h6>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Meta Keywords </label>
                                                <input class="form-control rounded" type="text" id="site_meta_palavra" name="site_meta_palavra" required value="<?= stripslashes($site->site_meta_palavra) ?>">
                                            </div>
                                            <div class="form-group form-group-divider">
                                                <div class="callout callout-warning">
                                                    <h6 class="no-margin" style="padding-top: 10px;"> Meta Description que geralmente define a descrição exibida nos resultados do Google. Descreva o conteúdo da página de uma forma a estimular o interesse das pessoas em conhecer mais sobre o conteúdo da página, para aumentar a visitação do seu site. (O tamanho máximo sugerido é de 156 caracteres)</h6>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Meta Description </label>
                                                <input class="form-control rounded" type="text" id="site_meta_desc" name="site_meta_desc" required value="<?= stripslashes($site->site_meta_desc) ?>">
                                            </div>
                                            <div class="form-group form-group-divider">
                                                <div class="callout callout-warning">
                                                    <h6 class="no-margin" style="padding-top: 10px;">  Essa análise é muito importante para entender o comportamento do seu consumidor. Acompanhando as métricas do seu site você poderá identificar tendências (avaliando os produtos ou serviços mais acessados).<br /> Aqui você só vai precisar inserir este código <strong class="text-danger">UA-55892535-1</strong> do código gerado da sua conta do <a href="http://www.google.com/analytics/" target="_blank">Google analytics</a></h6>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label"> Google Analytics</label>
                                                <input type="text" class="form-control rounded" id="site_analytics"  name="site_analytics" required value="<?= $site->site_analytics ?>">
                                                <input type="hidden"  id="site_id"  name="site_id" value="<?= $site->site_id ?>" />
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
        <script src="./assets/js/apps.js"></script>
        <script src="./assets/js/dark.form.js"></script>
        <script src="./assets/js/jquery.rtnotify.js"></script>
        <script>
            $('#seo').addClass('active');

<?php if (isset($_GET['success'])): ?>
                $(document).ready(function () {
                    $.rtnotify({title: "Procedimento Realizado",
                        type: "default"});
                });
<?php endif; ?>
        </script>
    </body>
</html>