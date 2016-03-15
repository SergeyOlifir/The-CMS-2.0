<?= TCCore\TCTheme::render('home/partials/gallery'); ?>

<div class="featured-wrp-type1">
    <div class="container">
        <? if(count($main_page_model->get_featured_categories(1)) > 0): ?>
            
                <? foreach($main_page_model->get_featured_categories(1) as $rcategory): ?>
                    <h2 class="related-cat-title"><?= Fuel\Core\Html::anchor(TCRouter::get('view_category', array('lang' => TCLocal::getCurrentLang(), 'alias' => $rcategory->alias)), $rcategory->title);?></h2>
                    <div class="row">
                        <? $i = 0; ?>
                        <? foreach ($rcategory->get_content(4, 0) as $cont): ?>
                            <div class="col-xs-12">
                                <div class="clearfix">
                                    <? if(!($i % 2)): ?>
                                        <a class="clearfix feat-wrp" href="<?= TCRouter::get('view_subsidiary_content', array('id' => $cont->id, 'parent_category' => $rcategory->id)) ;?>">
                                            <div class="col-sm-6 from-left" data-position="<?= $i; ?>">
                                                <div>
                                                    <div class="twrp clearfix">
                                                        <time class="pull-right"><?= Date::forge($cont->created_at)->format("%d/%m/%Y"); ?></time>
                                                    </div>
                                                    <h4 class="cont-title"><?= $cont->title; ?></h4>
                                                    <p><?= \Fuel\Core\Str::truncate($cont->description, 150, '...'); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 img-from-right img-wrp">
                                                <div class="image-area">
                                                    <div class="bgr" style="background-image: url('<?= $cont->get_logo('small');?>')"></div>
                                                </div>
                                            </div>
                                        </a>
                                    <? else: ?>
                                        <a class="clearfix feat-wrp" href="<?= TCRouter::get('view_subsidiary_content', array('id' => $cont->id, 'parent_category' => $rcategory->id)) ;?>">
                                            <div class="col-sm-6 img-from-left img-wrp">
                                                <div class="image-area">
                                                    <div class="bgr" style="background-image: url('<?= $cont->get_logo('small');?>')"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 from-right" data-position="<?= $i; ?>">
                                                <div>
                                                    <div class="twrp clearfix">
                                                        <time class="pull-left"><?= Date::forge($cont->created_at)->format("%d/%m/%Y"); ?></time>
                                                    </div>
                                                    <h4 class="cont-title"><?= $cont->title; ?></h4>
                                                    <p><?= \Fuel\Core\Str::truncate($cont->description, 150, '...'); ?></p>
                                                </div>
                                            </div>
                                        </a>
                                    <? endif; ?>
                                </div>
                            </div>
                            <? $i++; ?>
                        <? endforeach; ?>
                    </div>
                <? endforeach; ?>
        <? endif; ?>
    </div>
</div>

<div class="container">
    <div class="related-categoryes-wrp main">
        <? if(count($main_page_model->promoted_category) > 0): ?>
            <? foreach($main_page_model->promoted_category as $rcategory): ?>
                <? if(count($rcategory->get_own_content(4)) > 0): ?>
                    <div class="related-category">
                        <h2 class="related-cat-title"><?= Fuel\Core\Html::anchor(TCRouter::get('view_category', array('alias' => $rcategory->alias)), $rcategory->title);?></h2>
                        <div class="row tiles">
                            <?= \TCCore\TCTheme::render("content/tiles", array('content' => $rcategory->get_own_content(4), 'category' => $rcategory, 'fool_view' => false)); ?>
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
                    <div class="row">
                        <? foreach ($rcategory->get_content(4, 0) as $cont): ?>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <a href="<?= TCRouter::get('view_subsidiary_content', array('id' => $cont->id, 'parent_category' => $rcategory->id)) ;?>">
                                    <div class="categoty-card" style="background-image: url('<?= $cont->get_logo('small');?>')">
                                        <div class="overlay"></div>
                                    </div>
                                    <h4><?= $cont->title; ?></h4>
                                </a>
                            </div>
                        <? endforeach; ?>
                    </div>
                <? endforeach; ?>
        <? endif; ?>
    </div>
</div>

