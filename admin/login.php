<?php
/*
 * @author Dudu Muniz
 */
@session_start();
if (isset($_GET['deslogar'])) {
    $_SESSION['LOGADO'] = FALSE;
    session_destroy();
    session_start();
    $_SESSION['USER']['foto'] = "./fotos/avatar.jpg"; //anovnuous
}
if (isset($_SESSION['LOGADO']) && $_SESSION['LOGADO'] == TRUE) {
    @header('location:index.php/');
    exit;
}
require_once '../loader.php';
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

        <?php require_once './base.php';?>
        <!-- START @META SECTION -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title><?= $site->site_meta_titulo ?></title>
        <!--/ END META SECTION -->

        <!-- START @FAVICONS -->

        <link href="./assets/img/ico/favicon.ico?<?= rand(0, 100) ?>" rel="shortcut icon" sizes="144x144">
        <!--/ END FAVICONS -->

        <!-- START @FONT STYLES -->
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
        <link href="./assets/css/themes/default.theme.css" rel="stylesheet" id="theme">
        <link href="./assets/css/sign.css" rel="stylesheet">
        <link href="./assets/css/custom.css" rel="stylesheet">
        <link href = './assets/css/jquery.noty.css' rel = 'stylesheet'>
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

        <!-- START @SIGN WRAPPER -->
        <div id="sign-wrapper">

            <!-- Brand -->
            <div class="brand">
                <h1><p style="font-family: 'Architects Daughter', cursive;"><?= $site->site_meta_titulo ?></p></h1>
            </div>
            <!--/ Brand -->

            <!-- Register form -->
            <form class="form-horizontal rounded shadow no-overflow"  method="post" action="login_verificacao.php">
                <div class="sign-header">
                    <div class="form-group">
                        <div class="sign-text">
                            <span style="font-family: 'Architects Daughter', cursive;">Admin</span>
                        </div>
                    </div>
                </div>
                <div class="sign-body">
                    <div class="form-group">
                        <div class="input-group input-group-lg rounded no-overflow">
                            <input type="text" class="form-control" id="usuario_login" name="usuario_login" placeholder="Login" value="<?= (isset($_SESSION['USER']['login'])) ? $_SESSION['USER']['login'] : '' ?>">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-lg rounded no-overflow">
                            <input type="password" class="form-control" placeholder="Senha"  id="usuario_senha" name="usuario_senha">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        </div>
                    </div>
                </div>
                <div class="sign-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-theme btn-lg btn-block no-margin rounded" style="font-family: 'Architects Daughter', cursive;">Logar</button>
                    </div>
                </div>
            </form>
            <!--/ Register form -->
        </div><!-- /#sign-wrapper -->
        <!--/ END SIGN WRAPPER -->

        <!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- START @CORE PLUGINS -->
        <script src="./assets/js/jquery.min.js"></script>
        <script src="./assets/js/jquery.easing.1.3.min.js"></script>
        <script src="./assets/ionsound/ion.sound.min.js"></script>
        <!--/ END CORE PLUGINS -->

        <!-- START @PAGE LEVEL SCRIPTS -->
        <script src="./assets/js/pages/blankon.sign.js"></script>
        <script src="./assets/js/apps.js"></script>
        <script src="./assets/js/jquery.noty.js"></script>
        <!--/ END PAGE LEVEL SCRIPTS -->
        <!--/ END JAVASCRIPT SECTION -->

        <!-- START GOOGLE ANALYTICS -->
        <script>
<?php if (isset($_GET['erro'])): ?>
                noty({
                    text: 'Login ou senha estão incorretos!',
                    layout: 'top',
                    closeWith: ['click', 'hover'],
                    type: 'error'
                    
                });
<?php endif; ?>

        </script>
        <!--/ END GOOGLE ANALYTICS -->
    </body>
    <!-- END Body -->
</html>