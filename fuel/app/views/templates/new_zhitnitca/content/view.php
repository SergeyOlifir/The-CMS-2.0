<div class="carusel-sm">
    <?= TCTheme::render('home/partials/gallery'); ?>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h2><?= $content->name; ?></h2>
            <ol class="breadcrumb">
                <li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
                <li><?= Fuel\Core\Html::anchor("/home/category/view/{$content->page->alias}", $content->page->name) ;?></li>
                <li><?= Fuel\Core\Html::anchor("/home/content/view/{$content->id}", $content->name) ;?></li>
            </ol>
            <div class="row">
                <div class="col-xs-8">
                    <div id="content-carousel" class="carousel slide content-galery-carusel">
                        <div class="carousel-inner">
                            <? $i = 0; ?> 
                            <? foreach($content->images as $image): ?>
                                <div class="<?= $i == 0 ? 'active' : '' ?> item" style="background-image: url('/files/<?= $image->galery; ?>')">
                                    <!--<a class="fancybox" data-fancybox-group="button" href="<?= Fuel\Core\Uri::base() . "files/{$image->full}" ?>"><?= Html::img("files/{$image->galery}"); ?></a>-->
                                </div>
                                <? $i++; ?>
                            <? endforeach; ?>
                        </div>
                        <ol class="carousel-indicators">
                            <? $i = 0; ?> 
                            <? foreach($content->images as $image): ?>
                                <li data-target="#content-carousel" style="background-image: url('/files/<?= $image->galery; ?>')" class="<?= $i == 0 ? 'active' : '' ?>" data-slide-to="<?= $i++; ?>"></li>
                            <? endforeach; ?>
                        </ol>
                    </div>
                </div>
                <div class="col-xs-4">
                    <p class="sm">Раздел: <?= Fuel\Core\Html::anchor("/home/category/view/{$content->page->alias}", $content->page->name) ;?></p>
                    <p class="sm">Количество комментариев: <a href="#">27</a></p>
                    <p class="sm">Автор: <a href="#">Редактор, ТМ «Рiдна Житница» </a></p>
                    <p class="sm">Дата: <?= Date::forge($content->created_at)->format("%d.%m.%Y", true); ?></p>
                </div>
            </div>
            <div class="description">
                <?=$content->more_description; ?>
            </div>
            
        </div>
        <div class="col-md-2">
            
        </div>
    </div>
    <? if(count($content->related_content) > 0): ?>
        <h4>Другие статьи раздела</h4>
        <div class="related-wrapper">
            <?= TCTheme::render("content/tiles", array('content' => $content->related_content)); ?>
            <div class="clearfix">
                <?= Fuel\Core\Html::anchor("/home/category/view/{$content->page->alias}", 'Все статьи раздела', array('class' => 'all_content')) ;?>
            </div>
        </div>
        
    <? else: ?>
        <div class="related-wrapper"></div>
    <? endif; ?>
    
</div>

