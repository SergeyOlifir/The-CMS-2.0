<div class="carusel-sm">
    <?= \TCCore\TCTheme::render('home/partials/gallery'); ?>
</div>
<div class="container">
    <div class="row tiles">
        <div class="col-md-9">
            <h2 class="pull-left"><?= $category->title; ?></h2>
            <div class="pull-right pg-wrapp-top">
                <?= $pagination; ?>
            </div>
        </div>
        <div class="col-md-3">
            <h4 class="page-count">Количество страниц: <?= $total; ?></h5>
        </div>
    </div>
    <? if(count($category->content) > 0): ?>
        <?= ''; //TCTheme::render("content/tiles", array('content' => $content, 'page' => $category, 'fool_view' => true)); ?>
    <? endif; ?>
    <div class="row tiles">
        <div class="col-md-9">
            <div class="pull-right pg-wrapp-top">
                <?= $pagination; ?>
            </div>
        </div>
        <div class="col-md-3">
            <h4 class="page-count">Количество страниц: <?= $total; ?></h5>
        </div>
    </div>
</div>

