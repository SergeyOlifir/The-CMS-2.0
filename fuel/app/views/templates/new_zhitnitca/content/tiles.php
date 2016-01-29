<section class="projects clearfix app-categories left">
    <div class="row tiles">
        <? foreach ($content as $project): ?>
            <div class="<?= (isset($one_column) and $one_column == true) ? 'col-xs-12 col-sm-4 col-md-12' : 'col-md-3 col-sm-4 col-xs-12'; ?> item <?= ((isset($fool_view) and $fool_view) ? 'fool' : '') ?>">
                    <article>
                        <a href="<?= TCRouter::get('view_subsidiary_content', array('id' => $project->id, 'parent_category' => $category->id)) ?>">
                            <div class="img-wrapper">
                                <div class="content-img-bg" style="background-image: url('<?= $project->get_logo('tile'); ?>')"></div>
                            </div>
                        </a>
                            <div class="description">
                                <header>
                                    <h1>
                                        <a href="<?= TCRouter::get('view_subsidiary_content', array('id' => $project->id, 'parent_category' => $category->id)) ?>">
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
                                            <p class="sm">Раздел: <?= Fuel\Core\Html::anchor(TCRouter::get('view_category', array('alias' => $category->alias)), $category->title) ;?></p>
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
