<section class="projects clearfix app-categories left">
    <div class="row tiles">
        <? foreach ($content as $project): ?>
            <div class="<?= (isset($one_column) and $one_column == true) ? 'col-xs-12 col-sm-4 col-md-12' : 'col-md-3 col-sm-4 col-xs-12'; ?> item <?= ((isset($fool_view) and $fool_view) ? 'fool' : '') ?>">
                    <article>
                        <a href="<?= TCRouter::get('view_subsidiary_content', array('id' => $project->id, 'parent_category' => $category->id)) ?>">
                            <div class="img-wrapper">
                                <div class="content-img-bg" style="background-image: url('<?= $project->get_logo('small'); ?>')"></div>
                            </div>
                        </a>
                            <div class="description">
                                <header>
                                    <h1>
                                        <a href="<?= TCRouter::get('view_subsidiary_content', array('id' => $project->id, 'parent_category' => $category->id)) ?>">
                                            <?= Str::truncate($project->title, 55, '...'); ?>
                                        </a>
                                    </h1>
                                </header>
                                <? if(isset($fool_view) and $fool_view): ?>
                                    <content>
                                        <p class="details">
                                            <?= \Fuel\Core\Str::truncate(strip_tags($project->description), 100, '...') ;?>
                                        </p>
                                        
                                    </content>
                                <? endif; ?>
                            </div>
                    </article>
            </div>
        <? endforeach; ?>
    </div>
</section>
