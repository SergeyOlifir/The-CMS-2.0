<section class="projects wrapper-padding clearfix">
    <header class="name clearfix">
        <h1 class="left"><?= $page->header; ?></h1>
        <?= \Fuel\Core\Html::anchor("home/content/change/tile/{$page->alias}", "Tile", array('class' => 'tile left')); ?>
        <?= \Fuel\Core\Html::anchor("home/content/change/list/{$page->alias}", "List", array('class' => 'list left')); ?>
    </header>
    <? foreach ($content as $project): ?>
        <article class="project clearfix">
            <div class="logo-wrapper left">
                <a href="/home/content/view/<?= $project->id; ?>">
                    <?= Html::img("files/{$project->logo->list}"); ?>
                </a>
            </div>
            <div class="white-block left clearfix">
                <? if ($project->category->public_data == 1): ?>
                    <div class="date">
                        <?= Date::forge($project['date_create'])->format("%d.%m.%y", true); ?>
                    </div>
                <? endif; ?>
                <header>
                    <h1><?= $project['name']; ?></h1>
                </header>
                <div class="description">
                    <?= Str::truncate($project['short_description'], 306, '...'); ?>
                </div>
            </div>
            <?  if ($page->alias != null) {
                    echo \Fuel\Core\Html::anchor("/home/content/view/{$project->id}", $project['name'], array('class' => 'more-link')); 
                }
            ?>
        </article>
    <? endforeach; ?>
</section>
