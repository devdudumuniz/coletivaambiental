<?php
    $contatos = new Contato();
    $contatos->getContato();

    $sobre = new Modulo3();
    $sobre->getModulo3();

    $portfolio = new Portfolio();

    $rodape = new Modulo11();
    $rodape->getModulo11();
    $pagina = new Pagina();
?>
<section id="mainFooter" style="width:100%;">
    <div class="container" style="width:100%;">
        <div class="row">
        <style scoped>
            @media (min-width:900px){
                .row{
                    margin: auto;
                    width: 100%;
                    display: flex !important;
                    justify-content: space-between !important;
                }
                .col-md-3{
                    text-align: center;
                    width: 30%;
                }
            }
            @media (max-width:899px){
                .col-md-3{
                    text-align: center;
                    display: block;
                    margin: auto !important;
                }
            }
        </style>
            <div class="col-md-3 col-sm-6">
                <div class="footerWidget">
                    <img src="thumb.php?h=110&src=images/<?= $modulo_aparencia->modulo_aparencia_logo ?>" alt="" id="footerLogo" class="img-responsive">
                    <p>
                        <?= Validacao::cut(stripslashes($sobre->modulo3_descricao), 350, '...') ?>
                        <a href="sobre/" class="readMore">Mais Sobre Nós</a>
                    </p>
                    <p>
                    </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footerWidget">
                    <h3>Últimos Posts</h3>
                    <ul class="list-unstyled iconList">
                        <?= $pagina->getNews() ?>
                        <?php if (isset($pagina->db->data[0])) : ?>
                            <?php foreach ($pagina->db->data as $p): ?>
                                <li><a href="post/<?= Filter::slug2($p->pagina_nome) ?>/<?= $p->pagina_id ?>/"><?= Validacao::cut(stripslashes($p->pagina_nome), 30, '...') ?></a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footerWidget">

                    <h3><?= $site->site_meta_titulo ?></h3>
                    <address>
                        <p>
                            <i class="icon-location"></i> <?= $contatos->contato_endereco ?><br>
                            <?php if (!empty($contatos->contato_telefone1)) : ?>
                                <i class="icon-phone"></i><?= $contatos->contato_telefone1 ?> <br>
                            <?php endif; ?>
                            <?php if (!empty($contatos->contato_telefone2)) : ?>
                                <i class="icon-phone"></i><?= $contatos->contato_telefone2 ?> <br>
                            <?php endif; ?>
                            <?php if (!empty($contatos->contato_telefone3)) : ?>
                                <i class="icon-phone"></i><?= $contatos->contato_telefone3 ?> <br>
                            <?php endif; ?>
                            <?php if (!empty($contatos->contato_telefone4)) : ?>
                                <i class="icon-phone"></i><?= $contatos->contato_telefone4 ?> <br>
                            <?php endif; ?>
                            <?php if (!empty($contatos->contato_telefone5)) : ?>
                                <i class="icon-phone"></i><?= $contatos->contato_telefone5 ?> <br>
                            <?php endif; ?>
                            <?php if (!empty($contatos->contato_telefone6)) : ?>
                                <i class="icon-phone"></i><?= $contatos->contato_telefone6 ?> <br>
                            <?php endif; ?>
                            <i class="icon-mail-alt"></i><?= $contatos->contato_email ?></a>
                        </p>
                    </address>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="footerRights" style="display: block !important;">
    <div class="container">
        <div class="row" style="display: block !important;">
            <div class="col-md-12" style="margin:2% auto;">
                <ul class="socialNetwork">
                    <style scoped>
                        .socialNetwork>li>a{
                            text-decoration: none;
                        }
                        .socialNetwork>li{
                            margin: auto 1%;
                        }
                    </style>
                    <?php 
                       $social = new Social();
                       $social->getSociaistatus();
                    ?>
                    <?php if (isset($social->db->data[0])): ?>
                        <?php foreach ($social->db->data as $redes): ?>
                            <li><a href="<?= Filter::UrlExternal($redes->social_url) ?>"  target="_blank" class="tips"><i class="<?= stripslashes($redes->social_nome) ?> iconRounded"></i></a></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>     
            </div>
            <div class="col-md-12">
                <p><?= stripslashes($rodape->modulo11_button) ?></p>
            </div>
        </div>
    </div>
</section>