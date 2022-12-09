<?php
include_once '../loader.php';
@session_start();
if (!isset($_SESSION['LOGADO']) || $_SESSION['LOGADO'] == FALSE) {
    @header('location:' . Validacao::getBase() . 'admin/logar/');
    exit;
}
$site = new Site();
$site->getMeta();

$icones = new Icon();
$icones->getIcones();

$modulo_aparencia = new ModuloAparencia();
$modulo_aparencia->getModuloAparencia();

$modulo1 = new Modulo1();
$modulo1->getModulo1();

$modulo2 = new Modulo2();
$modulo2->getModulo2();

$modulo3 = new Modulo3();
$modulo3->getModulo3();

$modulo4 = new Modulo4();
$modulo4->getModulo4();

$modulo5 = new Modulo5();
$modulo5->getModulo5();

$modulo6 = new Modulo6();
$modulo6->getModulo6();

$modulo7 = new Modulo7();
$modulo7->getModulo7();

$modulo8 = new Modulo8();
$modulo8->getModulo8();

$modulo9 = new Modulo9();
$modulo9->getModulo9();

$modulo10 = new Modulo10();
$modulo10->getModulo10();

$modulo11 = new Modulo11();
$modulo11->getModulo11();
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
        <link href="./assets/css/ion.rangeSlider.css" rel="stylesheet">
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
        <link href="./assets/css/summernote.css" rel="stylesheet">
        <!--/ END THEME STYLES -->

        <!-- START @IE SUPPORT -->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="./assets/js/html5shiv.min.js"></script>
        <script src="./assets/js/respond.min.js"></script>
        <![endif]-->
        <!--/ END IE SUPPORT -->
    </head>
    <body>
        <!--[if lt IE 9]>
        <p class="upgrade-browser">Upps!! You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <section id="wrapper" class="page-sound">
            <?php require_once './navegacao.php'; ?>
            <?php require_once './menu.php'; ?>
            <section id="page-content">
                <div class="header-content">
                    <h2><i class="fa fa-leaf"></i>  <span>Gerenciar Módulos</span></h2>
                    <div class="breadcrumb-wrapper hidden-xs">
                        <span class="label">Você está em :</span>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>
                                <a href="home/">Dashboard</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Frontend</a>
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
                                    <div class="callout callout-info" style="padding-top: 19px;"><p><strong>Gerenciar Home (Textos, Cores, Imagens, Temas e outros...)</strong></p></div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="panel-body no-padding">
                                    <div class="form-body">
                                        <div class="panel-group" id="accordion">
                                            <!-- **************************** MODULO APARÊNCIA ****************************-->
                                            <div class="panel panel-custom">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#aparencia">
                                                            <i class="fa fa-list"></i> Aparência do Site<span class="pull-right"><i class="fa fa-edit"></i></span> 
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="aparencia" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <form enctype="multipart/form-data" method="post" action="modulo_aparencia_fn.php?acao=atualizar">
                                                            <div class="form-group" >
                                                                <label class="control-label"><i class="fa fa-paint-brush"></i> Cores do site</label>
                                                                <select class="form-control input-sm mb-15 rounded" id="modulo_aparencia_cor" name="modulo_aparencia_cor" style="text-transform: uppercase;" >
                                                                    <option value="">Selecione uma Cor</option>
                                                                    <option value="blue">Azul</option>
                                                                    <option value="coffee">Coffee</option>
                                                                    <option value="dark">Preto</option>
                                                                    <option value="green">Verde</option>
                                                                    <option value="light">Azul Claro</option>
                                                                    <option value="orange">Laranja</option>
                                                                    <option value="red">Vermelho</option>
                                                                    <option value="pink">Violeta</option>
                                                                    <option value="yellow">Amarelo</option>
                                                                    <option value="sea-green">Verde Água</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Favicon</label>
                                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                    <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                                                    <span class="input-group-addon btn btn-success btn-file"><span class="fileinput-new">Selecione  Favicon</span><span class="fileinput-exists">Mudar  Favicon</span><input type="file" id="modulo_aparencia_favicon" name="modulo_aparencia_favicon" /></span>
                                                                    <a href="#" class="input-group-addon btn btn-danger fileinput-exists" data-dismiss="fileinput">Remover</a>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Imagem da Logo</label>
                                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                    <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                                                    <span class="input-group-addon btn btn-success btn-file"><span class="fileinput-new">Selecione Logo</span><span class="fileinput-exists">Mudar Logo</span><input type="file" id="modulo_aparencia_logo" name="modulo_aparencia_logo" /></span>
                                                                    <a href="#" class="input-group-addon btn btn-danger fileinput-exists" data-dismiss="fileinput">Remover</a>
                                                                </div>
                                                                <input class="form-control rounded" type="hidden" id="modulo_aparencia_id" name="modulo_aparencia_id" value="<?= $modulo_aparencia->modulo_aparencia_id ?>" />
                                                            </div>
                                                            <div class="form-footer">
                                                                <div class="text-center">
                                                                    <button class="btn btn-primary" type="submit">Atualizar</button>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- **************************** MODULO APARÊNCIA ****************************-->
                                            <div class="panel panel-custom">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#One">
                                                            <i class="fa fa-list"></i> Topo <span class="pull-right"><i class="fa fa-edit"></i></span> 
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="One" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <form enctype="multipart/form-data" method="post" action="modulo1_fn.php?acao=atualizar">
                                                            <div class="form-group">
                                                                <label class="control-label"><i class="fa fa-exclamation-triangle" style="color:yellow"></i> Status do Módulo</label>
                                                                <select class="form-control input-sm mb-15 rounded" id="modulo1_status" name="modulo1_status">
                                                                    <option value="">Selecione uma Opção</option>
                                                                    <option value="1">Ativado</option>
                                                                    <option value="0">Desativado</option>
                                                                </select>
                                                            </div>


                                                            <br />
                                                            <div class="form-group">
                                                                <label class="control-label">Título</label>
                                                                <textarea class="form-control rounded" type="text" id="modulo1_nome"  name="modulo1_nome" style="max-height:50px;" placeholder="Texto com duas cores use exemplo (Welcome to <span class='colored'> oxygen</span>)"><?= stripslashes($modulo1->modulo1_nome) ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Subtítulo </label>
                                                                <textarea class="form-control rounded" type="text" id="modulo1_subtitulo1"  name="modulo1_subtitulo1" style="max-height:50px;" placeholder="Texto com duas cores use exemplo (Welcome to <span class='colored'> oxygen</span>)"><?= stripslashes($modulo1->modulo1_subtitulo1) ?></textarea>
                                                                <input type="hidden" id="modulo1_id"  name="modulo1_id" value="<?= $modulo1->modulo1_id ?>" />
                                                            </div>

                                                            <div class="form-footer">
                                                                <div class="text-center">
                                                                    <button class="btn btn-primary" type="submit">Atualizar</button>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- **************************** MODULO 1 ****************************-->

                                            <!-- **************************** MODULO 2 ****************************-->
                                            <div class="panel panel-custom">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#Two">
                                                            <i class="fa fa-list"></i> Menu  <span class="pull-right"><i class="fa fa-edit"></i></span> 
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="Two" class="panel-collapse collapse">
                                                    <form method="post" action="modulo2_fn.php?acao=atualizar">
                                                        <div class="panel-body">

                                                            <div class="form-group hidden">
                                                                <label class="control-label"><i class="fa fa-exclamation-triangle" style="color:yellow"></i> Status do Módulo</label>
                                                                <select class="form-control input-sm mb-15 rounded" id="modulo2_status" name="modulo2_status">
                                                                    <option value="">Selecione uma Opção</option>
                                                                    <option value="1">Ativado</option>
                                                                    <option value="0">Desativado</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Nome</label>
                                                                <input class="form-control rounded" type="text" name="modulo2_nome" value="<?= stripslashes($modulo2->modulo2_nome) ?>" />
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Nome1</label>
                                                                <input class="form-control rounded" type="text" name="modulo2_nome1" value="<?= stripslashes($modulo2->modulo2_nome1) ?>" />
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Nome 2</label>
                                                                <input class="form-control rounded" type="text" name="modulo2_nome2" value="<?= stripslashes($modulo2->modulo2_nome2) ?>" />
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Nome 3</label>
                                                                <input class="form-control rounded" type="text" name="modulo2_nome3" value="<?= stripslashes($modulo2->modulo2_nome3) ?>" />
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Nome 4</label>
                                                                <input class="form-control rounded" type="text" name="modulo2_nome4" value="<?= stripslashes($modulo2->modulo2_nome4) ?>" />
                                                            </div>

                                                            <div class="hidden">
                                                                <div class="form-group">
                                                                    <label class="control-label">Nome 5</label>
                                                                    <input class="form-control rounded" type="text" name="modulo2_nome5" value="<?= stripslashes($modulo2->modulo2_nome5) ?>" />
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label">Nome 6</label>
                                                                    <input class="form-control rounded" type="text" name="modulo2_nome6" value="<?= stripslashes($modulo2->modulo2_nome6) ?>" />
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label">Nome 6</label>
                                                                    <input class="form-control rounded" type="text" name="modulo2_nome7" value="<?= stripslashes($modulo2->modulo2_nome7) ?>" />
                                                                    <input type="hidden" id="modulo2_id" name="modulo2_id" value="<?= $modulo2->modulo2_id ?>" />
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label">Nome 7</label>
                                                                    <input class="form-control rounded" type="text" name="modulo2_nome8" value="<?= stripslashes($modulo2->modulo2_nome8) ?>" />
                                                                </div>
                                                            </div>

                                                            <div class="form-footer">
                                                                <div class="text-center">
                                                                    <button class="btn btn-primary" type="submit">Atualizar</button>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- **************************** MODULO 2 ****************************-->
                                            <!-- **************************** MODULO 3 ****************************-->
                                            <div class="panel panel-custom">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#Three">
                                                            <i class="fa fa-list"></i> Sobre nós  <span class="pull-right"><i class="fa fa-edit"></i></span> 
                                                        </a>
                                                    </h4>
                                                </div>

                                                <div id="Three" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <form method="post" enctype="multipart/form-data" action="modulo3_fn.php?acao=atualizar">
                                                            <div class="form-group">
                                                                <div class="panel-body">
                                                                    <div class="form-group">
                                                                        <label class="control-label"><i class="fa fa-exclamation-triangle" style="color:yellow"></i> Status do Módulo</label>
                                                                        <select class="form-control input-sm mb-15 rounded" id="modulo3_status" name="modulo3_status">
                                                                            <option value="">Selecione uma Opção</option>
                                                                            <option value="1">Ativado</option>
                                                                            <option value="0">Desativado</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Título</label>
                                                                        <textarea class="form-control rounded" type="text"  name="modulo3_nome" style="max-height:50px;"><?= stripslashes($modulo3->modulo3_nome) ?></textarea>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group">
                                                                            <div class="row-fluid">
                                                                                <div class="col-md-11 pull-right">
                                                                                    <label class="control-label">Foto</label>
                                                                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                                        <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                                                                        <span class="input-group-addon btn btn-success btn-file"><span class="fileinput-new">Selecione a Imagem</span><span class="fileinput-exists">Mudar de Imagem</span><input type="file" id="modulo3_imagem" name="modulo3_imagem"></span>
                                                                                        <a href="#" class="input-group-addon btn btn-danger fileinput-exists" data-dismiss="fileinput">Remover</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-1">
                                                                                    <img src="thumb.php?w=100&h=100&zc=0&src=../images/<?= $modulo3->modulo3_imagem ?>" class="img-thumbnail" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div style="margin-bottom: 20px;"></div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Descrição</label>
                                                                        <textarea class="form-control rounded" type="text" id="modulo3_descricao"  name="modulo3_descricao" style="max-height:50px;"><?= stripslashes($modulo3->modulo3_descricao) ?></textarea>
                                                                    </div>
                                                                    <div class="form-footer">
                                                                        <div class="text-center">
                                                                            <button class="btn btn-primary" type="submit">Atualizar</button>
                                                                            <input class="form-control rounded" type="hidden" id="modulo3_id" name="modulo3_id" value="<?= $modulo3->modulo3_id ?>" />
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- **************************** MODULO 3 ****************************-->

                                            <!-- **************************** MODULO 4 ****************************-->
                                            <div class="panel panel-custom">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#four">
                                                            <i class="fa fa-list"></i> Banner Central  <span class="pull-right"><i class="fa fa-edit"></i></span> 
                                                        </a>
                                                    </h4>
                                                </div>

                                                <div id="four" class="panel-collapse collapse">
                                                    <form enctype="multipart/form-data" method="post" action="modulo4_fn.php?acao=atualizar">
                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <label class="control-label"><i class="fa fa-exclamation-triangle" style="color:yellow"></i> Status do Módulo</label>
                                                                <select class="form-control input-sm mb-15 rounded" id="modulo4_status" name="modulo4_status">
                                                                    <option value="">Selecione uma Opção</option>
                                                                    <option value="1">Ativado</option>
                                                                    <option value="0">Desativado</option>
                                                                </select>
                                                                <div class="form-group">
                                                                    <label class="control-label">Título</label>
                                                                    <textarea class="form-control rounded" type="text"  name="modulo4_descricao" style="max-height:50px;"><?= stripslashes($modulo4->modulo4_descricao) ?></textarea>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <div class="row-fluid">
                                                                            <div class="col-md-11 pull-right">
                                                                                <label class="control-label">Imagem</label>
                                                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                                    <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                                                                    <span class="input-group-addon btn btn-success btn-file"><span class="fileinput-new">Selecione a Imagem</span><span class="fileinput-exists">Mudar de Imagem</span><input type="file" id="modulo4_imagem" name="modulo4_imagem"></span>
                                                                                    <a href="#" class="input-group-addon btn btn-danger fileinput-exists" data-dismiss="fileinput">Remover</a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-1">
                                                                                <?php if (!empty($modulo4->modulo4_imagem)): ?>
                                                                                    <img src="thumb.php?w=100&h=100&zc=0&src=../images/<?= $modulo4->modulo4_imagem ?>" class="img-thumbnail" />
                                                                                <?php else: ?>
                                                                                    <img src="thumb.php?w=100&h=100&zc=0&src=../images/nopic.jpg" class="img-thumbnail" />
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div style="margin-bottom: 20px;"></div>

                                                                <div class="form-footer">
                                                                    <div class="text-center">
                                                                        <button class="btn btn-primary" type="submit">Atualizar</button>
                                                                        <input class="form-control rounded" type="hidden" id="modulo4_id" name="modulo4_id" value="<?= $modulo4->modulo4_id ?>" />
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- **************************** MODULO 4 ****************************-->


                                            <!-- **************************** MODULO 5 ****************************-->

                                            <div class="panel panel-lilac hidden">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionfive" >
                                                            <i class="fa fa-list"></i> Depoimentos  <span class="pull-right"><i class="fa fa-edit"></i></span> 
                                                        </a>
                                                    </h4>
                                                </div>

                                                <div id="accordionfive" class="panel-collapse collapse">
                                                    <form enctype="multipart/form-data" method="post" action="modulo5_fn.php?acao=atualizar">
                                                        <div class="panel-body">
                                                            <div class="form-group ">
                                                                <label class="control-label"><i class="fa fa-exclamation-triangle" style="color:yellow"></i> Status do Módulo</label>
                                                                <select class="form-control input-sm mb-15 rounded" id="modulo5_status" name="modulo5_status">
                                                                    <option value="">Selecione uma Opção</option>
                                                                    <option value="1">Ativado</option>
                                                                    <option value="0">Desativado</option>
                                                                </select>
                                                            </div>
                                                            <br />
                                                            <div class="form-group">
                                                                <label class="col-sm-12 control-label">Depoimentos a serem exibidos</label>
                                                                <div class="col-sm-12">
                                                                    <div class="slider-primary">
                                                                        <input id="depoimento" type="text" name="modulo5_limite" value="<?= $modulo5->modulo5_limite ?>" />
                                                                    </div>
                                                                    <br />
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Título</label>
                                                                <textarea class="form-control rounded" type="text"  name="modulo5_nome" style="max-height:50px;"><?= stripslashes($modulo5->modulo5_nome) ?></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Descricao</label>
                                                                <textarea class="form-control rounded" type="text"  name="modulo5_descricao" style="max-height:50px;"><?= stripslashes($modulo5->modulo5_descricao) ?></textarea>
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="control-label">Imagem</label>
                                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                    <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                                                    <span class="input-group-addon btn btn-success btn-file"><span class="fileinput-new">Selecione a Imagem</span><span class="fileinput-exists">Mudar de Imagem</span><input type="file" id="modulo5_imagem" name="modulo5_imagem"></span>
                                                                    <a href="#" class="input-group-addon btn btn-danger fileinput-exists" data-dismiss="fileinput">Remover</a>
                                                                </div>
                                                            </div>

                                                            <div class="form-footer">
                                                                <div class="text-center">
                                                                    <button class="btn btn-primary" type="submit">Atualizar</button>
                                                                    <input class="form-control rounded" type="hidden" id="modulo5_id" name="modulo5_id" value="<?= $modulo5->modulo5_id ?>" />
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <!-- **************************** MODULO 5 ****************************-->

                                            <!-- **************************** MODULO 6 ****************************-->
                                            <div class="panel panel-custom hidden">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionsix">
                                                            <i class="fa fa-list"></i> Serviços  <span class="pull-right"><i class="fa fa-edit"></i></span> 
                                                        </a>
                                                    </h4>
                                                </div>

                                                <div id="accordionsix" class="panel-collapse collapse">
                                                    <form enctype="multipart/form-data" method="post" action="modulo6_fn.php?acao=atualizar">
                                                        <div class="panel-body">
                                                            <div class="form-group ">
                                                                <label class="control-label"><i class="fa fa-exclamation-triangle" style="color:yellow"></i> Status do Módulo</label>
                                                                <select class="form-control input-sm mb-15 rounded" id="modulo6_status" name="modulo6_status">
                                                                    <option value="">Selecione uma Opção</option>
                                                                    <option value="1">Ativado</option>
                                                                    <option value="0">Desativado</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Título</label>
                                                                <input class="form-control rounded" type="text" name="modulo6_nome" value="<?= stripslashes($modulo6->modulo6_nome) ?>" />
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Imagem</label>
                                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                    <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                                                    <span class="input-group-addon btn btn-success btn-file"><span class="fileinput-new">Selecione a Imagem</span><span class="fileinput-exists">Mudar de Imagem</span><input type="file" id="modulo6_imagem" name="modulo6_imagem"></span>
                                                                    <a href="#" class="input-group-addon btn btn-danger fileinput-exists" data-dismiss="fileinput">Remover</a>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Descricao</label>
                                                                <textarea class="form-control rounded" type="text"  name="modulo6_descricao" style="max-height:50px;"><?= stripslashes($modulo6->modulo6_descricao) ?></textarea>
                                                            </div>


                                                            <div class="form-group form-group-divider">
                                                                <div class="form-inner">
                                                                    <h4 class="no-margin"> BOX </h4>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Título</label>
                                                                <textarea class="form-control rounded" type="text"  name="modulo6_nome1" placeholder="Título customizado exemplo(<span class='condiment'>Porque escolher  Oxygen ?</span>)"><?= stripslashes($modulo6->modulo6_nome1) ?></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Descricao</label>
                                                                <textarea class="form-control rounded" type="text"  name="modulo6_descricao1"><?= stripslashes($modulo6->modulo6_descricao1) ?></textarea>
                                                            </div>

                                                            <div class="form-footer">
                                                                <div class="text-center">
                                                                    <button class="btn btn-primary" type="submit">Atualizar</button>
                                                                    <input class="form-control rounded" type="hidden" id="modulo6_id" name="modulo6_id" value="<?= $modulo6->modulo6_id ?>" />
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- **************************** MODULO 6 ****************************-->

                                            <!-- **************************** MODULO 7 ****************************-->
                                            <div class="panel panel-custom">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionseven">
                                                            <i class="fa fa-list"></i> Portfólio  <span class="pull-right"><i class="fa fa-edit"></i></span> 
                                                        </a>
                                                    </h4>
                                                </div>

                                                <div id="accordionseven" class="panel-collapse collapse">
                                                    <form method="post" action="modulo7_fn.php?acao=atualizar">
                                                        <div class="panel-body">
                                                            <div class="form-group ">
                                                                <label class="control-label"><i class="fa fa-exclamation-triangle" style="color:yellow"></i> Status do Módulo</label>
                                                                <select class="form-control input-sm mb-15 rounded" id="modulo7_status" name="modulo7_status">
                                                                    <option value="">Selecione uma Opção</option>
                                                                    <option value="1">Ativado</option>
                                                                    <option value="0">Desativado</option>
                                                                </select>
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="control-label">Título</label>
                                                                <textarea class="form-control rounded" type="text"  name="modulo7_nome" style="max-height:50px;"><?= stripslashes($modulo7->modulo7_nome) ?></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Descricao</label>
                                                                <textarea class="form-control rounded" type="text"  name="modulo7_descricao" style="max-height:50px;"><?= stripslashes($modulo7->modulo7_descricao) ?></textarea>
                                                                <input class="form-control rounded" type="hidden" id="modulo7_id" name="modulo7_id" value="<?= $modulo7->modulo7_id ?>" />
                                                            </div>

                                                            <div class="form-footer">
                                                                <div class="text-center">
                                                                    <button class="btn btn-primary" type="submit">Atualizar</button>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- **************************** MODULO 7 ****************************-->
                                            <!-- **************************** MODULO 8 ****************************-->
                                            <div class="panel panel-custom">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordioneight" >
                                                            <i class="fa fa-list"></i> Equipe  <span class="pull-right"><i class="fa fa-edit"></i></span> 
                                                        </a>
                                                    </h4>
                                                </div>

                                                <div id="accordioneight" class="panel-collapse collapse">
                                                    <form enctype="multipart/form-data" method="post" action="modulo8_fn.php?acao=atualizar">
                                                        <div class="panel-body">
                                                            <div class="form-group ">
                                                                <label class="control-label"><i class="fa fa-exclamation-triangle" style="color:yellow"></i> Status do Módulo</label>
                                                                <select class="form-control input-sm mb-15 rounded" id="modulo8_status" name="modulo8_status">
                                                                    <option value="">Selecione uma Opção</option>
                                                                    <option value="1">Ativado</option>
                                                                    <option value="0">Desativado</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Título</label>
                                                                <textarea class="form-control rounded" type="text"  name="modulo8_nome" style="max-height:50px;"><?= stripslashes($modulo8->modulo8_nome) ?></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Descriçao</label>
                                                                <textarea class="form-control rounded" type="text"  name="modulo8_descricao" style="max-height:50px;"><?= stripslashes($modulo8->modulo8_descricao) ?></textarea>
                                                                <input type="hidden" id="modulo8_id" name="modulo8_id" value="<?= $modulo8->modulo8_id ?>" />
                                                            </div>

                                                            <div class="form-footer">
                                                                <div class="text-center">
                                                                    <button class="btn btn-primary" type="submit">Atualizar</button>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- **************************** MODULO 8 ****************************-->
                                            <!-- **************************** MODULO 9 ****************************-->
                                            <div class="panel panel-custom">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionnine">
                                                            <i class="fa fa-list"></i> Contato  <span class="pull-right"><i class="fa fa-edit"></i></span> 
                                                        </a>
                                                    </h4>
                                                </div>

                                                <div id="accordionnine" class="panel-collapse collapse">
                                                    <form enctype="multipart/form-data" method="post" action="modulo9_fn.php?acao=atualizar">
                                                        <div class="panel-body">
                                                            <div class="form-group ">
                                                                <label class="control-label"><i class="fa fa-exclamation-triangle" style="color:yellow"></i> Status do Módulo</label>
                                                                <select class="form-control input-sm mb-15 rounded" id="modulo9_status" name="modulo9_status">
                                                                    <option value="">Selecione uma Opção</option>
                                                                    <option value="1">Ativado</option>
                                                                    <option value="0">Desativado</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Título</label>
                                                                <textarea class="form-control rounded" type="text"   name="modulo9_nome" style="max-height:50px;"><?= stripslashes($modulo9->modulo9_nome) ?></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Subtítulo</label>
                                                                <textarea class="form-control rounded" type="text"   name="modulo9_subtitulo" style="max-height:50px;"><?= stripslashes($modulo9->modulo9_subtitulo) ?></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Botão</label>
                                                                <input class="form-control rounded" type="text" name="modulo9_button" value="<?= stripslashes($modulo9->modulo9_button) ?>" />
                                                                <input class="form-control rounded" type="hidden" id="modulo9_id" name="modulo9_id" value="<?= $modulo9->modulo9_id ?>" />
                                                            </div>

                                                            <div class="form-group hidden">
                                                                <label class="control-label">Imagem</label>
                                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                    <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                                                    <span class="input-group-addon btn btn-success btn-file"><span class="fileinput-new">Selecione a Imagem</span><span class="fileinput-exists">Mudar de Imagem</span><input type="file" id="modulo9_imagem" name="modulo9_imagem"></span>
                                                                    <a href="#" class="input-group-addon btn btn-danger fileinput-exists" data-dismiss="fileinput">Remover</a>
                                                                </div>
                                                            </div>

                                                            <div class="form-footer">
                                                                <div class="text-center">
                                                                    <button class="btn btn-primary" type="submit">Atualizar</button>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- **************************** MODULO 9 ****************************-->
                                            <!-- **************************** MODULO 10 ****************************-->
                                            <div class="panel panel-custom">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionten">
                                                            <i class="fa fa-list"></i> Blog Posts  <span class="pull-right"><i class="fa fa-edit"></i></span> 
                                                        </a>
                                                    </h4>
                                                </div>

                                                <div id="accordionten" class="panel-collapse collapse">
                                                    <form enctype="multipart/form-data" method="post" action="modulo10_fn.php?acao=atualizar">
                                                        <div class="panel-body">
                                                            <div class="form-group ">
                                                                <label class="control-label"><i class="fa fa-exclamation-triangle" style="color:yellow"></i> Status do Módulo</label>
                                                                <select class="form-control input-sm mb-15 rounded" id="modulo10_status" name="modulo10_status">
                                                                    <option value="">Selecione uma Opção</option>
                                                                    <option value="1">Ativado</option>
                                                                    <option value="0">Desativado</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-12 control-label">Paginação</label>
                                                                <div class="col-sm-12">
                                                                    <div class="slider-primary">
                                                                        <input id="pagina" type="text" name="modulo10_paginacao" value="<?= $modulo10->modulo1_paginacao ?>" />
                                                                    </div>
                                                                    <br />
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Título</label>
                                                                <textarea class="form-control rounded" type="text"  name="modulo10_nome" style="max-height:50px;"><?= stripslashes($modulo10->modulo10_nome) ?></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Subtítulo</label>
                                                                <textarea class="form-control rounded" type="text"  name="modulo10_subtitulo" style="max-height:50px;"><?= stripslashes($modulo10->modulo10_subtitulo) ?></textarea>
                                                            </div>

                                                            <div class="form-group hidden">
                                                                <label class="control-label"> Ícones</label>
                                                                <select  class="chosen-select mb-15" data-placeholder="Selecione um Ícone" id="modulo10_icon" name="modulo10_icon">
                                                                    <option value="">Selecione um Ícone</option>
                                                                    <?php foreach ($icones->db->data as $modulo10_icon) : ?>
                                                                        <option  value="<?= $modulo10_icon->icones_nome ?>"><?= $modulo10_icon->icones_nome ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group  hidden">
                                                                <label class="control-label">Texto</label>
                                                                <input class="form-control rounded" type="text" name="modulo10_button" value="<?= stripslashes($modulo10->modulo10_button) ?>" />
                                                            </div>

                                                            <div class="form-group  hidden">
                                                                <label class="control-label">Botão</label>
                                                                <input class="form-control rounded" type="text" name="modulo10_button1" value="<?= stripslashes($modulo10->modulo10_button1) ?>" />
                                                                <input class="form-control rounded" type="hidden" id="modulo10_id" name="modulo10_id" value="<?= $modulo10->modulo10_id ?>" />
                                                            </div>

                                                            <div class="form-group hidden">
                                                                <label class="control-label">Imagem</label>
                                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                    <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                                                    <span class="input-group-addon btn btn-success btn-file"><span class="fileinput-new">Selecione a Imagem</span><span class="fileinput-exists">Mudar de Imagem</span><input type="file" id="modulo10_imagem" name="modulo10_imagem"></span>
                                                                    <a href="#" class="input-group-addon btn btn-danger fileinput-exists" data-dismiss="fileinput">Remover</a>
                                                                </div>
                                                            </div>

                                                            <div class="form-footer">
                                                                <div class="text-center">
                                                                    <button class="btn btn-primary" type="submit">Atualizar</button>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- **************************** MODULO 10 ****************************-->
                                            <!-- **************************** MODULO 11 ****************************-->
                                            <div class="panel panel-custom">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordioneleven">
                                                            <i class="fa fa-list"></i> Rodapé <span class="pull-right"><i class="fa fa-edit"></i></span> 
                                                        </a>
                                                    </h4>
                                                </div>

                                                <div id="accordioneleven" class="panel-collapse collapse">
                                                    <form method="post" action="modulo11_fn.php?acao=atualizar">
                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <label class="control-label">Título do Mapa</label>
                                                                <input class="form-control rounded" type="text" name="modulo11_nome" value="<?= stripslashes($modulo11->modulo11_nome) ?>" />
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Direitos Reservados</label>
                                                                <input class="form-control rounded" type="text" name="modulo11_button" value="<?= stripslashes($modulo11->modulo11_button) ?>" />
                                                                <input class="form-control rounded" type="hidden" id="modulo11_id" name="modulo11_id" value="<?= $modulo11->modulo11_id ?>" />
                                                            </div>
                                                            <div class="form-footer">
                                                                <div class="text-center">
                                                                    <button class="btn btn-primary" type="submit">Atualizar</button>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- **************************** MODULO 11 ****************************-->
                                        </div>
                                    </div><!-- /.panel-body -->
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

        <script src="./assets/js/jquery.min.js"></script>
        <script src="./assets/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="./assets/js/handlebars.js"></script>
        <script src="./assets/js/typeahead.bundle.min.js"></script>
        <script src="./assets/js/jquery.nicescroll.min.js"></script>
        <script src="./assets/js/index.js"></script>
        <script src="./assets/js/jquery.easing.1.3.min.js"></script>
        <script src="./assets/ionsound/ion.sound.min.js"></script>
        <script src="./assets/js/bootbox.js"></script>
        <script src="./assets/js/bootstrap-tagsinput.min.js"></script>
        <script src="./assets/js/jasny-bootstrap.fileinput.min.js"></script>
        <script src="./assets/js/holder.js"></script>
        <script src="./assets/js/bootstrap-maxlength.min.js"></script>
        <script src="./assets/js/jquery.autosize.min.js"></script>
        <script src="./assets/js/chosen.jquery.min.js"></script>
        <script src="./assets/js/summernote.min.js"></script>
        <script src="./assets/js/summernote-pt-BR.js"></script>
        <!--/ END PAGE LEVEL PLUGINS -->

        <!-- START @PAGE LEVEL SCRIPTS -->
        <script src="./assets/js/apps.js"></script>
        <script src="./assets/js/ion.rangeSlider.min.js"></script>
        <script src="./assets/js/dark.form.js"></script>
        <script src="./assets/js/jquery.rtnotify.js"></script>
    </body>
    <script>
        $(document).ready(function () {
            $('#modulo3_descricao').summernote({
                lang: 'pt-BR'
            });
        });

        $("#depoimento").ionRangeSlider({
            min: 1,
            max: 30,
            from: <?= $modulo5->modulo5_limite ?>
        });
    </script>

    <script>
        $("#pagina").ionRangeSlider({
            min: 1,
            max: 300,
            from: <?= $modulo10->modulo10_paginacao ?>
        });
    </script>
    <script>

<?php if (isset($_GET['success'])): ?>
            $(document).ready(function () {
                $.rtnotify({title: "Procedimento Realizado",
                    type: "default"});
            });
<?php endif; ?>
        $('#frontend').addClass('active');
        $('#modulo_aparencia_cor').val('<?= $modulo_aparencia->modulo_aparencia_cor ?>');
        $('#modulo1_status').val('<?= $modulo1->modulo1_status ?>');
        $('#modulo2_status').val('<?= $modulo2->modulo2_status ?>');
        $('#modulo3_status').val('<?= $modulo3->modulo3_status ?>');

        $('#modulo4_status').val('<?= $modulo4->modulo4_status ?>');
        $('#modulo5_status').val('<?= $modulo5->modulo5_status ?>');
        $('#modulo6_status').val('<?= $modulo6->modulo6_status ?>');

        $('#modulo7_status').val('<?= $modulo7->modulo7_status ?>');
        $('#modulo8_status').val('<?= $modulo8->modulo8_status ?>');
        $('#modulo9_status').val('<?= $modulo9->modulo9_status ?>');
        $('#modulo10_status').val('<?= $modulo10->modulo10_status ?>');
        $('#modulo10_icon').val('<?= $modulo10->modulo10_icon ?>').trigger("chosen:updated");

    </script>
</html>