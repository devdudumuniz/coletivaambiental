<?php
$categoria_blog = new Area();
$categoria_blog->getAreas();
?>
<section class="widget">
    <h3>Categorias</h3>
    <ul class="list-unstyled iconList">
        <?php $categoria_blog->getMenu() ?>
        <?php if (isset($categoria_blog->db->data[0])): ?>
            <?php foreach ($categoria_blog->db->data as $c): ?>
                <li><a href="categoria/<?= Filter::slug2($c->area_nome) ?>/<?= $c->area_id ?>/"><?= $c->area_nome ?></a></li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</section>