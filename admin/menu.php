<?php
$status0 = new Comment();
?>
<aside id="sidebar-left" class="sidebar-circle">
    <div class="sidebar-content">
        <div class="media">
            <a class="pull-left has-notif avatar" href="javascript:void(0);">
                <?php if ($_SESSION['USER']['IMAGEM']): ?>
                    <img src="../images/<?= $_SESSION['USER']['IMAGEM'] ?>" alt="admin">
                <?php else : ?>
                    <img src="../images/avatar.png" alt="admin">
                <?php endif; ?>
                <i class="online"></i>
            </a>
            <div class="media-body">
                <?php $user_nome = explode(" ", $_SESSION['USER']['NOME']); ?>
                <h4 class="media-heading">Olá, <span><?= $user_nome[0]; ?></span></h4>
            </div>
        </div>
    </div>
    <ul class="sidebar-menu">
        <li id="home">
            <a href="<?= Validacao::getBase() ?>admin/">
                <span class="icon"><i class="fa fa-home"></i></span>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li id="frontend">
            <a href="frontend.php/">
                <span class="icon"><i class="fa fa-cog"></i></span>
                <span class="text">Configurações </span>
            </a>
        </li>
        <li id="slide">
            <a href="slide.php/">
                <span class="icon"><i class="fa fa-photo"></i></span>
                <span class="text">Slide </span>
            </a>
        </li>
        <li>
            <a class="logout" data-url="logar/?deslogar"  href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Logout">
                <span class="icon"><i class="fa fa-power-off"></i></span>
                <span class="text">Sair / Logout </span>
            </a>
        </li>
        <li class="sidebar-category">
            <span>Conteúdo</span>
            <span class="pull-right"><i class="fa fa-edit"></i></span>
        </li>
        <li class="submenu depoimentonovo listardepoimento">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-bullhorn"></i></span>
                <span class="text">Depoimento</span>
                <span class="arrow"></span>
            </a>
            <ul>
                <li class="depoimentonovo"><a href="./depoimento_novo.php">Novo Depoimento</a></li>
                <li class="listardepoimento"><a href="./depoimento.php/">Listar Depoimentos</a></li>
            </ul>
        </li>
        <li class="submenu clientenovo listar">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-users"></i></span>
                <span class="text">Equipe</span>
                <span class="arrow"></span>
            </a>
            <ul>
                <li class="clientenovo"><a href="equipe/novo/">Novo Membro</a></li>
                <li class="listar"><a href="./cliente.php">Listar Membros</a></li>
            </ul>
        </li>
        <li class="submenu serviconovo listarservico servicoeditar">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-suitcase"></i></span>
                <span class="text">Serviços</span>
                <span class="arrow"></span>
            </a>
            <ul>
                <li class="serviconovo"><a href="servico_novo.php/">Novo Serviço</a></li>
                <li class="listarservico"><a href="servico.php/">Listar Serviços</a></li>
            </ul>
        </li>
        <li class="submenu blognovo listarblog categoria blogeditar comentario">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-pencil"></i></span>
                <span class="text">Blog</span>
                <span class="arrow"></span>
            </a>
            <ul>
                <li class="blognovo"><a href="./pagina_novo.php/">Novo Post</a></li>
                <li class="listarblog"><a href="./pagina.php/">Listar Post</a></li>
                <li class="categoria"><a href="./area.php/">Gerenciar Categoria</a></li>
            </ul>
        </li>

        <li class="submenu portfoliognovo listarportfolio portfoliocategoria portfolioeditar">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-wrench"></i></span>
                <span class="text">Portfólio</span>
                <span class="arrow"></span>
            </a>
            <ul>
                <li class="portfoliognovo"><a href="./portfolio_novo.php/">Novo Projeto</a></li>
                <li class="listarportfolio"><a href="./portfolio.php/">Listar Projetos</a></li>
                <li class="portfoliocategoria"><a href="./portfolio_editar.php/">Gerenciar Categoria</a></li>

            </ul>
        </li>
        <li class="sidebar-category">
            <span>Configuração</span>
            <span class="pull-right"><i class="fa fa-cog"></i></span>
        </li>
        <li id="usuario">
            <a href="usuario.php/">
                <span class="icon"><i class="fa fa-user"></i></span>
                <span class="text">Usuário </span>
            </a>
        </li>
        <li id="seo">
            <a href="./site.php/">
                <span class="icon"><i class="fa fa-globe"></i></span>
                <span class="text">SEO </span>
            </a>
        </li>
        <li id="social">
            <a href="social.php/">
                <span class="icon"><i class="fa fa-facebook-f"></i></span>
                <span class="text">Redes Sociais </span>
            </a>
        </li>
        <li id="contato">
            <a href="./contato.php/">
                <span class="icon"><i class="fa fa-phone"></i></span>
                <span class="text">Contato </span>
            </a>
        </li>
        <li id="smtp">
            <a href="./smtp.php/">
                <span class="icon"><i class="fa fa-envelope"></i></span>
                <span class="text">SMTP </span>
            </a>
        </li>
        <li class="sidebar-category">
            <span><span class="hidden-sidebar-minimize"></span> &nbsp;</span>
        </li>
    </ul>
</aside>