<?php 

?>
<div class="container">
    <nav class="navbar navbar-default scrollMenu" role="navigation">
        <div class="navbar-header">
            <!-- responsive navigation -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Logo -->
            <a  href="<?= Validacao::getBaseUrl() ?>/">
                <img src="./images/logo.png" style="max-height: 90px; margin-top:5px auto;" alt="<?= $site->site_meta_titulo ?>"/>
            </a>
        </div>
        <div id="mainMenu" class="navbar-collapse collapse">
            <!-- Main navigation -->
            <ul class="nav navbar-nav pull-right">
                <li class="primary">
                    <a href="<?= Validacao::getBaseUrl() ?>/" class="firstLevel last" id="index"><?= stripslashes($menu->modulo2_nome) ?></a>
                </li>

                <?php if ($sobre->modulo3_status == 1) : ?>
                    <li class="sep"></li>
                    <li class="primary"> 
                        <a href="sobre.php/" class="firstLevel last" id="sobre"><?= stripslashes($menu->modulo2_nome1) ?></a>
                    </li>
                <?php endif; ?>

                <?php if ($portfolio->modulo7_status == 1) : ?>
                    <li class="sep"></li>
                    <li class="primary">
                        <a href="portfolios.php/" class="firstLevel last" id="projeto"><?= stripslashes($menu->modulo2_nome2) ?></a>
                    </li>
                <?php endif; ?>

                <?php if ($blog->modulo10_status == 1) : ?>
                    <li class="sep"></li>
                    <li class="primary">
                        <a href="posts.php/" class="firstLevel last" id="posts"><?= stripslashes($menu->modulo2_nome3) ?></a>
                    </li>
                <?php endif; ?>

                <?php if ($contato->modulo9_status == 1): ?>
                    <li class="sep"></li>
                    <li class="primary">
                        <a href="contato.php/" class="firstLevel last" id="contato"><?= stripslashes($menu->modulo2_nome4) ?></a>
                    </li>
                <?php endif; ?>
            </ul>
            <!-- End main navigation -->
        </div>
    </nav>
</div>

