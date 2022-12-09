<?php
require_once './loader.php';
$site = new Site();
$site->getMeta();

$modulo_aparencia = new ModuloAparencia();
$modulo_aparencia->getModuloaparencia();

$topo = new Modulo1();
$topo->getModulo1();

$menu = new Modulo2();
$menu->getModulo2();

$contato = new Modulo9();
$contato->getModulo9();

$contatos = new Contato();
$contatos->getContato();

$sobre = new Modulo3();
$sobre->getModulo3();

$portfolio = new Modulo7();
$portfolio->getModulo7();

$blog = new Modulo10();
$blog->getModulo10();



if (isset($_POST['email']) && !empty($_POST['email'])) {
    require_once './plugin/email/email.php';
    global $mail;
    $smtp = new Smtpr();
    $smtp->getSmtp();
    $mail->Port = $smtp->smtp_port;
    $mail->Host = $smtp->smtp_host;
    $mail->Username = $smtp->smtp_username;
    $mail->From = $smtp->smtp_username;
    $mail->Password = $smtp->smtp_password;
    $mail->FromName = $smtp->smtp_fromname;
    $mail->Subject = utf8_decode("Contato Via Site " . $site->site_meta_titulo);
    $mail->AddBCC($smtp->smtp_bcc);
    $mail->AddAddress($smtp->smtp_username);

    $data = date('d/m/Y H:i');
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    $mail->AddReplyTo($email);
    $body = "<b>Data da Mensagem: </b> $data <br />";
    $body .= "<b>Nome:</b> $nome <br />";
    $body .= "<b>E-mail:</b> $email <br />";
    $body .= "<b>Mensagem: </b>$mensagem <br />";
    $mail->Body = nl2br($body);
}
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="pt-br">
    <!--<![endif]-->
    <head>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

        <?php require_once './analytics.php'; ?>
        <?php require_once './base.php'; ?>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <title><?= $site->site_meta_titulo ?></title>
        <meta name="description" content="<?= $site->site_meta_desc ?>">
        <meta name="keywords" content="<?= $site->site_meta_palavra ?>">
        <meta name="author" content="<?= $site->site_meta_autor ?>">
        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- CSS
        ================================================== -->
        <!-- Bootstrap  -->
        <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
        <!-- web font  -->
        <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <!-- plugin css  -->
        <link rel="stylesheet" type="text/css" href="js-plugin/animation-framework/animate.css" />
        <!-- Pop up-->
        <link rel="stylesheet" type="text/css" href="js-plugin/magnific-popup/magnific-popup.css" />
        <!-- Flex slider-->
        <link rel="stylesheet" type="text/css" href="js-plugin/flexslider/flexslider.css" />
        <!-- Owl carousel-->
        <link rel="stylesheet" href="js-plugin/owl.carousel/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="js-plugin/owl.carousel/owl-carousel/owl.transitions.css">
        <link rel="stylesheet" href="js-plugin/owl.carousel/owl-carousel/owl.theme.css">
        <!-- icon fonts -->
        <link type="text/css" rel="stylesheet" href="font-icons/custom-icons/css/custom-icons.css">
        <link type="text/css" rel="stylesheet" href="font-icons/custom-icons/css/custom-icons-ie7.css">
        <!-- nekoAnim-->
        <link rel="stylesheet" type="text/css" href="js-plugin/appear/nekoAnim.css">
        <!-- Custom css -->
        <link type="text/css" rel="stylesheet" href="css/layout.css">
        <link type="text/css" id="colors" rel="stylesheet" href="css/colors.css">
        <link type="text/css" rel="stylesheet" href="css/<?= $modulo_aparencia->modulo_aparencia_cor ?>.css">
        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
        <script src="js/modernizr-2.6.1.min.js"></script>
        <!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="admin/assets/img/ico/favicon.ico?<?= rand(0, 100) ?>">
    </head>
    <body class="activateAppearAnimation">
        <!-- Primary Page Layout 
        ================================================== -->
        <!-- globalWrapper -->
        <div id="globalWrapper">
            <!-- header -->
            <header class="navbar-fixed-top">
                <div id="mainHeader" role="banner">
                    <?php require_once './menu.php'; ?>
                </div>
            </header>
            <!-- header -->
            <!-- ======================================= content ======================================= -->
            <section id="page">
                <header class="page-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1><?= stripslashes($contato->modulo9_nome) ?></h1>
                                <ul class="breadcrumb visible-md visible-lg">
                                    <li><a href="home/">Home</a></li>
                                    <li class="active">Contato</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </header>
                <section id="content" class="mt30">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4>Endereço:</h4>
                                <address>
                                    <?= $contatos->contato_endereco ?> <br/>
                                </address>
                                <h4>Telefone:</h4>
                                <?php if (!empty($contatos->contato_telefone1)) : ?>
                                    <address>
                                        <?= $contatos->contato_telefone1 ?><br/>
                                    </address>
                                <?php endif; ?>
                                <?php if (!empty($contatos->contato_telefone2)) : ?>
                                    <address>
                                        <?= $contatos->contato_telefone2 ?><br/>
                                    </address>
                                <?php endif; ?>
                                <?php if (!empty($contatos->contato_telefone3)) : ?>
                                    <address>
                                        <?= $contatos->contato_telefone3 ?><br/>
                                    </address>
                                <?php endif; ?>
                                <?php if (!empty($contatos->contato_telefone4)) : ?>
                                    <address>
                                        <?= $contatos->contato_telefone4 ?><br/>
                                    </address>
                                <?php endif; ?>
                                <?php if (!empty($contatos->contato_telefone5)) : ?>
                                    <address>
                                        <?= $contatos->contato_telefone5 ?><br/>
                                    </address>
                                <?php endif; ?>
                                <?php if (!empty($contatos->contato_telefone6)) : ?>
                                    <address>
                                        <?= $contatos->contato_telefone5 ?><br/>
                                    </address>
                                <?php endif; ?>
                            </div>
                            <form method="post" id="contactfrm" role="form">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="name">Nome</label>
                                        <input type="text" class="form-control" name="nome" id="name" placeholder="Seu nome" required title="Por favor informe seu nome"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" required placeholder="Seu email" title="Por favor informe um endereço de email válido"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="comments">Mensagem</label>
                                        <textarea name="mensagem" class="form-control" id="comments" required cols="3" rows="5" placeholder="Mensagem…" title="Por favor informe a mensagem"></textarea>
                                    </div>
                                </div>                        
                                <div class="col-md-8 col-md-offset-4">
                                    <div class="result"></div>
                                    <button name="submit" type="submit" class="btn btn-lg" id="submit"> Enviar</button>
                                </div>

                            </form>
                            <?php
                            if (isset($_POST['email']) && !empty($_POST['email'])) {
                                if ($mail->Send()) {
                                    echo "<p class='alert alert-success' id='msg_alert'> <strong>Obrigado!</strong> Sua Mensagem foi entregue.</p>";
                                } else {
                                    echo "<p class='alert alert-danger' id='msg_alert'> Erro ao enviar  Mensagem: $mail->ErrorInfo</p>";
                                }
                            }
                            ?> 
                        </div>
                    </div>
                    <iframe  id="mapWrapper" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3398050.159378877!2d-39.67364508094135!3d-8.472634200457732!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7007c9d931c86c5%3A0x1de0196a93401726!2sPernambuco!5e0!3m2!1spt-BR!2sbr!4v1658630898657!5m2!1spt-BR!2sbr" style="border:0;width:100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <!--  <div id="mapWrapper" class="mt30"></div> -->
                </section>
            </section>
            <!-- content -->
            <!-- footer -->
            <footer id="footerWrapper" class="footer2">
                <?php require_once './footer.php'; ?>
            </footer>
            <!-- End footer -->
        </div>
        <!-- -->
        <!-- End Document
        ================================================== -->
        <script type="text/javascript" src="js-plugin/respond/respond.min.js"></script>
        <script type="text/javascript" src="js-plugin/jquery/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="js-plugin/jquery-ui/jquery-ui-1.8.23.custom.min.js"></script>
        <!-- plug-ins de terceiros -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="js-plugin/easing/jquery.easing.1.3.js"></script>
        <!-- carousel -->
        <script type="text/javascript" src="js-plugin/owl.carousel/owl-carousel/owl.carousel.min.js"></script>
        <!-- pop up -->
        <script type="text/javascript" src="js-plugin/magnific-popup/jquery.magnific-popup.min.js"></script>
        <!-- form -->
        <script type="text/javascript" src="js-plugin/neko-contact-ajax-plugin/js/jquery.validate.min.js"></script>
        <!-- aparecer -->
        <script type="text/javascript" src="js-plugin/appear/jquery.appear.js"></script>
        <!-- Customização  -->
        <script type="text/javascript" src="js/custom.js"></script>
        <script>
            $('#contato').addClass('active');
            var locations = [
                //point number 1
                ['<?= $site->site_meta_titulo ?>', '<?= $contatos->contato_endereco ?>']

            ];

        </script>
        <script>
            jQuery(document).ready(function () {
                //hide a div after 3 seconds
                setTimeout(function () {
                    jQuery("#msg_alert").hide();
                }, 8000);
            });
        </script>
    </body>
</html>
