<?php
require_once '../loader.php';
$modulo_aparencia = new ModuloAparencia();
$modulo_aparencia->getModuloaparencia();
$smtp = new Smtpr();
$smtp->getSmtp();
$status0 = new Comment();
?>
<header id="header">
    <!-- Start header left -->
    <div class="header-left">
        <!-- Start offcanvas left: This menu will take position at the top of template header (mobile only). Make sure that only #header have the `position: relative`, or it may cause unwanted behavior -->
        <div class="navbar-minimize-mobile left">
            <i class="fa fa-bars"></i>
        </div>
        <div class="navbar-header">
            <a class="navbar-brand" href="home/">
                <img class="logo" src="thumb.php?w=110&h=50&zc=0&src=../images/<?= $modulo_aparencia->modulo_aparencia_logo ?>" style="max-height: 52px;" />
            </a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="header-right">
        <div class="navbar navbar-toolbar">
            <ul class="nav navbar-nav navbar-left">
                <li class="navbar-minimize">
                <li><a href="<?= Validacao:: getBase() ?> " target="_blank"><i class="fa fa-globe"></i> Visite o Site</a></li>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown navbar-notification">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-comments"></i><span class="count label label-danger rounded"><?= $status0->Contarstatus0('comentario'); ?></span></a>
                    <div class="dropdown-menu animated flipInX">
                        <div class="dropdown-header">
                            <span class="title text-center">Notificações</span>
                        </div>
                        <div class="dropdown-body niceScroll">
                            <div class="media-list small">
                                <?php
                                $notificacao = new Comment();
                                $notificacao->getComentarios();
                                if (isset($notificacao->db->data[0])):
                                    foreach ($notificacao->db->data as $not):
                                        ?>
                                        <a href="post/comentarios/<?= $not->pagina_id ?>/" class="media">
                                            <div class="media-object pull-left"><i class="fa fa-comments-o fg-info"></i></div>
                                            <div class="media-body">
                                                <span class="media-text"><strong><?= $not->comentario_nome ?> </strong>
                                                    <p><?= $not->pagina_nome ?></p>
                                                </span>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="dropdown-footer">
                            <a href="javascript:void(0);">&nbsp;</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown navbar-profile">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="meta">
                            <?php if (isset($_SESSION['USER']['IMAGEM'])): ?>
                                <span class="avatar"><img src="thumb.php?w=40&h=40&zc=0&src=../images/usuario/<?= $_SESSION['USER']['IMAGEM'] ?>" class="img-circle" alt="admin"></span>
                            <?php else : ?>
                                <span class="avatar"><img src="thumb.php?w=50&h=50&zc=0&src=../images/usuario/avatar.png" class="img-circle" alt="admin"></span>
                            <?php endif; ?>
                            <span class="text hidden-xs hidden-sm text-muted"><?= $_SESSION['USER']['NOME'] ?></span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated flipInX">
                        <li class="dropdown-header">Sair</li>
                        <li><a class="logout" data-url="logar/?deslogar"  href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Logout"><i class="fa fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</header>