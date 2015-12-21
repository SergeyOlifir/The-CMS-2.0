<?  $category_id = Model_Category::query()->where('alias', '=', 'news')->get_one()->id;
    $contents = Model_Content::query()->where('page_id', '=', $category_id)->order_by('date_create', 'desc')->limit(3)->get();
?>
<section class="important_information left clearfix">
    <header class="name">
        <h1><a href="/home/pages/view/about">Важная информация фестиваля</a></h1>
    </header>
    <ul>
        <li class="registration left">
            <a href="/home/content/view/45">
                <article>
                    <div class="img-wrapper">
                        <?= Html::img("assets/img/templates/carusel/img_photoreport.png"); ?>
                    </div>
                    <header class="description">
                        <h1>
                            <span>Фотоотчет</span>
                            событий Фестиваля
                        </h1>
                    </header>
                </article>
            </a>
        </li>
        <li class="programma left">
            <a href="/home/content/view/46">
                <article>
                    <div class="img-wrapper">
                        <?= Html::img("assets/img/templates/carusel/img_videoreport.png"); ?>
                    </div>
                    <header class="description">
                        <h1>
                            <span>Видео</span>
                            событий Фестиваля
                        </h1>
                    </header>
                </article>
            </a>
        </li>
    </ul>
</section>
<? if(isset($contents)): ?>
    <section class='app-categories wrapper-padding left clearfix'>
        <header class="name">
            <h1><a href="/home/pages/view/news">Новости проекта</a></h1>
        </header>
        <ul class="clearfix">
            <? foreach($contents as $content): ?>
                <li class="category left">
                    <a href="/home/content/view/<?= $content->id; ?>/news">
                        <article>
                            <div class="img-wrapper">
                                <?= Html::img("files/{$content->logo->tile}"); ?>
                            </div>
                            <div class="description">
                                <header>
                                    <h1>
                                        <?= Str::truncate($content->name, 30, '...'); ?>
                                    </h1>
                                </header>
                                <? if ($content->category->public_data == 1): ?>
                                    <div class="date">
                                        <?= Date::forge($content->date_create)->format("%d.%m.%y", true); ?>
                                    </div>
                                <? endif; ?>
                            </div>
                        </article>
                    </a>
                </li>
            <? endforeach; ?>
        </ul>
    </section>
<? endif;?>
