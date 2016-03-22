<div class="carusel-sm">
    <?= TCCore\TCTheme::render('home/partials/gallery'); ?>
</div>
<div class="container content">
    <div class="row tiles">
        <h2><?= $content->title; ?></h2>
        <div class="col-md-9">
            
            <!--<ol class="breadcrumb">
                <li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
                <? if(!is_null($parent_category)): ?>
                    <li><?= Fuel\Core\Html::anchor(TCRouter::get('view_category', array('alias' => $parent_category->alias)), $parent_category->title) ;?></li>
                <? endif;?>
                <li><a><?= $content->title; ?></a></li>
            </ol>-->
            <div class="content-bg">
                <div class="row">
                    <div class="col-sm-8 col-xs-12">
                        <div id="content-carousel" class="carousel slide content-galery-carusel">
                            <div class="carousel-inner">
                                <? $i = 0; ?> 
                                <? foreach($content->get_images() as $image): ?>
                                    <div class="<?= $i == 0 ? 'active' : '' ?> item" style="background-image: url('/files/<?= $image->galery; ?>')">
                                        <!--<a class="fancybox" data-fancybox-group="button" href="<?= Fuel\Core\Uri::base() . "files/{$image->full}" ?>"><?= Html::img("files/{$image->galery}"); ?></a>-->
                                    </div>
                                    <? $i++; ?>
                                <? endforeach; ?>
                            </div>
                            <ol class="carousel-indicators">
                                <? $i = 0; ?> 
                                <? foreach($content->get_images() as $image): ?>
                                    <li data-target="#content-carousel" style="background-image: url('/files/<?= $image->galery; ?>')" class="<?= $i == 0 ? 'active' : '' ?>" data-slide-to="<?= $i++; ?>"></li>
                                <? endforeach; ?>
                            </ol>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12 details">
                        <div>
                            <?= $content->description; ?>
                        </div>
                    </div>
                </div>
                <div class="description">
                    <?= $content->content; ?>
                </div>
            </div>
            
            <?= TCCore\TCTheme::render('content/comments_block'); ?>
            
        </div>
        <div class="col-md-3">
            <div class="related-categoryes">
                <? if(count($content->promoted_category) > 0): ?>
                    <? foreach($content->promoted_category as $rcategory): ?>
                        <? if(count($rcategory->get_own_content(4)) > 0): ?>
                            <div class="related-category">
                                <h2 class="related-cat-title"><?=$rcategory->title; ?></h2>
                                <div class="row tiles">
                                    <?= \TCCore\TCTheme::render("content/tiles", array('content' => $rcategory->get_own_content(4), 'category' => $rcategory, 'fool_view' => false, 'one_column' => true)); ?>
                                </div>
                            </div>
                        <? endif; ?>
                    <? endforeach; ?>
                <? endif; ?>
            </div>
            
        </div>
    </div>
    <? if(count($content->related_content) > 0): ?>
        <h4>Другие статьи раздела</h4>
        <div class="related-wrapper">
            <?= TCCore\TCTheme::render("content/tiles", array('content' => $content->related_content, 'category' => $parent_category)); ?>
        </div>
        
    <? else: ?>
        <div class="related-wrapper"></div>
    <? endif; ?>
    
</div>

