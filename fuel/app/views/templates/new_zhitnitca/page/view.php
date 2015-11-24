<div class="carusel-sm">
    <?= \TCCore\TCTheme::render('home/partials/gallery'); ?>
</div>
<div class="container">
    <? if($page->description !== ''): ?>
        <div class="page-descr-wrapp">
            <?= $page->description; ?>
        </div>
    <? endif; ?>
    <div class="row page-nav-wrapp">
        <div class="col-md-9">
            <ul class="nav nav-tabs">
                <li role="presentation" class="<?= (isset($current_category_id) and $current_category_id === $page->id) ? 'active' : '' ?>"><?= Fuel\Core\Html::anchor(\Fuel\Core\Router::get('view_category', array('alias' => $page->alias)), $page->all_caption); ?></li>
                <? foreach ($page->subsidiary_category as $category): ?>
                    <li role="presentation" class="<?= (isset($current_category_id) and $current_category_id === $category->id) ? 'active' : '' ?>"><?= Fuel\Core\Html::anchor(\Fuel\Core\Router::get('view_subsidiary_category', array('alias' => $category->alias, 'parent_category' => $page->id)), $category->title) ;?></li>
                <? endforeach; ?>
            </ul>
        </div>
        <div class="col-md-3">
            
        </div>
    </div>
    
    <? if($content): ?>
        <? if(count($content) > 0): ?>
            <div class="row tiles">
                <div class="col-md-9">
                    <h2 class="pull-left"><?= $page->title; ?></h2>
                    <div class="pull-right pg-wrapp-top">
                        <?= $pagination; ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4 class="page-count">Количество страниц: <?= $total; ?></h5>
                </div>
            </div>
    
            <?= \TCCore\TCTheme::render("content/tiles", array('content' => $content, 'category' => $page, 'fool_view' => true)); ?>
            
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
        <? endif; ?>
    <? endif; ?> 
</div>
