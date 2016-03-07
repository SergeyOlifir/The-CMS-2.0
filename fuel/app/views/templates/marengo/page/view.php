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
            <ul class="nav nav-tabs hidden-xs">
                <li role="presentation" class="<?= (isset($current_category_id) and $current_category_id === $page->id) ? 'active' : '' ?>"><?= Fuel\Core\Html::anchor(TCRouter::get('view_category', array('alias' => $page->alias)), $page->all_caption); ?></li>
                <? foreach ($page->subsidiary_category as $category): ?>
                    <li role="presentation" class="<?= (isset($current_category_id) and $current_category_id === $category->id) ? 'active' : '' ?>"><?= Fuel\Core\Html::anchor(TCRouter::get('view_subsidiary_category', array('alias' => $category->alias, 'parent_category' => $page->id)), $category->title) ;?></li>
                <? endforeach; ?>
            </ul>
            
            <nav class="navbar navbar-default navbar-second hidden-sm hidden-md hidden-lg hidden-print">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                            <i class="glyphicon glyphicon-chevron-down"></i>
                        </button>
                        <?= Fuel\Core\Html::anchor(TCRouter::get('view_category', array('alias' => $page->alias)), $page->all_caption, array('class' => 'navbar-brand')); ?>
                    </div>
                    <div class="collapse navbar-collapse pull-left" id="bs-example-navbar-collapse-2">
                        <ul class="nav navbar-nav">
                            <? foreach ($page->subsidiary_category as $category): ?>
                                <li role="presentation" class="<?= (isset($current_category_id) and $current_category_id === $category->id) ? 'active' : '' ?>"><?= Fuel\Core\Html::anchor(TCRouter::get('view_subsidiary_category', array('alias' => $category->alias, 'parent_category' => $page->id)), $category->title) ;?></li>
                            <? endforeach; ?>
                        </ul>
                    </div>
                </div>
            </nav>
            
        </div>
        <div class="col-md-3">
            
        </div>
    </div>
    
    <? if($content): ?>
        <? if(count($content) > 0): ?>
            <div class="row tiles">
                <div class="col-md-9 col-xs-12">
                    <h2 class="pull-left"><?= $current_category->title; ?></h2>
                    <div class="pull-right pg-wrapp-top">
                        <?= $pagination; ?>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12">
                    <h4 class="page-count">Количество страниц: <?= $total; ?></h5>
                </div>
            </div>
    
            <?= \TCCore\TCTheme::render("content/tiles", array('content' => $content, 'category' => $current_category, 'fool_view' => true)); ?>
            
            <div class="row tiles">
                <div class="col-md-9 clearfix">
                    <div class="pull-right pg-wrapp-top">
                        <?= $pagination; ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4 class="page-count">Количество страниц: <?= $total; ?></h5>
                </div>
            </div>
        <? endif; ?>
    <? else: ?>
        <p class="lead">
            Контента пока нет
        </p>
    <? endif; ?>
    <div class="related-categoryes">
        <? if(count($current_category->related_category) > 0): ?>
            <? foreach($current_category->related_category as $rcategory): ?>
                <? if(count($rcategory->get_own_content(4)) > 0): ?>
                    <div class="related-category">
                        <h2 class="related-cat-title"><?=$rcategory->title; ?></h2>
                        <div class="row tiles">
                            <?= \TCCore\TCTheme::render("content/tiles", array('content' => $rcategory->get_own_content(4), 'category' => $rcategory, 'fool_view' => false)); ?>
                        </div>
                        <div class="row">
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                                <h4 class="page-count"><?= Fuel\Core\Html::anchor(TCRouter::get('view_category', array('alias' => $rcategory->alias)), 'Все статьи раздела', array('class' => 'page-count'));?></h4>
                            </div>
                        </div>
                    </div>
                <? endif; ?>
            <? endforeach; ?>
        <? endif; ?>
    </div>
</div>
