<?= TCCore\TCTheme::render('home/partials/gallery'); ?>

<div class="featured-wrp-type1">
    <div class="container">
        <? if(count($main_page_model->get_featured_categories(1)) > 0): ?>
            <div class="row">
                <? $i = 0; ?>
                <? foreach($main_page_model->get_featured_categories(1) as $rcategory): ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a class="feat-cat-link" data-position="<?= $i; ?>" href="<?= TCRouter::get('view_category', array('alias' => $rcategory->alias)) ;?>">
                            <div class="categoty-card" style="background-image: url('<?= $rcategory->get_logo('small');?>')">
                                <h4><?= $rcategory->title; ?></h4>
                                <span class="round-arrow"><i class="glyphicon glyphicon-chevron-right"></i></span>
                            </div>
                        </a>
                    </div>
                    <? $i++; ?>
                <? endforeach; ?>
            </div>
        <? endif; ?>
    </div>
</div>

<div class="container">
    <div class="related-categoryes-wrp">
        <? if(count($main_page_model->promoted_category) > 0): ?>
            <? foreach($main_page_model->promoted_category as $rcategory): ?>
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

<div class="featured-wrp-type2">
    <div class="container">
        <? if(count($main_page_model->get_featured_categories(2)) > 0): ?>
            
                <? foreach($main_page_model->get_featured_categories(2) as $rcategory): ?>
                    <h2 class="related-cat-title"><?=$rcategory->title; ?></h2>
                    <div class="row">
                        <? $i = 0; ?>
                        <? foreach ($rcategory->get_content(4, 0) as $cont): ?>
                            <div class="col-sm-6 col-xs-12">
                                <a class="feat-wrp" href="<?= TCRouter::get('view_subsidiary_content', array('id' => $cont->id, 'parent_category' => $rcategory->id)) ;?>">
                                    <div class="clearfix">
                                        <div class="text-area <?= (($i < 2) ? 'pull-left' : 'pull-right'); ?>" data-position="<?= $i; ?>">
                                            <h4 class="cat-title "><?= $rcategory->title; ?></h4>
                                            <h4 class="cont-title "><?= $cont->title; ?></h4>
                                        </div>
                                        <div class="image-area <?= (($i < 2) ? 'pull-right' : 'pull-left'); ?>">
                                            <div class="bgr" style="background-image: url('<?= $cont->get_logo('small');?>')"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <? $i++; ?>
                        <? endforeach; ?>
                    </div>
                    <div class="row">
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                            <h4 class="page-count"><?= Fuel\Core\Html::anchor(TCRouter::get('view_category', array('alias' => $rcategory->alias)), 'Все статьи раздела', array('class' => 'page-count'));?></h4>
                        </div>
                    </div>
                <? endforeach; ?>
        <? endif; ?>
    </div>
</div>

