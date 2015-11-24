<section class="projects clearfix app-categories left">
    <div class="row tiles">
        <? foreach ($content as $project): ?>
            <div class="col-md-3 col-xs-6 item <?= ((isset($fool_view) and $fool_view) ? 'fool' : '') ?>">
                    <article>
                        <a href="/home/content/view/<?= $project->id; ?>">
                            <div class="img-wrapper">
                                <?= Html::img("files/{$project->logo->tile}"); ?>
                            </div>
                        </a>
                            <div class="description">
                                <header>
                                    <h1>
                                        <a href="/home/content/view/<?= $project->id; ?>">
                                            <?= Str::truncate($project->title, 30, '...'); ?>
                                        </a>
                                    </h1>
                                </header>
                                <? if(isset($fool_view) and $fool_view): ?>
                                    <content>
                                        <p class="details">
                                            <?= \Fuel\Core\Str::truncate(strip_tags($project->description), 100, '...') ;?>
                                        </p>
                                        <div class="meta">
                                            <p class="sm">Раздел: <?= Fuel\Core\Html::anchor("/home/category/view/{$project->id}", $project->title) ;?></p>
                                            <p class="sm">Количество комментариев: <a href="#">27</a></p>
                                            <p class="sm">Автор: <a href="#">Редактор, ТМ «Рiдна Житница» </a></p>
                                            <p class="sm">Дата: <?= Date::forge($project->created_at)->format("%d.%m.%Y", true); ?></p>
                                        </div>
                                    </content>
                                <? endif; ?>
                            </div>
                    </article>
            </div>
        <? endforeach; ?>
    </div>
</section>
